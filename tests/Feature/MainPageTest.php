<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\User;

class MainPageTest extends TestCase
{
    private $user_id = 1;
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testHome()
    {
        $user = User::find($this->user_id);
        $response = $this->actingAs($user)->get('/home');
        $response->assertStatus(200);
    }
    
    public function testHomeToInfo()
    {
        $user = User::find($this->user_id);
    
        $this->actingAs($user)->visit('/home')
            ->click('ИНФОРМАЦИЯ')
            ->seePageIs('/info');
    } 
}
