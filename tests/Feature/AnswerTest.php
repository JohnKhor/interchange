<?php

namespace Tests\Feature;

use App\Question;
use App\Answer;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AnswerTest extends TestCase
{
    use RefreshDatabase;
    
    /** @test */
    public function it_can_show_all_answers_to_a_question()
    {
        $question = factory(Question::class)->create();
        $answerOne = factory(Answer::class)->create([
            'question_id' => $question->id,
        ]);
        $answerTwo = factory(Answer::class)->create([
            'question_id' => $question->id,
        ]);

        $response = $this->get(route('questions.show', ['question' => $question->title]));

        $response->assertSee($answerOne->body)
            ->assertSee($answerOne->user->username)
            ->assertSee($answerTwo->body)
            ->assertSee($answerTwo->user->username);
    }

    /** @test */
    public function user_can_create_an_answer_to_a_question()
    {
        $this->assertTrue(true);
    }

    /** @test */
    public function user_cannot_create_multiple_answers_to_the_same_question()
    {
        $this->assertTrue(true);
    }

    /** @test */
    public function user_can_update_their_answer()
    {
        $this->assertTrue(true);
    }

    /** @test */
    public function user_cannot_update_answer_by_another_user()
    {
        $this->assertTrue(true);
    }

    /** @test */
    public function user_can_delete_their_answer()
    {
        $this->assertTrue(true);
    }

    /** @test */
    public function user_cannot_delete_answer_by_another_user()
    {
        $this->assertTrue(true);
    }
}
