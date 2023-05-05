<?php

use App\Http\Controllers\PostsController;
use App\Http\Controllers\ProductController;
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

// class Stadium {

// }

// class Football {

//     protected $stadium;

//     public function __construct(Stadium $stadium)
//     {
//         $this->stadium = $stadium;
//     }
// }

// class Game{

//     protected $football;

//     public function __construct(Football $football)
//     {
//         $this->football = $football;
//     }
// }

// app()->bind('Game', function(){
//     return new Game(new Football(new Stadium));
// });

//dd(app()->make('Game'));

// app()->instance('Game', function(){
//     return 'Instance';
// });

// dd(app());

// app()->bind('random', function(){
//     return Str::random();
// });

// app()->singleton('random', function(){
//     return Str::random();
// });

// dump(app()->make('random'));
// dd(app()->make('random'));

// dd(resolve('Game'));

// if the function return only view then we can write route following way
//Route::view('/', 'index')->name('home');

//Route::view('/page', 'dir.page'); // single line return function in controller

Route::view('/test', 'pages.welcome');

Route::get('/', function () {
    return view('welcome');
});

Route::resource('posts', PostsController::class);

Route::resource('products', ProductController::class);
Route::post('products/store', [ProductController::class, 'setProduct'])->name('products.setProduct');

// controller group
// Route::controller(ProductController::class)->group(function(){
//     Route::get('products', 'index')->name('products.index');
//     Route::get('products/{productId}', 'show')->name('products.show');
//     Route::get('products/create', 'create')->name('products.create');
//     Route::post('products/store', 'store')->name('products.store');
//     Route::get('products/{productId}/edit', 'edit')->name('products.edit');
//     Route::put('products/{productId}/edit', 'edit')->name('products.edit');
//     Route::delete('products/{productId}/destroy', 'destroy')->name('products.destroy');
// });

// middleware group
// Route::group(['middleware' => ['auth']], function() {
//     Route::get('/dashboard', function () {
//         return view('dashboard');
//     })->name('dashboard');

//     Route::group(['middleware' => ['is_admin']], function() {
//         Route::resource('categories', \App\Http\Controllers\CategoryController::class);
//         Route::resource('posts', \App\Http\Controllers\PostController::class);
//     });
// });

// require __DIR__.'/auth.php';
