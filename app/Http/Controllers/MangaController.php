<?php

namespace App\Http\Controllers;

use App\dao\ServiceDessinateur;
use App\dao\ServiceGenre;
use App\DAO\ServiceManga;
use App\dao\ServiceScenariste;
use App\metier\Manga;
use App\metier\Genre;
use App\metier\Scenariste;
use App\metier\Dessinateur;

use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Input;

use App\Exceptions\MonException;

use Request;

class MangaController extends Controller
{
    public function listerMangas() {
        try {

            $unMangas = new ServiceManga();
            $mesMangas = $unMangas->getListeMangas();

            /*foreach($mesMangas as $manga) {
                if(!file_exists(public_path() . '/images/' . $manga->couverture)) {
                    $manga->couverture = 'erreur.png';
                }
            }
*/
            return view('vues.listerMangas', compact('mesMangas'));

        } catch (MonException $e) {
            $monErreur = $e->getMessage();
            return view('Vues/pageErreur', compact('monErreur'));
        } catch (\Exception $ex) {
            $monErreur = $ex->getMessage();
            return view('Vues/pageErreur', compact('monErreur'));
        }
    }

    public function ajoutManga() {
        try {
            $unGenre = new ServiceGenre();
            $mesGenres = $unGenre->getListeGenres();
            $unScenariste = new ServiceScenariste();
            $mesScenaristes = $unScenariste->getListeScenaristes();
            $unDessinateur = new ServiceDessinateur();
            $mesDessinateurs = $unDessinateur->getListeDessinateur();
                return view('vues.formMangaAjout', compact('mesGenres', 'mesScenaristes', 'mesDessinateurs'));
        } catch (MonException $e) {
            $monErreur = $e->getMessage();
            return view('vues.pageErreur', compact('monErreur'));
        } catch (\Exception $ex) {
            $monErreur = $ex->getMessage();
            return view('vues.pageErreur', compact('monErreur'));
        }
    }

    public function postAjouterManga() {

        try {
            $code_d = Request::input('cbDessinateur');
            $prix = Request::input('prix');
            $id_scenariste = Request::input('cbScenariste');
            $titre = Request::input('titre');
            $couverture = Request::file('couverture');
            $code_ge = Request::input('cbGenres');
            if (isset($couverture)) {
                $imageName = $couverture->getClientOriginalName();
                Request::file('couverture')->move(public_path() . '/assets/images/', $imageName);
            } else {
                $imageName = 'erreur.png';
            }
            $unManga = new ServiceManga();
            $unManga->ajoutManga($code_d, $prix, $titre, $imageName, $code_ge, $id_scenariste);
            return view('pageMenu');

        } catch (MonException $e) {
            $monErreur = $e->getMessage();
            return view('Vues/pageErreur', compact('monErreur'));
        } catch (\Exception $ex) {
            $monErreur = 'Taille maximum dépassé !';
            return view('Vues/pageErreur', compact('monErreur'));
        }
    }

    public function modification($id)
    {
        try {
            $unServiceManga = new ServiceManga();
            $unManga = $unServiceManga->getManga($id);
            $unServiceGenre = new ServiceGenre();
            $mesGenres = $unServiceGenre->getListeGenres();

            $unServiceScenariste = new ServiceScenariste();
            $mesScenaristes = $unServiceScenariste->getListeScenaristes();

            $unServiceDessinateur = new ServiceDessinateur();
            $mesDessinateurs = $unServiceDessinateur->getListeDessinateur();

            return view('Vues/formModifmanga', compact('unManga', 'mesGenres', 'mesScenaristes', 'mesDessinateurs'));
        }
        catch (MonException $e)
        {
            $monErreur = $e->getMessage();
            return view('Vues/pageErreur', compact('monErreur'));
        }
        catch (\Exception $ex)
        {
            $monErreur = $ex->getMessage();
            return view('vues/pageErreur', compact('monErreur'));
        }
    }

    public function postmodifierManga($id = null)
    {
        try {
            $code = $id;
            $code_d = Request::input('cbDessinateur');
            $prix = Request::input('prix');
            $id_scenariste = Request::input('cbScenariste');
            $titre = Request::input('titre');
            $couverture = Request::input('couverture');
            $code_ge = Request::input('cbGenres');

            $unServiceManga = new ServiceManga();
            $unServiceManga->modificationManga($code, $code_d, $prix, $titre, $couverture, $code_ge, $id_scenariste);
            $mesMangas = $unServiceManga->getListeMangas();
            return view('Vues/listerMangas', compact('mesMangas'));
        }
        catch (MonException $e)
        {
            $monErreur = $e->getMessage();
            return view('Vues/pageErreur', compact('monErreur'));
        }
        catch (\Exception $ex)
        {
            $monErreur = $ex->getMessage();
            return view('Vues/pageErreur', compact('monErreur'));
        }
    }

    public function listerGenre()
    {
        try {
        $unGenre = new ServiceGenre();
        $mesGenres = $unGenre->getListeGenres();
    } catch (MonException $e) {
        $monErreur = $e->getMessage();
        return view('Vues/pageErreur', compact('monErreur'));
} catch (\Exception $ex) {
            $monErreur = $ex->getMessage();
            return view('Vues/pageErreur', compact('monErreur'));
        }
        return view('Vues/formChoixMangaGenre', compact('mesGenres'));
    }
}
