<?php

use App\Http\Controllers\FraisHFController;
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

Route::get('/ajouterFrais ', [ FraisController::class, 'addFrais' ]) ->name('ajouterFrais');

Route::get('/editerFrais/{id}', [ FraisController::class, 'editFrais' ]);

Route::post('/validerFrais', [ FraisController::class, 'validFrais' ]);

Route::get('/supprimerFrais/{id}', [ FraisController::class, 'removeFrais' ]);

Route::get('/listerFraisHF/{id} ', [ FraisHFController::class, 'listFraisHF' ]) -> name('listFraisHF');

Route::get('/ajouterFraisHF/{id} ', [ FraisHFController::class, 'addFraisHF' ]);

Route::get('/editerFraisHF/{idHF}', [ FraisHFController::class, 'editFraisHF' ]);

Route::post('/validerFraisHF', [ FraisHFController::class, 'validFraisHF' ]);
