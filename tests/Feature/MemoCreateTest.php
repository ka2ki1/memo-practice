<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class MemoCreateTest extends TestCase
{
    use RefreshDatabase;

    public function test_user_can_create_memo_and_see_it_in_list(): void
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $this->post(route('memos.store'), ['body' => 'hello'])
            ->assertRedirect(route('memos.index'));

        $this->get(route('memos.index'))
            ->assertSee('hello');
    }
}
