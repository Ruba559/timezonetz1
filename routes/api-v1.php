<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\v1\BrandController;
use App\Http\Controllers\Api\v1\CategoryController;
use App\Http\Controllers\Api\v1\ComplaintController;
use App\Http\Controllers\Api\v1\FavoriteController;
use App\Http\Controllers\Api\v1\OrderController;
use App\Http\Controllers\Api\v1\OrderDetailController;
use App\Http\Controllers\Api\v1\ProductController;
use App\Http\Controllers\Api\v1\UserController;
use App\Http\Controllers\Api\v1\NotificationController;
use App\Http\Controllers\Api\v1\CartController;
use App\Http\Controllers\Api\v1\AuthController;
use App\Http\Controllers\Api\v1\AdvertController;


Route::post('/login', [AuthController::class, 'login']);
Route::get('/logout', [AuthController::class, 'logout']);
Route::post('register', [AuthController::class ,'register']);

Route::get('/brands', [BrandController::class, 'index']);
Route::post('/brand', [BrandController::class, 'store']);
Route::post('/brand/{id}', [BrandController::class, 'update']);
Route::delete('/brand/{id}', [BrandController::class, 'destroy']);

Route::get('/adverts', [AdvertController::class, 'index']);
Route::post('/advert', [AdvertController::class, 'store']);
Route::post('/advert/{id}', [AdvertController::class, 'update']);
Route::delete('/advert/{id}', [AdvertController::class, 'destroy']);

Route::get('/categories', [CategoryController::class, 'index']);
Route::post('/category', [CategoryController::class, 'store']);
Route::post('/category/{id}', [CategoryController::class, 'update']);
Route::delete('/category/{id}', [CategoryController::class, 'destroy']);

Route::get('/complaints', [ComplaintController::class, 'index']);
Route::post('/complaint', [ComplaintController::class, 'store']);
Route::post('/complaint/{id}', [ComplaintController::class, 'update']);
Route::delete('/complaint/{id}', [ComplaintController::class, 'destroy']);

Route::get('/favorite', [FavoriteController::class, 'index']);
Route::post('/favorite', [FavoriteController::class, 'store']);
Route::post('/favorite/{id}', [FavoriteController::class, 'update']);
Route::delete('/favorite/{id}', [FavoriteController::class, 'destroy']);
Route::get('/user/{id}/favorite', [FavoriteController::class, 'getFavoriteByUserId']);

Route::get('/orders', [OrderController::class, 'index']);
Route::post('/order', [OrderController::class, 'store']);
Route::post('/order/{id}', [OrderController::class, 'update']);
Route::delete('/order/{id}', [OrderController::class, 'destroy']);

Route::get('/orderDetails', [OrderDetailController::class, 'index']);
Route::post('/orderDetail', [OrderDetailController::class, 'store']);
Route::post('/orderDetail/{id}', [OrderDetailController::class, 'update']);
Route::delete('/orderDetail/{id}', [OrderDetailController::class, 'destroy']);

Route::get('/products', [ProductController::class, 'index']);
Route::post('/product', [ProductController::class, 'store']);
Route::post('/product/{id}', [ProductController::class, 'update']);
Route::delete('/product/{id}', [ProductController::class, 'destroy']);
Route::get('/category/{id}/products', [ProductController::class, 'getProductByCategoryId']);
Route::get('/newProducts', [ProductController::class, 'getNewProducts']);
Route::get('/bigDealsProducts', [ProductController::class, 'getBigDealsProducts']);

Route::get('/users', [UserController::class, 'index']);
Route::post('/user', [UserController::class, 'store']);
Route::post('/user/{id}', [UserController::class, 'update']);
Route::delete('/user/{id}', [UserController::class, 'destroy']);
 

Route::get('/notifications', [NotificationController::class, 'index']);
Route::post('/notification', [NotificationController::class, 'store']);
Route::post('/notification/{id}', [NotificationController::class, 'update']);
Route::delete('/notification/{id}', [NotificationController::class, 'destroy']);
Route::get('/user/{id}/notifications', [NotificationController::class, 'getNotificationByUserId']);

Route::get('/carts', [CartController::class, 'index']);
Route::post('/cart', [CartController::class, 'store']);
Route::post('/cart/{id}', [CartController::class, 'update']);
Route::delete('/cart/{id}', [CartController::class, 'destroy']);
Route::get('/user/{id}/cart', [CartController::class, 'getCartByUserId']);