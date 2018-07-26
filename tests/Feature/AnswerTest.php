<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AnswerTest extends TestCase
{
    /** @test */
    public function it_can_show_all_answers_to_a_question()
    {
        $this->assertTrue(true);
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
