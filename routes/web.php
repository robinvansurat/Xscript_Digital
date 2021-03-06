<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\UserController;


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

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

Route::get('/dashboard', [MovieController::class,  'dashboard']);
Route::get('/search/api/{t}/{y}/{plot}/{r}',[MovieController::class,'index']);
Route::post('/insert/api',[MovieController::class,'store']);
Route::delete('/delete/movie/{movie}', [MovieController::class, 'destroy']);
Route::get('/getmovie/{movie}',[MovieController::class,'show']);
Route::post('/update/movie/{movie}', [MovieController::class, 'update']);
Route::get('/view/movie/{movie}', [MovieController::class, 'detail']);
