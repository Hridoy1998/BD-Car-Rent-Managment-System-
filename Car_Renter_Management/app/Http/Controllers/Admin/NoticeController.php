<?php

namespace App\Http\Controllers\Admin;
use DateTime;
use App\Http\Controllers\Controller;
use App\Models\Notice;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;


class NoticeController extends Controller
{
    public function notice_view(Request $request)
    {
        $n=Notice::paginate(3);
        return view('Admin_Pages.notices_list')->with('ns',$n);
    }
    public function notice_delete(Request $req)
    {
        $n=Notice::where('id','=',decrypt($req->id))->first();
        $res = $n->delete();

        if($res){
            return back()->with('success','Your Notice Post Delete successfully');
        }else{
            return back()->with('fail', 'Something Went Wrong');
        }
    }
    public function notice_edit_view(Request $req)
    {
        $n=Notice::where('id','=',decrypt($req->id))->first();
        return view('Admin_Pages.notices_edit',compact('n'));
    }
    public function notice_edit(Request $req)
    {
        $n=Notice::where('id','=',decrypt($req->id))->first();
        $n->notice_date= $req->notice_date;
        $n->notice=$req->notice;
        $res = $n->save();

        if($res){
            return back()->with('success','Your Notice Post Update successfully');
        }else{
            return back()->with('fail', 'Something Went Wrong');
        }
    }
    public function admin_add_notice(Request $request)
    {
        $request->validate([
            'notice'=>'required',
        ]);

        $n=new Notice();
        $n->notice_date=new DateTime(today());
        $n->notice=$request->notice;
        $res = $n->save();

        if($res){
            return back()->with('success','You have Notice Post successfully');
        }else{
            return back()->with('fail', 'Something Went Wrong');
        }
    }
}
