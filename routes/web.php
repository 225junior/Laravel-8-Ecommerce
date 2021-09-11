<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CoponController;
use App\Http\Controllers\CategoryController;
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
// Category Controller
Route::group(['middleware'=>'admin_auth'],function() {
    Route::get('admin/dashboard', [AdminController::class, 'dashboard']);
    Route::get('admin/category', [CategoryController::class, 'index']);
    Route::get('admin/category/manage_category', [CategoryController::class, 'manage_category']);
    Route::get('admin/category/manage_category/{id}', [CategoryController::class, 'manage_category']);
    Route::post('admin/category/manage_cateory_process', [CategoryController::class, 'manage_cateory_process'])->name('category.manage_categroy_process');
    Route::get('admin/category/delete/{id}', [CategoryController::class, 'delete']);

    //Copon Controller
    Route::get('admin/Copon', [CoponController::class, 'index']);
    Route::get('admin/Copon/manage_Copon', [CoponController::class, 'manage_Copon']);
    Route::get('admin/Copon/manage_Copon/{id}', [CoponController::class, 'manage_Copon']);

    Route::post('admin/Copon/manage_cateory_process', [CoponController::class, 'manage_cateory_process'])->name('Copon.manage_categroy_process');

    Route::get('admin/Copon/delete/{id}', [CoponController::class, 'delete']);

  //Logout Route 
    Route::get('admin/logout', function () {
        session()->forget('ADMIN_LOGIN');
        session()->forget('ADMIN_ID');
        return redirect('admin');
    });
  
});

 