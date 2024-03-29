<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\EmployeeLogin;
class EmployeeLoginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employees=EmployeeLogin::paginate();
        return view("employee.index",compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("employee.add");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $employee=new EmployeeLogin();
        $employee->name=$request->name;
        $employee->user_emailaddress=$request->email;
        $employee->password=bcrypt($request->password);
        $employee->save();
        return redirect()->back();
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
       $emplogin=EmployeeLogin::find($id);
       return view("employee.edit",compact('emplogin'));

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
        $employee=EmployeeLogin::find($id);
        $employee->name=$request->name;
        $employee->user_emailaddress=$request->email;
        if($request->password){
            $employee->password=bcrypt($request->password);
        }
        $employee->save();
        return redirect(route('employee.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $login = EmployeeLogin::find($id);
        $login->delete();
        return redirect()->route('employee.index')->with('success','Role Deleted Successfully');
    }
}
