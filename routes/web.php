<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FormController;

Route::get('/', function () {
    return redirect('/form/create'); 
});
Route::get('/form/create', [FormController::class, 'createForm1'])->name('form.create');
Route::post('/form/create', [FormController::class, 'storeForm1'])->name('form.store');

Route::get('/input/create', [FormController::class, 'createForm2'])->name('input.create');
Route::post('/input/create', [FormController::class, 'storeForm2'])->name('input.store');

Route::get('/form/{id}/generate', [FormController::class, 'generateForm'])->name('form.generate');

Route::post('/form/{id}/submit', [FormController::class, 'handleGeneratedForm'])->name('form.submit');
