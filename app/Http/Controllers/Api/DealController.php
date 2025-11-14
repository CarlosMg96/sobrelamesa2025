<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Deal;
use Illuminate\Http\Request;

class DealController extends Controller
{
    public function index()
    {
        return Deal::paginate(10);
    }

    public function show($id)
    {
        return Deal::findOrFail($id);
    }

    public function store(Request $request)
    {
        $deal = Deal::create($request->all());
        return response()->json($deal, 201);
    }

    public function update(Request $request, $id)
    {
        $deal = Deal::findOrFail($id);
        $deal->update($request->all());
        return response()->json($deal, 200);
    }

    public function destroy($id)
    {
        Deal::destroy($id);
        return response()->json(['message' => 'Deal was deleted successfully'], 204);
    }
}
