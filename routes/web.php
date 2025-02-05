<?php

use App\Http\Controllers\Driver\Auth\DriverRegistrationController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
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
use App\Http\Controllers\Backend\DistrictController;
use App\Http\Controllers\Backend\DivisionController;
use App\Http\Controllers\Driver\DashboardController;
use App\Http\Controllers\Forntend\BlogPageController;
use App\Http\Controllers\Forntend\HelpPageController;
use App\Http\Controllers\Forntend\HomePageController;
use App\Http\Controllers\Backend\BloodGroupController;
use App\Http\Controllers\Forntend\ContactUsController;
use App\Http\Controllers\Backend\ContactInfoController;
use App\Http\Controllers\Backend\FieldWorkerController;
use App\Http\Controllers\Backend\FooterTitleController;
use App\Http\Controllers\Backend\VehicleListController;
use App\Http\Controllers\Owner\Auth\OwnerLoginController;
use App\Http\Controllers\Backend\Auth\AdminLoginController;
use App\Http\Controllers\Driver\Auth\DriverLoginController;
use App\Http\Controllers\Owner\DashboardController as OwnerDashboardController;
use App\Http\Controllers\Backend\DashboardController as BackendDashboardController;
use App\Http\Controllers\Forntend\Auth\DriverLoginController as AuthDriverLoginController;
use App\Http\Controllers\Forntend\CngInfoController;
use App\Http\Controllers\Forntend\LoginController;
use App\Http\Controllers\Forntend\SignUpController;

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();


Route::group(['as' => 'f.'], function () {
    Route::get('/', [HomePageController::class, 'index'])->name('home');

    Route::controller(HelpPageController::class)->prefix('help')->name('help.')->group(function(){
        Route::get('/', 'index')->name('index');
    });

    Route::controller(BlogPageController::class)->prefix('blog')->name('blog.')->group(function(){
        Route::get('/', 'index')->name('index');
        Route::get('/inner_blog', 'inner_blog')->name('inner_blog');
    });

    Route::controller(ContactUsController::class)->prefix('contact-us')->name('contact.')->group(function(){
        Route::get('/', 'index')->name('index');
    });

    Route::controller(LoginController::class)->prefix('login')->name('login.')->group(function(){
        Route::get('/', 'index')->name('index');
    });

    Route::controller(SignUpController::class)->prefix('signup')->name('signup.')->group(function(){
        Route::get('/', 'index')->name('index');
    });
    Route::controller(CngInfoController::class)->prefix('cng-info')->name('cng.')->group(function(){
        Route::get('/', 'index')->name('index');
        Route::get('/cng_stand', 'cng_stand')->name('cng_stand');
        Route::get('/map', 'map')->name('map');
        Route::get('/community', 'community')->name('community');
        Route::get('/owner', 'owner')->name('owner');
        Route::get('/driver', 'driver')->name('driver');
        Route::get('/notice', 'notice')->name('notice');
    });
    Route::controller(AuthDriverLoginController::class)->prefix('driver-login')->name('login')->group(function(){
        Route::get('/login', 'driverLogin')->name('login');
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
Route::controller(OwnerLoginController::class)->prefix('owner')->name('owner.')->group( function(){
    Route::get('/login', 'ownerLogin')->name('login');
    Route::post('/login', 'ownerLoginCheck')->name('login');
    Route::post('/logout', 'logout')->name('logout');
});

Route::controller(DriverLoginController::class)->prefix('driver')->name('driver.')->group( function(){
    Route::get('/login', 'driverLogin')->name('login');
    Route::post('/login', 'driverLoginCheck')->name('login');
    Route::post('/logout', 'logout')->name('logout');
});
Route::controller(DriverRegistrationController::class)->prefix('dRegistration')->name('dRegistration.')->group(function(){
    Route::get('driver/register', 'registerForm')->name('registerForm');
    Route::post('driver/register', 'register')->name('register');
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

    Route::controller(StandController::class)->prefix('stand')->name('stand.')->group(function(){
        Route::get('index', 'index')->name('index');
        Route::get('create', 'create')->name('create');
        Route::post('store','store')->name('store');
        Route::get('update/{id}', 'update')->name('update');
        Route::put('update/{id}', 'update_store')->name('update');
        Route::get('status/{id}', 'status')->name('status.update');
        Route::get('delete/{id}', 'delete')->name('delete');
        Route::get('detalis/{id}', 'detalis')->name('detalis');
    });

    Route::controller(VehicleListController::class)->prefix('vehicle')->name('vehicle.')->group(function(){
        Route::get('index', 'index')->name('index');
        Route::get('create', 'create')->name('create');
        Route::post('store', 'store')->name('store');
        Route::get('update/{id}', 'update')->name('update');
        Route::post('update/{id}', 'update_store')->name('update');
        Route::get('status/{id}', 'status')->name('status.update');
        Route::get('delete/{id}', 'delete')->name('delete');
        Route::get('detalis/{id}', 'detalis')->name('detalis');
    });

    Route::controller(FaqController::class)->prefix('faq')->name('faq.')->group(function(){
        Route::get('index', 'index')->name('index');
        Route::get('create', 'create')->name('create');
        Route::post('store', 'store')->name('store');
        Route::get('update/{id}', 'update')->name('update');
        Route::post('update/{id}', 'update_store')->name('update');
        Route::get('status/{id}', 'status')->name('status.update');
        Route::get('delete/{id}', 'delete')->name('delete');
        Route::get('detalis/{id}', 'detalis')->name('detalis');
    });

    Route::controller(FieldWorkerController::class)->prefix('worker')->name('worker.')->group( function(){
        Route::get('index', 'index')->name('index');
        Route::get('create', 'create')->name('create');
        Route::post('store', 'store')->name('store');
        Route::get('update/{id}', 'update')->name('update');
        Route::put('update/{id}', 'update_store')->name('update');
        Route::get('status/{id}', 'status')->name('status.update');
        Route::get('delete/{id}', 'delete')->name('delete');
        Route::get('detalis/{id}', 'detalis')->name('detalis');
    });

    Route::controller(NoticeController::class)->prefix('notice')->name('notice.')->group( function() {
        Route::get('index', 'index')->name('index');
        Route::get('create', 'create')->name('create');
        Route::post('store', 'store')->name('store');
        Route::get('update/{id}', 'update')->name('update');
        Route::put('update/{id}', 'update_store')->name('update');
        Route::get('status/{id}', 'status')->name('status.update');
        Route::get('delete/{id}', 'delete')->name('delete');
        Route::get('detalis/{id}', 'detalis')->name('detalis');
    });

    Route::controller(ContactInfoController::class)->prefix('contact')->name('contact.')->group( function() {
        Route::get('index', 'index')->name('index');
        Route::get('create', 'create')->name('create');
        Route::post('store', 'store')->name('store');
        Route::get('update/{id}', 'update')->name('update');
        Route::put('update/{id}', 'update_store')->name('update');
        Route::get('status/{id}', 'status')->name('status.update');
        Route::get('delete/{id}', 'delete')->name('delete');
        Route::get('detalis/{id}', 'detalis')->name('detalis');
    });
    Route::controller(BlogController::class)->prefix('blog')->name('blog.')->group( function(){
        Route::get('index','index')->name('index');
        Route::get('create','create')->name('create');
        Route::post('store', 'store')->name('store');
        Route::get('update/{id}', 'update')->name('update');
        Route::put('update/{id}', 'update_store')->name('update');
        Route::get('status/{id}', 'status')->name('status.update');
        Route::get('delete/{id}', 'delete')->name('delete');
        Route::get('detalis/{id}', 'detalis')->name('detalis');
    });
    Route::controller(FooterTitleController::class)->prefix('footerTitle')->name('footerTitle.')->group(function(){
        Route::get('index', 'index')->name('index');
        Route::get('create', 'create')->name('create');
        Route::post('store', 'store')->name('store');
        Route::get('update/{id}', 'update')->name('update');
        Route::post('update/{id}', 'update_store')->name('update');
        Route::get('ststus/{id}', 'status')->name('satus.update');
        Route::get('delete/{id}', 'delete')->name('delete');
        Route::get('detalis/{id}', 'detalis')->name('detalis');
    });
    Route::controller(FooterController::class)->prefix('footer')->name('footer.')->group( function(){
        Route::get('index', 'index')->name('index');
        Route::get('create', 'create')->name('create');
        Route::post('store', 'store')->name('store');
        Route::get('update/{id}', 'update')->name('update');
        Route::post('update/{id}', 'update_store')->name('update');
        Route::get('status/{id}', 'status')->name('status.update');
        Route::get('delete/{id}', 'delete')->name('delete');
        Route::get('detalis/{id}', 'detalis')->name('detalis');
    });
    Route::controller(OwnerController::class)->prefix('owner')->name('owner.')->group( function(){
        Route::get('index', 'index')->name('index');
        Route::get('create', 'create')->name('create');
        Route::post('store', 'store')->name('store');
        Route::get('update/{id}', 'update')->name('update');
        Route::put('update/{id}', 'update_store')->name('update');
        Route::get('status/{id}', 'status')->name('status.update');
        Route::get('delete/{id}', 'delete')->name('delete');
        Route::get('detalis/{id}', 'detalis')->name('detalis');
    });
    
    Route::controller(DriverController::class)->prefix('driver')->name('driver.')->group( function(){
        Route::get('index', 'index')->name('index');
        Route::get('create', 'create')->name('create');
        Route::post('store', 'store')->name('store');
        Route::get('update/{id}', 'update')->name('update');
        Route::put('update/{id}', 'update_store')->name('update');
        Route::get('status/{id}', 'status')->name('status.update');
        Route::get('delete/{id}', 'delete')->name('delete');
        Route::get('detalis/{id}', 'detalis')->name('detalis');
    });
    Route::controller(BloodGroupController::class)->prefix('blood')->name('blood.')->group( function(){
        Route::get('index', 'index')->name('index');
        Route::get('create', 'create')->name('create');
        Route::post('store', 'store')->name('store');
        Route::get('update/{id}', 'update')->name('update');
        Route::put('update/{id}', 'update_store')->name('update');
        Route::get('status/{id}', 'status')->name('status.update');
        Route::get('delete/{id}', 'delete')->name('delete');
        Route::get('detalis/{id}', 'detalis')->name('detalis');
    });
    Route::controller(DivisionController::class)->prefix('division')->name('division.')->group( function(){
        Route::get('index', 'index')->name('index');
        Route::get('create', 'create')->name('create');
        Route::post('store', 'store')->name('store');
        Route::get('update/{id}', 'update')->name('update');
        Route::put('update/{id}', 'update_store')->name('update');
        Route::get('status/{id}', 'status')->name('status.update');
        Route::get('delete/{id}', 'delete')->name('delete');
        Route::get('detalis/{id}', 'detalis')->name('detalis');
    });
    Route::controller(DistrictController::class)->prefix('district')->name('district.')->group(function(){
        Route::get('index', 'index')->name('index');
        Route::get('create', 'create')->name('create');
        Route::post('store', 'store')->name('store');
        Route::get('update/{id}', 'update')->name('update');
        Route::put('update/{id}', 'update_store')->name('update');
        Route::get('status/{id}', 'status')->name('status.update');
        Route::get('delete/{id}', 'delete')->name('delete');
        Route::get('detalis/{id}', 'detalis')->name('detalis');
    });
    Route::controller(ThanaController::class)->prefix('thana')->name('thana.')->group(function() {
        Route::get('index', 'index')->name('index');
        Route::get('create', 'create')->name('create');
        Route::post('store', 'store')->name('store');
        Route::get('update/{id}', 'update')->name('update');
        Route::put('update/{id}', 'update_store')->name('update');
        Route::get('status/{id}', 'status')->name('status.update');
        Route::get('delete/{id}', 'delete')->name('delete');
        Route::get('detalis/{id}', 'detalis')->name('detalis');
    });
    Route::controller(UnionController::class)->prefix('union')->name('union.')->group(function(){
        Route::get('index', 'index')->name('index');
        Route::get('create', 'create')->name('ceate');
        Route::post('store', 'store')->name('store');
        Route::get('update{id}', 'update')->name('update');
        Route::put('update{id}', 'update_store')->name('update');
        Route::get('status/{id}', 'status')->name('status.update');
        Route::get('delete/{id}', 'delete')->name('delete');
        Route::get('detalis/{id}', 'detalis')->name('detalis');
    });
    Route::controller(AjaxController::class)->prefix('ajax')->name('ajax.')->group(function(){
        Route::get('division/{id}', 'division')->name('division');
        Route::get('district/{id}', 'district')->name('district');
        Route::get('thana/{id}', 'thana')->name('thana');
        Route::get('union/{id}', 'union')->name('union');
        Route::get('stand/{id}', 'stand')->name('stand');
        // Route::get('stand/{id}', 'stand')->name('stand');
        Route::get('vehicles-license/{id}', 'vehiclesLicense')->name('vehiclesLicense');

        Route::get('vehicle/{id}', 'vehicle')->name('vehicle');
    });
});

Route::group(['middleware' => ['owner'], 'prefix' => 'owner'], function(){
    Route::get('/dashboard', [OwnerDashboardController::class, 'dashboard'])->name('owner.dashboard');
});
 
Route::group(['middleware' => ['driver'], 'prefix' => 'driver'], function () {
    Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('driver.dashboard');
});

