<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;
use Spatie\Sitemap\Sitemap;
use Spatie\Sitemap\Tags\Url;

Route::get('/', [PageController::class, 'home'])->name('home');
Route::get('/about', [PageController::class, 'about'])->name('about');
Route::get('/services', [PageController::class, 'services'])->name('services');
Route::get('/work', [PageController::class, 'work'])->name('work');
Route::get('/skills', [PageController::class, 'skills'])->name('skills');
Route::get('/experience', [PageController::class, 'experience'])->name('experience');
Route::get('/contact', [PageController::class, 'contact'])->name('contact');
Route::post('/contact', [ContactController::class, 'send'])->name('contact.send')->middleware('throttle:5,1');

Route::get('/sitemap.xml', function () {
    return Sitemap::create()
        ->add(Url::create('/')->setPriority(1.0)->setChangeFrequency('weekly'))
        ->add(Url::create('/about')->setPriority(0.8)->setChangeFrequency('monthly'))
        ->add(Url::create('/services')->setPriority(0.9)->setChangeFrequency('monthly'))
        ->add(Url::create('/work')->setPriority(0.8)->setChangeFrequency('monthly'))
        ->add(Url::create('/skills')->setPriority(0.7)->setChangeFrequency('monthly'))
        ->add(Url::create('/experience')->setPriority(0.7)->setChangeFrequency('monthly'))
        ->add(Url::create('/contact')->setPriority(0.6)->setChangeFrequency('yearly'))
        ->toResponse(request());
})->name('sitemap');
