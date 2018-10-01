<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class LoginTest extends DuskTestCase
{
    /** @test */
    public function userLoginDisplays()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                    ->assertSee('Login');
        });
    }

    /** @test */
    public function userCanLogin()
    {
        $this->browse(function (Browser $browser){
            $browser->type('#email', 'admin@adminuser.com')
                ->type('#password', 'Admin')
                ->press('Login')
                ->assertSee('Dashboard')
                ->clickLink('Admin User')
                ->clickLink('Logout')
                ->assertSee('Login');
        });
    }

    /** @test */
    public function userInvalidCredentials(){
        $this->browse(function (Browser $browser){
            $browser->type('#email', 'admin@adminuser.com')
                ->type('#password', 'none')
                ->press('Login')
                ->assertSee('These credentials do not match our records.');
        });
    }

    
}
