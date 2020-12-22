<?php

use Illuminate\Database\Seeder;
use App\User;

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
        'name' => 'Nelson Alex mutane',
        'email' => 'Nelson.mutane@uzambeze.ac.mz',
        'role_id' => 1,
        'candidate_id' =>0,
        'email_verified_at' => NULL,
        'password' => '$2y$10$uf5tlXbjMmS/Jqpp6ucQ5OIfpTvio5r7tAe5jwCbteX1uMlTCX1CK', // password
        'remember_token' => Str::random(10),
    ]);
    }
}