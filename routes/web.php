<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\ChefsController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InfoController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\AuthController;
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





// Admin Route

// Route::get('/admin/admin',[AdminController::class, 'show'])->name('admin.show');
// Route::get('/admin/admin/create',[AdminController::class, 'create'])->name('admin.create');
// Route::post('/admin/admin/store',[AdminController::class, 'store'])->name('admin.store');
// Route::get('/admin/admin/edit/{chefId}',[AdminController::class, 'edit'])->name('admin.edit');
// Route::put('/admin/admin/update',[AdminController::class, 'update'])->name('admin.update');
// Route::delete('/admin/admin/delete',[AdminController::class, 'delete'])->name('admin.delete');

Route::post('/contact/store' , [ContactController::class , 'store'])->name('contact.store');
Route::get('/admin/login', [AuthController::class, 'loginPage'])->name('admin.loginPage');
Route::post('/admin/login', [AuthController::class, 'login'])->name('admin.login');
Route::get('/admin',[AdminController::class, 'index'])->name('admin.index');
// Web Route
Route::group(['prefix' => '/'] , function(){
    Route::get('/', [HomeController::class, 'index'])->name('index');
    Route::get('/chefs' , [ChefsController::class , 'show'])->name('chefs.show');
    Route::get('/cotact' , [ContactController::class , 'show'])->name('cotact.show');
    Route::get('/item' , [ItemController::class , 'show'])->name('item.show');
    Route::get('/gallery' , [GalleryController::class , 'show'])->name('gallery.show');
    Route::get('/chefs' , [ChefsController::class , 'show'])->name('chefs.show');
});


// Group Admin Route

Route::group(['prefix' => '/admin' , 'middleware' => ['auth']] , function(){

    //logout Route

    Route::post('/logout', [AuthController::class, 'logout'])->name('admin.logout');

    // Chefs Route

    Route::group( ['prefix' => '/chefs'] , function(){
        Route::get('/',[ChefsController::class, 'index'])->name('chefs.index');
        Route::get('/create',[ChefsController::class, 'create'])->name('chefs.create');
        Route::post('/store',[ChefsController::class, 'store'])->name('chefs.store');
        Route::get('/edit/{chefId}',[ChefsController::class, 'edit'])->name('chefs.edit');
        Route::put('/update',[ChefsController::class, 'update'])->name('chefs.update');
        Route::delete('/delete',[ChefsController::class, 'delete'])->name('chefs.delete');
    });

    //Info Routes

    Route::group( ['prefix' => '/information'] , function(){
        Route::get('/',[InfoController::class, 'index'])->name('information.index');
        Route::get('/create', [InfoController::class, 'create'])->name('information.create');
        Route::post('/store', [InfoController::class, 'store'])->name('information.store');
        Route::get('/edit/{info}', [InfoController::class, 'edit'])->name('information.edit');
        Route::put('/update/{info}', [InfoController::class, 'update'])->name('information.update');
        Route::delete('/{info}', [InfoController::class, 'destroy'])->name('information.destroy');
    });

    // About Route

    Route::group(['prefix' => '/about'] , function(){
        Route::get('/' , [AboutController::class , 'index'])->name('about.index');
        Route::get('/create', [AboutController::class, 'create'])->name('about.create');
        Route::post('/store', [AboutController::class, 'store'])->name('about.store');
        Route::get('/edit/{id}', [AboutController::class, 'edit'])->name('about.edit');
        Route::put('/update', [AboutController::class, 'update'])->name('about.update');
        Route::delete('/about', [AboutController::class, 'delete'])->name('about.delete');
    });

    // category Route

    Route::group(['prefix' => '/category'] , function(){
        Route::get('/' , [CategoriesController::class , 'index'])->name('category.index');
        Route::get('/create', [CategoriesController::class, 'create'])->name('category.create');
        Route::post('/store',[CategoriesController::class, 'store'])->name('category.store');
        Route::get('/edit/{id}',[CategoriesController::class, 'edit'])->name('category.edit');
        Route::put('/update',[CategoriesController::class, 'update'])->name('category.update');
        Route::delete('/delete',[CategoriesController::class, 'delete'])->name('category.delete');
    });

    // Item Route
    
    Route::group(['prefix' => '/item'] , function(){
        Route::get('/' , [ItemController::class , 'index'])->name('item.index');
        Route::get('/create', [ItemController::class, 'create'])->name('item.create');
        Route::post('/store',[ItemController::class, 'store'])->name('item.store');
        Route::get('/edit/{id}',[ItemController::class, 'edit'])->name('item.edit');
        Route::put('/update',[ItemController::class, 'update'])->name('item.update');
        Route::delete('/delete',[ItemController::class, 'delete'])->name('item.delete');
    });

    // Gallery Route

    Route::group(['prefix' => 'gallery'] , function(){
        Route::get('/' , [GalleryController::class , 'index'])->name('gallery.index');
        Route::get('/create', [GalleryController::class, 'create'])->name('gallery.create');
        Route::post('/store',[GalleryController::class, 'store'])->name('gallery.store');
        Route::get('/edit/{id}',[GalleryController::class, 'edit'])->name('gallery.edit');
        Route::put('/update',[GalleryController::class, 'update'])->name('gallery.update');
        Route::delete('/delete',[GalleryController::class, 'delete'])->name('gallery.delete');
    });

    // Contact Route
    Route::group(['prefix' => '/contact'] , function(){
        Route::get('/' , [ContactController::class , 'index'])->name('contact.index');
    });

    
});