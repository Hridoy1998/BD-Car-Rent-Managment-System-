<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomAuthController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\UserControlByAdminController;
use App\Http\Controllers\Admin\BlockUserController;
use App\Http\Controllers\Admin\NoticeController;
use App\Http\Controllers\Admin\CarController;
use App\Http\Controllers\Admin\AdminApprovalController;
use App\Http\Controllers\Admin\HistoryController;
use App\Http\Controllers\Admin\MessageController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('home');
});

Route::get('/login',[CustomAuthController::class,'login'])->name('login');
Route::get('registration',[CustomAuthController::class,'registration']);

Route::post('register-user',[CustomAuthController::class,'registerUser'])->name('register-user');
Route::post('login-user',[CustomAuthController::class,'loginUser'])->name('login-user');
//Admin
Route::get('dashboard_admin',[AdminController::class,'dashboard_admin'])->middleware('admin')->name('admin dashboard');

Route::get('Users_Add_By_Admin',[AdminController::class,'users_add_by_admin'])->middleware('admin')->name('users add by admin');

Route::get('Admin_custorans_List',[AdminController::class,'custorans_list'])->middleware('admin')->name('admin custorans list');
Route::get('Renter_List',[AdminController::class,'renter_list'])->middleware('admin')->name('admin renter list');

Route::get('User_Details/{id}',[AdminController::class,'user_details'])->middleware('admin')->name('admin single user details');
                                        //Block_user
Route::get('BlockUser_Details/{id}',[AdminController::class,'blockuser_details'])->middleware('admin')->name('admin single blockuser details');
Route::get('Block_Users_List',[AdminController::class,'block_users_list'])->middleware('admin')->name('admin block users list');
Route::get('Block_Users_List/{id}',[BlockUserController::class,'add_block'])->middleware('admin')->name('admin block');
Route::get('Unblock_Users_List/{id}',[BlockUserController::class,'delete_block'])->middleware('admin')->name('admin unblock');
Route::get('Search_Blockuser_result',[BlockUserController::class,'block_users_search'])->middleware('admin')->name('block_users_search');

                                        //car
Route::get('Add_Car_By_Admin',[AdminController::class,'add_car_by_admin'])->middleware('admin')->name('add car by admin');
Route::post('AddCarByAdmin',[CarController::class,'add_car'])->middleware('admin')->name('add car admin');
Route::get('Delete_Car_By_Admin/{id}',[CarController::class,'delete_car'])->middleware('admin')->name('delete car admin');
Route::get('Edit_Car_By_Admin_view/{id}',[CarController::class,'edit_car_view'])->middleware('admin')->name('edit car view admin');
Route::post('editCarByAdmin/{edit_id}',[CarController::class,'edit_car'])->middleware('admin')->name('edit car admin');
Route::get('Search_cars_result',[CarController::class,'search_car'])->middleware('admin')->name('search_car');
Route::get('single_car_details_view/{id}',[CarController::class,'single_car_details_view'])->middleware('admin')->name('single_car_details_view');
Route::get('Cars_List',[AdminController::class,'cars_list'])->middleware('admin')->name('cars list');

                                    //approval
Route::get('Admin_Approval',[AdminController::class,'admin_approval'])->middleware('admin')->name('admin approval');
Route::post('approv_add',[AdminApprovalController::class,'approv_add'])->middleware('admin')->name('approv_add');
Route::post('approv_delete',[AdminApprovalController::class,'approv_delete'])->middleware('admin')->name('approv_delete');
Route::get('single_approvals_details/{id}',[AdminApprovalController::class,'single_approvals_details'])->middleware('admin')->name('single_approvals_details');

                                    ///History
Route::get('Rent_History',[AdminController::class,'rent_history'])->middleware('admin')->name('rent history');
Route::get('single_history_view/{id}',[HistoryController::class,'single_history_view'])->middleware('admin')->name('single_history_view');
Route::post('history_delete',[HistoryController::class,'history_delete'])->middleware('admin')->name('history_delete');
                                    //message
Route::get('Admin_Message_List',[AdminController::class,'admin_message_list'])->middleware('admin')->name('admin message list');
Route::get('message_view/{id}',[MessageController::class,'message_view'])->middleware('admin')->name('message_view');
Route::post('send_message',[MessageController::class,'send_message'])->middleware('admin')->name('send_message');

Route::get('Admin_Notice',[AdminController::class,'admin_notice'])->middleware('admin')->name('admin notice');
Route::get('notice_edit_view/{id}',[NoticeController::class,'notice_edit_view'])->middleware('admin')->name('notice_edit_view');
Route::post('notice_edit/{id}',[NoticeController::class,'notice_edit'])->middleware('admin')->name('notice_edit');
Route::get('Admin_Notice_delete/{id}',[NoticeController::class,'notice_delete'])->middleware('admin')->name('notice_delete');
Route::get('Admin_Notice_list',[NoticeController::class,'notice_view'])->middleware('admin')->name('notice view');
Route::get('Notice',[NoticeController::class,'admin_add_notice'])->middleware('admin')->name('notice add');


Route::post('Users_Add_By_Admin',[UserControlByAdminController::class,'users_add'])->middleware('admin')->name('users add');
Route::get('Users_Edit_By_Admin/{id}',[UserControlByAdminController::class,'users_edit'])->middleware('admin')->name('admin edit');
Route::post('Edit_By_Admin/{edit_id}',[UserControlByAdminController::class,'edit'])->middleware('admin')->name('edit');
Route::get('search_user_result',[UserControlByAdminController::class,'users_search'])->middleware('admin')->name('users_search');


Route::get('Posts_Mannage',[AdminController::class,'posts_mannage'])->middleware('admin')->name('posts mannage');
Route::get('Reviews_Manage',[AdminController::class,'reviews_manage'])->middleware('admin')->name('reviews manage');

//
Route::get('dashboard_renter',[CustomAuthController::class,'dashboard_renter'])->middleware('renter');
Route::get('dashboard_customer',[CustomAuthController::class,'dashboard_customer'])->middleware('customer');
Route::get('logout',[CustomAuthController::class,'logout'])->name('logout');
