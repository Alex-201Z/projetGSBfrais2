<?php

namespace App\Http\Controllers;

use App\Services\VisiteurService;
use Illuminate\Http\Request;

class VisiteurController extends Controller
{
   public function connecter()
   {
       return view('formLogin');
   }
   public function deconnecter()
   {
       $service = new VisiteurService();
       $service ->signOut();
       return view('home');

   }
   public function auth(Request $request)
   {
       $login = $request->input('login');
       $pwd = $request->input('pwd');

       $service = new VisiteurService();
       if ($service->signIn($login,$pwd)){
           return redirect(url('/'));
       } else {
           $erreur = "Login ou mot de passe incorrect";
           return view('/formLogin',compact('erreur'));
       }
   }
}
