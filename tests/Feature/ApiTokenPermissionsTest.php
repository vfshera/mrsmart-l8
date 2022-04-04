<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ApiTokenPermissionsTest extends TestCase
{
    use RefreshDatabase;

    // public function test_api_token_permissions_can_be_updated()
    // {
    //     if (! Features::hasApiFeatures()) {
    //         return $this->markTestSkipped('API support is not enabled.');
    //     }

    //     $this->actingAs($user = User::factory()->withPersonalTeam()->create());

    //     $token = $user->tokens()->create([
    //         'name' => 'Test Token',
    //         'token' => Str::random(40),
    //         'abilities' => ['create', 'read'],
    //     ]);

    //     Livewire::test(ApiTokenManager::class)
    //                 ->set(['managingPermissionsFor' => $token])
    //                 ->set(['updateApiTokenForm' => [
    //                     'permissions' => [
    //                         'delete',
    //                         'missing-permission',
    //                     ],
    //                 ]])
    //                 ->call('updateApiToken');

    //     $this->assertTrue($user->fresh()->tokens->first()->can('delete'));
    //     $this->assertFalse($user->fresh()->tokens->first()->can('read'));
    //     $this->assertFalse($user->fresh()->tokens->first()->can('missing-permission'));
    // }
}