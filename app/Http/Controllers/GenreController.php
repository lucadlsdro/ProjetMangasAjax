<?php

namespace App\Http\Controllers;

use App\Exceptions\MonException;
use Request;
use Illuminate\Support\Facades\Input;
use App\dao\ServiceDessinateur;
use App\dao\ServiceGenre;
use App\DAO\ServiceManga;
use App\dao\ServiceScenariste;
use App\metier\Manga;
use App\metier\Genre;
use App\metier\Scenariste;
use App\metier\Dessinateur;

class GenreController extends Controller
{
    public function postRechercherGenre() {
        try {
            $unManga = new serviceManga();
            $idGenre = Request::input('cbGenres');
            $mesMangas = $unManga->getListeMangasGenre($idGenre);
            foreach ($mesMangas as $manga) {
                $chemin = 'assets\\images\\' .  $manga->couverture;
                if (!file_exists($chemin)) {
                    $manga->couverture = 'assets\\images\\' . 'erreur.png';
                } else
                    $manga->couverture = $chemin;
            }
            return view('Vues/pageMangaGenre', compact('mesMangas'));
        } catch (MonException $e) {
            $monErreur = $e->getMessage();
            return view('Vues/pageErreur', compact('monErreur'));
        } catch (\Exception $ex) {
            $monErreur = $ex->getMessage();
            return view('Vues/pageErreur', compact('monErreur'));
        }
    }

    public function listerMangaGenreAjax($id){
        try {
            $unServiceManga = new serviceMangas();
            $rep= $unServiceManga->getListeMangasGenreAjax($id);
            return $rep;
        }catch (MonException $e) {
            $monErreur = $e->getMessage();
            return view('vues/pageErreur', compact('monErreur'));
        } catch (\Exception $ex) {
            $monErreur = $ex->getMessage();
            return view('vues/pageErreur', compact('monErreur'));
        }
    }
}
