<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\BoardColumnCreateController;
use App\Http\Controllers\BoardController;
use App\Http\Controllers\CardMoveController;
use App\Http\Controllers\CardsReorderUpdateController;
use App\Http\Controllers\ColumnCardCreateController;
use App\Http\Controllers\ColumnCardDestroyController;
use App\Http\Controllers\ColumnCardUpdateController;
use App\Http\Controllers\ColumnDestroyController;
use Illuminate\Support\Facades\Route;

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::prefix('v1')->middleware('auth:sanctum')->group(function () {
    Route::get('/boards/{board?}', [BoardController::class, 'show'])->name('boards');

    Route::post('/boards/{board}/columns', BoardColumnCreateController::class)
        ->name('boards.columns.store');

    Route::delete('/columns/{column}', ColumnDestroyController::class)
        ->name('columns.destroy');

    Route::post('/columns/{column}/cards', ColumnCardCreateController::class)
        ->name('columns.cards.store');

    Route::put('/columns/{column}/cards/{card}', ColumnCardUpdateController::class)
        ->scopeBindings()->name('columns.cards.update');

    Route::delete('/columns/{column}/cards/{card}', ColumnCardDestroyController::class)
        ->scopeBindings()->name('columns.cards.destroy');

    Route::put('/cards/reorder', CardsReorderUpdateController::class)
        ->name('cards.reorder');

    Route::put('/v1/columns/{fromColumn}/cards/{card}/move/{toColumn}', [CardMoveController::class, 'move'])
        ->scopeBindings()
        ->name('columns.cards.move');
});
