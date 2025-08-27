<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Home');
})->name('home');

Route::get('/collections', function () {
    return Inertia::render('Collections');
})->name('collections');

Route::get('/collections/{collection}', function ($collection) {
    return Inertia::render('CollectionDetail', [
        'collection' => $collection
    ]);
})->name('collection.detail');

Route::get('/about', function () {
    return Inertia::render('About');
})->name('about');

Route::get('/portfolio', function () {
    return Inertia::render('Portfolio');
})->name('portfolio');

Route::get('/contact', function () {
    return Inertia::render('Contact');
})->name('contact');

Route::get('/privacy-policy', function () {
    return Inertia::render('PrivacyPolicy');
})->name('privacy.policy');

Route::get('/terms-of-service', function () {
    return Inertia::render('TermsOfService');
})->name('terms.service');

Route::get('/test', function () {
    return 'Laravel is working!';
});

Route::get('/test-view', function () {
    return view('app', ['page' => ['component' => 'Home', 'props' => [], 'url' => '/', 'version' => '1']]);
});

Route::get('dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__.'/settings.php';
require __DIR__.'/auth.php';
