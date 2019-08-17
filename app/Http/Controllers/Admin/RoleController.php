<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$roles = Rolee::paginate(15);
        $roles = Role::with('permissions')->paginate(15);
        return view('admin.roles.home',compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.roles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:roles|min:5'
        ]);

        $role = new Role;
        $role->name = $request->name;
        $role->message = $request->message;
        
        $role->save();

        return redirect(route('admin.roles.edit', $role))->with('status', 'Role Created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //bunu kullanmayacağız
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $role
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {
        $permissions = Permission::all();
        return view('admin.roles.edit',compact('role','permissions'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $role
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Role $role)
    {
        $request->validate([
            'name' => 'required|unique:roles,id,'.$role->id.'|min:5',
            'permissions' => 'nullable|exists:permissions,id|array'
        ]);
        
        $role->name = $request->name;
        $role->message = $request->message;
        
        $role->save();
        $role->syncPermissions($request->permissions);

        return redirect(route('admin.roles.edit', $role))->with('status', 'Role Created!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $role
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
        $role->delete();
        return redirect()->route('admin.roles.lists');
    }
}
