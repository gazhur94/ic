<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class ColorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $colors = ['Red', 'Orange', 'Yellow', 'Green', 'Cyan', 'Blue', 'Indigo', 
            'Violet', 'Purple', 'Magenta', 'Pink', 'Brown', 'White', 'Gray', 'Black'];



        for ($i=0; $i<count($colors); $i++) {
            DB::table('colors')->insert([
                'color' => $colors[$i],

                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),

            ]);
        }
    }
}
