<?php

namespace App\Http\Controllers;

use App\Models\Etat;
use App\Services\FraisService;
use App\Models\Frais;
use Exception;
use Illuminate\Http\Request;

class FraisController
{
    public function listFrais()
    {
        try {
        $service = new FraisService();
        $id_visiteur = session('id_visiteur');
        $fiches = $service->getListFrais($id_visiteur);
        return view('listFrais', compact('fiches'));
        } catch (Exception $exception) {
            return view("error", compact('exception'));
        }
    }


    public function addFrais()
    {
        try {
        $frais = new Frais();
        $frais->anneemois = date("Y-m");
        $unFrais = new Frais();
        $unFrais->id_frais = 0;
        $service = new fraisService();
        $Etats = [new Etat()];
        $Etats[0]->lib_etat = "Création en cours";
        $titreVue = "L'ajout d'un Frais";
        return view('/formFrais', compact('unFrais', 'Etats', 'titreVue', 'frais'));
        } catch (Exception $exception) {
            return view("error", compact('exception'));
        }
    }

    //  public function editFrais($id);
    public function validFrais(Request $request)
    {
        try {
            $id = $request->get('id');

            if ($id) {
                $service = new FraisService();
                $frais = $service->getFrais($id);
                $frais->id_etat = $request->input('etat');
            } else {
                $frais = new Frais();
                $frais->id_etat = 2;
            }
            $frais->id_visiteur = session('id_visiteur');
            $frais->anneemois = $request->input('mois');
            $frais->nbjustificatifs = $request->input('nbjustif');
            $frais->montantvalide = $request->input('valide');

            $frais->datemodification = date('Y-m-d');

            $service = new FraisService();
            $service->saveFrais($frais);

            return redirect(url('/listerFrais'));

        } catch (Exception $exception) {
            return view("error", compact('exception'));
        }
   }

   public function editFrais($id){
        try {
           $service = new FraisService();
           $frais = $service->getFrais($id);
           $Etats = $service->getEtat();
           return view('formFrais',compact('frais','Etats'));
        } catch (Exception $exception) {
            return view("error", compact('exception'));
        }
   }


}
