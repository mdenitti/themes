<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\City;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Validator;

/**
 * @OA\Tag(
 *     name="Cities",
 *     description="API endpoints for managing cities"
 * )
 */
class CityController extends Controller
{
    /**
     * @OA\Get(
     *     path="/cities",
     *     summary="Get a list of all cities",
     *     operationId="getCitiesList",
     *     tags={"Cities"},
     *     security={{"bearerAuth":{}}},
     *     @OA\Response(
     *         response=200,
     *         description="Successful operation",
     *         @OA\JsonContent(
     *             type="array",
     *             @OA\Items(
     *                 type="object",
     *                 @OA\Property(property="id", type="integer"),
     *                 @OA\Property(property="name", type="string"),
     *                 @OA\Property(property="country", type="string"),
     *                 @OA\Property(property="continent", type="string"),
     *                 @OA\Property(property="population", type="integer", nullable=true),
     *                 @OA\Property(property="latitude", type="number", format="float"),
     *                 @OA\Property(property="longitude", type="number", format="float"),
     *                 @OA\Property(property="known_for", type="string", nullable=true),
     *                 @OA\Property(property="founded_year", type="integer", nullable=true),
     *                 @OA\Property(property="is_capital", type="boolean"),
     *                 @OA\Property(property="annual_tourists", type="integer", nullable=true),
     *                 @OA\Property(property="created_at", type="string", format="date-time"),
     *                 @OA\Property(property="updated_at", type="string", format="date-time")
     *             )
     *         )
     *     ),
     *     @OA\Response(response=401, description="Unauthenticated")
     * )
     */
    public function index(): JsonResponse
    {
        $cities = City::all();
        return response()->json($cities);
    }

    /**
     * @OA\Post(
     *     path="/cities",
     *     summary="Create a new city",
     *     operationId="storeCity",
     *     tags={"Cities"},
     *     security={{"bearerAuth":{}}},
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             @OA\Property(property="name", type="string", example="New York"),
     *             @OA\Property(property="country", type="string", example="USA"),
     *             @OA\Property(property="continent", type="string", example="North America"),
     *             @OA\Property(property="population", type="integer", example=8804190),
     *             @OA\Property(property="latitude", type="number", format="float", example=40.7128),
     *             @OA\Property(property="longitude", type="number", format="float", example=-74.0060),
     *             @OA\Property(property="known_for", type="string", example="Statue of Liberty, Times Square"),
     *             @OA\Property(property="founded_year", type="integer", example=1624),
     *             @OA\Property(property="is_capital", type="boolean", example=false),
     *             @OA\Property(property="annual_tourists", type="integer", example=66600000)
     *         )
     *     ),
     *     @OA\Response(
     *         response=201,
     *         description="City created successfully",
     *         @OA\JsonContent(
     *             @OA\Property(property="message", type="string", example="City created successfully"),
     *             @OA\Property(property="city", type="object")
     *         )
     *     ),
     *     @OA\Response(response=400, description="Validation errors"),
     *     @OA\Response(response=401, description="Unauthenticated")
     * )
     */
    public function store(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'country' => 'required|string|max:255',
            'continent' => 'required|string|max:255',
            'population' => 'nullable|integer',
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
            'known_for' => 'nullable|string',
            'founded_year' => 'nullable|integer',
            'is_capital' => 'boolean',
            'annual_tourists' => 'nullable|integer',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 400);
        }

        $city = City::create($request->all());

        return response()->json([
            'message' => 'City created successfully',
            'city' => $city
        ], 201);
    }

    // ... other CRUD methods for show, update, and destroy
}