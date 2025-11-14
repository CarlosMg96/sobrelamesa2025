<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $permissions = collect(Permission::orderBy('name', 'desc')->get()->toArray())->groupBy('module_name')->all();
        // print_r($permissions['Deals']); exit;
        // return $permissions;
        return view('roles.index', ['permissions' => $permissions]);
    }

    /**
     * Show the form for creating a new resource.
     */
    private function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $role = Role::create([
            'name' => $request->name,
        ]);
        $role->syncPermissions($request->permissions);
        session()->flash('status', _('Created successfully!'));
        return $request;
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $role = Role::findOrFail($id);
        $role->permissions;
        return $role;
    }

    /**
     * Show the form for editing the specified resource.
     */
    private function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $role = Role::findOrFail($id);
        $role->name = $request->name;
        $role->save();

        $role->syncPermissions($request->permissions);
        session()->flash('status', _('Updated successfully!'));
        return $request;

        // $permission = Permission::findOrFail($id);
        // $permission->name = $request->name;
        // $permission->module_name = $request->module_name;
        // $permission->save();
        // session()->flash('status', _('Updated successfully!'));
        // return $permission;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id, Request $request)
    {
        //
        $role = Role::findOrFail($id);
        $role->delete();
        session()->flash('status', _('Deleted successfully!'));
        return $id;
    }
}
