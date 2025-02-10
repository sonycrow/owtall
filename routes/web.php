<?php

use App\Http\Controllers\LocaleController;

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\View;

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
Route::get('/', function () {
    return view('welcome');
});

// Idioma (locale)
Route::get('/lang/{locale}', [LocaleController::class, 'setLanguage'])->name('locale');

/*
|--------------------------------------------------------------------------
| Basic Routes
|--------------------------------------------------------------------------
|
| Aquí entran aquellas routes que no tienen un controlador principal, simplemente
| una plantilla y esta carga componentes individuales.
|
*/
Route::get('/{section}', function ($section) {
    $view = strtolower(trim($section));

    if (View::exists($view)) {
        return view($view);
    }

    abort(404);
});
