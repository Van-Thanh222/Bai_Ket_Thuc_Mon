<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\EmailController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SlideController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductTypeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\TrademarkController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\FavouriteController;
use App\Http\Controllers\HomecartController;
use App\Http\Controllers\HomeHomeorderController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\OorderController;
use App\Http\Controllers\DiscountCodeController;
use App\Http\Controllers\DanhGiaController;

Route::get('/rr', function () {
    return view('welcome');
});
//
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register.form');
Route::post('/register', [AuthController::class, 'register'])->name('register');

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login.form');
Route::post('/login', [AuthController::class, 'login'])->name('login');

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware('auth');
//
Route::post('/input-email',[EmailController::class,'postInputEmail'])->name('postInputEmail');
Route::get('/input-email',[EmailController::class,'getInputEmail'])->name('getInputEmail');
// Route::get('/r', function () {
//     return view('layout.master');
// });
Route::get('/contact', [HomeController::class, 'index']);
// Router chuyển đến trang quản lý slide admin
Route::get('/slides', [SlideController::class, 'index'])->name('slides.index');
Route::get('/slides/create', [SlideController::class, 'create'])->name('slides.create');
Route::post('/slides', [SlideController::class, 'store'])->name('slides.store');
Route::get('/slides/{id}/edit', [SlideController::class, 'edit'])->name('slides.edit');
Route::put('/slides/{id}', [SlideController::class, 'update'])->name('slides.update');
Route::delete('/slides/{id}', [SlideController::class, 'destroy'])->name('slides.destroy');
// Router chuyển đến trang quản lý user admin
Route::resource('users', UserController::class);
//Router chuyển đến trang quản lý type product admin
Route::resource('product-types',ProductTypeController::class);
//Router chuyển đến trang quản lý product admin
Route::resource('products', ProductController::class);
//Router chuyển đến trang quản lý order admin
Route::resource('orders', OrderController::class);
Route::get('/orders/delete/{id}', [OrderController::class, 'destroy'])->name('orders.delete');
Route::post('/orders/update-status/{id}', [OrderController::class, 'updateStatus'])->name('orders.update-status');
Route::get('/orders/status/{status}', [OrderController::class, 'status'])->name('orders.status');
//
Route::prefix('trademark')->name('trademark.')->group(function () {
    Route::get('/', [TrademarkController::class, 'index'])->name('index');
    Route::get('/create', [TrademarkController::class, 'create'])->name('create');
    Route::post('/store', [TrademarkController::class, 'store'])->name('store');
    Route::get('/edit/{id}', [TrademarkController::class, 'edit'])->name('edit');
    Route::post('/update/{id}', [TrademarkController::class, 'update'])->name('update');
    Route::get('/delete/{id}', [TrademarkController::class, 'destroy'])->name('delete');
});
//liên hệ của user
Route::middleware(['auth'])->group(function () {
    Route::get('/contact', [ContactController::class, 'create'])->name('contact.form');
    Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');
    Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
    
});
// trang chủ
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/product/{id}', [HomeController::class, 'show'])->name('product.detail');
// mua hàng
Route::middleware(['auth'])->group(function () {
    Route::get('/add-to-cart/{id}', [CartController::class, 'addToCart'])->name('cart.add');
    Route::get('/cart/remove/{productId}', [CartController::class, 'removeFromCart'])->name('cart.remove');

});
// yêu thích
Route::middleware(['auth'])->group(function () {
    Route::get('/favourite/{product_id}', [FavouriteController::class, 'addFavourite'])->name('favourite.add');
});
//trang sp
Route::get('/loai-san-pham/{id}', [ProductController::class, 'showByType'])->name('products.byType');

Route::get('/guoithieu', [HomeController::class, 'sss'])->name('gioithieu');

//


Route::middleware('auth')->group(function () {
    Route::get('/cart', [HomecartController::class, 'index'])->name('cart.index');
    Route::put('/cart/{id}', [HomecartController::class, 'update'])->name('cart.update');
    Route::delete('/cart/{id}', [HomecartController::class, 'destroy'])->name('cart.destroy');
});


Route::get('/order/{cart}', [HomeHomeorderController::class, 'create'])->name('order.create');
Route::post('/order/store', [HomeHomeorderController::class, 'store'])->name('order.store');
// trang cá nhân
// web.php
Route::middleware(['auth'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::post('/profile/avatar', [ProfileController::class, 'updateAvatar'])->name('profile.avatar');
    Route::post('/profile/name', [ProfileController::class, 'updateName'])->name('profile.name');
    Route::post('/profile/phone', [ProfileController::class, 'updatePhone'])->name('profile.phone');
    Route::post('/profile/password', [ProfileController::class, 'updatePassword'])->name('profile.password');
});
//

// web.php
Route::get('/home/search', [HomeController::class, 'search'])->name('home.search');
//
Route::prefix('admin')->name('admin.')->middleware('auth')->group(function () {
    Route::get('/contacts', [ContactController::class, 'index'])->name('contacts.index');
    Route::get('/contacts/reply/{id}', [ContactController::class, 'replyForm'])->name('contacts.replyForm');
    Route::post('/contacts/reply/{id}', [ContactController::class, 'sendReply'])->name('contacts.sendReply');
    Route::delete('/contacts/{id}', [ContactController::class, 'destroy'])->name('contacts.destroy');
});
//


Route::middleware('auth')->group(function() {
    Route::get('/ordersss', [OorderController::class, 'index'])->name('orderss.trangchinh');
    Route::get('/orderss/{id}', [OorderController::class, 'showw'])->name('orders.chitiet');
});
//
Route::get('/order-now/{id}', [OorderController::class, 'orderNow'])->name('order.now');
//
Route::get('/products/trademark/{id}', [ProductController::class, 'showByTrademark'])->name('products.byTrademark');
//
Route::middleware('auth')->group(function () {
    Route::get('/yeu-thich', [FavouriteController::class, 'index'])->name('favourite.index');
    Route::get('/yeu-thich/xoa/{id}', [FavouriteController::class, 'remove'])->name('favourite.remove');
});
//
Route::resource('discount-codes',DiscountCodeController::class);
//

Route::middleware(['auth'])->group(function () {
    Route::get('/danh-gia/{id_product}', [DanhGiaController::class, 'showForm'])->name('danhgia.form');
    Route::post('/danh-gia', [DanhGiaController::class, 'submit'])->name('danhgia.submit');
});
