<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\PracticeArea;
use Illuminate\Http\Request;
use App\Http\Requests\PracticeAreaRequest;

class PracticeAreaController extends Controller
{
    public function index(Request $request)
    {
        // return response()->json(['is' => boolval($request->is_interest_area)]);
        $query = PracticeArea::query();
        if ($request->is_interest_area) {
            $is_interest_area = filter_var($request->is_interest_area, FILTER_VALIDATE_BOOLEAN);
            if ($is_interest_area)
                $query->where('is_interest_area', true);
            else
                $query->where('is_interest_area', false)->orWhere('is_interest_area', null);
        }
        $practiceAreas = $query->get();
        return response()->json($practiceAreas);
    }

    public function show($id)
    {
        $practiceArea = PracticeArea::find($id);

        if (!$practiceArea) {
            return response()->json(['message' => 'Practice Area not found'], 404);
        }

        return response()->json($practiceArea);
    }

    public function store(PracticeAreaRequest $request)
    {
        $is_interest_area = filter_var($request->is_interest_area, FILTER_VALIDATE_BOOLEAN);
        $practiceArea = PracticeArea::create(
            [
                'name' => $request->name,
                'is_interest_area' => $is_interest_area,
            ]
        );

        return response()->json($practiceArea, 201);
    }

    public function update(PracticeAreaRequest $request, $id)
    {
        $practiceArea = PracticeArea::find($id);

        if (!$practiceArea) {
            return response()->json(['message' => 'Practice Area not found'], 404);
        }

        $practiceArea->update($request->all());

        return response()->json($practiceArea);
    }

    public function destroy($id)
    {
        $practiceArea = PracticeArea::find($id);

        if (!$practiceArea) {
            return response()->json(['message' => 'Practice Area not found'], 404);
        }

        $practiceArea->delete();

        return response()->json(['message' => 'Practice Area deleted successfully']);
    }
}
