<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class testTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         DB::table('test')->insert([
            'name' => str_random(10),
            'email' => str_random(10).'@gmail.com',
            'created_at' => Carbon::parse(date('Y-m-d')),
            'updated_at' => Carbon::parse(date('Y-m-d')),
        ]);
    }
}
