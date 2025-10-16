<?php

namespace App\Services;

use App\Exceptions\UserException;
use App\Models\FraisHF;
use Illuminate\Database\QueryException;

class FraisHFService
{
    public function getListFraisHF($id_visiteur)
    {
        try{
            $liste= FraisHF::query()
                ->select('fraishorsforfait.*','date_fraishorsforfait','montant_fraishorsforfait','lib_fraishorsforfait')
                ->join('frais','frais.id_frais','=','fraishorsforfait.id_frais')
                ->where('id_visiteur','=',$id_visiteur)
                ->get();
        } catch
        (QueryException $exception) {
            $userMessage = "Impossible d'acceder à la base de données.";
            throw new UserException($userMessage, $exception->getMessage(), $exception->getCode());
        }
        return $liste;


    }
    public function getFraisHF($idHF)
    {

    }
    public function saveFraisHF(FraisHF $fraisHF)
    {

    }
    public function deleteFraisHF($idHF)
    {

    }
    public function getTotalHF($id)
    {
       $total= FraisHF::query()->where('id_frais','=',$id)->sum('montant_fraishorsforfait');
        return $total;

    }


}
