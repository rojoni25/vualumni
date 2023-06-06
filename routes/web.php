<?php

use App\Http\Controllers\NewsController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\WebController;
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
// Route::get('/', function () {
//     return view('web.home');
// });

Route::get('login',function(){
    $data['page_name'] = "posts";
    $data['category_name'] = "users";
    $data['has_scrollspy'] = 0;
return view('admin.auth.login',$data);
})->name('login');
Route::get('/', [WebController::class,'index']);


Route::resource('association-members',AssociationMemberController::class);

Route::get('alumni-association/membership-information',function(){
    return view('web.aavu.membership_information');
})->name('membership-information');
Route::get('alumni-association/register',[AssociationMemberController::class,'register'])->name('aavu.register');
Route::post('alumni-association/rpi',[AssociationMemberController::class,'savePersonalInfo'])->name('register.personal.save');
Route::post('alumni-association/rei',[AssociationMemberController::class,'saveEducationInfo'])->name('register.education.save');
Route::post('alumni-association/roi',[AssociationMemberController::class,'saveOcupationInfo'])->name('register.ocupation.save');
Route::post('alumni-association/ruf',[AssociationMemberController::class,'saveUploads'])->name('register.uploads.save');

Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth']], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified','check-permission'
    ])->group(function () {
        Route::get('dashboard', function () {
        $data['page_name'] = "dashboard";
        $data['title'] = "dashboard";
        $data['category_name'] = "sales";
        $data['has_scrollspy'] = 0;
    return view('admin.dashboard',$data);
        })->name('dashboard');
    });

    Route::get('/news',[NewsController::class,'index']);
    Route::get('/{slug}',[PostController::class,'showPost'])->name('web.post.show-post');

    Route::post('/upload-image', 'ImageController@upload')->name('upload.image');
