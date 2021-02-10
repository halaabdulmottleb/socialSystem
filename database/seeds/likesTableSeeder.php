<?php

use Illuminate\Database\Seeder;

class likesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\like::class , 8000)->create();
    }
}
