<?php

namespace App\Http\Controllers;

use App\Models\Visiteur;
use App\Services\VisiteurService;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class VisiteurController extends Controller
{
   public function connecter()
   {
       try{
       return view('formLogin');
       } catch (Exception $exception) {
           return view("error", compact('exception'));
       }
   }
   public function deconnecter()
   {
       try{
       $service = new VisiteurService();
       $service ->signOut();
       return view('home');

       } catch (Exception $exception) {
           return view("error", compact('exception'));
       }
   }
   public function auth(Request $request)
   {
       try{
       $login = $request->input('login');
       $pwd = $request->input('pwd');

       $service = new VisiteurService();
       if ($service->signIn($login,$pwd)){
           return redirect(url('/'));
       } else {
           $erreur = "Login ou mot de passe incorrect";
           return view('/formLogin',compact('erreur'));
       }
       } catch (Exception $exception) {
           return view("error", compact('exception'));
       }
   }
    public function initPasswordAPI(Request $request)
    {
        try {
            $request->validate(['pwd_visiteur' => 'required|min:3']);

            $hash = bcrypt($request->json('pwd_visiteur'));

            Visiteur::query()->update(['pwd_visiteur' => $hash]);

            return response()->json(['status' => 'mots de passe réinitialisés']);
        } catch (Exception $exception) {
            return response()->json(['error' => $exception->getMessage()], 500);
        }
    }
    public function authAPI(Request $request)
    {
        try {
            // Validation des champs requis
            $request->validate([
                'login' => 'required',
                'pwd' => 'required'
            ]);

            // Récupération des données JSON
            $login = $request->json('login');
            $pwd = $request->json('pwd');

            // Préparation des identifiants pour la tentative d'authentification
            $identifiants = [
                'login_visiteur' => $login,
                'password' => $pwd
            ];

            // Tentative d'authentification
            if (! Auth::attempt($identifiants)) {
                // Échec de l'authentification
                return response()->json(['error' => 'Identifiants incorrects'], 401);
            }

            // Récupération de l'objet utilisateur authentifié
            $visiteur = $request->user();

            // Création du token Sanctum
            $token = $visiteur->createToken('authToken')->plainTextToken;

            // Retourne le token et les informations de l'utilisateur
            return response()->json([
                'token' => $token,
                'token_type' => 'Bearer',
                'visiteur' => [
                    'id_visiteur' => $visiteur->id_visiteur,
                    'nom_visiteur' => $visiteur->nom_visiteur,
                    'prenom_visiteur' => $visiteur->prenom_visiteur,
                    'type_visiteur' => $visiteur->type_visiteur
                ]
            ]);
        } catch (Exception $exception) {
            // Gestion des erreurs générales
            return response()->json(['error' => $exception->getMessage()], 500);
        }
    }
    public function logoutAPI(Request $request)
    {
        try {
            $request->user()->tokens()->delete();
            return response()->json(['status' => 'utilisateur deconnecté']);

        } catch (Exception $exception) {
            return response()->json(['error' => $exception->getMessage()], 500);

        }
    }
    public function unauthorizedAPI()
    {
        return response()->json(['error' => 'accès non autorisé'], 401);
    }
}
