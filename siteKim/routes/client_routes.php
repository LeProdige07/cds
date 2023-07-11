<?php

use Illuminate\Routing\Route;

Route::get('/services', [App\Http\Controllers\ClientController::class, 'services']);