<?php

namespace App\Models;

class Vehicle 
{
    private static $vehicle_details = [
        [
            "title" => "Stargizer Prime",
            "slug" => "stargizer-prime",
            "transmission" => "Matic",
            "capacity" => "7 Orang",
            "power" => "1500",
            "price" => 450000
        ],
        [
            "title" => "Avanza Veloz",
            "slug" => "avanza-veloz",
            "transmission" => "Matic",
            "capacity" => "8 Orang",
            "power" => "1500",
            "price" => 350000
        ],
        [
            "title" => "Kijang Innova",
            "slug" => "kijang-innova",
            "transmission" => "Matic",
            "capacity" => "7 Orang",
            "power" => "1200",
            "price" => 300000
        ]

    ];

    public static function all()
    {
        return collect(self::$vehicle_details);
    }

    public static function find($slug)
    {
        $posts = static::all();

        return $posts->firstWhere('slug', $slug);
    }
}
