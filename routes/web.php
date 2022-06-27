<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\ProductsController;
use Illuminate\Session\SessionManager;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\OrdersController;
use Database\Seeders\ProductSeeder;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\WhisslistsController;
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
/*Route::get('/',  [ProductSeeder::class, 'run'])
->name('home');*/

Route::view('/', 'welcome')->name('home');

Route::view('/newstart', 'new_start')->name('newstart');

Route::get('/shoping_cart', [CartController::class, 'index'])->name('cart.shoping_cart');

Route::get('/shop', [ProductsController::class, 'index'])->name('shop');

Route::post('/add_to_card', [CartController::class, 'store'])->name('cart.store');

Route::get('/remove_item/{id}', [CartController::class, 'destroy'])->name('cart.destroy');

Route::post('/cartQty', [CartController::class, 'update'])->name('cart.update');

Route::resource('/checkout', CheckoutController::class)->only(['create', 'store']);

//Route::resource('/my_orders', OrdersController::class)->only(['index', 'show($id)']);

Route::get('/profile/edit_address/{id}', [UsersController::class, 'edit_address'])->name('profile.edit_address');

Route::post('/profile/update_address', [UsersController::class, 'update_address'])->name('profile.update_address');

Route::resource('/profile', UsersController::class);

Route::get('/contact', [ContactController::class, 'index'])->name('contact');

Route::post('/contact', [ContactController::class, 'update'])->name('contact.update');


Route::get('/my_orders', [OrdersController::class, 'index'])->name('orders.index');

Route::get('/my_orders/{id}', [OrdersController::class, 'show'])->name('orders.show');

Route::view('/about', 'about')->name('about');

Route::view('/blog_details', 'blog_details')->name('blog_details');

Route::view('/blog', 'blog')->name('blog');

Route::get('/shop_details/{id}', [ProductsController::class, 'show'])->name('shop_details');

Route::middleware('guestid')->group(function(){

    Route::get('/wisslist', [WhisslistsController::class, 'index'])->name('wisslist.index');

    Route::post('/wisslist', [WhisslistsController::class, 'store'])->name('wisslist.store');
});

Route::view('/class', 'class')->name('class');

/*Route::get('/checkout', function () {
    return view('checkout');
})->name('checkout');*/


Route::view('/family', 'family')->name('family');

Route::view('/dashboard', 'welcome')->middleware(['auth'])->name('welcome');

Route::get('/jsontest', [ArticleController::class, 'jsontest']);

require __DIR__.'/auth.php';


/*Route::view('/about', 'about')->name('about');
Route::view('/cookies', 'cookies')->name('cookies');
Route::view('/contacts', 'contacts')->name('contacts');

Route::get('/ani', function () {

    $pet=request('pet');
    return view('ani', ['pet'=>$pet]);
});

/*
Route::get('/article/{article}', function ($article ) {
    return view('article', compact('article'));
});

Route::get('/article/{article}', [ArticleController::class, 'show']);*/
