<?php

use Illuminate\Database\Seeder;
use seeds\RoleSeedeer;
use seeds\UsersTableSeeder;
use seeds\CandidateSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         $this->call(RoleSeeder::class);
        // $this->call(UsersTableSeeder::class);
         $this->call(CandidateSeeder::class);
    }
}
