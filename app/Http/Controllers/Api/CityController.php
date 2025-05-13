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

    /**
     * @OA\Get(
     *     path="/cities/country/{country}",
     *     summary="Search cities by country",
     *     operationId="searchCitiesByCountry",
     *     tags={"Cities"},
     *     security={{"bearerAuth":{}}},
     *     @OA\Parameter(
     *         name="country",
     *         in="path",
     *         required=true,
     *         description="Country name to search for",
     *         @OA\Schema(type="string")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Successful operation",
     *         @OA\JsonContent(type="array", @OA\Items(type="object"))
     *     ),
     *     @OA\Response(response=401, description="Unauthenticated"),
     *     @OA\Response(response=404, description="No cities found")
     * )
     */
    public function searchByCountry(string $country): JsonResponse
    {
        $cities = City::where('country', $country)->get();
        
        if ($cities->isEmpty()) {
            return response()->json(['message' => 'No cities found for this country'], 404);
        }
        
        return response()->json($cities);
    }

    /**
     * @OA\Get(
     *     path="/cities/continent/{continent}",
     *     summary="Search cities by continent",
     *     operationId="searchCitiesByContinent",
     *     tags={"Cities"},
     *     security={{"bearerAuth":{}}},
     *     @OA\Parameter(
     *         name="continent",
     *         in="path",
     *         required=true,
     *         description="Continent name to search for",
     *         @OA\Schema(type="string")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Successful operation",
     *         @OA\JsonContent(type="array", @OA\Items(type="object"))
     *     ),
     *     @OA\Response(response=401, description="Unauthenticated"),
     *     @OA\Response(response=404, description="No cities found")
     * )
     */
    public function searchByContinent(string $continent): JsonResponse
    {
        $cities = City::where('continent', $continent)->get();
        
        if ($cities->isEmpty()) {
            return response()->json(['message' => 'No cities found for this continent'], 404);
        }
        
        return response()->json($cities);
    }

    /**
     * @OA\Get(
     *     path="/cities/founded/{year}",
     *     summary="Get cities founded in a specific year",
     *     operationId="getCitiesByFoundedYear",
     *     tags={"Cities"},
     *     security={{"bearerAuth":{}}},
     *     @OA\Parameter(
     *         name="year",
     *         in="path",
     *         required=true,
     *         description="Year when cities were founded",
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Successful operation",
     *         @OA\JsonContent(type="array", @OA\Items(type="object"))
     *     ),
     *     @OA\Response(response=401, description="Unauthenticated"),
     *     @OA\Response(response=404, description="No cities found")
     * )
     */
    public function getCitiesByFoundedYear(int $year): JsonResponse
    {
        $cities = City::where('founded_year', $year)->get();
        
        if ($cities->isEmpty()) {
            return response()->json(['message' => 'No cities found for this founding year'], 404);
        }
        
        return response()->json($cities);
    }


    /**
     * Get all cities founded in the 20th century.
     *
     * @return JsonResponse
     */
    public function getCitiesIn20thCentury(): JsonResponse
    {
        $cities = City::whereBetween('founded_year', [1900, 1999])->get();
        
        if ($cities->isEmpty()) {
            return response()->json(['message' => 'No cities found in the 20th century'], 404);
        }
        
        return response()->json($cities);
    }
   
}