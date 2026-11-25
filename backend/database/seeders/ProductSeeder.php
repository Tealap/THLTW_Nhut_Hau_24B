<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\Category;
use App\Models\Brand;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categoryPhone = Category::where('slug', 'dien-thoai-phu-kien')->first();
        $categoryLaptop = Category::where('slug', 'may-tinh-laptop')->first();
        $brandApple = Brand::where('slug', 'apple')->first();
        $brandSamsung = Brand::where('slug', 'samsung')->first();
        $brandAsus = Brand::where('slug', 'asus')->first();

        $sampleProducts = [
            [
                'name' => 'iPhone 15 Pro Max 256GB',
                'category_id' => $categoryPhone?->id,
                'brand_id' => $brandApple?->id,
                'price' => 29990000,
                'sale_price' => 28490000,
                'stock' => 50,
                'description' => 'Điện thoại thông minh cao cấp từ Apple với chip A17 Pro.',
            ],
            [
                'name' => 'Samsung Galaxy S24 Ultra 512GB',
                'category_id' => $categoryPhone?->id,
                'brand_id' => $brandSamsung?->id,
                'price' => 31990000,
                'sale_price' => 29990000,
                'stock' => 35,
                'description' => 'Flagship cao cấp của Samsung với bút S-Pen và AI thông minh.',
            ],
            [
                'name' => 'MacBook Pro 14 M3 Pro',
                'category_id' => $categoryLaptop?->id,
                'brand_id' => $brandApple?->id,
                'price' => 49990000,
                'sale_price' => 47500000,
                'stock' => 20,
                'description' => 'Máy tính xách tay chuyên nghiệp cho lập trình viên và đồ họa.',
            ],
            [
                'name' => 'Asus ROG Zephyrus G16',
                'category_id' => $categoryLaptop?->id,
                'brand_id' => $brandAsus?->id,
                'price' => 45000000,
                'sale_price' => 42990000,
                'stock' => 15,
                'description' => 'Laptop gaming mỏng nhẹ màn hình OLED siêu sắc nét.',
            ],
        ];

        foreach ($sampleProducts as $p) {
            Product::firstOrCreate(
                ['slug' => Str::slug($p['name'])],
                array_merge($p, [
                    'slug' => Str::slug($p['name']),
                    'content' => 'Nội dung chi tiết bài viết giới thiệu về sản phẩm ' . $p['name'],
                    'thumbnail' => null,
                    'images' => [],
                    'is_active' => true,
                    'is_featured' => true,
                ])
            );
        }
    }
}
