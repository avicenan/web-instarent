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
use App\Models\Status;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::create([
            'fname' => 'Admin',
            'lname' => 'Avicena',
            'telpNum' => '082100001111',
            'email' => 'avicena@email.com',
            'password' => '12345678',
            'usertype' => 'admin',
            'image' => 'profile-photo/no-photo.png'
        ]);

        User::create([
            'fname' => 'Admin',
            'lname' => 'Akmal',
            'telpNum' => '082100001112',
            'email' => 'akmal@email.com',
            'password' => '12345678',
            'usertype' => 'admin',
            'image' => 'profile-photo/no-photo.png'
        ]);

        User::create([
            'fname' => 'Admin',
            'lname' => 'Aksa',
            'telpNum' => '082100001113',
            'email' => 'aksa@email.com',
            'password' => '12345678',
            'usertype' => 'admin',
            'image' => 'profile-photo/no-photo.png'
        ]);

        User::create([
            'fname' => 'Admin',
            'lname' => 'Zahra',
            'telpNum' => '082100001111',
            'email' => 'zahra@email.com',
            'password' => '12345678',
            'usertype' => 'admin',
            'image' => 'profile-photo/no-photo.png'
        ]);

        User::create([
            'fname' => 'Admin',
            'lname' => 'Kirana',
            'telpNum' => '082100001111',
            'email' => 'kirana@email.com',
            'password' => '12345678',
            'usertype' => 'admin',
            'image' => 'profile-photo/no-photo.png'
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

        // Renting

        // Rent::create([
        //     'user_id' => 1,
        //     'vehicle_id' => 1,
        //     'start_date' => '2023-11-23 07:30',
        //     'end_date' => '2023-11-24 07:30'
        // ]);

        // Rent Status

        Status::create([
            'name' => 'Unpaid',
            'slug' => 'unpaid',
            'color' => '#9FA6B2'
        ]);

        Status::create([
            'name' => 'Booked',
            'slug' => 'booked',
            'color' => '#E4A11B'
        ]);

        Status::create([
            'name' => 'Confirmed',
            'slug' => 'confirmed',
            'color' => '#54B4D3'
        ]);

        Status::create([
            'name' => 'On Rent',
            'slug' => 'on-rent',
            'color' => '#3B71CA'
        ]);

        Status::create([
            'name' => 'Done',
            'slug' => 'done',
            'color' => '#14A44D'
        ]);

        Status::create([
            'name' => 'Canceled',
            'slug' => 'canceled',
            'color' => '#DC4C64'
        ]);

        Status::create([
            'name' => 'Issued',
            'slug' => 'issued',
            'color' => '#332D2D'
        ]);

        // Rent
            
    }
}
