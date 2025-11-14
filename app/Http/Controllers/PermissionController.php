<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return view('permissions.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('permissions.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $permission = Permission::create(['name' => $request->name, 'module_name' => $request->module_name]);
        session()->flash('status', _('Created successfully!'));
        return $permission;
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $permission = Permission::findOrFail($id);
        return $permission;
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
        $permission = Permission::findOrFail($id);
        $permission->name = $request->name;
        $permission->module_name = $request->module_name;
        $permission->save();
        session()->flash('status', _('Updated successfully!'));
        return $permission;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id, Request $request)
    {
        //
        $permission = Permission::findOrFail($id);
        $permission->delete();
        session()->flash('status', _('Deleted successfully!'));
        return $id;
    }
}
