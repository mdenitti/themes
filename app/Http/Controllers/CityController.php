<?php
namespace App\Http\Controllers;

use App\Models\City;
use Illuminate\Http\Request;

class CityController extends Controller
{
    public function index()
    {
        $cities = City::orderBy('name')->paginate(5);
        return view('cities.index', compact('cities'));
    }

    public function show($id)
    {
        $city = City::findOrFail($id);
        return view('cities.show', compact('city'));
    }

    public function byContinent($continent)
    {
        $cities = City::where('continent', $continent)->get();
        return view('cities.continent', compact('cities', 'continent'));
    }

    public function topTouristDestinations()
    {
        $cities = City::orderBy('annual_tourists', 'desc')->take(10)->get();
        return view('cities.top_tourist', compact('cities'));
    }
}