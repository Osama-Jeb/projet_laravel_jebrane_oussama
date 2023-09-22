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


//!! What a Normal User Can Do
Route::get("/", [HomeController::class, "index"])->name("home.index");
Route::get("/contact", [HomeController::class, "contact"])->name("home.contact");
Route::get("/signin", [HomeController::class, "signin"])->name("home.signin");
//* MAILBOX
Route::post("/mailbox/store", [MailboxController::class, "store"])->name("mailbox.store");
//* NewsLetter Mail
Route::post("/newsletter", [AdminController::class, "sendMail"])->name("newsletter.send");
//* PRODUCT
Route::get("/products", [ProductController::class, "index"])->name("product.index");
Route::get("/products/show/{product}", [ProductController::class, "show"])->name("product.show");
//* Cart Page
Route::get("/userProduct", [UserProductController::class, "index"])->name("userProduct.index");


//!! Admin Authorities
Route::middleware(['auth', "verified", "role:admin"])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // & Info
    Route::get("/info", [InfoController::class, "index"])->name("info.index");
    Route::put("/info/update/{info}", [InfoController::class, "update"])->name("info.update");

    //* Users
    Route::get("/users", [UserController::class, "index"])->name("user.index");
    Route::put("/users/changeRole/{user}", [UserController::class, "changeRole"])->name("user.changeRole");
    Route::delete("/users/delete/{user}", [UserController::class, "destroy"])->name("user.destroy");

    //! Mailbox
    Route::get("/mailbox", [MailboxController::class, "index"])->name("mailbox.index");
    Route::put("/mailbox/read/{mailbox}", [MailboxController::class, "read"])->name("mailbox.read");
    Route::delete("/mailbox/delete/{mailbox}", [MailboxController::class, "destroy"])->name("mailbox.destroy");
});

//!! webmaster Authorities
Route::middleware(['auth', 'verified', 'role:webmaster'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    //^^ CRUD of Products
    Route::get("/products/admin", [ProductController::class, "admin"])->name("product.admin");
    Route::post("/products/store", [ProductController::class, "store"])->name("product.store");
    Route::put("/products/update/{product}", [ProductController::class, "update"])->name("product.update");
    Route::delete("/products/delete/{product}", [ProductController::class, "destroy"])->name("product.destroy");

    //? Comments
    Route::post("/comment/store/{product}", [CommentController::class, "store"])->name("comment.store");

    //~~ UserProduct
    Route::put("/userProduct/store/{product}", [UserProductController::class, "store"])->name("userProduct.store");
    Route::put("/userProduct/decrease/{product}", [UserProductController::class, "decrease"])->name("userProduct.decrease");
});


require __DIR__ . '/auth.php';
