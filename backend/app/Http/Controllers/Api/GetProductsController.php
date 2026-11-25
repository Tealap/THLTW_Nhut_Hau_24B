<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class GetProductsController extends Controller
{
    /**
     * Lấy danh sách sản phẩm (có phân trang)
     * GET /api/products?page=1&limit=10
     */
    public function __invoke(Request $request): JsonResponse
    {
        $limit = (int) $request->input('limit', 10);
        if ($limit <= 0) {
            $limit = 10;
        }

        $products = Product::query()
            ->with(['category:id,name,slug', 'brand:id,name,slug'])
            ->latest('id')
            ->paginate($limit);

        return response()->json([
            'status' => 'success',
            'message' => 'Lấy danh sách sản phẩm thành công',
            'data' => $products->items(),
            'pagination' => [
                'current_page' => $products->currentPage(),
                'limit' => $products->perPage(),
                'total' => $products->total(),
                'last_page' => $products->lastPage(),
                'has_more' => $products->hasMorePages(),
            ],
        ], 200);
    }
}
