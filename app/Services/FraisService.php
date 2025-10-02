<?php

namespace App\Services;
use App\Exceptions\UserException;
use App\Models\Etat;
use App\Models\Frais;
use Illuminate\Database\QueryException;
use function Laravel\Prompts\select;

class FraisService
{
    public function getListFrais($id_visiteur)
    {
        try{
        $liste= Frais::query()
            ->select('frais.*','etat.lib_etat')
            ->join('etat','etat.id_etat','=','frais.id_etat')
            ->where('id_visiteur','=',$id_visiteur)
            ->get();
        } catch
        (QueryException $exception) {
            $userMessage = "Impossible d'acceder à la base de données.";
            throw new UserException($userMessage, $exception->getMessage(), $exception->getCode());
        }
        return $liste;

    }
    public function getEtat()
    {
        try{
        $liste= Etat::query()->select()->get();
        } catch
        (QueryException $exception) {
            $userMessage = "Impossible d'acceder à la base de données.";
            throw new UserException($userMessage, $exception->getMessage(), $exception->getCode());
        }
        return $liste;
    }
  //  public function getFrais($id);

  public function saveFrais(Frais $Frais)
  {
      try{
        $Frais->save();
      } catch (QueryException $exception) {
          $userMessage = "Impossible de mettre à jour la base de données.";
          throw new UserException($userMessage, $exception->getMessage(), $exception->getCode());
      }
  }
    public function getFrais($id)
    {
        try{

        $frais = Frais::query()->find($id);
        } catch (QueryException $exception) {
            $userMessage = "Impossible de lire la base de données.";
            throw new UserException($userMessage, $exception->getMessage(), $exception->getCode());
        }
        return $frais;

    }


}
