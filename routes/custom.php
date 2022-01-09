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
Route::get('/clear-cache', function () {
    Artisan::call('cache:clear');
    return "Cache is cleared";
});
// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath'],
    ],
     function () {
        Route::get('/confirm', function () {
            return view('web.confirm');
        });

//my web route
        Route::get('/', [App\Http\Controllers\Web\IndexController::class, 'index']);

        Route::get('/about-us', [App\Http\Controllers\Web\AboutController::class, 'index']);

        //gallery
	Route::get('/web-gallery', [App\Http\Controllers\Web\IndexController::class, 'gallery'])->name('gallery');


         Route::get('/contact', [App\Http\Controllers\Web\ContactUsController::class, 'index'])->name('contact');
         Route::post('/contact-message', [App\Http\Controllers\Web\ContactUsController::class, 'sendMessage']);


         Route::get('/blogs', [App\Http\Controllers\Web\BlogsController::class, 'index']);
        Route::get('blogs/fetch_data', [App\Http\Controllers\Web\BlogsController::class, 'fetch_data']);
        Route::get('/single-blog/{id}/{slug?}', 'App\Http\Controllers\Web\BlogsController@singleBlog')->name('single-blog.show');
        Route::get('/products/{id}', [App\Http\Controllers\Web\ProductsController::class, 'index']);
        Route::get('productsData/fetch_data', [App\Http\Controllers\Web\ProductsController::class, 'fetch_data']);
        Route::get('/single-product/{id}', 'App\Http\Controllers\Web\ProductsController@singleProduct')->name('single-product.show');
        Route::post('/product-message', [App\Http\Controllers\Web\ProductsController::class, 'sendMessage']);


        // Route::post('/contact-message', [App\Http\Controllers\Web\ContactUsController::class, 'sendMessage']);
        // Route::post('/send-letter', [App\Http\Controllers\Web\ContactUsController::class, 'sendLetter']);

        // Route::get('/blogs', [App\Http\Controllers\Web\BlogsController::class, 'index']);
        // Route::get('blogs/fetch_data', [App\Http\Controllers\Web\BlogsController::class, 'fetch_data']);
    });

