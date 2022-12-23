<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\ApiAuthController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::group(['middleware' => ['cors', 'json.response']], function () {
    Route::post('/login', [ApiAuthController::class, 'login'])->name('login.api');
    Route::post('/register', [ApiAuthController::class, 'register'])->name('register.api');
});

Route::middleware('auth:api')->group(function () {
    Route::post('/logout', [ApiAuthController::class, 'logout'])->name('logout.api');
    Route::get('/search', [ApiAuthController::class, 'search'])->name('search.api');
    Route::get('/getStudent', [ApiAuthController::class, 'getStudent'])->name('getStudent.api');
    Route::post('/upload-add-content',[ApiAuthController::class,'uploadaddContent'])->name('import.api');
    Route::post('/upload-update-content',[ApiAuthController::class,'uploadupdateContent'])->name('import.api');
    Route::post('/upload-delete-content',[ApiAuthController::class,'uploaddeleteContent'])->name('import.api');

});
