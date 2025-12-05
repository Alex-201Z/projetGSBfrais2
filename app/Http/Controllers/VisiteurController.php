<?php

namespace App\Http\Controllers;

use App\Services\VisiteurService;
use Exception;
use Illuminate\Http\Request;

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
}
