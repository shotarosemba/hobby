<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\GuestLoginController;
use App\Http\Controllers\MakerController;
use App\Http\Controllers\WorkController;

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
Route::post('/favorite/{id}',[PostController::class,'favorite'])->name('favorites.store');

Route::get('/showwriter/{id}', [PostController::class, 'show'])->name('showwriter');

Route::delete('/delete-works/{id}', [PostController::class, 'destroy']);

Route::post('/comments/{id}',[PostController::class,'makecomment']);

Route::get('/postshow/{post}', [PostController::class, 'showpost'])->name('show.post');

Route::put('/makerupdate/{post}', [PostController::class, 'updateMaker'])->name('update.maker');

Route::put('/posts/{post}', [PostController::class, 'update'])->name('post.update');

Route::get('/update-works/{post}',[PostController::class,'updateworks']);

Route::post('/post', [PostController::class, 'store']);

Route::get('/', function () {
    return view('welcome');
});

Route::get('/makers/{name}', [MakerController::class, 'show'])->name('makers.show');



Route::get('/works/{name}', [WorkController::class, 'show'])->name('works.show');

Route::get('guest', [GuestLoginController::class, 'login'])->name('guest.login');

Route::post('/posts-profile/{user}', [ProfileController::class, 'save']);

/*Route::get('/',[PostController::class,'notlogin']);*/

Route::get('/edit-profile',[ProfileController::class,'edit-profile']);

Route::controller(PostController::class)->middleware(['auth'])->group(function(){
    Route::get('/', 'index')->name('index');
   } );
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

