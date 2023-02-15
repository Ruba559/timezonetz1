<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\DashboardController;
use App\Events\NotificationEvent;
use App\Http\Controllers\LocaleController;


Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
    Route::get('/pricing', [DashboardController::class , 'Pricing'])->name('Pricing');
});


Route::post('/add-banner', [BannerController::class, 'addBanner'])->name('addBanner');
Route::post('/edit-banner', [BannerController::class, 'editBanner'])->name('editBanner');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';


Route::group(['middleware' => 'auth'], function () {
    Route::get('/profile', [ProfileController::class , 'profile'])->name('profile');
    Route::post('/update-profile', [ProfileController::class , 'updateProfile'])->name('updateProfile');
    
    Route::get('/orders', [HomeController::class , 'orders'])->name('orders');

    Route::get('/favorite', [HomeController::class , 'favorite'])->name('favorite');
});

Route::get('/', [HomeController::class , 'index'])->name('homepage');
Route::get('/products/{slug}', [ProductController::class , 'product'])->name('product');

Route::get('/search/{word}', [HomeController::class , 'search'])->name('search');

Route::get('/brand/{slug}', [HomeController::class , 'brand'])->name('brand');
Route::get('/category/{slug}', [HomeController::class , 'category'])->name('category');
Route::get('/for-her', [HomeController::class , 'forHer'])->name('forHer');
Route::get('/for-him', [HomeController::class , 'forHim'])->name('forHim');
Route::get('/new-arrivals', [HomeController::class , 'newArrivals'])->name('newArrivals');
Route::get('/top-sales', [HomeController::class , 'topSales'])->name('topSales');
Route::get('/offers', [HomeController::class , 'Offers'])->name('Offers');
Route::get('/brands', [HomeController::class , 'brands'])->name('brands');


Route::get('/cart', [HomeController::class , 'cart'])->name('cart');

Route::get('/legals', [HomeController::class , 'legals'])->name('legals');


Route::get('/test', function () {
    event(new NotificationEvent());
    return'test';
});

Route::get('/language/{locale}', [LocaleController::class,'switch'])->name('switchlang');
