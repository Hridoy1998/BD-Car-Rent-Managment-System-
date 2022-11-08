<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\BlockUser;
use App\Models\CarService;
use App\Http\Controllers\Admin\Session;
use App\Models\AdminApproval;
use App\Models\Approval;
use App\Models\RentHistory;
use App\Models\RentMessage;
use Illuminate\Pagination\Paginator;

class AdminController extends Controller
{
    public function dashboard_admin(Request $req)
    {
        $n= $req->session()->get('email');

        $s_user=User ::all()->where('email','=',$n);
        return view('Admin_Pages.dashboard_admin')->with('s_user',$s_user);
    }

    public function custorans_list()
    {
        $customers= User::where('type','=','Customer')->paginate(10);

        return view('Admin_Pages.customers_list')->with('customers',$customers);
    }
    public function renter_list()
    {
        $renter= User::where('type','=','Renter')->paginate(10);

        return view('Admin_Pages.renter_list')->with('renters',$renter);
    }
    public function block_users_list()
    {
        $BUser=BlockUser::all();
        return view('Admin_Pages.block_users_list')->with('BUser',$BUser);
    }
    public function add_car_by_admin()
    {
        return view('Admin_Pages.admin_add_car');
    }
    public function cars_list()
    {
        $carlist=CarService::paginate(8);

        return view('Admin_Pages.car_lists')->with('Clist',$carlist);
    }
    public function admin_approval()
    {
        $renterApproval=AdminApproval::all();
        return view('Admin_Pages.admin_approvals')->with('c_user',$renterApproval);
    }
    public function rent_history()
    {
        $history=RentHistory::all();
        return view('Admin_Pages.rent_historys')->with('history',$history);
    }
    public function admin_message_list(Request $request)
    {
        //$message=RentMessage::DISTINCT('sender')->where("receiver",'=',$request->session()->get('UserID'))->get();
        $message=RentMessage::distinct()->select('sender')->where('receiver', '=', $request->session()->get('UserID'))->groupBy('sender')->get();
        // $message->DISTINCT();
        return view('Admin_Pages.admin_messages_list')->with('m',$message);
    }
    public function admin_notice()
    {
        return view('Admin_Pages.admin_notice');
    }
    public function users_add_by_admin()
    {
        return view('Admin_Pages.users_add_by_admin');
    }
    public function posts_mannage()
    {
        return view('Admin_Pages.posts_manage');
    }
    public function reviews_manage()
    {
        return view('Admin_Pages.reviews_manage');
    }
    public function user_details(Request $request)
    {
        $s_user=User ::all()->where('id','=',decrypt($request->id));
        return view('Admin_Pages.single_user_details')->with('s_user',$s_user);
    }
    public function blockuser_details(Request $request)
    {
        $s_user=BlockUser ::all()->where('id','=',decrypt($request->id));
        return view('Admin_Pages.single_block_user_details')->with('s_user',$s_user);
    }
}
