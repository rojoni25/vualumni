<?php

use App\Http\Controllers\NewsController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\WebController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AssociationMemberController;
use App\Http\Controllers\CommitteeController;
use App\Http\Controllers\SslCommerzPaymentController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

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
Route::get('/inauguration', function () {
    return view('inauguration');
})->name('inauguration');

Route::get('register', function () {
    abort(404);
});
Route::get('login', function () {
    $data['page_name'] = "posts";
    $data['category_name'] = "users";
    $data['has_scrollspy'] = 0;
    return view('admin.auth.login', $data);
})->name('login');

Route::get('/', [WebController::class, 'index'])->name('home');


Route::resource('association-members', AssociationMemberController::class);

Route::get('/user-validate', [AssociationMemberController::class, 'validateUser'])->name('member.validate');
Route::get('alumni-association/membership-information', function () {
    return view('web.aavu.membership_information');
})->name('membership-information');
Route::get('alumni-association/register', [AssociationMemberController::class, 'register'])->name('aavu.register');
Route::post('alumni-association/rpi', [AssociationMemberController::class, 'savePersonalInfo'])->name('register.personal.save');
Route::post('alumni-association/rei', [AssociationMemberController::class, 'saveEducationInfo'])->name('register.education.save');
Route::post('alumni-association/roi', [AssociationMemberController::class, 'saveOcupationInfo'])->name('register.ocupation.save');
Route::post('alumni-association/ruf', [AssociationMemberController::class, 'saveUploads'])->name('register.uploads.save');

Route::get('alumni-association/committee', [CommitteeController::class, 'index'])->name('committee.index');

Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth']], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
    'check-permission'
])->group(function () {
    Route::get('dashboard', function () {
        $data['page_name'] = "dashboard";
        $data['title'] = "dashboard";
        $data['category_name'] = "sales";
        $data['has_scrollspy'] = 0;
        if (Auth::user()->userRole->role_id == 1) {
            return redirect()->route('member.profile');
        } elseif (Auth::user()->userRole->role_id == 2) {
            return view('admin.dashboard', $data);
        }

    })->name('dashboard');

});
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {

    Route::get('association-member/profile', [AssociationMemberController::class, 'profile'])->name('member.profile');
});
Route::get('association_member/profile', [AssociationMemberController::class, 'profile1'])->name('member.profile1');


Route::get('/news', [NewsController::class, 'index'])->name('web.news.index');
Route::get('/news/{id}/{slug}', [NewsController::class, 'show'])->name('web.news.show');
Route::get('/{slug}', [PostController::class, 'showPost'])->name('web.post.show-post');

Route::post('/upload-image', 'ImageController@upload')->name('upload.image');


// SSLCOMMERZ Start
Route::get('/sslcz/example1', [SslCommerzPaymentController::class, 'exampleEasyCheckout']);
Route::get('/sslcz/example2', [SslCommerzPaymentController::class, 'exampleHostedCheckout']);

Route::post('/sslcz/pay', [SslCommerzPaymentController::class, 'index'])->name('member.pay');
Route::post('/sslcz/pay-via-ajax', [SslCommerzPaymentController::class, 'payViaAjax']);

Route::post('/sslcz/success', [SslCommerzPaymentController::class, 'success']);
Route::post('/sslcz/fail', [SslCommerzPaymentController::class, 'fail']);
Route::post('/sslcz/cancel', [SslCommerzPaymentController::class, 'cancel']);

Route::post('/sslcz/ipn', [SslCommerzPaymentController::class, 'ipn']);
//SSLCOMMERZ END

