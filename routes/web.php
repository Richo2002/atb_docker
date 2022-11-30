<?php

use App\Http\Controllers\AlbumArticleController;
use App\Http\Controllers\AlbumNewsController;
use App\Http\Controllers\MediaController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AlbumController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\ProjectController;


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

Route::get('/', [MainController::class, 'home'])->name('home');

Route::get('/domaines', [MainController::class, 'domain']);

Route::get('/a-propos', [MainController::class, 'aboutUs']);

Route::post('/newsletter', [MainController::class, 'newsletter']);

Route::resource('actualites', NewsController::class)->except([
    'create', 'store'
]);

Route::resource('projects', ProjectController::class);

Route::resource('contacts', ContactController::class)->only([
    'index', 'store'
]);

Route::resource('albums.actualites', AlbumNewsController::class)->only([
    'create', 'store'
])->shallow();

Route::resource('albums', AlbumController::class);

Route::resource('medias', MediaController::class)->only([
    'destroy',
]);




// Route::get('/', function () {
//     return Inertia::render('Welcome', [
//         'canLogin' => Route::has('login'),
//         'canRegister' => Route::has('register'),
//         'laravelVersion' => Application::VERSION,
//         'phpVersion' => PHP_VERSION,
//     ]);
// });

// Route::get('/dashboard', function () {
//     return Inertia::render('Dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__.'/auth.php';
