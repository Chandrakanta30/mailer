<?php

namespace App\Http\Controllers;

use App\Models\AdminChecker;
use Illuminate\Http\Request;

class AdminCheckerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.indextable');
    }
    public function create()
    {
        return view('admin.checker.create');
    }
    public function store(Request $request)
    {
        // AdminChecker::create($request->all());
        /**
         *"_token" => "SSchMxTZMWB2MNIQGXEimWOVIGmjLdJ7dgRlorDv"
            "smtp_server" => "1"
            "department" => array:3 [▶]
            "tech" => array:4 [▶]
            "subject" => "Hello Test"
            "body" => "<p>Hello te,mpo</p><p>teorlpm</p>"
            "datetime" => "2022-07-25T12:21"
         *
         */
        //make department array to string
        $department = implode(',',$request->department);
        //make tech array to string
        print_r($department);
        $tech = implode(',',$request->tech);
        // if($request->hasFile('attachment')){
        //     $file = $request->file('attachment');
        //     $file->move(public_path().'/files/',$file->getClientOriginalName());
        //     $attachment = $file->getClientOriginalName();
        // }else{
        //     $attachment = '';
        // }
        //make attachment array to string
        // $attachment = implode(',',$request->attachment);
        AdminChecker::create([
            'smpt_id' => $request->smtp_server,
            'department' => $department,
            'tech' => $tech,
            'subject' => $request->subject,
            'message' => $request->body,
            'date_time' => $request->datetime,
        ]);

        dd($request->all());
    }
    public function show($id)
    {
        //
    }
    public function edit($id)
    {
        //
    }
    public function update(Request $request, $id)
    {
        //
    }
    public function destroy($id)
    {
        //
    }


}
