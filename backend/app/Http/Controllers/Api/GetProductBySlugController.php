<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class GetProductBySlugController extends Controller
{
    /**
     * Lấy thông tin 1 product theo Slug
     * GET /api/products/slug/{slug}
     */
    public function __invoke(Request $request, string $slug): JsonResponse
    {
        $product = Product::with(['category:id,name,slug', 'brand:id,name,slug'])
            ->where('slug', $slug)
            ->first();

        if (!$product) {
            return response()->json([
                'status' => 'error',
                'message' => 'Không tìm thấy sản phẩm với slug: ' . $slug,
            ], 404);
        }

        return response()->json([
            'status' => 'success',
            'message' => 'Lấy chi tiết sản phẩm theo slug thành công',
            'data' => $product,
        ], 200);
    }
}
