<?php

namespace App\Http\Controllers;

use App\Models\Product; // Importando o modelo Product
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
    * @OA\Get(
    *     path="/api/products",
    *     summary="List all products",
    *     tags={"Products"},
    *     security={{"bearerAuth":{}}},
    *     @OA\Parameter(
    *         name="X-Requested-With",
    *         in="header",
    *         required=true,
    *         @OA\Schema(type="string", example="XMLHttpRequest")
    *     ),
    *     @OA\Response(
    *         response=200,
    *         description="A list of products",
    *         @OA\JsonContent(
    *             type="array",
    *             @OA\Items(
    *                 @OA\Property(property="id", type="integer", example=1),
    *                 @OA\Property(property="name", type="string", example="Product Name"),
    *                 @OA\Property(property="description", type="string", example="Product Description"),
    *                 @OA\Property(property="price", type="number", format="float", example=19.99),
    *                 @OA\Property(property="created_at", type="string", format="date-time", example="2024-01-01T00:00:00Z"),
    *                 @OA\Property(property="updated_at", type="string", format="date-time", example="2024-01-01T00:00:00Z")
    *             ),
    *             example={
    *                 {
    *                     "id": 1,
    *                     "name": "Product 1",
    *                     "description": "Description for Product 1",
    *                     "price": 19.99,
    *                     "created_at": "2024-01-01T00:00:00Z",
    *                     "updated_at": "2024-01-01T00:00:00Z"
    *                 },
    *                 {
    *                     "id": 2,
    *                     "name": "Product 2",
    *                     "description": "Description for Product 2",
    *                     "price": 29.99,
    *                     "created_at": "2024-01-02T00:00:00Z",
    *                     "updated_at": "2024-01-02T00:00:00Z"
    *                 }
    *             }
    *         )
    *     )
    * )
    */
    public function index()
    {
        $products = Product::all();
        return response()->json($products);
    }

    /**
     * @OA\Get(
     *     path="/api/products/{id}",
     *     summary="Get product by ID",
     *     tags={"Products"},
     *     security={{"bearerAuth":{}}},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         @OA\Schema(type="integer", example="1"),
     *     ),
    *     @OA\Parameter(
    *         name="X-Requested-With",
    *         in="header",
    *         required=true,
    *         @OA\Schema(type="string", example="XMLHttpRequest")
    *     ),
    *     @OA\Response(
    *         response=200,
    *         description="Product details",
    *         @OA\JsonContent(
    *             type="array",
    *             @OA\Items(
    *                 @OA\Property(property="id", type="integer", example=1),
    *                 @OA\Property(property="name", type="string", example="Product Name"),
    *                 @OA\Property(property="description", type="string", example="Product Description"),
    *                 @OA\Property(property="price", type="number", format="float", example=19.99),
    *                 @OA\Property(property="created_at", type="string", format="date-time", example="2024-01-01T00:00:00Z"),
    *                 @OA\Property(property="updated_at", type="string", format="date-time", example="2024-01-01T00:00:00Z")
    *             )
    *         )
     *     )
     * )
     */
    public function show(int $id)
    {
        $product = Product::find($id);
        if ($product) {
            return response()->json($product);
        }
        return response()->json(['message' => 'Product not found'], 404);
    }

}
