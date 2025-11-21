<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\LawFirm;
use Illuminate\Http\Request;
use App\Http\Requests\LawFirmRequest;

class LawFirmController extends Controller
{
    public function index()
    {
        $lawFirms = LawFirm::paginate(10);
        return response()->json($lawFirms);
        // return response()->json(LawFirm::all());
    }

    public function show($id)
    {
        $lawFirm = LawFirm::find($id);

        if (!$lawFirm) {
            return response()->json(['message' => 'Law Firm not found'], 404);
        }

        return response()->json($lawFirm);
    }

    public function store(LawFirmRequest $request)
    {
        $lawFirm = LawFirm::create($request->all());

        return response()->json($lawFirm, 201);
    }

    public function update(LawFirmRequest $request, $id)
    {
        $lawFirm = LawFirm::find($id);

        if (!$lawFirm) {
            return response()->json(['message' => 'Law Firm not found'], 404);
        }

        $lawFirm->update($request->all());

        return response()->json($lawFirm);
    }

    public function destroy($id)
    {
        $lawFirm = LawFirm::find($id);

        if (!$lawFirm) {
            return response()->json(['message' => 'Law Firm not found'], 404);
        }

        $lawFirm->delete();

        return response()->json(['message' => 'Law Firm deleted successfully']);
    }
}
