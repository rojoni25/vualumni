<?php
use App\Http\Controllers\Admin\AssociationMemberController;
use App\Http\Controllers\Admin\Cms\EventController;
use App\Http\Controllers\Admin\Cms\MarqueeController;
use App\Http\Controllers\Admin\Cms\NewsController;
use App\Http\Controllers\Admin\Cms\NoticeController;
use App\Http\Controllers\Admin\Cms\PostController;
use App\Http\Controllers\Admin\Cms\SliderController;
use App\Http\Controllers\Admin\Cms\TestimonialController;
use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Route;

Route::get('login', function () {
    $data['page_name'] = "posts";
    $data['category_name'] = "users";
    $data['has_scrollspy'] = 0;
    return view('admin.auth.login', $data);
});

Route::resource('users', UserController::class);

/** Association Members */
Route::get('association-members/{id}/print-form', [AssociationMemberController::class, 'printForm'])->name('association-members.print');

// /** Approvals */
Route::post('association-members/{id}/approve-nid', [AssociationMemberController::class, 'nidApproval'])->name('association-members.nid-approve');
Route::post('association-members/{id}/approve-certificate', [AssociationMemberController::class, 'certificateApproval'])->name('association-members.certificate-approve');
Route::post('association-members/{id}/decline-nid', [AssociationMemberController::class, 'nidDecline'])->name('association-members.nid-decline');
Route::post('association-members/{id}/decline-certificate', [AssociationMemberController::class, 'certificateDecline'])->name('association-members.certificate-decline');
Route::post('association-members/{id}/approve-payment', [AssociationMemberController::class, 'paymentApproval'])->name('association-members.payment-approve');
Route::post('association-members/{id}/decline-payment', [AssociationMemberController::class, 'paymentDecline'])->name('association-members.payment-decline');
Route::post('association-members/{id}/approve-membership', [AssociationMemberController::class, 'membershipApproval'])->name('association-members.accept');
Route::post('association-members/{id}/decline-membership', [AssociationMemberController::class, 'membershipDecline'])->name('association-members.reject');
Route::resource('association-members', AssociationMemberController::class);

/** CMS */
Route::prefix('cms')->name('cms.')->group(function () {

    // /** News */
    Route::resource('news', NewsController::class);

    // /** Slider */
    Route::resource('slider', SliderController::class);

    // /** Testimonial */
    Route::resource('testimonial', TestimonialController::class);

    // /** Marquee */
    Route::resource('marquee', MarqueeController::class);

    // /** Notice */
    Route::resource('notice', NoticeController::class);

    // /** Event */
    Route::resource('event', EventController::class);
    //** Post */
    Route::resource('posts', PostController::class);
});
