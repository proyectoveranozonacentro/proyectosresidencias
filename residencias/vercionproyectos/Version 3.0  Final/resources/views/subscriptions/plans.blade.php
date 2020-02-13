@extends('layouts.app')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/pricing.css') }}">
@endpush

@section('jumbotron')
    @include('partials.jumbotron', [
        'title' => __("Unete al proyecto"),
        'icon' => 'globe'
    ])
@endsection

@section('content')
    <div class="container">
            <div class="card text-center">
             <div class="card-header">
                
             </div>
               <div class="card-body">
                 <h5 class="card-title">Esta seguro de acceder a este curso</h5>
                 <p class="card-text"></p>
                 <a href="" class="btn btn-primary">Aceptar</a>
              </div>
               <div class="card-footer text-muted">
                 Verano de la ciencia
                 </div>
              </div>
    </div>
@endsection
