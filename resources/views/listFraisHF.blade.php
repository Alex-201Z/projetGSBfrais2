@extends('Layouts.master')

@section('content')
    <div class="container">
        <h1>Liste des Frais Hors Forfait</h1>
    </div>
    <table class="table table-bordered table-striped">
        <thead>
        <tr>
            <th>Date</th>
            <th>Libellé</th>
            <th>Montant</th>
            <th>Modifier</th>
            <th>Supprime</th>
        </tr>
        </thead>
        @foreach($ficheHF as $fichesHF)
            <tr>
                <td>{{$fichesHF->date_fraishorsforfait}}</td>
                <td>{{$fichesHF->lib_fraishorsforfait}}</td>
                <td>{{$fichesHF->montant_fraishorsforfait}}</td>
                <td><a href="{{ url("/editerFrais/".$fichesHF->id_frais) }}"><i class="bi bi-pen-fill"></i></a></td>
                <td><a href="{{ url("/editerFrais/".$fichesHF->id_frais) }}"><i class="bi bi-trash "></i></a></td>
            </tr>
        @endforeach
        <thead>
        <tr>
            <th colspan="2">Montant Total</th>
            <td colspan="3">{{$montanttotal}}</td>

        </tr>
        </thead>

    </table>
@endsection
