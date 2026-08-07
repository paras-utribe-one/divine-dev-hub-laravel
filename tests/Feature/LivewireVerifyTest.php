<?php

namespace Tests\Feature;

use Livewire\Livewire;
use Tests\TestCase;

class LivewireVerifyTest extends TestCase
{
    public function test_livewire_verification_component_renders()
    {
        Livewire::test('verify-livewire')
            ->assertSee('Livewire verification component rendered.');
    }
}
