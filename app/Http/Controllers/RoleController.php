<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $roles = Role::all();
        return view('admin.roles.index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.roles.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'role' => 'required|string|max:255',
            'description' => 'required|string|max:255',
        ]);

        $role = new Role();
        $role->role = $request->role;
        $role->description = $request->description;
        $role->save();
        return redirect()->route('roles.index')->with('success', 'Role created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function showDetailRole(Request $request)
    {
        $id = $request->role_id;
        $role = Role::find($id);
        return response()->json($role);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $role = Role::find($id);
        return view('admin.roles.edit', compact('role'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'role' => 'required|string|max:255',
            'description' => 'required|string|max:255',
        ]);
        $role = Role::find($id);
        $role->role = $request->role;
        $role->description = $request->description;
        $role->save();
        return redirect()->route('roles.index')->with('success', 'Role updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $role = Role::find($id);
        $role->delete();
        return redirect()->route('roles.index')->with('success', 'Role deleted successfully!');
    }
}
