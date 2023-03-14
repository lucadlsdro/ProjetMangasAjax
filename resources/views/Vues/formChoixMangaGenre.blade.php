@extends('layouts.master')
@section('content')
    {!!  Form::open(array('route' => array('postAfficherManga', 'method' => 'post'))) !!}
    <br><br>
                <h1>Liste des Mangas par genre</h1>

                <div class="col-md-4"></div>
                <div class="col-md-4">
                    <select class="form-control" name="cbGenres" id="idGenres" required>
                        <option value="0">Selectionner un genre</option>
                        @foreach($mesGenres as $unG){
                        <option value="{{$unG->id_genre}}">{{$unG->lib_genre}}</option>
                        }
                        @endforeach
                    </select>
                    <br><br>
                </div>

                <div class="form-group">
                    <div class="col-md-6 col-md-offset-3">
                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-9">
                                <input type="button" id="callMangaAjax" value="Affichage Ajax" >
                            </div>
                        </div>
                        &nbsp; &nbsp; &nbsp;
                        <button type="button" class="btn btn-default btn-primary"
                                onclick="{window.location = '{{url('/pageMenu')}}';}">
                            <span class="glyphicon glyphicon-remove"></span> Annuler
                        </button>
                    </div>
                    <br><br>
                </div>
    </div>
    <div id="resultat"></div>
@stop
