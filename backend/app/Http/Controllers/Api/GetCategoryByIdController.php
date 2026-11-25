<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class GetCategoryByIdController extends Controller
{
    /**
     * Lấy thông tin 1 category theo ID
     * GET /api/categories/{id}
     */
    public function __invoke(Request $request, string|int $id): JsonResponse
    {
        $category = Category::find($id);

        if (!$category) {
            return response()->json([
                'status' => 'error',
                'message' => 'Không tìm thấy danh mục với ID: ' . $id,
            ], 404);
        }

        return response()->json([
            'status' => 'success',
            'message' => 'Lấy chi tiết danh mục thành công',
            'data' => $category,
        ], 200);
    }
}
