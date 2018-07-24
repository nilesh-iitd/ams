<?php

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();
        // Register the user seeder
        $this->call(UsersTableSeeder::class);
        $this->call(AthletesTableSeeder::class);
        $this->call(TeamsTableSeeder::class);
        $this->call(SportsTableSeeder::class);
        Model::reguard();
    }
}
