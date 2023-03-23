<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AssociationMemberController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', function () {
    return view('web.home');
});

Route::resource('association-members',AssociationMemberController::class);

Route::get('alumni-association/membership-information',function(){
    return view('web.aavu.membership_information');
})->name('membership-information');
Route::get('alumni-association/register',[AssociationMemberController::class,'register'])->name('register');
Route::post('alumni-association/rpi',[AssociationMemberController::class,'savePersonalInfo'])->name('register.personal.save');
Route::post('alumni-association/rei',[AssociationMemberController::class,'saveEducationInfo'])->name('register.education.save');
Route::post('alumni-association/roi',[AssociationMemberController::class,'saveOcupationInfo'])->name('register.ocupation.save');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
