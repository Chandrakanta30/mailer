<?php

namespace App\Http\Controllers;

use App\Models\acl_permission;
use Illuminate\Http\Request;

class AssignRoleToPermission extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = \App\Models\acl_roles::all();
        $permissions = \App\Models\acl_permission::all();
        return view('acl.role_has_permissions.rolepermissonmanager',compact('roles','permissions'));
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
        $role = \App\Models\acl_roles::find($request->role_id);
        $permission = \App\Models\acl_permission::find($request->permission_id);
        $role->givePermissionTo($permission);
        return redirect()->route('role.index')->with('success','Permission Assigned Successfully');
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
        //
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
        //
    }
    public function assingRoleToPermissions(Request $request)
    {
        $role = \App\Models\acl_roles::find($request->role_id);
        $role->revokePermissionTo(acl_permission::all());
        foreach($request->selected_permission as $permission_id)
        {
            $permisssion = acl_permission::find($permission_id);
            $role->syncPermissions($permisssion);
        }
        return response()->json(['success' => 'Permission added successfully.'], 200);
    }

}
