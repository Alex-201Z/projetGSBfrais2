<?php

namespace App\Services;
use App\Models\Frais;
use Illuminate\Support\Facades\Session;
use App\Models\Visiteur;

class VisiteurService
{
    public function signIn($login, $pwd)
    {
        $visiteur = Visiteur::query()->where('login_visiteur', '=', $login)->first();

        if ($visiteur && password_verify($pwd, $visiteur->pwd_visiteur)) {
            Session::put('id_visiteur', $visiteur->id_visiteur);
            session::put('visiteur',"$visiteur->prenom_visiteur $visiteur->nom_visiteur");
            return true;
        }
        return false;
    }
    public function signOut()
    {
        Session::remove('id_visiteur');

    }


}
