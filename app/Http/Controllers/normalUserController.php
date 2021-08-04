<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\NormalUser;
use App\Models\updateMobile;
class normalUserController extends Controller
{
    //function to get the user data
    function getNormalUser($emp_id){
      $data = DB::table('employee')
      ->where('emp_id',$emp_id)
      ->get();
        return view('normalUser',['employee'=>$data]);
    }
    
    //function to add the issuse by user.
    function addIssueNormal(Request $req){
      
      $normaluser = new NormalUser;
      $normaluser->emp_id=$req->emp_id;
      $normaluser->issue_type=$req->issue_type;
      $normaluser->issue_desc=$req->issue_desc;
      $normaluser->issue_status="Open";
      $result=$normaluser->save();
      if($result){
        return redirect('normal/'.$req->emp_id)->with('success','Your Issue Submitted');
      }
      else{
        return back()->with('fail','Something wrong');
      }
    }

    //function to get the data for update by user. 
    function UpdateMobileNormalUser($emp_id)
    {
          $data = DB::table('employee')
        ->where('emp_id',$emp_id)
        ->get();  
        
        return view('editMobileNormalUser',['emp'=>$emp_id]);

    }

    //function to update the details of user.
    function UpdateNormal(Request $req)
    {
      $req->validate(
        [
            'mobile_num' => 'required|numeric|unique:employee|min:10',
            'comm_address' => 'required'
        ]
    );

      $result = DB::table('employee')
      ->where('emp_id',$req->emp_id)
      ->update(
        ['mobile_num'=>$req->mobile_num,
        'comm_address'=>$req->comm_address,
        'city'=>$req->city
        ]
      );

      if($result){
        return redirect('normal/'.$req->emp_id)->with('success','Your details are updated!');
    }
    else
    {
        return back()->with('fail','Something wrong');
    }
   }
}
