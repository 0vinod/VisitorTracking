<?php
// E:\xampp\htdocs\hnuman\packages\Vinod\VisitorTracking\src\routes\web.php

use Illuminate\Support\Facades\Route;
use Vinod\VisitorTracking\Http\Controllers\AnalyticsController;

Route::middleware(['web'])
    ->prefix('visitor-analytics')
    ->group(function () {
      Route::post('/', [AnalyticsController::class,'dashboard'])->name('visitor.dashboard');
      Route::post('/world-map', [AnalyticsController::class,'worldMap'])->name('visitor.worldmap');
      Route::post('/settings', [AnalyticsController::class,'settings'])->name('visitor.settings');
    });
