<?php

namespace App\Http\Controllers;

use App\metier\Manga;
use App\metier\Genre;
use App\metier\Scenariste;
use App\metier\Dessinateur;

use Illuminate\Support\Facades\Input;

use App\Exceptions\MonException;

use Request;

class ControllerMangas extends Controller
{
    public function listerMangas() {
        try {

            $unMangas = new Manga();
            $mesMangas = $unMangas->getListeMangas();

            foreach($mesMangas as $manga) {
                if(!file_exists(public_path() . '/images/' . $manga->couverture)) {
                    $manga->couverture = 'erreur.png';
                }
            }

            return view('vues.listerMangas', compact('mesMangas'));

        } catch (MonException $e) {
            $monErreur = $e->getMessage();
            return view('vues.pageErreur', compact('monErreur'));
        } catch (\Exception $ex) {
            $monErreur = $ex->getMessage();
            return view('vues.pageErreur', compact('monErreur'));
        }
    }
}
