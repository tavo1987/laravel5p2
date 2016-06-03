<?php

use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(User::class)->create([
            'first_name' => 'Edwin',
            'last_name'  => 'Ramírez',
            'email'      => 'tavo198718@gmail.com',
            'role'       => 'admin',
            'password'   => bcrypt('secret'),
            'api_token'  => str_random(60)
        ]);

        factory(User::class)->times(5)->create();
    }
}
