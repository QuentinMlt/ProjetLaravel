<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ChapterController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\FormationController;
use App\Models\Category;
use App\Models\Formation;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', [FormationController::class, 'index'])->name('formationsList');
Route::get('/categories', [CategoryController::class, 'index'])->name('categoriesList');

Route::get('/categories/ajouter',[CategoryController::class, 'add'])->name('categoryAdd')->middleware('auth');
Route::post('/categories/ajouter',[CategoryController::class, 'store'])->name('categoryStore')->middleware('auth');

Route::get('/formations/ajouter',[FormationController::class, 'add'])->name('formationAdd')->middleware('auth');
Route::post('/formations/ajouter',[FormationController::class, 'store'])->name('formationStore')->middleware('auth');

Route::get('/formations/{id}/modifier', [FormationController::class, 'update'])->name('formationUpdate')->middleware('auth');
Route::post('/formations/{id}/modifier', [FormationController::class, 'sendUpdate'])->name('formationSendUpdate')->middleware('auth');
Route::put('/formations/{id}/modifier/image', [FormationController::class, 'sendUpdatePicture'])->name('formationSendUpdatePicture')->middleware('auth');

Route::put('/categories/{id}/modifier', [CategoryController::class, 'update'])->name('categoryUpdate')->middleware('auth');
Route::delete('/categories/{id}/supprimer', [CategoryController::class, 'delete'])->name('categoryDelete')->middleware('auth');

Route::delete('/formations/{id}/supprimer', [FormationController::class, 'delete'])->name('formationDelete')->middleware('auth');

Route::get('/formations/{id}',[FormationController::class, 'details'])->name('formationDetails');

Route::post('/chapitres/{formationId}', [ChapterController::class, 'store'])->name('chapterAdd')->middleware('auth');

Route::delete('/chapitres/{id}', [ChapterController::class, 'delete'])->name('chapterDelete')->middleware('auth');

Route::get('/contact', [ContactController::class, 'contact'])->name('contact');
Route::post('/contact', [ContactController::class, 'send'])->name('sendMail');

require __DIR__.'/auth.php';
