<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class GetBrandByIdController extends Controller
{
    /**
     * Lấy thông tin 1 brand theo ID
     * GET /api/brands/{id}
     */
    public function __invoke(Request $request, string|int $id): JsonResponse
    {
        $brand = Brand::find($id);

        if (!$brand) {
            return response()->json([
                'status' => 'error',
                'message' => 'Không tìm thấy thương hiệu với ID: ' . $id,
            ], 404);
        }

        return response()->json([
            'status' => 'success',
            'message' => 'Lấy chi tiết thương hiệu thành công',
            'data' => $brand,
        ], 200);
    }
}
