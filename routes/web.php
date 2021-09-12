<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CoponController;

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
});


Route::get('admin', [AdminController::class, 'index']);
Route::post('admin/auth', [AdminController::class, 'auth'])->name('admin.auth');

Route::group(['middleware'=>'admin_auth'],function() {
    Route::get('admin/dashboard', [AdminController::class, 'dashboard']);
    //Categoryj Controller routes
    Route::get('admin/category', [CategoryController::class, 'index']);
    Route::get('admin/category/manage_category', [CategoryController::class, 'manage_category']);
    Route::get('admin/category/manage_category/{id}', [CategoryController::class, 'manage_category']);
    Route::post('admin/category/manage_category_process', [CategoryController::class, 'manage_category_process'])->name('category.manage_category_process');
    Route::get('admin/category/delete/{id}', [CategoryController::class, 'delete']);

    //Copon Controller routes
    // Route::get('admin/copon', [CoponController::class, 'index']);
    // Route::get('admin/copon/manage_copon', [CoponController::class, 'manage_copon']);
    // Route::get('admin/copon/manage_copon/{id}', [CoponController::class, 'manage_copon']);

    // Route::post('admin/copon/manage_copon_process', [CoponController::class, 'manage_copon_process'])->name('copon.manage_copon_process');

    // Route::get('admin/copon/delete/{id}', [CoponController::class, 'delete']);

  //Logout Route 
    Route::get('admin/logout', function () {
        session()->forget('ADMIN_LOGIN');
        session()->forget('ADMIN_ID');
        return redirect('admin');
    });
  
});

 