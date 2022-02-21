<?php

use App\Http\Controllers\AddressController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\DetailController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\SubCategoryController;
use App\Http\Controllers\SubjectController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\RateController;
use App\Http\Controllers\FavouriteController;

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
//zarin pal
Route::get('order','siteController@order');
Route::post('shop','siteController@add_order');
//end


Route::get('/', [HomeController::class,'index']);
Route::get('/home', [HomeController::class,'index'])->name('home');


Route::get('/search/{text}',[SearchController::class,'search']);
Route::get('/search/result/{text}',[SearchController::class,'search_result']);

Route::prefix('order')->group(function() {
   Route::get('/address',[OrderController::class,'select_address'])->middleware('auth')->name('order.selectAddress');
   Route::post('/address',[OrderController::class,'create'])->middleware('auth')->name('order.create');
   Route::get('/check',[OrderController::class,'check'])->middleware('auth')->name('order.check');
   Route::get('/done/{order_id}',[OrderController::class,'order_done'])->middleware('auth')->name('order_done');
});


Route::prefix('profile')->group(function() {
    Route::get('', function () {
        return view('profile');
    })->middleware('auth')->name('profile');
    Route::get('/edit', [ProfileController::class, 'edit'])->name('user.edit')->middleware('auth');
    Route::put('/update', [ProfileController::class, 'update'])->name('user.update')->middleware('auth');
    Route::get('/addresses', [AddressController::class, 'addresses'])->name('addresses')->middleware('auth');
    Route::post('/addresses', [AddressController::class, 'create'])->name('addresses.create')->middleware('auth');
    Route::get('/addresses/edit/{id}', [AddressController::class, 'edit'])->name('addresses.edit')->middleware('auth');
    Route::put('/addresses/{id}', [AddressController::class, 'update'])->name('addresses.update')->middleware('auth');
    Route::delete('/addresses/{id}', [AddressController::class, 'destroy'])->name('addresses.destroy')->middleware('auth');
    Route::get('/change_password', [ProfileController::class, 'changePassword'])->name('change_password')->middleware('auth');
});
Route::get('/result',[ProductController::class,'result']);

Route::get('/cart',[CartController::class , 'cart'])->middleware('auth')->name('cart');
Route::get('/cart/{product_id}/{user_id}',[CartController::class,'add'])->middleware('auth');
Route::delete('/cart/{product_id}',[CartController::class,'delete'])->middleware('auth')->name('delete_from_cart');
Route::get('/cart/count/{product_id}/{count}',[CartController::class,'counter'])->middleware('auth');

Route::get('/favourites',[FavouriteController::class , 'index'])->name('favourites');
Route::get('/favourite/{product_id}/{user_id}',[FavouriteController::class,'add'])->middleware('auth');
Route::delete('/favourite/{product_id}',[FavouriteController::class,'delete'])->middleware('auth')->name('delete');

//Route::resource('/product',ProductController::class);
Route::get('/product/{id}',[ProductController::class,'show'])->name('product.show');
Route::get('/category/{id}',[ProductController::class,'category']);


// Ajax
Route::get('/find/subjects',[CategoryController::class , 'subjects']);
Route::get('/find/category/{id}',[CategoryController::class,'categories']);
Route::get('/find/subcategory/{id}',[CategoryController::class,'subcategories']);

Auth::routes();


Route::get('/rate/{user_id}/{product_id}/{rate}',[RateController::class , 'rateProduct']);

Route::prefix('admin')->group(function() {
    Route::get('/login','Auth\AdminLoginController@showLoginForm')->name('admin.login');
    Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
    Route::get('logout/', 'Auth\AdminLoginController@logout')->name('admin.logout');
    Route::get('/', 'Auth\AdminController@index')->name('admin.dashboard');

    Route::delete('/product/{id}',[ProductController::class,'destroy'])->name('product.destroy')->middleware('auth:admin');
    Route::get('/product',[ProductController::class,'index'])->name('product.index')->middleware('auth:admin');
    Route::post('/product',[ProductController::class,'store'])->name('product.store')->middleware('auth:admin');
    Route::get('/product/create',[ProductController::class,'create'])->name('product.create')->middleware('auth:admin');
    Route::get('/product/{id}/edit',[ProductController::class,'edit'])->name('product.edit')->middleware('auth:admin');

    Route::get('/details',[DetailController::class,'index'])->name('admin.detail.index')->middleware('auth:admin');
    Route::post('/details',[DetailController::class,'store'])->name('admin.detail.store')->middleware('auth:admin');
    Route::delete('/details/{id}',[DetailController::class,'destroy'])->name('admin.detail.destroy')->middleware('auth:admin');
    Route::get('/details/{id}/{number}',[DetailController::class,'show'])->name('admin.detail.show')->middleware('auth:admin');

    Route::get('/product/image/create/{id}',[ImageController::class,'create'])->name('admin.image.create')->middleware('auth:admin');
    Route::post('/product/image',[ImageController::class,'store'])->name('admin.image.store')->middleware('auth:admin');
    Route::get('/product/image/{id}',[ImageController::class,'show'])->name('admin.image.show')->middleware('auth:admin');
    Route::get('/product/image/{order}/{id}',[ImageController::class,'destroy'])->name('admin.image.destroy')->middleware('auth:admin');

    Route::get('/subject',[SubjectController::class,'index'])->name('admin.subject.index')->middleware('auth:admin');
    Route::post('/subject',[SubjectController::class,'store'])->name('admin.subject.store')->middleware('auth:admin');
    Route::get('/subject/{id}/edit',[SubjectController::class,'edit'])->middleware('auth:admin');
    Route::put('/subject/{id}',[SubjectController::class,'update'])->name('admin.subject.update')->middleware('auth:admin');
    Route::delete('/subject/{id}',[SubjectController::class,'destroy'])->name('admin.subject.destroy')->middleware('auth:admin');

    Route::get('/category',[CategoryController::class,'index'])->name('admin.category.index')->middleware('auth:admin');
    Route::post('/category',[CategoryController::class,'store'])->name('admin.category.store')->middleware('auth:admin');
    Route::get('/category/{id}/edit',[CategoryController::class,'edit'])->middleware('auth:admin');
    Route::put('/category/{id}',[CategoryController::class,'update'])->name('admin.category.update')->middleware('auth:admin');
    Route::delete('/category/{id}',[CategoryController::class,'destroy'])->name('admin.category.destroy')->middleware('auth:admin');

    Route::get('/subcategory',[SubCategoryController::class,'index'])->name('admin.subcategory.index')->middleware('auth:admin');
    Route::post('/subcategory',[SubCategoryController::class,'store'])->name('admin.subcategory.store')->middleware('auth:admin');
    Route::get('/subcategory/{id}/edit',[SubCategoryController::class,'edit'])->middleware('auth:admin');
    Route::put('/subcategory/{id}',[SubCategoryController::class,'update'])->name('admin.subcategory.update')->middleware('auth:admin');
    Route::delete('/subcategory/{id}',[SubCategoryController::class,'destroy'])->name('admin.subcategory.destroy')->middleware('auth:admin');

    Route::get('/orders/new',[OrderController::class,'new'])->name('admin.orders.new')->middleware('auth:admin');
    Route::get('/orders/onway',[OrderController::class,'onway'])->name('admin.orders.onway')->middleware('auth:admin');
    Route::get('/orders/deliverd',[OrderController::class,'deliverd'])->name('admin.orders.deliverd')->middleware('auth:admin');
    Route::get('/order/show/{order_id}',[OrderController::class,'show'])->name('admin.orders.show')->middleware('auth:admin');
    Route::get('/order/send/{order_id}',[OrderController::class,'send'])->name('admin.orders.send')->middleware('auth:admin');
    Route::get('/order/deliver/{order_id}',[OrderController::class,'deliver'])->name('admin.orders.deliver')->middleware('auth:admin');
}) ;
