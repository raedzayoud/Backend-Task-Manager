<?php

use App\Http\Controllers\FavouriteController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\WelcomeController;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// Route::post("tasks",[TaskController::class,"store"]);
// Route::get("tasks",[TaskController::class,"index"]);
// Route::put("tasks/{id}",[TaskController::class,"update"]);
// Route::get("tasks/{id}",[TaskController::class,"showbydetails"]);
// Route::delete("tasks/{id}",[TaskController::class,"deletebyid"]);

//authentication
Route::post("register", [UserController::class, "register"]);
Route::post("login", [UserController::class, "login"]);
Route::post("logout", [UserController::class, "logout"])->middleware('auth:sanctum');

Route::middleware('auth:sanctum')->group(function () {

    Route::apiResource('tasks', TaskController::class);

    Route::prefix('profile')->group(function () {
        Route::post('', [ProfileController::class, "store"]);
        Route::put('/{id}', [ProfileController::class, "update"]);
        Route::get('/{id}', [ProfileController::class, "show"]);
    });
    Route::get("user/{id}/profile", [UserController::class, "getprofile"]);
    Route::get("user/{id}/tasks", [UserController::class, "getusertasks"]);
    Route::get("tasks/{id}/user", [UserController::class, "gettaskbyuserid"]);


    Route::post("task/{task_id}/categories", [TaskController::class, "addCategoryToTask"]);
    Route::get("task/{task_id}/categories", [TaskController::class, "getCategoryToTask"]);
    Route::get("categories/{category_id}/task", [TaskController::class, "getTaskByCategorie"]);

    // admin
    Route::get("task/all", [TaskController::class, "getAllTask"])->middleware('checkuser');
    Route::get("task/ordred", [TaskController::class, "getTaskByPirioty"]);


    Route::post("task/{id}/favourite", [FavouriteController::class, "addToFavorites"]);
    Route::delete("task/{id}/favourite", [FavouriteController::class, "removeFromFavorites"]);
    Route::get("task/favourite", [FavouriteController::class, "getFavoritesTask"]);





});
