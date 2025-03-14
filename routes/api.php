<?php 
 
use Illuminate\Http\Request; 
use Illuminate\Support\Facades\Route; 
 
// Route::get('/user', function (Request $request) { 
//     return $request->user(); 
// })->middleware('auth:sanctum'); 
Route::post('/users', [\App\Http\Controllers\UserController::class, 'register']); 
Route::post('/users/login', [\App\Http\Controllers\UserController::class, 'login']); 
 
Route::middleware(\App\Http\Middleware\ApiAuthMiddleware::class)->group(function 
() { 
    Route::get('/users/current', [\App\Http\Controllers\UserController::class, 'get']); 
    Route::patch('/users/current', [\App\Http\Controllers\UserController::class, 'update']); 
    Route::delete('/users/logout', [\App\Http\Controllers\UserController::class, 'logout']); 
 
    // Contacts 
    Route::apiResource('contacts', ContactController::class); 
     
    // Addresses 
    Route::apiResource('contacts.addresses', AddressController::class) 
        ->only(['store', 'update', 'destroy']); 
}); 