<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Pagination\Paginator;


class UserControlByAdminController extends Controller
{
    public function users_add(Request $request)
    {
        $request->validate([
            'role'=>'required',
            'first_name'=>'required',
            'last_name'=>'required',
            'username'=>'required|unique:users',
            'email'=>'required|email|unique:users',
            'Date_of_birth'=>'required',
            'gender'=>'required',
            'phone_number'=>'required',
            'address'=>'required',
            'nid_number'=>'required',
            'dl_number'=>'required',
            'password'=>'required|min:3|max:12',
            'pp'=>'mimes:jpg,jpeg,png',


          ]);
          $user = new User();

          $user->first_name = $request->first_name;
          $user->last_name = $request->last_name;
          $user->username = $request->username;
          $user->email = $request->email;
          $user->dob = $request->Date_of_birth;
          $user->gender = $request->gender;
          $user->phone_number = $request->phone_number;
          $user->address = $request->address;
          $user->nid_number = $request->nid_number;
          $user->dl_number = $request->dl_number;
          $user->password = Hash::make ($request->password);
          $user->type = $request->role;
          if($request->pp==null)
          {
            $user->pp= "user.png";

          }
          else
          {
            $file_name = time().".".$request->file('pp')->getClientOriginalExtension();
            $request->file('pp')->move(public_path('pp'),$file_name);
            $user->pp = $file_name;
          }
          $user->block_status = 0;
          $res = $user->save();
          if($res){
              return back()->with('success','You have registered successfully');
          }else{
              return back()->with('fail', 'Something Went Wrong');
          }
    }

    public function users_edit(Request $req)
    {
        $s_user=User::all()->where('id','=',decrypt($req->id));
        return view('Admin_Pages.admin_user_edit',compact('s_user'));
    }
    public function edit(Request $request)
    {

        $request->validate([
            'role'=>'required',
            'first_name'=>'required',
            'last_name'=>'required',
            'username'=>'required',
            'email'=>'required|email',
            'Date_of_birth'=>'required',
            'gender'=>'required',
            'phone_number'=>'required',
            'address'=>'required',
            'nid_number'=>'required',
            'dl_number'=>'required',
            'pp'=>'mimes:jpg,jpeg,png',

          ]);
          $user = User:: find (decrypt($request->edit_id));

          $user->first_name = $request->first_name;
          $user->last_name = $request->last_name;
          $user->username = $request->username;
          $user->email = $request->email;
          $user->dob = $request->Date_of_birth;
          $user->gender = $request->gender;
          $user->phone_number = $request->phone_number;
          $user->address = $request->address;
          $user->nid_number = $request->nid_number;
          $user->dl_number = $request->dl_number;
          $user->type = $request->role;
          if($request->pp==null)
          {
            $user->pp=$user->pp;
          }
          else
            {$file_name = time().".".$request->file('pp')->getClientOriginalExtension();
            $request->file('pp')->move(public_path('pp'),$file_name);
            $user->pp = $file_name;
          }
          $user->block_status = 0;

          $res = $user->save();
          if($res){
              return back()->with('success','You have Update successfully');
          }else{
              return view('Admin_Pages.dashboard_admin')->with('fail', 'Something Went Wrong');
          }

    }
    public function users_search(Request $req)
    {
        $req->validate([
            'search'=>'required',
        ]);
        $BUser=User::where('email','like','%'.$req->search)->orWhere('username','like','%'.$req->search)->get();
        if($BUser==null)
        {
            return back()->with('fail','Search Found');
        }
        else
        {
            return view('Admin_Pages.search_result_user')->with('customer',$BUser)->with('success','Search Found');
        }
    }
}
