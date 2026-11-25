<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class GetProductByIdController extends Controller
{
    /**
     * Lấy thông tin 1 product theo ID
     * GET /api/products/{id}
     */
    public function __invoke(Request $request, string|int $id): JsonResponse
    {
        $product = Product::with(['category:id,name,slug', 'brand:id,name,slug'])->find($id);

        if (!$product) {
            return response()->json([
                'status' => 'error',
                'message' => 'Không tìm thấy sản phẩm với ID: ' . $id,
            ], 404);
        }

        return response()->json([
            'status' => 'success',
            'message' => 'Lấy chi tiết sản phẩm thành công',
            'data' => $product,
        ], 200);
    }
}
