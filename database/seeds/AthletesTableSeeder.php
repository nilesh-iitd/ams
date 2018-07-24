<?php
use Illuminate\Database\Seeder;
class AthletesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // create 10 users using the user factory
        factory(App\Athlete::class, 100)->create();
    }
}