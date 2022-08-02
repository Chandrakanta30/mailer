<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ACLPermissions extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $permissions = \App\Models\acl_permission::all();
        return view('acl.permission.permission',compact('permissions'));
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
        $permission = new \App\Models\acl_permission;
        $permission->name = $request->name;
        $permission->guard_name = 'web';
        $permission->save();
        return redirect()->route('permission.index')->with('success','Permission Added Successfully');
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
        $permission = \App\Models\acl_permission::find($id);
        return view('acl.permission.edit',compact('permission'));
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
        $permission = \App\Models\acl_permission::find($id);
        $permission->name = $request->name;
        $permission->save();
        return redirect()->route('permission.index')->with('success','Permission Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $permission = \App\Models\acl_permission::find($id);
        $permission->delete();
        return redirect()->route('permission.index')->with('success','Permission Deleted Successfully');
    }

}
