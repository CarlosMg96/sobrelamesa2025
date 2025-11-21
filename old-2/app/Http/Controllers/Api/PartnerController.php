<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\PartnerRequest;
use App\Models\Partner;
use Illuminate\Http\Request;

class PartnerController extends Controller
{
    /**
     * Display a listing of all partners.
     *
     * @return \Illuminate\Http\JsonResponse
     * @response 200 {
     *   "data": [
     *     {
     *       "id": 1,
     *       "name": "John",
     *       "last_name": "Doe",
     *       "email": "john.doe@example.com",
     *       "number": "123456789",
     *       "directory_name": "John Doe",
     *       "direct_number": "987654321",
     *       "position": "Senior Partner",
     *       "area": "Corporate Law",
     *       "birthdate": "1980-01-01",
     *       "created_at": "2025-07-02T00:00:00.000000Z",
     *       "updated_at": "2025-07-02T00:00:00.000000Z"
     *     }
     *   ]
     * }
     */
    public function index(Request $request)
    {
        return Partner::orderBy('name')->paginate();
    }

    /**
     * Display the specified partner.
     *
     * @param int $id The partner ID
     * @return \Illuminate\Http\JsonResponse
     * @throws \Illuminate\Database\Eloquent\ModelNotFoundException
     * @response 200 {
     *   "id": 1,
     *   "name": "John",
     *   "last_name": "Doe",
     *   "email": "john.doe@example.com",
     *   "number": "123456789",
     *   "directory_name": "John Doe",
     *   "direct_number": "987654321",
     *   "position": "Senior Partner",
     *   "area": "Corporate Law",
     *   "birthdate": "1980-01-01",
     *   "created_at": "2025-07-02T00:00:00.000000Z",
     *   "updated_at": "2025-07-02T00:00:00.000000Z"
     * }
     * @response 404 {
     *   "message": "No query results for model [App\\Models\\Partner] 1"
     * }
     */
    public function show($id)
    {
        return Partner::findOrFail($id);
    }

    /**
     * Store a newly created partner in storage.
     *
     * @param \App\Http\Requests\PartnerRequest $request The validated request data
     * @return \Illuminate\Http\JsonResponse
     * @response 201 {
     *   "id": 1,
     *   "name": "John",
     *   "last_name": "Doe",
     *   "email": "john.doe@example.com",
     *   "number": "123456789",
     *   "directory_name": "John Doe",
     *   "direct_number": "987654321",
     *   "position": "Senior Partner",
     *   "area": "Corporate Law",
     *   "birthdate": "1980-01-01",
     *   "created_at": "2025-07-02T00:00:00.000000Z",
     *   "updated_at": "2025-07-02T00:00:00.000000Z"
     * }
     * @response 422 {
     *   "message": "The given data was invalid.",
     *   "errors": {
     *     "email": ["The email field is required."]
     *   }
     * }
     */
    public function store(PartnerRequest $request)
    {
        $partner = Partner::create($request->all());
        return response()->json($partner, 201);
    }

    /**
     * Update the specified partner in storage.
     *
     * @param \App\Http\Requests\PartnerRequest $request The validated request data
     * @param int $id The partner ID to update
     * @return \Illuminate\Http\JsonResponse
     * @throws \Illuminate\Database\Eloquent\ModelNotFoundException
     * @response 200 {
     *   "id": 1,
     *   "name": "John",
     *   "last_name": "Doe",
     *   "email": "john.doe@example.com",
     *   "number": "123456789",
     *   "directory_name": "John Doe",
     *   "direct_number": "987654321",
     *   "position": "Senior Partner",
     *   "area": "Corporate Law",
     *   "birthdate": "1980-01-01",
     *   "created_at": "2025-07-02T00:00:00.000000Z",
     *   "updated_at": "2025-07-02T00:00:00.000000Z"
     * }
     * @response 404 {
     *   "message": "No query results for model [App\\Models\\Partner] 1"
     * }
     * @response 422 {
     *   "message": "The given data was invalid.",
     *   "errors": {
     *     "email": ["The email has already been taken."]
     *   }
     * }
     */
    public function update(PartnerRequest $request, $id)
    {
        $partner = Partner::findOrFail($id);
        $partner->update($request->all());
        return response()->json($partner, 200);
    }

    /**
     * Remove the specified partner from storage.
     *
     * @param int $id The partner ID to delete
     * @return \Illuminate\Http\JsonResponse
     * @response 204 {
     *   "message": "Partner deleted successfully"
     * }
     * @response 404 {
     *   "message": "Partner not found"
     * }
     */
    public function destroy($id)
    {
        Partner::destroy($id);
        return response()->json(null, 204);
    }
}
