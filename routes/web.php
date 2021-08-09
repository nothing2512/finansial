<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProductCategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\SavingController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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

Route::middleware("auth")->group(function () {
    Route::get('/', [DashboardController::class, "index"])->name("dashboard");
    Route::get("/profile", [UserController::class, "profile"])->name("profile");
    Route::get("/logout", [AuthController::class, "logout"])->name("logout");

    Route::get("/admins", [UserController::class, "index"])
        ->defaults("role", ADMIN)
        ->name("admin");
    Route::get("/customers", [UserController::class, "index"])
        ->defaults("role", CUSTOMER)
        ->name("customer");
    Route::get("/debtors", [UserController::class, "index"])
        ->defaults("role", DEBTOR)
        ->name("debtor");

    Route::get("/savings", [SavingController::class, "index"])->name("saving");

    Route::get("/products", [ProductController::class, "index"])->name("product");
    Route::get("/product/categories", [ProductCategoryController::class, "index"])->name("product.category");
    Route::get("/product/category/{id}/items", [ProductController::class, "index"])->name("product.category.item");

    Route::get("/transaction/incomes", [TransactionController::class, "index"])->defaults("type", INCOME)->name("transaction.income");
    Route::get("/transaction/expenses", [TransactionController::class, "index"])->defaults("transaction.type", EXPENSE)->name("transaction.expense");
    Route::get("/transaction/categories", [TransactionController::class, "categories"])->name("transaction.category");

    Route::get("/debt/in", [TransactionController::class, "index"])->defaults("type", DEBT_IN)->name("debt.in");
    Route::get("/debt/out", [TransactionController::class, "index"])->defaults("type", DEBT_IN)->name("debt.out");

    Route::get("/reports", [ReportController::class, "index"])->name("report");
});

Route::get("/login", [AuthController::class, "login"])
    ->middleware("auth.no")
    ->name("login");

Route::prefix('api')->group(function () {
    Route::post("/login", [AuthController::class, "login"])->name("api.login");

    Route::post("/user", [UserController::class, "store"])->name("api.user.store");
    Route::post("/user/{id}", [UserController::class, "store"])->name("api.user.update");
    Route::get("/user/{id}/delete", [UserController::class, "destroy"])->name("api.user.delete");

    Route::post("/saving", [SavingController::class, "store"])->name("api.saving.store");
    Route::post("/saving/{id}", [SavingController::class, "store"])->name("api.saving.update");
    Route::get("/saving/{id}/delete", [SavingController::class, "destroy"])->name("api.saving.delete");

    Route::post("/product", [ProductController::class, "store"])->name("api.product.store");
    Route::post("/product/{id}", [ProductController::class, "store"])->name("api.product.update");
    Route::get("/product/{id}/delete", [ProductController::class, "destroy"])->name("api.product.delete");

    Route::post("/product/category", [ProductCategoryController::class, "store"])->name("api.product.category.store");
    Route::post("/product/category/{id}", [ProductCategoryController::class, "store"])->name("api.product.category.update");
    Route::get("/product/category/{id}/delete", [ProductCategoryController::class, "destroy"])->name("api.product.category.delete");

    Route::post("/transaction/category", [CategoryController::class, "store"])->name("api.transaction.category.store");
    Route::post("/transaction/category/{id}", [CategoryController::class, "store"])->name("api.transaction.category.update");
    Route::get("/transaction/category/{id}/delete", [CategoryController::class, "destroy"])->name("api.transaction.category.delete");
});
