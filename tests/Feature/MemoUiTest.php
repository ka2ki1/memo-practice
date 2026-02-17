<?php

namespace Tests\Feature;

use App\Models\Memo;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class MemoUiTest extends TestCase
{
    use RefreshDatabase;

    public function test_only_owner_sees_edit_link(): void
    {
        $owner = User::factory()->create();
        $other = User::factory()->create();

        $ownerMemo = Memo::factory()->create(['user_id' => $owner->id]);
        $otherMemo = Memo::factory()->create(['user_id' => $other->id]);

        $this->actingAs($owner);

        $response = $this->get(route('memos.index'))
            ->assertOk();

        // 自分のメモには編集リンクが見える
        $response->assertSee(route('memos.edit', $ownerMemo), false);

        // 他人のメモの編集リンクは見えない
        $response->assertDontSee(route('memos.edit', $otherMemo), false);
    }
}
