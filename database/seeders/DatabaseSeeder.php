<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Vehicle;
use App\Models\Brand;
use \App\Models\User;
use \App\Models\Category;
use \App\Models\Type;
use \App\Models\Transmission;
use App\Models\Rent;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::create([
            'fname' => 'Admin',
            'lname' => 'Andri',
            'telpNum' => '082100001111',
            'email' => 'admin@email.com',
            'password' => '12345678',
            'usertype' => 'admin'
        ]);
        
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

        // Type ################################

        Type::create([
            'name' => 'Sedan',
            'slug' => 'sedan'
        ]);

        Type::create([
            'name' => 'Hatchback',
            'slug' => 'hatchback'
        ]);

        Type::create([
            'name' => 'Cabriolet',
            'slug' => 'cabriolet'
        ]);

        Type::create([
            'name' => 'Muscle',
            'slug' => 'muscle'
        ]);

        Type::create([
            'name' => 'Sport',
            'slug' => 'sport'
        ]);

        Type::create([
            'name' => 'SUV',
            'slug' => 'suv'
        ]);

        Type::create([
            'name' => 'Crossover',
            'slug' => 'crossover'
        ]);

        Type::create([
            'name' => 'Van',
            'slug' => 'van'
        ]);

        Type::create([
            'name' => 'Pickup',
            'slug' => 'pickup'
        ]);

        Type::create([
            'name' => 'Scooter',
            'slug' => 'scooter'
        ]);

        Type::create([
            'name' => 'Bebek',
            'slug' => 'bebek'
        ]);

        Type::create([
            'name' => 'Big Scooter',
            'slug' => 'big-scooter'
        ]);

        Type::create([
            'name' => 'Off-road',
            'slug' => 'off-road'
        ]);

        Type::create([
            'name' => 'Underbone',
            'slug' => 'underbone'
        ]);

        // Transmission ################################

        Transmission::create([
            'name' => 'Automatic',
            'slug' => 'automatic'
        ]);

        Transmission::create([
            'name' => 'Manual',
            'slug' => 'manual'
        ]);

        Transmission::create([
            'name' => 'Electric Vehicle',
            'slug' => 'electric-vehicle'
        ]);


        ##########################################

        Vehicle::create([
            'title' => 'Stargazer',
            'category_id' => 1,
            'brand_id' => 1,
            'type_id' => 2,
            'slug' => 'stargazer',
            'transmission_id' => 1,
            'capacity' => 7,
            'power' => 1400,
            'price' => 450000,
            'plate_num' => 'D8837SFX',
            'color' => 'Silver',
            'extras' => 'Kursi bayi, bantal duduk, pelindung kaca'
        ]);

        Vehicle::create([
            'title' => 'Grand Livina',
            'category_id' => 1,
            'brand_id' => 2,
            'type_id' => 2,
            'slug' => 'grand-livina',
            'transmission_id' => 1,
            'capacity' => 7,
            'power' => 1400,
            'price' => 400000,
            'plate_num' => 'B5523KFD',
            'color' => 'red',
            'extras' => 'Kursi bayi, bantal duduk, pelindung kaca',
        ]);

        Vehicle::create([
            'title' => 'Sigra',
            'category_id' => 1,
            'brand_id' => 4,
            'type_id' => 3,
            'slug' => 'sigra',
            'transmission_id' => 1,
            'capacity' => 7,
            'power' => 1300,
            'price' => 325000,
            'plate_num' => 'B9395FFS',
            'color' => 'black',
            'extras' => 'Kursi bayi, bantal duduk, pelindung kaca',
        ]);

        Rent::create([
            'user_id' => 1,
            'vehicle_id' => 1,
            'start_date' => '2023-11-23 07:30',
            'end_date' => '2023-11-24 07:30'
        ]);
            
    }
}
