<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InfoController;
use App\Http\Controllers\MailboxController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserProductController;
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
Route::get("/contact", [HomeController::class, "contact"])->name("home.contact");
Route::get("/signin", [HomeController::class, "signin"])->name("home.signin");


//! MAILBOX
Route::get("/mailbox", [MailboxController::class, "index"])->name("mailbox.index");
Route::post("/mailbox/store", [MailboxController::class, "store"])->name("mailbox.store");
Route::delete("/mailbox/delete/{mailbox}", [MailboxController::class, "destroy"])->name("mailbox.destroy");
//! NewsLetter Mail
Route::post("/newsletter", [AdminController::class, "sendMail"])->name("newsletter.send");

// ^^ PRODUCT
Route::get("/products", [ProductController::class, "index"])->name("product.index");
Route::get("/products/admin", [ProductController::class, "admin"])->name("product.admin");
Route::get("/products/show/{product}", [ProductController::class, "show"])->name("product.show");
Route::post("/products/store", [ProductController::class, "store"])->name("product.store");
Route::put("/products/update/{product}", [ProductController::class, "update"])->name("product.update");
Route::delete("/products/delete/{product}", [ProductController::class, "destroy"])->name("product.destroy");

//~~ UserProduct
Route::get("/userProduct", [UserProductController::class, "index"])->name("userProduct.index");
Route::put("/userProduct/store/{product}", [UserProductController::class, "store"])->name("userProduct.store");
Route::put("/userProduct/decrease/{product}", [UserProductController::class, "decrease"])->name("userProduct.decrease");

// & Info
Route::get("/info", [InfoController::class, "index"])->name("info.index");
Route::put("/info/update/{info}", [InfoController::class, "update"])->name("info.update");

//? Comments
Route::post("/comment/store/{product}", [CommentController::class, "store"])->name("comment.store");

//* Users
Route::get("/users", [UserController::class, "index"])->name("user.index");
// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth', "verified", "role:admin"])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get("/dashboard", function() {
        return view("dashboard");
    })->name("dashboard");

});

require __DIR__.'/auth.php';
