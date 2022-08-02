<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\EmployeeLogin;
use App\Models\AdminChecker;

class AUTHController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('auth.login');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $auth = auth()->attempt([
            'user_emailaddress' => $request->email,
            'password' => $request->password,
        ]);
        if($auth){
            return redirect('/');
        }else{
            return redirect('/login');
        }
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
    public function logout()
    {
        auth()->logout();
        return redirect('/login');
    }

    public function home(){
        $registered_employeed=EmployeeLogin::count();
        $pending_verification_mails=AdminChecker::where('status',0)->count();
        $pending_execution_mails=AdminChecker::where('status',1)->where('is_executed',0)->count();
        $completed_mails=AdminChecker::where('is_executed',1)->count();

        return view('welcome',compact('registered_employeed','pending_verification_mails','pending_execution_mails','completed_mails'));
    }
}
