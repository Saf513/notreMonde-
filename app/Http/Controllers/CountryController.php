<?php
namespace App\Http\Controllers;

use App\Models\Country;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CountryController extends Controller
{
    // Lister tous les pays
    public function index()
    {
        $countries = Country::all();
        return response()->json($countries);
    }

    // Créer un nouveau pays
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'capital' => 'required|string|max:255',
            'population' => 'required|integer',
            'region' => 'required|string|max:255',
            'flag_url' => 'nullable|string|max:255',
        ]);

        $country = Country::create($request->all());
        return response()->json($country, Response::HTTP_CREATED);
    }

    // Afficher un pays spécifique
    public function show($id)
    {
        $country = Country::findOrFail($id);
        return response()->json($country);
    }

    // Mettre à jour un pays
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'sometimes|string|max:255',
            'capital' => 'sometimes|string|max:255',
            'population' => 'sometimes|integer',
            'region' => 'sometimes|string|max:255',
            'flag_url' => 'nullable|string|max:255',
        ]);

        $country = Country::findOrFail($id);
        $country->update($request->all());
        return response()->json($country);
    }

    // Supprimer un pays
    public function destroy($id)
    {
        $country = Country::findOrFail($id);
        $country->delete();
        return response()->json(null, Response::HTTP_NO_CONTENT);
    }
}
