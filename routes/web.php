<?php

use App\Http\Controllers\CommentsController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;
 
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

 Route::get('/', [ PagesController::class , 'index' ]) -> name('home.index');
 
 Route::get('/news/{category}/{slug}' , [ PagesController::class , 'post' ] ) -> name('post.index') ;

 Route::get('/news/{category}' , [ PagesController::class , 'postCategory' ] ) 
      -> name('post-categories.index') ;
     
 Route::get('/search/{search}' , [ PagesController::class , 'search' ]) -> name('search.index');
//---------------------------------------------------//
 #comments and replies routes
 Route::post('/comment/create-comment', [ CommentsController::class , 'createComment' ] );  
//---------------------------------------------------//
//----------------- ---------------------------------//
   # authentication routes
   Auth::routes();
//---------------------------------------------------//

 

