<?php

use App\Http\Controllers\TestController;
// User
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\DashboardController as UserDashboard;
use App\Http\Controllers\User\PaymentController as UserPayment;
use App\Http\Controllers\User\ProfileController as UserProfile;

// Admin
use App\Http\Controllers\Admin\DashboardController as AdminDashboard;
use App\Http\Controllers\Admin\UserController as AdminUser;
use App\Http\Controllers\Admin\WithdrawalController as AdminWithdrawal;

use App\Http\Controllers\Product\MainController as ProductMain;
use App\Http\Controllers\Product\BuyController as ProductBuy;

// Creator
use App\Http\Controllers\Creator\DashboardController as CreatorDashboard;
use App\Http\Controllers\Creator\ProfileController as CreatorProfile;
// Brand
use App\Http\Controllers\Brand\DashboardController as BrandDashboard;
use App\Http\Controllers\Brand\ProfileController as BrandProfile;
// Accountant
use App\Http\Controllers\Accountant\DashboardController as AccountantDashboard;
use App\Http\Controllers\Accountant\ProfileController as AccountantProfile;

// Product
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
    return view('welcome');
})->name("home");

require __DIR__.'/auth.php';

Route::get("admin",function(){
    return redirect()->route("login");
});
Route::get("getting-started",function(){
    return view("auth.get-started");
})->middleware("guest")->name("getting-started");
 
Route::middleware(["auth","verified"])->group(function(){
    Route::name("user.")->prefix("user")->group(function(){
        Route::get("dashboard",[UserDashboard::class,"index"])->name("dashboard");
        Route::get("profile",[UserProfile::class,"profile"])->name("profile");
        Route::post("profile",[UserProfile::class,"update"])->name("profile");
        Route::get("orders",[UserDashboard::class,"orders"])->name("orders");
        Route::get("{type}/{id}/checkout",[UserPayment::class,"choose"])->name("payment.choose");
        Route::get("{type}/{id}/pay/razorpay",[UserPayment::class,"razorpay"])->name("payment.razorpay");
        Route::post("{type}/{id}/pay/razorpay",[UserPayment::class,"razorpayPay"])->name("payment.razorpay");
        
        Route::get("{id}/{name}/view",[UserProfile::class,"view"])->name("view");
        Route::get("transactions",[UserDashboard::class,"transactions"])->name("transactions");
        Route::get("not-approved",function(){
            return view("users.not-approved");
        })->name("not-approved");

        
    });
    Route::middleware(["adminAuth"])->name("admin.")->prefix("admin")->group(function(){
        Route::get("dashboard",[AdminDashboard::class,"index"])->name("dashboard");

        Route::get("users/{type?}",[AdminUser::class,"index"])->name("users");
        Route::post("users/approve",[AdminUser::class,"approve"])->name("users.approve");
        Route::post("users/reject",[AdminUser::class,"reject"])->name("users.reject");
        Route::post("users/login",[AdminUser::class,"login"])->name("users.login");

        Route::get("categories",[AdminCategory::class,"index"])->name("categories");
        Route::post("category/create",[AdminCategory::class,"create"])->name("category.create");
        Route::post("category/delete",[AdminCategory::class,"delete"])->name("category.delete");

        Route::get("orders",[AdminDashboard::class,"orders"])->name("orders");

        Route::get("pebbles",[AdminDashboard::class,"pebbles"])->name("pebbles");

        Route::get("collections",[AdminDashboard::class,"collections"])->name("collections");
        Route::get("transactions",[AdminDashboard::class,"transactions"])->name("transactions");

        Route::get("products",[AdminDashboard::class,"products"])->name("products");
        Route::get("apis",[AdminApi::class,"index"])->name("apis");
        Route::post("apis",[AdminApi::class,"update"])->name("apis");
        
        
        //Withdraw methods
        Route::get('withdrawals/pending', [AdminWithdrawal::class,"pending"])->name('withdrawals.pending');
        Route::post('withdrawals/accept', [AdminWithdrawal::class,"accept"])->name('withdrawals.accept');
        Route::post('withdrawals/reject', [AdminWithdrawal::class,"reject"])->name('withdrawals.reject');
        Route::get('withdrawals/approved', [AdminWithdrawal::class,"approved"])->name('withdrawals.approved');
    });
   
    Route::middleware(["InstructorAuth","approved"])->name("creator.")->prefix("creator")->group(function(){
        Route::get("dashboard",[CreatorDashboard::class,"index"])->name("dashboard");
        Route::get("products",[CreatorDashboard::class,"products"])->name("products");
        Route::get("profile",[CreatorProfile::class,"profile"])->name("profile");
        Route::post("profile",[CreatorProfile::class,"update"])->name("profile");
        Route::get("pebbles",[CreatorDashboard::class,"pebbles"])->name("pebbles");
        Route::get("pebbles/create",[CreatorDashboard::class,"pcreate"])->name("pebbles.create");
        Route::post("pebbles/create",[CreatorDashboard::class,"pupdate"])->name("pebbles.create");
        Route::get("collections",[CreatorDashboard::class,"collections"])->name("collections");
        Route::get("collections/create",[CreatorDashboard::class,"ccreate"])->name("collections.create");
        Route::post("collections/create",[CreatorDashboard::class,"cupdate"])->name("collections.create");
        Route::get("transactions",[CreatorDashboard::class,"transactions"])->name("transactions");
        Route::get("products/create",[CreatorDashboard::class,"create"])->name("products.create");
        Route::post("products/create",[CreatorDashboard::class,"update"])->name("products.create");
        Route::get("orders",[BrandDashboard::class,"orders"])->name("orders");
    });

    Route::middleware(["OrganizationAuth"])->name("accountant.")->prefix("accountant")->group(function(){
        Route::get("dashboard",[AccountantDashboard::class,"index"])->name("dashboard");

        Route::get("profile",[AccountantProfile::class,"profile"])->name("profile");
        Route::post("profile",[AccountantProfile::class,"update"])->name("profile");
        Route::get("orders",[AccountantDashboard::class,"orders"])->name("products.orders");
        Route::get("transactions",[AccountantDashboard::class,"transactions"])->name("transactions");
    }); 

    Route::middleware(["institutionAuth"])->name("brand.")->prefix("brand")->group(function(){
        Route::get("dashboard",[BrandDashboard::class,"index"])->name("dashboard");

        Route::get("profile",[BrandProfile::class,"profile"])->name("profile");
        Route::post("profile",[BrandProfile::class,"update"])->name("profile");
        Route::get("{id}/{name}/view",[BrandProfile::class,"view"])->name("view");
        Route::get("products",[BrandDashboard::class,"products"])->name("products");
        Route::get("products/create",[BrandDashboard::class,"create"])->name("products.create");
        Route::post("products/create",[BrandDashboard::class,"store"])->name("products.create");
        Route::get("products/edit/{id}",[BrandDashboard::class,"edit"])->name("products.edit");
        Route::post("products/edit/{id}",[BrandDashboard::class,"update"])->name("products.edit");
        Route::get("transactions",[BrandDashboard::class,"transactions"])->name("transactions");
        Route::post("products/delete",[BrandDashboard::class,"delete"])->name("products.delete");
        Route::get("orders",[BrandDashboard::class,"orders"])->name("orders");
    });
    Route::name("products.")->prefix("products")->group(function(){
        Route::get("/",[ProductMain::class,"index"])->name("index");
        Route::get("view/{id}/{title}",[ProductMain::class,"view"])->name("view");
        Route::middleware(["auth","verified"])->name("buy.")->prefix("buy")->group(function(){
            Route::get("/{id}",[ProductBuy::class,"check"])->name("check");
            Route::post("/{id}",[ProductBuy::class,"buy"])->name("add");
        });
    });
});



