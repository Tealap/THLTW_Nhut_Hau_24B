<?php

namespace Database\Seeders;

use App\Models\Brand;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $sampleBrands = [
            'Apple',
            'Samsung',
            'Sony',
            'Xiaomi',
            'Asus',
            'Dell',
            'HP',
            'Lenovo',
            'Nike',
            'Adidas',
            'Puma',
            'Logitech',
        ];

        foreach ($sampleBrands as $name) {
            Brand::firstOrCreate(
                ['slug' => Str::slug($name)],
                [
                    'name' => $name,
                    'description' => 'Thương hiệu ' . $name . ' chính hãng',
                    'logo' => null,
                    'is_active' => true,
                ]
            );
        }
    }
}
