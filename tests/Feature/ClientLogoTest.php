<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\ClientLogo;
use App\Models\adminPanel;

class ClientLogoTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        // create a super admin to satisfy middleware
        adminPanel::create([
            'adminName' => 'Super',
            'emailAddress' => 'super@example.com',
            'department' => 'Science',
            'shift' => 'Morning',
            'adminType' => 'Admin',
            'batchSession' => '2010-11',
            'password' => bcrypt('password'),
        ]);
        $this->withSession(['superAdmin' => 1]);
    }

    public function test_client_logo_creation(): void
    {
        $logo = ClientLogo::create([
            'name' => 'Test Client',
            'image' => 'dummy.png',
            'url' => 'https://example.com',
            'ordering' => 1,
            'active' => true,
        ]);
        $this->assertDatabaseHas('client_logos',[ 'name' => 'Test Client' ]);
        $this->assertTrue($logo->active);
    }

    public function test_store_requires_image(): void
    {
        $response = $this->post(route('adminClientStore'),[
            'name' => 'Client Missing Image',
            'ordering' => 0,
            'active' => 1,
        ]);
        $response->assertSessionHasErrors('image');
    }
}
