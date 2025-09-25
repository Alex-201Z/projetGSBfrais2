@extends('Layouts.master')

@section('content')
    <form method="POST" action="{{ url('/validerFrais') }}">
        {{ csrf_field() }}

        <h1>Ajout Fiche de frais</h1>
        <div class="col-md-12 card card-body bg-light">
            <div class="form-group">
                <label class="col-md-3">Mois</label>
                <div class="col-md-6">
                    <input type="text" name="mois" class="form-control" maxlength="7" value="" placeholder="MM-AAAA"
                           required>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-3">Montant saisi</label>
                <div class="col-md-6">
                    <input type="number" name="total" class="form-control " min="0" step="0.01" value="" disabled>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-3">Nb justificatifs</label>
                <div class="col-md-6">
                    <input type="number" name="nbjustif" class="form-control" min="0" value="">
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-3">Montant validé</label>
                <div class="col-md-6">
                    <input type="number" name="valide" class="form-control" min="0" step="0.01" value="">
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-3">Etat</label>
                <div class="col-md-6">
                    <select class="form-select" name="etat">
                        @foreach($Etats as $Etat)
                        <option value="{{$Etat->id_etat}}">
                                    {{$Etat->lib_etat}}
                        </option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-6 col-md-offset-3 col-sm-6 col-sm-offset-3">
                    <button type="submit" class="btn btn-default btn-primary">
                        <span class="glyphicon glyphicon-ok"></span> Valider
                    </button>
                    &nbsp;
                    <button type="button" class="btn btn-default btn-primary"
                            onclick="javascript: window.location = '{{ url('/listerFrais') }}';">
                        <span class="glyphicon glyphicon-remove"></span> Annuler</button>
                </div>
            </div>
            <hr>

        </div>
    </form>

    @if(isset($erreur))
        <div class="alert alert-danger" role="alert">{{ $erreur }}</div>
    @endif
@endsection
