<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminDashBoardController;
use App\Http\Controllers\Site\SiteDashBoardController;
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

Route::group(["namespace"=>"site","as"=>"site."],function (){

    Route::get("/",[SiteDashBoardController::class,"index"])->name("index");

});





Route::group(["prefix"=>"admin","namespace"=>"Admin","as"=>"admin."],function (){

    Route::middleware(["guest:web"])->group(function (){
        Route::get("/login",[AdminDashBoardController::class,"login"])->name("login");
        Route::post("/check",[AdminDashBoardController::class,"check"])->name("check");
    });

    Route::middleware(["auth:web"])->group(function (){
        Route::get("/",[AdminDashBoardController::class,"index"])->name("index");
    });

});
