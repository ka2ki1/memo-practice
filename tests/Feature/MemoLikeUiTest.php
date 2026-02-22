<?php

namespace Tests\Feature;

use App\Models\Memo;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class MemoLikeUiTest extends TestCase
{
    use RefreshDatabase;

    public function test_liked_memo_shows_filled_heart(): void
    {
        $user = User::factory()->create();
        $memo = Memo::factory()->create();

        $user->likedMemos()->attach($memo->id);

        $this->actingAs($user)
            ->get(route('memos.index'))
            ->assertOk()
            ->assertSee('❤️');
    }
}
