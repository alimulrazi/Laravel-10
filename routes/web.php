<?php

use App\Mail\SampleMail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MailController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\AlbumsController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\EventsController;
use App\Http\Controllers\PhotosController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserRoleController;
use App\Mail\Email;

// if the function return only view then we can write route following way
//Route::view('/', 'index')->name('home');

//Route::view('/page', 'dir.page'); // single line return function in controller

Route::get('/', function () {
    return view('welcome');
});

// email send
Route::get('/send-mail', function () {
    Mail::to('alimulrazi83@gmail.com')->send(new Email());
});

Route::get('/user-role', [UserRoleController::class, 'index'])->name('role.get');

Route::resource('posts', PostsController::class);
Route::get('/post', [PostsController::class, 'manyToMany']);

Route::resource('comments', CommentController::class);

Route::resource('products', ProductController::class);
Route::post('products/store', [ProductController::class, 'setProduct'])->name('products.set-product');

// Profile controller group
Route::controller(ProfileController::class)->group(function () {
    Route::get('profiles', 'index')->name('profiles.index');
    Route::get('profiles/{profile}', 'show')->name('profiles.show');
    Route::get('profiles/create', 'create')->name('profiles.create');
    Route::post('profiles/store', 'store')->name('profiles.store');
    Route::get('profiles/{profile}/edit', 'edit')->name('profiles.edit');
    Route::put('profiles/{profile}/edit', 'edit')->name('profiles.edit');
    Route::delete('profiles/{profile}/destroy', 'destroy')->name('profiles.destroy');
});

// User controller group
Route::controller(UserController::class)->group(function () {
    Route::get('users', 'index')->name('users.index');
    Route::get('users/{user}', 'show')->name('users.show');
    Route::get('users/create', 'create')->name('users.create');
    Route::post('users/store', 'store')->name('users.store');
    Route::get('users/{user}/edit', 'edit')->name('users.edit');
    Route::put('users/{user}/edit', 'edit')->name('users.edit');
    Route::delete('users/{user}/destroy', 'destroy')->name('users.destroy');
});

Route::prefix('professional')->name('professional.')->group(function () {

    Route::get('/profiles', [ProfileController::class, 'create'])->name('create');
});

Route::group(['prefix' => 'manpower', 'as' => 'manpower.'], function () {

    Route::get('/users', [UserController::class, 'create'])->name('create');
});


Route::get('/test', function () {
    dd(Auth::user());
});

Route::middleware(['auth'])->prefix('admin')->group(function () {
    Route::get('/', function () {
        dd("Hello");
        // dd(Auth::user()->admin);
    });
});

// albums
Route::get('/albums', [AlbumsController::class, 'listAlbums'])->name('albums.index');
Route::get('/albums/{album}', [AlbumsController::class, 'showAlbumPhotos'])->name('albums.show');

// all admin routes
Route::middleware('auth')->prefix('admin')->name('admin.')->group(function () {
    Route::view('/home', 'admin.index')->name('home');

    //  photo gallery
    Route::get('/albums', [AlbumsController::class, 'index'])->name('albums.index');
    Route::get('/albums/create', [AlbumsController::class, 'create'])->name('albums.create');
    Route::get('/albums/{album}', [AlbumsController::class, 'show'])->name('albums.show');
    Route::post('/albums', [AlbumsController::class, 'store'])->name('albums.store');
    Route::delete('/albums/{id}', [AlbumsController::class, 'destroy'])->name('albums.destroy');

    Route::get('/photo/upload/{album_id}', [PhotosController::class, 'create'])->name('photos.create');
    Route::post('/photo/upload', [PhotosController::class, 'store'])->name('photos.store');
    Route::get('/photo/{photo}', [PhotosController::class, 'show'])->name('photos.show');
    Route::delete('/photo/{id}', [PhotosController::class, 'destroy'])->name('photos.destroy');

    //events
    Route::resource('events', EventsController::class);
});


// Route::get('/tests', function () {
// dd(Auth::user()->is_admin);
// })->name('dashboard');


// prefix and name group
// Route::prefix('products')->name('products.')->group(function () {
//     Route::get('/', 'index')->name('index');
//     Route::get('/create', 'create')->name('create');
//     Route::post('/', 'store')->name('store');
//     Route::get('/{product}', 'show')->name('show');
//     Route::get('/{product}/edit', 'edit')->name('edit');
//     Route::put('/{product}/edit', 'update')->name('update');
//     Route::delete('/{product}/destroy', 'destroy')->name('destroy');
// });

// Route::resource('products', ProductController::class);

// controller group
// Route::controller(ProductController::class)->group(function(){
//     Route::get('products', 'index')->name('products.index');
//     Route::get('products/{product}', 'show')->name('products.show');
//     Route::get('products/create', 'create')->name('products.create');
//     Route::post('products/store', 'store')->name('products.store');
//     Route::get('products/{product}/edit', 'edit')->name('products.edit');
//     Route::put('products/{product}/edit', 'edit')->name('products.edit');
//     Route::delete('products/{product}/destroy', 'destroy')->name('products.destroy');
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

// Route::name('admin.')->group(function () {
//     Route::get('/users', function () {
// Route assigned name "admin.users"...
//     })->name('users');
// });

// Route::name('admin.')
//     ->prefix('admin')
//     ->middleware(['auth'])
//     ->group(function () {

//     Route::get('/users', function () {
// Route assigned name "admin.users"...
// Matches The "/admin/users" URL
// This /users URI only for logged in users
//     })->name('users');
// });


// require __DIR__.'/auth.php';

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
