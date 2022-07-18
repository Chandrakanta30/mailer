<?php

namespace App\Http\Controllers;

use App\Mail\MailSending;
use App\Models\Smtp;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;

class MailSendingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $smtp_servers = Smtp::all();
        $departments = \App\Models\mis_department_master::all();
        $techs = \App\Models\mis_technology_master::all();
        return view('email.add',compact('smtp_servers','departments','techs'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $files = $request->file('attachment');
        $attachments = array();
        // files added to the array
        foreach ($files as $file) {
            $ful = $file->store('public/attachments');
            $attachments[] = Storage::url($ful);
        }
        // $data = $request->all();
        // Mail::send('mail.create', $data, function ($message) use ($data) {
        //     $message->to($data['to_email'], $data['to_name'])->subject($data['subject']);

        // });
        $mail = new MailSending($request->subject,"subhankar0810@gmail.com",$attachments,$request->body);
        // $mail->build();
        Mail::send($mail);
        dd($mail);

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
}
