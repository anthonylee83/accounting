<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use App\User;

class UserAdminFunctionTest extends DuskTestCase
{
    private $standardUser;
    /** @test */
    public function adminCanViewUsers()
    {
        $this->browse(function (Browser $browser){
            $browser->visit('/')
                ->type('#email', 'admin@adminuser.com')
                ->type('#password', 'Admin')
                ->press('Login')
                ->assertSee('Dashboard')
                ->clickLink('Admin User')
                ->clickLink('Users')
                ->assertSee('admin@adminuser.com');
        });
    }

    /** @test */
    public function adminCanCreateNewUser(){
        $this->standardUser = factory(User::class)->make();
        $user = $this->standardUser;
        $this->browse(function (Browser $browser) use ($user){
            
            $browser->press('@newUser')
                ->assertSee('Create User')
                ->type('#name', $user->name)
                ->type('#email', $user->email)
                ->type('#password', 'secret')
                ->select('access_level_id', 'Standard')
                ->press('Create User')
                ->assertSee($user->name)
                ->assertSee('Active')
                ->clickLink('Admin User')
                ->clickLink('Logout');
        });
    }

    /** @test */
    public function standardUserCanLoginCannotViewUsers(){
        $user = $this->standardUser;
        $this->browse(function (Browser $browser) use($user){
            $browser->type("#email", $user->email)
            ->type("#password", 'secret')
            ->press('login')
            ->assertSee('dashboard');
        });
    }

    /** @test */
    public function standardUserCannotViewUsers()
    {
        $this->browse(function (Browser $browser){
            $browser->clickLink($this->standardUser->name)
                ->assertDontSee('Users')
                ->visit('/admin/users')
                ->assertSee('You are not authorized to view this page');

        });
    }
    
}
