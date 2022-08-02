<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserRole extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = \App\Models\acl_roles::all();
        $users = \App\Models\EmployeeLogin::all();
        // return $users;
        return view('acl.role.user',compact('users','roles'));
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
        //
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function getUserByRole(Request $request)
    {
        $role_id = $request->role_id;
        $users2 = \App\Models\EmployeeLogin::all();
        $users = \App\Models\EmployeeLogin::whereHas('roles', function($q) use ($role_id) {
            $q->where('id', $role_id);
        })->get();
        return response()->json(['users'=>$users,'users2'=>$users2]);
    }
    public function assign_role_to_user(Request $request)
    {
        //you will recive a set of user ids
        foreach($request->user_ids as $user_id){
            $user = \App\Models\EmployeeLogin::find($user_id);
            $user->update(['roleid'=>$request->role_id]);
            $user->save();
        }
        return response()->json(['success'=>'Role Assigned Successfully']);
    }
}
