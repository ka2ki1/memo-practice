<?php

namespace Tests\Feature;

use App\Models\Memo;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class MemoSearchTest extends TestCase
{
    use RefreshDatabase;

    public function test_user_can_search_memos(): void
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        Memo::factory()->create([
            'user_id' => $user->id,
            'body' => 'Laravel is great',
        ]);

        Memo::factory()->create([
            'user_id' => $user->id,
            'body' => 'PHP memo',
        ]);

        $this->get(route('memos.index', ['q' => 'Laravel']))
            ->assertOk()
            ->assertSee('Laravel is great')
            ->assertDontSee('PHP memo');
    }
}
