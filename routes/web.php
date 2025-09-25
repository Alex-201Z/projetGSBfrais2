<?php
use App\Http\Controllers\VisiteurController;
use App\Http\Controllers\FraisController;
use Illuminate\Support\Facades\Route;

Route::get('/',  function () {
    return view('home');
});

Route::get('/connecter', [ VisiteurController::class, 'connecter' ]);

Route::get('/deconnexion', [ VisiteurController::class, 'deconnecter' ]);

Route::post('/authentifier', [ VisiteurController::class, 'auth' ]);

Route::get('/listerFrais ', [ FraisController::class, 'listFrais' ]);

Route::get('/ajouterFrais ', [ FraisController::class, 'addFrais' ]);

Route::get('/editerFrais/{id}', [ FraisController::class, 'editFrais(' ]);

Route::post('/validerFrais', [ FraisController::class, 'validFrais' ]);
