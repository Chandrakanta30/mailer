<?php

namespace App\Http\Controllers;

use App\Models\AdminChecker;
use App\Models\Smtp;
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
        $admincheckers = AdminChecker::paginate(10);
        return view('admin.indextable',compact('admincheckers'));
    }
    public function create()
    {
        return view('admin.checker.create');
    }
    public function store(Request $request)
    {

        //make department array to string
        $department = implode(',',$request->department);
        //make tech array to string
        // print_r($department);
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
            'date_time' => $request->datetime." ".$request->time.":00",
        ]);

        // dd($request->all());
        return redirect()->back();
    }
    public function show($id)
    {
        //
    }
    public function edit($id)
    {
        $info = AdminChecker::find($id);
        $smtp = Smtp::find($info->smpt_id);
        $departments = explode(',',$info->department);
        $techs = explode(',',$info->tech);
        $department_data = array();
        $tech_data = [];
        foreach($departments as $department){
            $dept_info = \App\Models\mis_department_master::find($department);
            $department_data[] = array('id'=>$department,'name'=>$dept_info->department_name);
        }
        foreach($techs as $tech){
            $tech_info = \App\Models\mis_technology_master::find($tech);
            $tech_data[] = [
                'id' => $tech_info->category_id,
                'name' => $tech_info->category_name,
            ];
        }
        // dd($department_data);
        return view('admin.singleview',compact('info','smtp','department_data','tech_data'));
    }
    public function update(Request $request, $id)
    {
        //
    }
    public function destroy($id)
    {
        //
    }
    public function getInfos()
    {
        $adminchecker = AdminChecker::all();


        return response()->json($adminchecker);
    }
    //accept the request
    public function accept($id)
    {
        $adminchecker = AdminChecker::find($id);
        $adminchecker->status = 1;
        $adminchecker->save();
        return redirect()->route('adminchecker.index')->with('success','Accepted Successfully');
    }
    //reject the request
    public function reject(Request $request,$id)
    {
        $adminchecker = AdminChecker::find($id);
        $adminchecker->suggestion = $request->suggestion;
        $adminchecker->status = 2;
        $adminchecker->save();
        return redirect()->route('adminchecker.index')->with('success','Rejected Successfully');
    }

}
