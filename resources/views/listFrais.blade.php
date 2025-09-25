@extends('Layouts.master')

@section('content')
    <div class="container">
        <h1>Liste des Frais</h1>
    </div>
    <table class="table table-bordered table-striped">
        <thead>
        <tr>
            <th>Mois</th>
            <th>Montant saisi</th>
            <th>Nb justificatifs</th>
            <th>Montant validé</th>
            <th>Etat</th>
            <th>Modifier</th>
        </tr>
        </thead>
        @foreach($fiches as $frais)
            <tr>
                <td>{{$frais->anneemois}}</td>
                <td>{{$frais->montantvalide}}</td>
                <td>{{$frais->nbjustificatifs}}</td>
                <td>{{$frais->montantvalide}}</td>
                <td>{{$frais->id_etat}}</td>
                <td>{{$frais->datemodification}}</td>
            </tr>
        @endforeach
    </table>
@endsection
