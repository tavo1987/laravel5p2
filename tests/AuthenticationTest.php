<?php

use App\User;
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

    public function testUserCanLogin()
    {
        $user = $this->createUser();

        $this->visit('/')
            ->dontSeeIsAuthenticated()
            ->click('Login')
            ->seePageIs('/login')
            ->type($user->email,'email')
            ->type('secret','password')
            ->press('Login');


        $this->seeIsAuthenticated();

        $this->seePageIs('/')
            ->see('Welcome')
            ->see($user->first_name.' '.$user->last_name);

    }

    public function TestUserCanLogout()
    {
        $user = $this->createUser();

        $this->actingAs($user)
            ->visit('/')
            ->SeeIsAuthenticated()
            ->click('Logout')
            ->seePageIs('/home')
            ->dontSeeIsAuthenticated();
    }


    public function testUserAdminCanLoginOtherUser()
    {

        //HAVING
        $user = $this->createUser();
        $other_user = factory(User::class)->create();

        //WHEN
        $this->actingAs($user)
            ->visit('/admin/users')
            ->see('Lista de Usuarios')
            ->within('#'.$other_user->slug, function () use($other_user){
                $this->see('Iniciar sesión')
                    ->press('Iniciar sesión');
            });

        //THEN
            $this->seeIsAuthenticatedAs($other_user)
                ->seeText($other_user->full_name);

    }


    public function createUser()
    {
        $user = factory(User::class)->create([
            'first_name' => 'Edwin',
            'last_name' => 'Ramírez',
            'email' => 'tavo198718@gmail.com',
            'password' => bcrypt('secret'),
            'api_token' => str_random(60)
        ]);

        return $user;
    }
}