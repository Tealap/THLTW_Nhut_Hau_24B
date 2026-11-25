<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class GetBrandsController extends Controller
{
    /**
     * Lấy danh sách thương hiệu (có phân trang)
     * GET /api/brands?page=1&limit=10
     */
    public function __invoke(Request $request): JsonResponse
    {
        $limit = (int) $request->input('limit', 10);
        if ($limit <= 0) {
            $limit = 10;
        }

        $brands = Brand::query()
            ->latest('id')
            ->paginate($limit);

        return response()->json([
            'status' => 'success',
            'message' => 'Lấy danh sách thương hiệu thành công',
            'data' => $brands->items(),
            'pagination' => [
                'current_page' => $brands->currentPage(),
                'limit' => $brands->perPage(),
                'total' => $brands->total(),
                'last_page' => $brands->lastPage(),
                'has_more' => $brands->hasMorePages(),
            ],
        ], 200);
    }
}
