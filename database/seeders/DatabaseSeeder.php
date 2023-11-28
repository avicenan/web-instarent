<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Vehicle;
use App\Models\Brand;
use \App\Models\User;
use \App\Models\Category;
use \App\Models\Type;
use App\Models\Rent;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Brand

        Brand::create([
            'name' => 'Hyundai',
            'slug' => 'hyundai',
        ]);

        Brand::create([
            'name' => 'Nissan',
            'slug' => 'nissan',
        ]);

        Brand::create([
            'name' => 'Datsun',
            'slug' => 'datsun',
        ]);

        Brand::create([
            'name' => 'Daihatsu',
            'slug' => 'daihatsu',
        ]);

        Brand::create([
            'name' => 'Honda',
            'slug' => 'honda',
        ]);

        Brand::create([
            'name' => 'Kia',
            'slug' => 'kia',
        ]);

        Brand::create([
            'name' => 'Mazda',
            'slug' => 'mazda',
        ]);

        Brand::create([
            'name' => 'Mini',
            'slug' => 'mini',
        ]);

        Brand::create([
            'name' => 'Suzuki',
            'slug' => 'suzuki',
        ]);

        Brand::create([
            'name' => 'Toyota',
            'slug' => 'toyota',
        ]);

        // Category

        Category::create([
            'name' => 'Car',
            'slug' => 'car'
        ]);

        Category::create([
            'name' => 'Bike',
            'slug' => 'bike'
        ]);

        // Type

        Type::create([
            'name' => 'Sedan',
            'slug' => 'sedan'
        ]);

        Type::create([
            'name' => 'SUV',
            'slug' => 'suv'
        ]);

        Type::create([
            'name' => 'MPV',
            'slug' => 'mpv'
        ]);

        Vehicle::create([
            'title' => 'Stargazer',
            'category_id' => 1,
            'brand_id' => 1,
            'type_id' => 2,
            'slug' => 'stargazer',
            'transmission' => 'Matic',
            'capacity' => 7,
            'power' => 1400,
            'price' => 450000,
            'start_date' => "2023-11-23"
        ]);

        Vehicle::create([
            'title' => 'Grand Livina',
            'category_id' => 1,
            'brand_id' => 2,
            'type_id' => 2,
            'slug' => 'grand-livina',
            'transmission' => 'Matic',
            'capacity' => 7,
            'power' => 1400,
            'price' => 400000,
            'start_date' => "2023-11-25"
        ]);

        Vehicle::create([
            'title' => 'Sigra',
            'category_id' => 1,
            'brand_id' => 4,
            'type_id' => 3,
            'slug' => 'sigra',
            'transmission' => 'Matic',
            'capacity' => 7,
            'power' => 1300,
            'price' => 325000,
            'start_date' => "2023-11-23"
        ]);

        Rent::create([
            'user_id' => 1,
            'vehicle_id' => 1,
            'start_date' => '2023-11-23',
            'end_date' => '2023-11-24'
        ]);
            
    }
}
