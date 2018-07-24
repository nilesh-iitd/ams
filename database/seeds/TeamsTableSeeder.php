<?php
use Illuminate\Database\Seeder;
class TeamsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // create 10 users using the user factory
        factory(App\Team::class, 10)->create();
    }
}