<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FileManagement;
use App\Http\Controllers\Auth;
//use App\Http\Controllers\IdeController;
use App\Http\Controllers\File;
use App\Models\UsersFiles;


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
//root
Route::get('/', function(){redirect('/login')->send();});

//register login
Route::get('/register', function(){return view('register');});
Route::get('/login', function(){return view('login');});

//auth
Route::post('/auth/register', [Auth::class, 'register']);
Route::get('/auth/register', [Auth::class, 'protect_register']);
Route::post('/auth/login', [Auth::class, 'login']);
Route::get('/auth/login', [Auth::class, 'protect_login']);
Route::get('/auth/disconnect', [Auth::class, 'disconnect']);

//file
Route::get('/file', [File::class, 'index_filemanagement']);
Route::get('/file/{file_uuid}', [File::class, 'index_fileuuid']);
Route::post('/create/file', [File::class, 'createFile']);
Route::post('/save/{file_uuid}', [File::class, 'saveFile']);
Route::post('/editname/{file_uuid}', [File::class, 'editNameFile']);
Route::get('/delete/{file_uuid}', [File::class, 'deleteFile']);

