<?php

namespace Tests\Feature;

use App\Models\Memo;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class MemoAuthorizationTest extends TestCase
{
    use RefreshDatabase;

    public function test_other_user_cannot_update_memo(): void
    {
        $owner = User::factory()->create();
        $other = User::factory()->create();

        $memo = Memo::factory()->create([
            'user_id' => $owner->id,
            'body' => 'owner memo',
        ]);

        $this->actingAs($other);

        $this->put(route('memos.update', $memo), ['body' => 'hacked'])
            ->assertForbidden();
    }

    public function test_other_user_cannot_delete_memo(): void
    {
        $owner = User::factory()->create();
        $other = User::factory()->create();

        $memo = Memo::factory()->create([
            'user_id' => $owner->id,
        ]);

        $this->actingAs($other);

        $this->delete(route('memos.destroy', $memo))
            ->assertForbidden();
    }
}
