<?php

namespace Tests\Unit;

use App\Models\User;
use Filament\Panel;
use Tests\TestCase;

class UserTest extends TestCase
{
    /**
     * Test that the User model can access the Filament panel.
     */
    public function test_can_access_panel_returns_true(): void
    {
        $user = new User;
        $panel = $this->createMock(Panel::class);

        $this->assertTrue($user->canAccessPanel($panel));
    }
}
