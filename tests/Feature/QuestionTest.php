<?php

namespace Tests\Feature;

use App\User;
use App\Question;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class QuestionTest extends TestCase
{
    use WithFaker;
    use RefreshDatabase;

    /** @test */
    public function it_can_show_all_questions()
    {
        $questionOne = factory(Question::class)->create();
        $questionTwo = factory(Question::class)->create();

        $response = $this->get(route('questions'));

        $response->assertSee($questionOne->title)
            ->assertSee($questionOne->user->username)
            ->assertSee($questionTwo->title)
            ->assertSee($questionTwo->user->username);
    }

    /** @test */
    public function it_can_show_a_specific_question_on_its_own_page()
    {
        $question = factory(Question::class)->create();
        
        $response = $this->get(route('questions.show', ['question' => $question->title]))
            ->assertSee($question->body)
            ->assertSee($question->user->username);
    }

    /** @test */
    public function user_can_create_a_question()
    {
        $user = factory(User::class)->create();
        $question = factory(Question::class)->make([
            'user_id' => $user->id
        ])->toArray();

        $response = $this->actingAs($user)
            ->post(route('questions.store'), [
                'title' => $question['title'],
                'body' => $question['body'],
            ]);

        $response->assertRedirect(route('questions.show', ['question' => $question['title']]))
            ->assertSessionMissing('errors')
            ->assertSessionHas('success', 'Question has been successfully created.');

        $this->assertDatabaseHas('questions', [
            'title' => $question['title'],
            'body' => $question['body'],
            'user_id' => $question['user_id'],
        ]);
    }

    /** @test */
    public function user_can_update_their_question()
    {
        $user = factory(User::class)->create();
        $question = factory(Question::class)->create([
            'user_id' => $user->id
        ]);
        $newTitle = $this->faker->sentence;
        $newBody = $this->faker->paragraph;

        $response = $this->actingAs($user)
            ->put(route('questions.update', ['question' => $question->title]), [
                'title' => $newTitle,
                'body' => $newBody,
            ]);

        $response->assertRedirect(route('questions.show', ['question' => $newTitle]))
            ->assertSessionMissing('errors')
            ->assertSessionHas('success', 'Question has been successfully updated.');

        $this->assertDatabaseHas('questions', [
            'title' => $newTitle,
            'body' => $newBody,
            'user_id' => $user->id,
        ]);
    }

    /** @test */
    public function user_cannot_update_a_question_by_another_user()
    {
        $user = factory(User::class)->create();
        $question = factory(Question::class)->create();
        $newTitle = $this->faker->sentence;
        $newBody = $this->faker->paragraph;

        $response = $this->actingAs($user)
            ->put(route('questions.update', ['question' => $question->title]), [
                'title' => $newTitle,
                'body' => $newBody,
            ]);

        $response->assertStatus(403);
    }

    /** @test */
    public function user_can_delete_a_question()
    {
        $user = factory(User::class)->create();
        $question = factory(Question::class)->create([
            'user_id' => $user->id
        ]);

        $response = $this->actingAs($user)
            ->delete(route('questions.destroy', ['question' => $question->title]));

        $response->assertRedirect(route('questions'))
            ->assertSessionMissing('errors')
            ->assertSessionHas('success', 'Question has been removed.');

        $this->assertDatabaseMissing('questions', [
            'title' => $question->title,
            'body' => $question->body,
            'user_id' => $user->id,
        ]);
    }

    /** @test */
    public function user_cannot_delete_a_question_by_another_user()
    {
        $user = factory(User::class)->create();
        $question = factory(Question::class)->create();

        $response = $this->actingAs($user)
            ->delete(route('questions.destroy', ['question' => $question->title]));

        $response->assertStatus(403);
    }
}
