<?php

use Illuminate\Support\Facades\Route;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Controllers\Admin\AdminDashBoardController;
use App\Http\Controllers\Site\SiteDashBoardController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\KatalogController;
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





Route::group(["prefix"=>"admin","as"=>"admin."],function (){

    Route::middleware(["guest:web"])->group(function (){
        Route::get("/login",[AdminDashBoardController::class,"login"])->name("login");
        Route::post("/check",[AdminDashBoardController::class,"check"])->name("check");
    });

    Route::middleware(["auth:web"])->group(function (){
        Route::get("/",[AdminDashBoardController::class,"index"])->name("index");

        Route::controller(ProductController::class)
            ->prefix("product")
            ->as("product.")
            ->group(function (){
                Route::get('/', 'index')->name('index');
                Route::get('/create', 'create')->name('create');
                Route::post('/store', 'store')->name('store');
                Route::get('/delete/{id}', 'delete')->name('delete');
                Route::get('/edit/{id}', 'edit')->name('edit');
                Route::post('/update/{id}', 'update')->name('update');
                Route::get("/file-export",'fileExport')->name("file-export");
                Route::post("/file-import","fileImport")->name("file-import");



//                Route::get("/file-export", "ProductController@fileExport")->name("file-export");
//                Route::post("/file-import", "ProductController@fileImport")->name('file-import');
//                Route::post("/file-update", "ProductController@fileUpdate")->name('file-update');




            });

        Route::controller(CategoryController::class)
            ->prefix("category")
            ->as("category.")
            ->group(function (){
                Route::get('/', 'index')->name('index');
                Route::post('/addCategory', 'store')->name('addCategory');
                Route::get('/delete/{id}', 'delete')->name('deleteCategory');
                Route::get('/deleteSub/{id}', 'deleteSub')->name('deleteCategorySub');
            });

        Route::controller(KatalogController::class)
            ->prefix("katalog")
            ->as("katalog.")
            ->group(function (){
                Route::get('/', 'index')->name('index');
                Route::get('/create', 'create')->name('create');
                Route::post('/store', 'store')->name('store');
                Route::get('/delete/{id}', 'delete')->name('delete');
                Route::get('/galeri/{id}', 'galeri')->name('galeri');
                Route::post('/galeriStore/{katalogs_id}', 'galeriStore')->name('galeriStore');
            });

    });

});
