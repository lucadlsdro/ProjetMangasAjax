@extends('layouts.master')
@section('content')
    <br><br>
<div class="alert-danger" role="alert">
    <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
    <p>  Voici l'erreur :{{ $monErreur }} </p>
</div>
