<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class BrandsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $brands = [
                    'Acura',
                    'Alfa Romeo',
                    'Aston Martin',
                    'Audi',
                    'Bentley',
                    'BMW',
                    'Bugatti',
                    'Buick',
                    'Cadillac',
                    'Chevrolet',
                    'Chrysler',
                    'Citroen',
                    'Dodge',
                    'Ferrari',
                    'Fiat',
                    'Ford',
                    'Geely',
                    'General Motors',
                    'GMC',
                    'Honda',
                    'Hyundai',
                    'Infiniti',
                    'Jaguar',
                    'Jeep',
                    'Kia',
                    'Lamborghini',
                    'Land Rover',
                    'Lexus',
                    'Maserati',
                    'Mazda',
                    'McLaren',
                    'Mercedes-Benz',
                    'Mini',
                    'Mitsubishi',
                    'Nissan',
                    'Pagani',
                    'Peugeot',
                    'Porsche',
                    'Ram',
                    'Renault',
                    'Rolls Royce',
                    'Saab',
                    'Subaru',
                    'Suzuki',
                    'Tata Motors',
                    'Tesla',
                    'Toyota',
                    'Volkswagen',
                    'Volvo'
                    ];



        for ($i=0; $i<count($brands); $i++) {
            DB::table('brands')->insert([
                'name' => $brands[$i],

                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),

            ]);
        }
    }
}
