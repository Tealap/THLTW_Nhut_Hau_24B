<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class GetCategoryBySlugController extends Controller
{
    /**
     * Lấy thông tin 1 category theo Slug
     * GET /api/categories/slug/{slug}
     */
    public function __invoke(Request $request, string $slug): JsonResponse
    {
        $category = Category::where('slug', $slug)->first();

        if (!$category) {
            return response()->json([
                'status' => 'error',
                'message' => 'Không tìm thấy danh mục với slug: ' . $slug,
            ], 404);
        }

        return response()->json([
            'status' => 'success',
            'message' => 'Lấy chi tiết danh mục theo slug thành công',
            'data' => $category,
        ], 200);
    }
}
