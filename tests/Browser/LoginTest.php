<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class LoginTest extends DuskTestCase
{
    public function test_login_fail()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit(env('APP_URL') . '/login')
                ->type('email', 'pviethieu@gmail.com')
                ->type('password', 'pwd_fail')
                ->press('.btn-login')
                ->assertPathIs('/login');
        });
    }

    public function test_login_success()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit(env('APP_URL') . '/login')
                ->type('email', 'pviethieu@gmail.com')
                ->type('password', '12345678')
                ->press('.btn-login')
                ->assertPathIs('/');
        });
    }
}
