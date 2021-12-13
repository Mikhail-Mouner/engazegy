<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BlogController;

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

Auth::routes();

// Home Page
Route::get( '/', [ HomeController::class, 'index' ] )->name( 'home' );
// Middleware auth
Route::middleware( 'auth' )->group( function () {
    Route::get( '/my-blog', [ BlogController::class, 'index' ] )->name( 'my_blog' );

    // Middleware checkBlogCount
    Route::middleware( 'checkBlogCount' )->group( function () {
        Route::get( '/my-blog/new',
            [ BlogController::class, 'create' ] )->name( 'new_blog' );
        Route::post( '/my-blog/new',
            [ BlogController::class, 'store' ] )->name( 'new_blog.store' );
    } );

    // Middleware isAdmin
    Route::middleware( 'isAdmin' )->group( function () {
        Route::get( '/auto-import',
            [ BlogController::class, 'autoImport' ] )->name( 'auto_import' );
    } );
} );
