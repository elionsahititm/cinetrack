<?php

use Illuminate\Support\Facades\Route;

Route::view('/', 'pages.home')->name('home');
Route::view('/browse', 'pages.browse')->name('browse');
Route::view('/titles/example', 'pages.title-details')->name('titles.show');
Route::view('/watchlist', 'pages.watchlist')->name('watchlist');
Route::view('/roulette', 'pages.roulette')->name('roulette');
Route::view('/dna', 'pages.dna')->name('dna');
Route::view('/profile', 'pages.profile')->name('profile');
Route::view('/admin/catalog', 'pages.admin-catalog')->name('admin.catalog');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::view('dashboard', 'dashboard')->name('dashboard');
});

require __DIR__.'/settings.php';
