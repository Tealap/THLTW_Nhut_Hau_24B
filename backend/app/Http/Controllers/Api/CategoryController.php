<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class CategoryController extends Controller
{
    /**
     * Lấy danh sách danh mục (có phân trang)
     * GET /api/categories?page=1&limit=10
     */
    public function index(Request $request): JsonResponse
    {
        $limit = (int) $request->input('limit', 10);
        if ($limit <= 0) {
            $limit = 10;
        }

        $categories = Category::query()
            ->latest('id')
            ->paginate($limit);

        return response()->json([
            'status' => 'success',
            'message' => 'Lấy danh sách danh mục thành công',
            'data' => $categories->items(),
            'pagination' => [
                'current_page' => $categories->currentPage(),
                'limit' => $categories->perPage(),
                'total' => $categories->total(),
                'last_page' => $categories->lastPage(),
                'has_more' => $categories->hasMorePages(),
            ],
        ], 200);
    }
}
