@extends('Layouts.master')
@section('content')
    <form method="post" action="{{ url ('/authentifier') }}">
        {{ csrf_field() }}
        <div class="col-md-12  card-body bg-light">
            <div class="form-group">
                <label class="col-md-3">Identifiant: </label>
                <div class="col-md-6">
                    <input type="text" name="login" value="" class="form-control" placeholder="  "
                           required autofocus>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-3">Mot de Passe: </label>
                <div class="col-md-6">
                    <input type="text" name="pwd" value="" class="form-control" placeholder="  "
                           required autofocus>
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-12 col-md-offset-3">
                    <button type="submit" class="btn btn-primary">
                        Se connecter
                    </button>
                    &nbsp;
                    <button type="button" class="btn btn-secondary"
                            onclick="if (confirm('Annuler la saisie et retourner à la liste ? ')) window.location = '{{ url('/listerEmployes') }}';">
                        Annuler
                    </button>
                </div>
            </div>
        </div>
        </div>
    </form>
    @if(isset($erreur))
        <div class="alert alert-danger" role="alert">{{ $erreur }}</div>
    @endif
@endsection

