<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class MemoValidationTest extends TestCase
{
    use RefreshDatabase;

    public function test_body_is_required(): void
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $this->post(route('memos.store'), ['body' => ''])
            ->assertSessionHasErrors(['body']);
    }
}

