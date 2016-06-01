<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class AuthenticationTest extends TestCase
{
    use DatabaseTransactions;
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testUserCanRegister()
    {
        $this->visit('/')
        ->click('Register')
        ->see('Register')
        ->seePageIs('/register')
        ->seeText('Register')
        ->type('Julio','first_name')
        ->type('Perez','last_name')
        ->type('edwin@shiftlatam.com','email')
        ->type('secret','password')
        ->type('secret','password_confirmation')
        ->press('Register');

        $this->seeCredentials( [
            'first_name' => 'Julio',
            'last_name'  => 'Perez',
            'email'      => 'edwin@shiftlatam.com',
            'password'   => 'secret',
        ]);

        $this->seePageIs('/')
        ->seeText('Welcome')
        ->seeText('Julio Perez');
    }
}
