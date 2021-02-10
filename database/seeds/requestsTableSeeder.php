<?php

use Illuminate\Database\Seeder;

class requestsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\friendRequest::class , 1000)->create();
    }
}
