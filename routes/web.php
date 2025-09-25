<?php
use App\Http\Controllers\VisiteurController;
use Illuminate\Support\Facades\Route;

Route::get('/',  function () {
    return view('home');
});

Route::get('/connecter', [ VisiteurController::class, 'connecter' ]);

Route::get('/deconnexion', [ VisiteurController::class, 'deconnecter' ]);

Route::post('/authentifier', [ VisiteurController::class, 'auth' ]);
