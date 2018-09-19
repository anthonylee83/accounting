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
    public function standardUserCanLoginUsers(){
        $user = $this->standardUser;
        $this->browse(function (Browser $browser) use($user){
            $browser->type("#email", User::whereHas('profile', function($query){
                $query->where('access_level_id', 1);
            })->first()->email)
            ->type("#password", 'secret')
            ->press('Login')
            ->assertSee('Dashboard');
        });
    }

    /** @test */
    public function standardUserCannotViewUsers()
    {
        $this->browse(function (Browser $browser){
            $browser
                ->visit('/admin/users')
                ->assertSee('You are not authorized to view this page');

        });
    }
    
}
