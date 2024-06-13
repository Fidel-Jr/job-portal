<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index']);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/about', [App\Http\Controllers\HomeController::class, 'about'])->name('about');
Route::get('/contact', [App\Http\Controllers\HomeController::class, 'contact'])->name('contact');

Route::group(['prefix'=> 'jobs'], function(){
    Route::get('single/{id}', [App\Http\Controllers\Jobs\JobsController::class, 'single'])->name('single.job');
    Route::post('save', [App\Http\Controllers\Jobs\JobsController::class, 'saveJob'])->name('save.job');
    Route::post('apply', [App\Http\Controllers\Jobs\JobsController::class, 'jobApply'])->name('apply.job');
    Route::any('search', [App\Http\Controllers\Jobs\JobsController::class, 'search'])->name('search.job');
});

Route::group(['prefix'=> 'categories'], function(){
    Route::get('/single/{name}', [App\Http\Controllers\Categories\CategoriesController::class, 'singleCategory'])->name('categories.single');
});

Route::group(['prefix'=> 'users'], function(){

    Route::get('profile', [App\Http\Controllers\Users\UsersController::class, 'profile'])->name('profile');
    Route::get('applications', [App\Http\Controllers\Users\UsersController::class, 'applications'])->name('applications');
    Route::get('savedjobs', [App\Http\Controllers\Users\UsersController::class, 'savedJobs'])->name('saved.jobs');

    Route::get('editdetails', [App\Http\Controllers\Users\UsersController::class, 'editDetails'])->name('edit.details');

    Route::post('editdetails', [App\Http\Controllers\Users\UsersController::class, 'updateDetails'])->name('update.details');

    Route::get('edit-cv', [App\Http\Controllers\Users\UsersController::class, 'editCV'])->name('edit.cv');
    Route::post('edit-cv', [App\Http\Controllers\Users\UsersController::class, 'updateCV'])->name('update.cv');
});

Route::get('admin/login', [App\Http\Controllers\Admins\AdminsController::class, 'viewLogin'])->name('view.login')->middleware('checkforauth');
Route::post('admin/login', [App\Http\Controllers\Admins\AdminsController::class, 'checkLogin'])->name('check.login');



Route::group(['prefix'=> 'admin', 'middleware'=> 'auth:admin'], function(){
    Route::get('/', [App\Http\Controllers\Admins\AdminsController::class, 'index'])->name('admins.dashboard');
    Route::get('/all-admins', [App\Http\Controllers\Admins\AdminsController::class, 'admins'])->name('view.admins');
    
    Route::get('/create-admins', [App\Http\Controllers\Admins\AdminsController::class, 'createAdmins'])->name('create.admins');
    Route::post('/edit-admins', [App\Http\Controllers\Admins\AdminsController::class, 'storeAdmins'])->name('store.admins');

    Route::get('/display-categories', [App\Http\Controllers\Admins\AdminsController::class, 'displayCategories'])->name('display.categories');

    Route::get('/create-cates', [App\Http\Controllers\Admins\AdminsController::class, 'createCategories'])->name('create.categories');
    Route::post('/edit-cates', [App\Http\Controllers\Admins\AdminsController::class, 'storeCategories'])->name('store.categories');



    //update cetogries
    Route::get('/edit-cates/{id}', [App\Http\Controllers\Admins\AdminsController::class, 'editCategories'])->name('edit.categories');
    Route::post('/edit-cates/{id}', [App\Http\Controllers\Admins\AdminsController::class, 'updateCategories'])->name('update.categories');

    Route::get('/delete-cates/{id}', [App\Http\Controllers\Admins\AdminsController::class, 'deleteCategories'])->name('delete.categories');

    //jobs
    Route::get('/display-jobs', [App\Http\Controllers\Admins\AdminsController::class, 'allJobs'])->name('display.jobs');
    Route::get('/create-jobs', [App\Http\Controllers\Admins\AdminsController::class, 'createJobs'])->name('create.jobs');
    Route::post('/create-jobs', [App\Http\Controllers\Admins\AdminsController::class, 'storeJobs'])->name('store.jobs');


    Route::get('/delete-jobs/{id}', [App\Http\Controllers\Admins\AdminsController::class, 'deleteJobs'])->name('delete.jobs');


    Route::get('/display-apps', [App\Http\Controllers\Admins\AdminsController::class, 'displayApps'])->name('display.apps');
    Route::get('/delete-apps/{id}', [App\Http\Controllers\Admins\AdminsController::class, 'deleteApps'])->name('delete.apps');

});