<?php

use App\Http\Controllers\FieldWorker\FieldWorkerStandController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\GoogleController;
use App\Http\Controllers\QRCodeController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\Backend\FaqController;
use App\Http\Controllers\Backend\AjaxController;
use App\Http\Controllers\Backend\BlogController;
use App\Http\Controllers\Backend\AdminController;
use App\Http\Controllers\Backend\OwnerController;
use App\Http\Controllers\Backend\StandController;
use App\Http\Controllers\Backend\ThanaController;
use App\Http\Controllers\Backend\UnionController;
use App\Http\Controllers\Backend\DriverController;
use App\Http\Controllers\Backend\FooterController;
use App\Http\Controllers\Backend\NoticeController;
use App\Http\Controllers\Forntend\LoginController;
use App\Http\Controllers\Forntend\SignUpController;
use App\Http\Controllers\Backend\DistrictController;
use App\Http\Controllers\Backend\DivisionController;
use App\Http\Controllers\Driver\DashboardController;
use App\Http\Controllers\Forntend\AboutUsController;
use App\Http\Controllers\Forntend\CngInfoController;
use App\Http\Controllers\Forntend\BlogPageController;
use App\Http\Controllers\Forntend\HelpPageController;
use App\Http\Controllers\Forntend\HomePageController;
use App\Http\Controllers\Backend\BloodGroupController;
use App\Http\Controllers\Forntend\ContactUsController;
use App\Http\Controllers\Backend\ContactInfoController;
use App\Http\Controllers\Backend\FieldWorkerController;
use App\Http\Controllers\Backend\FooterTitleController;
use App\Http\Controllers\Backend\VehicleListController;
use App\Http\Controllers\Backend\VehicleTypeController;
use App\Http\Controllers\Backend\StandManagerController;
use App\Http\Controllers\Backend\StandCommiteeController;
use App\Http\Controllers\Owner\Auth\OwnerLoginController;
use App\Http\Controllers\Backend\NoticeCategoryController;
use App\Http\Controllers\Forntend\VehicleSerialController;
use App\Http\Controllers\Owner\Auth\OwnerSignupController;
use App\Http\Controllers\Backend\Auth\AdminLoginController;
use App\Http\Controllers\Driver\Auth\DriverLoginController;
use App\Http\Controllers\Driver\Auth\DriverRegistrationController;
use App\Http\Controllers\StandManager\StandManagerNoticeController;
use App\Http\Controllers\FieldWorker\FieldWorkerDashboardController;
use App\Http\Controllers\FieldWorker\Auth\FieldWorkerLoginController;
use App\Http\Controllers\StandManager\StandManagerDashboardController;
use App\Http\Controllers\Driver\AjaxController as DriverAjaxController;
use App\Http\Controllers\StandManager\Auth\StandManagerLoginController;
use App\Http\Controllers\StandManager\Auth\StandManagerRegistrationController;
use App\Http\Controllers\Owner\DashboardController as OwnerDashboardController;
use App\Http\Controllers\Owner\Auth\ForgotPassword\OwnerForgotPasswordController;
use App\Http\Controllers\Backend\Auth\ForgotPassword\AdminForgotPasswordController;
use App\Http\Controllers\Backend\DashboardController as BackendDashboardController;
use App\Http\Controllers\Driver\Auth\ForgotPassword\driverForgotPasswordController;
use App\Http\Controllers\Forntend\Auth\DriverLoginController as AuthDriverLoginController;


// use Illuminate\Support\Facades\Auth;

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();



// Route::post('/logout', function () {
//     Auth::logout();
//     return redirect()->route('f.home');
// })->name('logout');

Route::group(['as' => 'f.'], function () {
    Route::get('/', [HomePageController::class, 'index'])->name('home');
    Route::controller(HomePageController::class)->prefix('home')->name('home.')->group(function () {
        Route::get('/get-districts/{division_id}', 'district')->name('get.districts');
        Route::get('/get-thanas/{district_id}', 'thana')->name('get.thanas');
        Route::get('/get-unions/{thana_id}', 'union')->name('get.unions');
        Route::get('/get-stands/{union_id}', 'stand')->name('get.stands');
        Route::get('/get-vehicles/{stand_id}', 'vehicleTypes')->name('get.vehicles');
        Route::post('/search', 'search')->name('search');
        Route::get('/stand/{slug}', 'showStand')->name('stand');
        Route::get('/stand-intro/{slug}', 'showStandIntro')->name('standIntro');
        Route::get('/stand-commitee/{id}', 'standCommitee')->name('standCommitee');
        Route::get('/stand-driver/{slug}', 'standDriver')->name('standDriver');
        Route::get('/driver-profile/{slug}', 'driverProfile')->name('driverProfile');
        Route::get('/stand-owner/{slug}', 'standOwner')->name('standOwner');
        Route::get('/owner-profile/{slug}', 'ownerProfile')->name('ownerProfile');





        Route::get('/stand-notice/{slug}', 'standNotice')->name('standNotice');
        Route::get('/division-notice/{id}', 'divisionNotice')->name('divisionNotice');
        Route::get('/district-notice/{id}', 'districtNotice')->name('districtNotice');
        Route::get('/thana-notice/{id}', 'thanaNotice')->name('thanaNotice');
        Route::get('/union-notice/{id}', 'unionNotice')->name('unionNotice');
        Route::get('/blog', 'blog')->name('blog');
        Route::get('/single-blog/{slug}', 'singleBlog')->name('single.blog');


        Route::get('/driverProfileSearch', 'driverProfileSearch')->name('driverProfileSearch');
    });

    Route::controller(HelpPageController::class)->prefix('help')->name('help.')->group(function () {
        Route::get('/', 'index')->name('index');
    });

    Route::controller(BlogPageController::class)->prefix('blog')->name('blog.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/inner_blog/{slug}', 'inner_blog')->name('inner_blog');
    });

    Route::controller(ContactUsController::class)->prefix('contact-us')->name('contact.')->group(function () {
        Route::get('/', 'index')->name('index');
    });

    Route::controller(LoginController::class)->prefix('login')->name('login.')->group(function () {
        Route::get('/', 'index')->name('index');
    });

    Route::controller(SignUpController::class)->prefix('signup')->name('signup.')->group(function () {
        Route::get('/', 'index')->name('index');
    });
    Route::controller(CngInfoController::class)->prefix('cng-info')->name('cng.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/cng_stand', 'cng_stand')->name('cng_stand');
        Route::get('/cng-stand/{slug}', 'show')->name('cng_stand_details');
        Route::get('/map', 'map')->name('map');
        Route::get('/community', 'community')->name('community');
        Route::get('/owner', 'owner')->name('owner');
        Route::get('/driver', 'driver')->name('driver');
        Route::get('/notice', 'notice')->name('notice');



        Route::get('/get-districts/{division_id}', 'district')->name('get.districts');
        Route::get('/get-thanas/{district_id}', 'thana')->name('get.thanas');
        Route::get('/get-unions/{thana_id}', 'union')->name('get.unions');
        Route::get('/get-stands/{union_id}', 'stand')->name('get.stands');
        Route::get('/get-vehicles/{stand_id}', 'vehicle')->name('get.vehicles');
    });
    Route::controller(AuthDriverLoginController::class)->prefix('driver-login')->name('login')->group(function () {
        Route::get('/login', 'driverLogin')->name('login');
    });

    Route::controller(AboutUsController::class)->prefix('about-us')->name('about.')->group(function () {
        Route::get('/', 'index')->name('index');
    });

});
// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::controller(AdminLoginController::class)->prefix('admin')->name('admin.')->group(function () {
    Route::get('/login', 'adminLogin')->name('login');
    Route::post('/login', 'adminLoginCheck')->name('login');
    Route::post('/logout', 'logout')->name('logout');
});







// Route::controller(OwnerLoginController::class)->prefix('owner')->name('owner.')->group( function(){
//     Route::get('/login', 'ownerLogin')->name('login');
// });
Route::controller(OwnerLoginController::class)->prefix('owner')->name('owner.')->group(function () {
    Route::get('/login', 'ownerLogin')->name('login');
    Route::post('/login', 'ownerLoginCheck')->name('login');
    Route::post('/logout', 'logout')->name('logout');
});

Route::controller(OwnerSignupController::class)->prefix('signup')->name('owner.signup.')->group(function () {
    Route::get('owner/signup', 'signupForm')->name('signup');
    Route::post('driver/register', 'register')->name('register');
});

Route::controller(DriverLoginController::class)->prefix('driver')->name('driver.')->group(function () {
    Route::get('/login', 'driverLogin')->name('login');
    Route::post('/login', 'driverLoginCheck')->name('login');
    Route::post('/logout', 'logout')->name('logout');
});
Route::controller(DriverRegistrationController::class)->prefix('signup')->name('signup.')->group(function () {
    Route::get('driver/signup', 'signupForm')->name('signupForm');
    Route::post('driver/signup', 'signup')->name('signup');
    Route::put('driver/update/{id}', 'update')->name('update');
});


Route::controller(StandManagerLoginController::class)->prefix('stand_manager')->name('stand_manager.')->group(function () {
    Route::get('/login', 'standManagerLogin')->name('login');
    Route::post('/login', 'standManagerLoginCheck')->name('login');
    Route::post('/logout', 'logout')->name('logout');
});

Route::controller(StandManagerRegistrationController::class)->prefix('signup')->name('.stand_managersignup.')->group(function () {
    Route::get('stand_manager/signup', 'signupForm')->name('signupForm');
    Route::post('stand_manager/signup', 'signup')->name('signup');
    Route::put('stand_manager/update/{id}', 'update')->name('update');
});

// Route::prefix('field_worker')->name('field_worker.')->group(function () {
//     Route::get('/forgot-password', [FieldWorkerForgotPasswordController::class, 'showForgotForm'])->name('forgot.form');
//     Route::post('/send-otp', [FieldWorkerForgotPasswordController::class, 'sendOtp'])->name('send.otp');
//     Route::get('/verify-otp', [FieldWorkerForgotPasswordController::class, 'showVerifyForm'])->name('verify.form');
//     Route::post('/check-otp', [FieldWorkerForgotPasswordController::class, 'checkOtp'])->name('check.otp');
//     Route::get('/reset-password', [FieldWorkerForgotPasswordController::class, 'showResetForm'])->name('reset.form');
//     Route::post('/reset-password', [FieldWorkerForgotPasswordController::class, 'resetPassword'])->name('reset.password');
// });

// Forgot Password Route Start

Route::prefix('driver')->name('driver.')->group(function () {
    Route::get('/forgot-index', [driverForgotPasswordController::class, 'index'])->name('forgot.index');
    Route::get('/forgot-password', [driverForgotPasswordController::class, 'showForgotForm'])->name('forgot.form');
    Route::post('/send-otp', [driverForgotPasswordController::class, 'sendOtp'])->name('send.otp');
    Route::get('/verify-otp', [driverForgotPasswordController::class, 'showVerifyForm'])->name('verify.form');
    Route::post('/check-otp', [driverForgotPasswordController::class, 'checkOtp'])->name('check.otp');
    Route::get('/reset-password', [driverForgotPasswordController::class, 'showResetForm'])->name('reset.form');
    Route::post('/reset-password', [driverForgotPasswordController::class, 'resetPassword'])->name('reset.password');
});




Route::prefix('owner')->name('owner.')->group(function () {
    Route::get('/forgot-index', [OwnerForgotPasswordController::class, 'index'])->name('forgot.index');
    Route::get('/forgot-password', [OwnerForgotPasswordController::class, 'showForgotForm'])->name('forgot.form');
    Route::post('/send-otp', [ownerForgotPasswordController::class, 'sendOtp'])->name('send.otp');
    Route::get('/verify-otp', [ownerForgotPasswordController::class, 'showVerifyForm'])->name('verify.form');
    Route::post('/check-otp', [ownerForgotPasswordController::class, 'checkOtp'])->name('check.otp');
    Route::get('/reset-password', [ownerForgotPasswordController::class, 'showResetForm'])->name('reset.form');
    Route::post('/reset-password', [ownerForgotPasswordController::class, 'resetPassword'])->name('reset.password');
});





Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/forgot-index', [AdminForgotPasswordController::class, 'index'])->name('forgot.index');
    Route::get('/forgot-password', [AdminForgotPasswordController::class, 'showForgotForm'])->name('forgot.form');
    Route::post('/send-otp', [AdminForgotPasswordController::class, 'sendOtp'])->name('send.otp');
    Route::get('/verify-otp', [AdminForgotPasswordController::class, 'showVerifyForm'])->name('verify.form');
    Route::post('/check-otp', [AdminForgotPasswordController::class, 'checkOtp'])->name('check.otp');
    Route::get('/reset-password', [AdminForgotPasswordController::class, 'showResetForm'])->name('reset.form');
    Route::post('/reset-password', [AdminForgotPasswordController::class, 'resetPassword'])->name('reset.password');
});






// Forgot Password Route end


Route::controller(FieldWorkerLoginController::class)->prefix('field_worker')->name('field_worker.')->group(function () {
    Route::get('/login', 'fieldWorkerLogin')->name('login');
    Route::post('/login', 'fieldWorkerLoginCheck')->name('login.check');
    Route::post('/logout', 'logout')->name('logout');
});

// Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('driver.dashboard');





Route::group(['middleware' => ['admin'], 'prefix' => 'admin'], function () {
    Route::get('/admin/dashboard', [BackendDashboardController::class, 'dashboard'])->name('admin.dashboard');

    Route::controller(AdminController::class)->prefix('admin')->name('admin.')->group(function () {
        Route::get('index', 'index')->name('index');
        Route::get('create', 'create')->name('create');
        Route::post('store', 'store')->name('store');
        Route::get('update/{id}', 'update')->name('update');
        Route::put('update/{id}', 'update_store')->name('update');
        Route::get('status/{id}', 'status')->name('status.update');
        Route::get('delete/{id}', 'delete')->name('delete');
        Route::get('detalis/{id}', 'detalis')->name('detalis');
    });

    Route::controller(StandController::class)->prefix('stand')->name('stand.')->group(function () {
        Route::get('index', 'index')->name('index');
        Route::get('create', 'create')->name('create');
        Route::post('store', 'store')->name('store');
        Route::get('update/{slug}', 'update')->name('update');
        Route::put('update/{slug}', 'update_store')->name('update');
        Route::get('status/{slug}', 'status')->name('status.update');
        Route::get('delete/{slug}', 'delete')->name('delete');
        Route::get('detalis/{slug}', 'detalis')->name('detalis');
    });

    Route::controller(VehicleTypeController::class)->prefix('vehicle-type')->name('vehicle_type.')->group(function () {
        Route::get('index', 'index')->name('index');
        Route::get('create', 'create')->name('create');
        Route::post('store', 'store')->name('store');
        Route::get('update/{id}', 'update')->name('update');
        Route::put('update/{id}', 'update_store')->name('update_store');
        Route::get('status/{id}', 'status')->name('status.update');
        Route::get('delete/{id}', 'delete')->name('delete');
        Route::get('detalis/{id}', 'detalis')->name('detalis');
    });
    Route::controller(VehicleListController::class)->prefix('vehicle')->name('vehicle.')->group(function () {
        Route::get('index', 'index')->name('index');
        Route::get('create', 'create')->name('create');
        Route::post('store', 'store')->name('store');
        Route::get('update/{id}', 'update')->name('update');
        Route::post('update/{id}', 'update_store')->name('update');
        Route::get('status/{id}', 'status')->name('status.update');
        Route::get('delete/{id}', 'delete')->name('delete');
        Route::get('detalis/{id}', 'detalis')->name('detalis');
    });

    Route::controller(FaqController::class)->prefix('faq')->name('faq.')->group(function () {
        Route::get('index', 'index')->name('index');
        Route::get('create', 'create')->name('create');
        Route::post('store', 'store')->name('store');
        Route::get('update/{id}', 'update')->name('update');
        Route::post('update/{id}', 'update_store')->name('update');
        Route::get('status/{id}', 'status')->name('status.update');
        Route::get('delete/{id}', 'delete')->name('delete');
        Route::get('detalis/{id}', 'detalis')->name('detalis');
    });

    Route::controller(FieldWorkerController::class)->prefix('worker')->name('worker.')->group(function () {
        Route::get('index', 'index')->name('index');
        Route::get('create', 'create')->name('create');
        Route::post('store', 'store')->name('store');
        Route::get('update/{id}', 'update')->name('update');
        Route::put('update/{id}', 'update_store')->name('update');
        Route::get('status/{id}', 'status')->name('status.update');
        Route::get('delete/{id}', 'delete')->name('delete');
        Route::get('detalis/{id}', 'detalis')->name('detalis');
    });

    Route::controller(NoticeCategoryController::class)->prefix('notice-category')->name('notice_category.')->group(function () {
        Route::get('index', 'index')->name('index');
        Route::get('create', 'create')->name('create');
        Route::post('store', 'store')->name('store');
        Route::get('update/{id}', 'update')->name('update');
        Route::put('update/{id}', 'update_store')->name('update');
        Route::get('status/{id}', 'status')->name('status.update');
        Route::get('delete/{id}', 'delete')->name('delete');
        Route::get('detalis/{id}', 'detalis')->name('detalis');
    });

    Route::controller(NoticeController::class)->prefix('notice')->name('notice.')->group(function () {
        Route::get('index', 'index')->name('index');
        Route::get('create', 'create')->name('create');
        Route::post('store', 'store')->name('store');
        Route::get('update/{id}', 'update')->name('update');
        Route::put('update/{id}', 'update_store')->name('update');
        Route::get('status/{id}', 'status')->name('status.update');
        Route::get('delete/{id}', 'delete')->name('delete');
        Route::get('detalis/{id}', 'detalis')->name('detalis');
    });

    Route::controller(ContactInfoController::class)->prefix('contact')->name('contact.')->group(function () {
        Route::get('index', 'index')->name('index');
        Route::get('create', 'create')->name('create');
        Route::post('store', 'store')->name('store');
        Route::get('update/{id}', 'update')->name('update');
        Route::put('update/{id}', 'update_store')->name('update');
        Route::get('status/{id}', 'status')->name('status.update');
        Route::get('delete/{id}', 'delete')->name('delete');
        Route::get('detalis/{id}', 'detalis')->name('detalis');
    });
    Route::controller(BlogController::class)->prefix('blog')->name('blog.')->group(function () {
        Route::get('index', 'index')->name('index');
        Route::get('create', 'create')->name('create');
        Route::post('store', 'store')->name('store');
        Route::get('update/{id}', 'update')->name('update');
        Route::put('update/{id}', 'update_store')->name('update');
        Route::get('status/{id}', 'status')->name('status.update');
        Route::get('delete/{id}', 'delete')->name('delete');
        Route::get('detalis/{id}', 'detalis')->name('detalis');
    });
    Route::controller(FooterTitleController::class)->prefix('footerTitle')->name('footerTitle.')->group(function () {
        Route::get('index', 'index')->name('index');
        Route::get('create', 'create')->name('create');
        Route::post('store', 'store')->name('store');
        Route::get('update/{id}', 'update')->name('update');
        Route::post('update/{id}', 'update_store')->name('update');
        Route::get('ststus/{id}', 'status')->name('satus.update');
        Route::get('delete/{id}', 'delete')->name('delete');
        Route::get('detalis/{id}', 'detalis')->name('detalis');
    });
    Route::controller(FooterController::class)->prefix('footer')->name('footer.')->group(function () {
        Route::get('index', 'index')->name('index');
        Route::get('create', 'create')->name('create');
        Route::post('store', 'store')->name('store');
        Route::get('update/{id}', 'update')->name('update');
        Route::post('update/{id}', 'update_store')->name('update');
        Route::get('status/{id}', 'status')->name('status.update');
        Route::get('delete/{id}', 'delete')->name('delete');
        Route::get('detalis/{id}', 'detalis')->name('detalis');
    });
    Route::controller(OwnerController::class)->prefix('owner')->name('owner.')->group(function () {
        Route::get('index', 'index')->name('index');
        Route::get('create', 'create')->name('create');
        Route::post('store', 'store')->name('store');
        Route::get('update/{slug}', 'update')->name('update');
        Route::put('update/{slug}', 'update_store')->name('update');
        Route::get('status/{slug}', 'status')->name('status.update');
        Route::get('delete/{slug}', 'delete')->name('delete');
        Route::get('detalis/{slug}', 'detalis')->name('detalis');
    });

    Route::controller(DriverController::class)->prefix('driver')->name('driver.')->group(function () {
        Route::get('index', 'index')->name('index');
        Route::get('create', 'create')->name('create');
        Route::post('store', 'store')->name('store');
        Route::get('update/{slug}', 'update')->name('update');
        Route::put('update/{slug}', 'update_store')->name('update');
        Route::get('status/{slug}', 'status')->name('status.update');
        Route::get('delete/{slug}', 'delete')->name('delete');
        Route::get('detalis/{slug}', 'detalis')->name('detalis');
    });
    Route::controller(BloodGroupController::class)->prefix('blood')->name('blood.')->group(function () {
        Route::get('index', 'index')->name('index');
        Route::get('create', 'create')->name('create');
        Route::post('store', 'store')->name('store');
        Route::get('update/{id}', 'update')->name('update');
        Route::put('update/{id}', 'update_store')->name('update');
        Route::get('status/{id}', 'status')->name('status.update');
        Route::get('delete/{id}', 'delete')->name('delete');
        Route::get('detalis/{id}', 'detalis')->name('detalis');
    });
    Route::controller(DivisionController::class)->prefix('division')->name('division.')->group(function () {
        Route::get('index', 'index')->name('index');
        Route::get('create', 'create')->name('create');
        Route::post('store', 'store')->name('store');
        Route::get('update/{id}', 'update')->name('update');
        Route::put('update/{id}', 'update_store')->name('update');
        Route::get('status/{id}', 'status')->name('status.update');
        Route::get('delete/{id}', 'delete')->name('delete');
        Route::get('detalis/{id}', 'detalis')->name('detalis');
    });
    Route::controller(DistrictController::class)->prefix('district')->name('district.')->group(function () {
        Route::get('index', 'index')->name('index');
        Route::get('create', 'create')->name('create');
        Route::post('store', 'store')->name('store');
        Route::get('update/{id}', 'update')->name('update');
        Route::put('update/{id}', 'update_store')->name('update');
        Route::get('status/{id}', 'status')->name('status.update');
        Route::get('delete/{id}', 'delete')->name('delete');
        Route::get('detalis/{id}', 'detalis')->name('detalis');
    });
    Route::controller(ThanaController::class)->prefix('thana')->name('thana.')->group(function () {
        Route::get('index', 'index')->name('index');
        Route::get('create', 'create')->name('create');
        Route::post('store', 'store')->name('store');
        Route::get('update/{id}', 'update')->name('update');
        Route::put('update/{id}', 'update_store')->name('update');
        Route::get('status/{id}', 'status')->name('status.update');
        Route::get('delete/{id}', 'delete')->name('delete');
        Route::get('detalis/{id}', 'detalis')->name('detalis');
    });
    Route::controller(UnionController::class)->prefix('union')->name('union.')->group(function () {
        Route::get('index', 'index')->name('index');
        Route::get('create', 'create')->name('ceate');
        Route::post('store', 'store')->name('store');
        Route::get('update{id}', 'update')->name('update');
        Route::put('update{id}', 'update_store')->name('update');
        Route::get('status/{id}', 'status')->name('status.update');
        Route::get('delete/{id}', 'delete')->name('delete');
        Route::get('detalis/{id}', 'detalis')->name('detalis');
    });
    Route::controller(AjaxController::class)->prefix('ajax')->name('ajax.')->group(function () {
        Route::get('division/{id}', 'division')->name('division');
        Route::get('district/{id}', 'district')->name('district');
        Route::get('thana/{id}', 'thana')->name('thana');
        Route::get('union/{id}', 'union')->name('union');
        Route::get('stand/{id}', 'stand')->name('stand');
        Route::get('stand/{id}/vehicles', 'standVehicles')->name('standVehicles');
        Route::get('vehicles-license/{id}', 'vehiclesLicense')->name('vehiclesLicense');
        Route::get('/get-vehicles/{stand_id}', 'getVehiclesByStand');

    });
    Route::controller(StandCommiteeController::class)->prefix('commitee')->name('commitee.')->group(function () {
        Route::get('index', 'index')->name('index');
        Route::get('create', 'create')->name('create');
        Route::post('store', 'store')->name('store');
        Route::get('update{id}', 'update')->name('update');
        Route::put('update{id}', 'update_store')->name('update');
        Route::get('status/{id}', 'status')->name('status.update');
        Route::get('delete/{id}', 'delete')->name('delete');
        Route::get('detalis/{id}', 'detalis')->name('detalis');
    });

    Route::controller(StandManagerController::class)->prefix('manager')->name('manager.')->group(function () {
        Route::get('index', 'index')->name('index');
        Route::get('create', 'create')->name('create');
        Route::post('store', 'store')->name('store');
    });

    // serial check out route
    Route::controller(VehicleSerialController::class)->prefix('serial')->name('serial.')->group(function () {
        Route::get('/stand-wise-serials', 'standWiseSerials')->name('admin.stand.serials');
        Route::post('/driver-serial/{id}/checkout', 'checkOut')->name('driver.serial.checkout');
    });
});

Route::group(['middleware' => ['owner'], 'prefix' => 'owner', 'as' => 'owner.'], function () {
    Route::controller(OwnerDashboardController::class)->group(function () {
        Route::get('/dashboard/{slug}', 'dashboard')->name('dashboard');
        Route::get('/owner/update/{slug}', 'owner_update')->name('owner_update');
        Route::put('/owner/update/{slug}', 'owner_update_store')->name('owner_update');
        Route::get('add-vehicle', 'addVehicle')->name('addVehicle');
        Route::post('add-vehicles-store', 'addVehicleStore')->name('addVehicleStore');



        Route::get('/get-districts/{division_id}', 'district')->name('getDistricts');
        Route::get('/get-thanas/{district_id}', 'thana')->name('getThanas');
        Route::get('/get-unions/{thana_id}', 'union')->name('getUnions');
        Route::get('/get-stands/{union_id}', 'stand')->name('getStands');
        Route::get('/get-vehicles/{stand_id}', 'vehicle')->name('getVehicles');
    });
});

Route::group(['middleware' => ['driver'], 'prefix' => 'driver', 'as' => 'driver.'], function () {
    Route::controller(DashboardController::class)->group(function () {
        Route::get('/dashboard/{slug}', 'dashboard')->name('dashboard');
        Route::get('/driver/update/{slug}', 'driver_update')->name('driver_update');
        Route::put('/driver/update/{slug}', 'driver_update_store')->name('driver_update');
        Route::post('/dashboard/update/{slug}', 'updateDashboard')->name('updateDashboard');

        Route::get('/get-districts/{division_id}', 'district')->name('getDistricts');
        Route::get('/get-thanas/{district_id}', 'thana')->name('getThanas');
        Route::get('/get-unions/{thana_id}', 'union')->name('getUnions');
        Route::get('/get-stands/{union_id}', 'stand')->name('getStands');
        Route::get('/get-vehicles/{stand_id}', 'vehicle')->name('getVehicles');
    });

    Route::get('/get-districts/{driver_id}', [DriverController::class, 'getDistrictsByDriver'])->name('get.districts');

    Route::controller(DriverAjaxController::class)->prefix('ajax')->name('ajax.')->group(function () {
        Route::get('division/{id}', 'division')->name('division');
        Route::get('district/{id}', 'district')->name('district');
        Route::get('thana/{id}', 'thana')->name('thana');
        Route::get('union/{id}', 'union')->name('union');
        Route::get('stand/{id}', 'stand')->name('stand');
    });


    // VehicleSerialController
    Route::controller(VehicleSerialController::class)->prefix('serial')->name('serial.')->group(function () {
        Route::get('/index/{stand_id}', 'index')->name('index');
        Route::get('/serial-search', 'search')->name('search');
        Route::post('/serial-show', 'show')->name('show');
        Route::get('/serial-check-in', 'checkIn')->name('check.in');
        Route::post('serial-check-in-store', 'checkInStore')->name('check.in.store');
    });
});

Route::group(['middleware' => ['field_worker'], 'prefix' => 'field_worker', 'as' => 'field_worker.'], function () {
    Route::controller(FieldWorkerDashboardController::class)->group(function () {
        Route::get('/dashboard', 'dashboard')->name('dashboard');
        Route::get('/field_worker/update/{id}', 'field_worker_update')->name('field_worker_update');
        Route::put('/field_worker/update/{id}', 'field_worker_update_store')->name('field_worker_update');
        Route::put('/dashboard/update/{id}', 'updateDashboard')->name('updateDashboard');
        Route::get('index', 'index')->name('index');
        Route::get('driver-create', 'driverCreate')->name('driver.create');
        Route::post('driver-store', 'driverStore')->name('driver.store');
        Route::get('blog-create', 'blogCreate')->name('blog.create');
        Route::post('blog-store', 'blogStore')->name('blog.store');
    });
    Route::controller(FieldWorkerStandController::class)->prefix('stand')->name('stand.')->group(function () {
        Route::get('index', 'index')->name('index');
        Route::get('create', 'create')->name('create');
        Route::post('store', 'store')->name('store');
        Route::get('update/{slug}', 'update')->name('update');
        Route::put('update/{slug}', 'update_store')->name('update');
        Route::get('status/{slug}', 'status')->name('status.update');
        Route::get('delete/{slug}', 'delete')->name('delete');
        Route::get('detalis/{slug}', 'detalis')->name('detalis');
    });

    Route::controller(AjaxController::class)->prefix('ajax')->name('ajax.')->group(function () {
        Route::get('division/{id}', 'division')->name('division');
        Route::get('district/{id}', 'district')->name('district');
        Route::get('thana/{id}', 'thana')->name('thana');
        Route::get('union/{id}', 'union')->name('union');
        Route::get('stand/{id}', 'stand')->name('stand');
    });
});


Route::group(['middleware' => ['stand_manager'], 'prefix' => 'stand_manager', 'as' => 'stand_manager.'], function () {
    Route::controller(StandManagerDashboardController::class)->group(function () {
        Route::get('/dashboard', 'dashboard')->name('dashboard');
    });

    Route::controller(VehicleSerialController::class)->prefix('serial')->name('serial.')->group(function () {
        Route::get('/stand-wise-serials', 'standWiseSerials')->name('stand.serials');
        Route::post('/driver-serial/{id}/checkout', 'checkOut')->name('driver.serial.checkout');
    });
    Route::controller(StandManagerNoticeController::class)->prefix('notice')->name('notice.')->group(function () {
        Route::get('stand-manager-index', 'standManagerIndex')->name('stand.manager.index');
        Route::get('stand-manager-create', 'create')->name('stand.manager.create');
        Route::post('stand-manager-store', 'store')->name('stand.manager.store');
        Route::get('stand-manager-update/{id}', 'update')->name('stand.manager.updae');
        Route::put('stand-manager-update/{id}', 'update_store')->name('stand.manager.updae');
        Route::get('stand-manager-status/{id}', 'status')->name('stand.manager.status.update');
        Route::get('stand-manager-delete/{id}', 'delete')->name('stand.manager.delete');
        Route::get('detalis/{id}', 'detalis')->name('detalis');
    });
    // Route::controller(NoticeController::class)->prefix('notice')->name('notice.')->group(function () {
    //     Route::get('index', 'index')->name('index');
    //     Route::get('create', 'create')->name('create');
    //     Route::post('store', 'store')->name('store');
    //     Route::get('update/{id}', 'update')->name('update');
    //     Route::put('update/{id}', 'update_store')->name('update');
    //     Route::get('status/{id}', 'status')->name('status.update');
    //     Route::get('delete/{id}', 'delete')->name('delete');
    //     Route::get('detalis/{id}', 'detalis')->name('detalis');
    // });

    Route::get('qr-form', [QRCodeController::class, 'showForm'])->name('qr.form');
    Route::post('generate-qr', [QRCodeController::class, 'generateFromForm'])->name('qr.generate');
});


Route::get('auth/google', [GoogleController::class, 'redirectToGoogle'])->name(name: 'redirect.google');
Route::get('auth/google-callback', [GoogleController::class, 'handleGoogleCallback']);

Route::get('qr-code', [QRCodeController::class, 'index']);
Route::get('/secured-url/{token?}', [QRCodeController::class, 'securedUrl'])->name('secured.url');
