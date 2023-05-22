<?php
use App\Http\Controllers\Admin\AssociationMemberController;
use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Route;

Route::get('login',function(){
        $data['page_name'] = "posts";
        $data['category_name'] = "users";
        $data['has_scrollspy'] = 0;
    return view('admin.auth.login',$data);
});

Route::resource('users',UserController::class);
Route::get('association-members/{id}/print-form',[AssociationMemberController::class,'printForm'])->name('association-members.print');
Route::resource('association-members',AssociationMemberController::class);
