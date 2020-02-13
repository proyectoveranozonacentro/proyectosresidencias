@extends('layouts.app')

@section('jumbotron')
    @include('partials.jumbotron', [
        "title" => __("Verano de la Ciencia Zona Centro"),
        "icon" => "th"
    ])
@endsection

@section('content')
<div class="pl-5 pr-5">
    <div class="row justify-content-center"><!-- No Borrar este Div -->
    <center><div class="row">
        <div class="col-md-12">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <img class="d-block img-fluid" src="{{ asset('images/LogoVCRC.png') }}" alt="Verano de la ciencia 2019" >
                <!-- Agregar lo que quieras aqui -->
            </div>
            <div class="col-md-2"></div>
        </div>
              
    </div></center>
    </div>
</div>
@endsection
