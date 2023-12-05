<?php

use App\Http\Controllers\DbController;
use App\Models\UserX;
use App\Providers\AzureAuth;
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

Route::get('/', [UserX::class,'IsAuth']);


Route::get('/getUser', [UserX::class,'GetUsers']);


Route::post('/Login', [UserX::class,'Login']);

Route::post('/LoginX', [UserX::class,'LoginX']);

Route::get('/SignUp', [UserX::class,'SignUp']);

Route::post('/SignUpX', [UserX::class,'SignUpX']);

Route::get('/MainPage', [UserX::class,'MainPage']);

Route::put('/UpdatePost', [UserX::class,'UpdateX']);

Route::get('/CreatePost', [UserX::class,'CreatePost']);