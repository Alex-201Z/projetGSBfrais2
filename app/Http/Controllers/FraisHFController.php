<?php

namespace App\Http\Controllers;

use App\Services\FraisService;
use App\Services\FraisHFService;
use Exception;
use Illuminate\Http\Request;

class FraisHFController extends Controller
{
    public function listFraisHF($id)
    {
        try {

            $service = new FraisService();
            $serviceHF = new FraisHFService();
            $fiche = $service->getFrais($id);
            $ficheHF = $serviceHF->getListFraisHF($id);
            $montanttotal = $serviceHF->getTotalHF($id);
            return view('listFraisHF', compact('fiche', 'montanttotal', 'ficheHF'));

        } catch (Exception $exception) {
            return view("error", compact('exception'));

        }
    }

    public function addFraisHF($id)
    {
        try {

        } catch (Exception $exception) {

        }
    }

    public function editFrais($idHF)
    {
        try {

        } catch (Exception $exception) {

        }
    }

    public function validFraisHF(Request $request)
    {
        try{

        } catch (Exception $exception) {

}

    }

}

