<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Role extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = \App\Models\acl_roles::all();
        return view('acl.role.role',compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $role = new \App\Models\acl_roles;
        $role->name = $request->name;
        $role->slug = $request->slug;
        $role->guard_name = 'web';
        $role->save();
        return redirect()->route('role.index')->with('success','Role Added Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $role = \App\Models\acl_roles::find($id);
        return view('acl.role.editrole',compact('role'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $role = \App\Models\acl_roles::find($id);
        $role->name = $request->name;
        $role->slug = $request->slug;
        $role->save();
        return redirect()->route('role.index')->with('success','Role Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $role = \App\Models\acl_roles::find($id);
        $role->delete();
        return redirect()->route('role.index')->with('success','Role Deleted Successfully');

    }
    public function getPermissions(Request $request)
    {
        $role = \App\Models\acl_roles::find($request->role_id);
        $permissions = $role->acl_permissions;
        $permissions_list = \App\Models\acl_permission::all();
        $response = [
            'permissions' => $permissions,
            'permissions_list' => $permissions_list
        ];
        return response()->json($response, 200);
    }
    public function addPermission(Request $request)
    {
        $role = \App\Models\acl_roles::find($request->role_id);
        $role->acl_permissions()->detach();
        $role->acl_permissions()->attach($request->selected_permission);
        return response()->json(['success' => 'Permission added successfully.'], 200);
    }
}
