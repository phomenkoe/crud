<?php

use Illuminate\Support\Facades\Route;

Route::prefix('api')
    ->middleware(['api'])
    ->group(function () {
        Route::resource('task', \Modules\Task\UI\Controllers\TaskController::class, [
            'except' => ['show', 'create']
        ]);
    });
