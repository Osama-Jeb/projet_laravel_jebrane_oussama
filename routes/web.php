<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\MailboxController;
use App\Http\Controllers\ProfileController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

//* Frontend Shit
Route::get("/", [HomeController::class, "index"])->name("home.index");
Route::get("/category", [HomeController::class, "category"])->name("home.category");
Route::get("/contact", [HomeController::class, "contact"])->name("home.contact");
Route::get("/signin", [HomeController::class, "signin"])->name("home.signin");
Route::get('/cart', [HomeController::class, "cart"])->name("home.cart");

//! MAILBOX
Route::get("/mailbox", [MailboxController::class, "index"])->name("mailbox.index");
Route::post("/mailbox/store", [MailboxController::class, "store"])->name("mailbox.store");

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
