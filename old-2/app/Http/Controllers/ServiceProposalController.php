<?php

namespace App\Http\Controllers;

use App\Models\ServiceProposal;
use App\Http\Requests\ServiceProposalRequest;
use Illuminate\Http\Request;

class ServiceProposalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        return view('service-proposals.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        return view('service-proposals.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ServiceProposalRequest $request)
    {
        $proposal = ServiceProposal::create($request->validated());
        return response()->json(['id' => $proposal->id]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
