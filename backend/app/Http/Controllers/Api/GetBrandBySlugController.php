<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class GetBrandBySlugController extends Controller
{
    /**
     * Lấy thông tin 1 brand theo Slug
     * GET /api/brands/slug/{slug}
     */
    public function __invoke(Request $request, string $slug): JsonResponse
    {
        $brand = Brand::where('slug', $slug)->first();

        if (!$brand) {
            return response()->json([
                'status' => 'error',
                'message' => 'Không tìm thấy thương hiệu với slug: ' . $slug,
            ], 404);
        }

        return response()->json([
            'status' => 'success',
            'message' => 'Lấy chi tiết thương hiệu theo slug thành công',
            'data' => $brand,
        ], 200);
    }
}
