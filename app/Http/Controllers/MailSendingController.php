<?php

namespace App\Http\Controllers;

use App\Mail\MailSending;
use App\Models\Smtp;
use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Config;

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
        if(!empty($files)){
            foreach ($files as $file) {
                $ful = $file->store('public/attachments');
                $attachments[] = url(Storage::url($ful));
            }
        }
        $smtp=Smtp::find($request->smtp_server);
        $data=[
            'driver'=>'smtp',
            'host'=>$smtp->smtp_host,
            'port'=>$smtp->port,
            'encryption'=>null,
            'username'=>$smtp->user_name,
            'password'=>$smtp->password,
            'from'=>[
                'address'=>$smtp->from_email,
                'name'=>'no reply'
            ]

        ];
        Config::set('mail',$data);

        $data = array(
            'body' => $request->body,
            'subject' => $request->subject,
            'attachment' => $attachments,
        );

        $query=User::query();

        if($request->department){
            $query=$query->whereIN('department_id',$request->department);
        }
        if($request->tech){
            $query=$query->whereIN('technology_id',$request->tech);
        }

        $userslist=$query->get();
        foreach ($userslist as $key => $value) {

            $name=$value['user_firstname']." ".$value['user_lastname'];
            $email=$value['user_emailaddress'];

            $user =  ["subhankar.dutta@neosoftmail.com"];
            $cc = ["chandrakanta.haransingh@neosoftmail.com"];
            $mail = new MailSending($request->subject,$attachments,$request->body,'New Name');
            $mail->to($user);
            $mail->cc($cc);
            $mail->build();
            Mail::send($mail);
            dd($mail);
        }
        return $userslist;
       

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
