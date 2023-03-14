<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MangaController;

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
    return view('home');
});

Route::get('/', function () {
    return view('pageMenu');
});

Route::get('/pageMenu', function () {
    return view('pageMenu');
});

Route::get('/listerMangas', [MangaController::class,'listerMangas']);

Route::get('/ajouterManga', [MangaController::class, 'ajoutManga']);

Route::post('ajoutManga', [MangaController::class, 'postAjouterManga']);

Route::get('/modifierManga/{id}', [MangaController::class, 'modification']);

Route::post('postmodifierManga/{id}',
    array(
        'uses' =>'App\Http\Controllers\MangaController@postmodifierManga',
        'as' => 'postmodifierManga',
    )
);

Route::get('/listerMangasGenre', [MangaController::class, 'listerGenre']);

Route::get('/callMangaAjax/{id}', [GenreController::class, 'listerMangasGenreAjax']);

Route::post('/postAfficherManga',
array(
    'uses' =>'App\Http\Controllers\GenreController@postRechercherGenre',
    'as' => 'postAfficherManga',
     )
);
