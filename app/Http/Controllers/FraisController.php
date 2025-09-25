<?php

namespace App\Http\Controllers;

use App\Models\Etat;
use App\Services\FraisService;
use App\Models\Frais;
use Illuminate\Http\Request;

class FraisController
{
    public function listFrais(){
        $service = new FraisService();
        $id_visiteur = session('id_visiteur');
        $fiches = $service->getListFrais($id_visiteur);
        return view('listFrais',compact('fiches'));
    }
    public function addFrais(){
        $unFrais = new Frais();
        $unFrais -> id_frais = 0;
        $service = new fraisService();
        $Etats = $service->getEtat();
        $titreVue = "L'ajout d'un Frais";
        return view('/formFrais', compact('unFrais','Etats','titreVue'));
    }
  //  public function editFrais($id);
   public function validFrais(Request $request)
   {
       {
           $frais = new Frais();
           $frais->id_visiteur = session('id_visiteur');
           $frais->anneemois = $request->input('mois');
           $frais->nbjustificatifs = $request->input('nbjustif');
           $frais->montantvalide = $request->input('valide');
           $frais->id_etat = $request->input('etat');
           $frais->datemodification = date('Y-m-d');
           $service = new FraisService();
           $service->saveFrais($frais);
           return redirect(url('/listerFrais'));

       }

   }


}
