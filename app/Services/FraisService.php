<?php

namespace App\Services;
use App\Models\Etat;
use App\Models\Frais;
use function Laravel\Prompts\select;

class FraisService
{
    public function getListFrais($id_visiteur)
    {
        $liste= Frais::query()->where('id_visiteur','=',$id_visiteur)->get();
        return $liste;

    }
    public function getEtat()
    {
        $liste= Etat::query()->select()->get();
        return $liste;
    }
  //  public function getFrais($id);

  public function saveFrais(Frais $Frais)
  {
        $Frais->save();
  }


}
