<?php
use Illuminate\Database\Seeder;
class SportsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // create 10 users using the user factory
        factory(App\Sport::class, 5)->create();
    }
}