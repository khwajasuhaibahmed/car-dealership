<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Car;

class CarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $cars = [
            [
                'title' => '2024 Honda Civic RS Turbo',
                'brand' => 'Honda',
                'model' => 'Civic',
                'year' => 2024,
                'price' => 9800000,
                'mileage' => 0,
                'fuel_type' => 'Petrol',
                'transmission' => 'Automatic',
                'body_type' => 'Sedan',
                'color' => 'Crystal Black',
                'description' => 'The all-new Honda Civic RS Turbo. Power meets elegance with a 1.5L VTEC Turbo engine and premium leather interior.',
                'status' => 'available',
                'is_featured' => true,
                'images' => ['https://images.unsplash.com/photo-1605810230434-7631ac76ec81?auto=format&fit=crop&w=800&q=80']
            ],
            [
                'title' => '2024 Toyota Corolla Altis Grande',
                'brand' => 'Toyota',
                'model' => 'Corolla',
                'year' => 2024,
                'price' => 7500000,
                'mileage' => 0,
                'fuel_type' => 'Petrol',
                'transmission' => 'Automatic',
                'body_type' => 'Sedan',
                'color' => 'Super White',
                'description' => 'Reliability redefined. The Toyota Corolla Grande features a 1.8L engine and a CVT transmission for a smooth drive.',
                'status' => 'available',
                'is_featured' => true,
                'images' => ['https://images.unsplash.com/photo-1623860841539-16631c77f03a?auto=format&fit=crop&w=800&q=80']
            ],
            [
                'title' => '2023 Suzuki Swift GLX CV',
                'brand' => 'Suzuki',
                'model' => 'Swift',
                'year' => 2023,
                'price' => 5100000,
                'mileage' => 5000,
                'fuel_type' => 'Petrol',
                'transmission' => 'Automatic',
                'body_type' => 'Hatchback',
                'color' => 'Mineral Grey',
                'description' => 'Compact, agile, and fuel-efficient. The Suzuki Swift GLX is the perfect hatchback for urban commuting.',
                'status' => 'available',
                'is_featured' => true,
                'images' => ['https://images.unsplash.com/photo-1590362891335-72892956cfb2?auto=format&fit=crop&w=800&q=80']
            ],
            [
                'title' => '2024 Kia Sportage AWD',
                'brand' => 'Kia',
                'model' => 'Sportage',
                'year' => 2024,
                'price' => 8500000,
                'mileage' => 0,
                'fuel_type' => 'Petrol',
                'transmission' => 'Automatic',
                'body_type' => 'SUV',
                'color' => 'Panthera Metal',
                'description' => 'The Kia Sportage offers a premium driving experience with its AWD system and high-tech cabin.',
                'status' => 'available',
                'is_featured' => true,
                'images' => ['https://images.unsplash.com/photo-1631435275811-9a7000e3532f?auto=format&fit=crop&w=800&q=80']
            ],
            [
                'title' => '2024 Hyundai Tucson FWD',
                'brand' => 'Hyundai',
                'model' => 'Tucson',
                'year' => 2024,
                'price' => 8200000,
                'mileage' => 0,
                'fuel_type' => 'Petrol',
                'transmission' => 'Automatic',
                'body_type' => 'SUV',
                'color' => 'Silky Bronze',
                'description' => 'Modern design and exceptional comfort. The Hyundai Tucson is a top-tier SUV for those who value style.',
                'status' => 'available',
                'is_featured' => false,
                'images' => ['https://images.unsplash.com/photo-1619682817481-e994891cd1f5?auto=format&fit=crop&w=800&q=80']
            ],

        ];

        foreach ($cars as $car) {
            Car::create($car);
        }
    }
}
