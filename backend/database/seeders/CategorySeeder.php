<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $sampleCategories = [
            'Điện thoại & Phụ kiện',
            'Máy tính & Laptop',
            'Thời trang nam',
            'Thời trang nữ',
            'Giày dép',
            'Đồng hồ & Trang sức',
            'Thiết bị điện tử',
            'Gia dụng & Đời sống',
            'Mẹ & Bé',
            'Thể thao & Dã ngoại',
            'Sách & Văn phòng phẩm',
            'Ô tô & Xe máy',
        ];

        foreach ($sampleCategories as $name) {
            Category::firstOrCreate(
                ['slug' => Str::slug($name)],
                [
                    'name' => $name,
                    'description' => 'Mô tả chi tiết cho danh mục ' . $name,
                    'is_active' => true,
                ]
            );
        }
    }
}
