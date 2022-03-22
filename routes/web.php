<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\View;

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
View::composer('layout', function($view)
{
    $userId = Auth::id();
    $pp = User::find($userId);
    $categoriesList = Category::get();
    $view->with(['userId'=>$userId])->with(['pp'=>$pp])->with(['categoriesList'=>$categoriesList]);
});

Route::get('/', [UserController::class,'home']);

Route::get('/register', [UserController::class,'register']);
Route::post('/register', [UserController::class,'store']);

Route::get('/login', [UserController::class,'login']);
Route::post('/login', [UserController::class,'authLogin']);

Route::get('/logout',[UserController::class,'logout']);

Route::get('/profile/{id}',[ProfileController::class,'show']);
Route::put('/profile/{id}',[ProfileController::class,'update']);
Route::get('/profile/edit/{id}',[ProfileController::class,'edit']);

Route::get('/gig/create',[GigController::class,'create']);
Route::post('/gig/create',[GigController::class,'store']);
Route::get('/gig/edit/{id}',[GigController::class,'edit']);
Route::put('/gig/edit/{id}',[GigController::class,'update']);
Route::delete('/delete/{id}',[GigController::class,'destroy']);
Route::post('/gig/checkout/{id}',[CheckoutController::class,'store']);
Route::get('/gig/checkout/{id}/{type}',[CheckoutController::class,'show']);
Route::post('/gig/review/{id}',[GigController::class,'storeReview']);
Route::get('/gig/{id}',[GigController::class,'show']);

Route::get('/search',[GigController::class,'search']);

Route::get('/transactions',[TransactionController::class,'index']);

Route::post('/love/{userId}/{gigId}',[FavouriteController::class,'store']);
Route::delete('/love/{userId}/{gigId}',[FavouriteController::class,'destroy']);
Route::get('/loved',[FavouriteController::class,'index']);

