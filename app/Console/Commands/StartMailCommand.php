<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\AdminChecker;
use Carbon\Carbon;

use App\Mail\MailSending;
use App\Models\Smtp;
use App\Models\User;
use Config;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class StartMailCommand extends Command
{

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'start:mail';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $end_time = Carbon::now()->format('Y-m-d H:i:s');
        $start_time = Carbon::now()->subMinute(15)->format('Y-m-d H:i:s');
        $mails=AdminChecker::whereBetween('date_time',[$start_time,$end_time])->where('status',1)->where('is_executed',0)->get();
        

    print_r("End Time".$end_time."<br>");
    print_r("start time".$start_time."<br>");
    print_r($mails);


        foreach ($mails as $email) {
            // $start_time = Carbon::parse($email->date_time);
            // if (!is_null($start_time) && $start_time->isCurrentMinute() && $email->status = 0) {
            //     $schedule->command('start:mail')->when($start_time->isCurrentMinute())->withoutOverlapping();
            // }

            // $start_time = Carbon::parse($email->date_time);
            // if (!is_null($start_time) && $start_time->isCurrentMinute() && $email->is_executed = 0 && $email->status = 1) {
               
               
               
               
            // }

            $smtp=Smtp::find($email->smpt_id);
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

            $departments=explode(',',$email->department);
            $techs=explode(',',$email->tech);
            $attachments=[];
            if($email->attachment){
                $attachments=explode(',',$email->attachment);
            }
            

            $techs=[];

            $query=User::query();

            if(sizeOf($departments)){
                $query=$query->whereIN('department_id',$departments);
            }
            if(sizeof($techs)){
                $query=$query->whereIN('technology_id',$techs);
            }

            $userslist=$query->get();
            foreach ($userslist as $key => $value) {

                $name=$value['user_firstname']." ".$value['user_lastname'];
                $sendmailAddress=$value['user_emailaddress'];
                $mail = new MailSending($email->subject,$attachments,$email->message,$name);

                $sendmailAddress='chandrakanta.haransingh@neosoftmail.com';

                Mail::to($sendmailAddress)->queue($mail);
            }
            $email->update([
                'is_executed'=>1
            ]);
        }

        // foreach ($mails as $email) {
           
               

        // }
        // return $mails;
    }
}
