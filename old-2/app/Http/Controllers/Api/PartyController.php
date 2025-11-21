<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Party;
use Illuminate\Http\Request;

class PartyController extends Controller
{
    public function index()
    {
        return Party::all();
    }

    public function show($id)
    {
        return Party::findOrFail($id);
    }

    public function store(Request $request)
    {
        $party = Party::create($request->all());
        return response()->json($party, 201);
    }

    public function update(Request $request, $id)
    {
        $party = Party::findOrFail($id);
        $party->update($request->all());
        return response()->json($party, 200);
    }

    public function destroy($id)
    {
        Party::destroy($id);
        return response()->json(null, 204);
    }
}
