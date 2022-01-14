<?php

use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('roles', 'App\Http\Controllers\RoleController');
Route::resource('users', 'App\Http\Controllers\UserController');
 //admin-company-contact
 Route::resource('admin-company-contact', 'App\Http\Controllers\CompanyContactController');
  //admin-company
  Route::resource('admin-company', 'App\Http\Controllers\CompanyController');
   //whyus
 Route::resource('whyus', 'App\Http\Controllers\WhyUsController');
   //feedback
   Route::resource('admin-feedback', 'App\Http\Controllers\FeedbackController');
      //client
      Route::resource('admin-client', 'App\Http\Controllers\ClientController');
       //team
       Route::resource('admin-team', 'App\Http\Controllers\TeamController');
       //gallery-category
       Route::resource('/admin-gallery-category', 'App\Http\Controllers\GalleryCategoryController');
       Route::resource('/admin-gallery', 'App\Http\Controllers\GalleryController');
       //product-category
       Route::resource('/admin-product-category', 'App\Http\Controllers\ProductCategoryController');
 //accessories
 Route::resource('/admin-accessories', 'App\Http\Controllers\AccessoryController');
  //glasses
  Route::resource('/admin-glasses', 'App\Http\Controllers\GlassController');
    //slider
    Route::resource('/admin-slider', 'App\Http\Controllers\HomeSliderController');
    //blogs
    Route::resource('/admin-blogs', 'App\Http\Controllers\BlogsController');

