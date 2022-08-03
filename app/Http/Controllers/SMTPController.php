<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Smtp;

class SMTPController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $smtp=Smtp::paginate();
        return view('smtp.index',compact('smtp'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('smtp.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $smtp=new Smtp();
        $smtp->name=$request->mailer_name;
        $smtp->smtp_host=$request->host;
        $smtp->port=($request->port);
        $smtp->user_name=$request->username;
        $smtp->password=$request->password;
        $smtp->from_email=($request->from_mail);
        $smtp->encryption=$request->encryption;
        $smtp->save();
        return redirect()->route('smtp.index')->with('success','SMTP added successfully');
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
        $smtp=Smtp::find($id);
        return view('smtp.edit',compact('smtp'));
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
        $smtp=Smtp::find($id);
        $smtp->name=$request->mailer_name;
        $smtp->smtp_host=$request->host;
        $smtp->port=($request->port);
        $smtp->user_name=$request->username;
        $smtp->password=$request->password;
        $smtp->from_email=($request->from_mail);
        $smtp->encryption=$request->encryption;
        $smtp->save();
        return redirect()->route('smtp.index')->with('success','Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $smtp=Smtp::find($id);
        $smtp->delete();
        return redirect()->route('smtp.index')->with('success','Deleted Successfully');
    }
}
