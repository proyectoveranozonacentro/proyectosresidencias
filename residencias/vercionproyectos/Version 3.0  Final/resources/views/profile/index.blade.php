@extends('layouts.app')

@section('jumbotron')
    @include('partials.jumbotron', ['title' => 'Configurar tu perfil', 'icon' => 'user-circle'])
@endsection

@push('styles')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">
@endpush

@section('content')
    <div class="pl-5 pr-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        {{ __("Actualiza tus datos") }}
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('profile.update') }}" novalidate>
                            @csrf
                            @method('PUT')


                            <div class="form-group row">
                                    <label for="name" class="col-md-4 col-form-label text-md-right">
                                        {{ __("Nombre Completo") }}
                                    </label>
                                    <div class="col-md-6">
                                        <input
                                            id="name"
                                            type="text"
                                            class="form-control"
                                            name="name"
                                            autofocus
                                    value="{{$tipo[0]->name}}"
                                        />
                                    </div>
                                </div>

                                <div class="form-group row">
                                        <label for="name" class="col-md-4 col-form-label text-md-right">
                                            {{ __("Correo") }}
                                        </label>
                                        <div class="col-md-6">
                                            <input
                                                id="name"
                                                type="email"
                                                class="form-control"
                                                name="name"
                                                autofocus
                                        value="{{$tipo[0]->email}}"
                                            />
                                        </div>
                                    </div>

                            <div class="form-group row">
                                <label for="promedio" class="col-md-4 col-form-label text-md-right" {{$tipo[0]->role_id == 3 ?  " " : "hidden"}}  >
                                    {{ __("Promedio") }}
                                </label>
                                <div class="col-md-6">
                                    <input
                                        id="promedio"
                                        type="number"
                                        class="form-control"
                                        name="promedio"
                                        min="0"
                                        max="100"
                                        {{$tipo[0]->role_id == 3 ?  " " : "hidden"}}
                                        required
                                        autofocus
                                    />
                                </div>
                            </div>


                            <div class="form-group row">
                                <label
                                    for="carrera"
                                    class="col-md-4 col-form-label text-md-right"
                                >
                                    {{ __("Carrera") }}
                                </label>

                                <div class="col-md-6">
                                    <input
                                        id="carrera"
                                        type="text"
                                        class="form-control"
                                        name="carrera"
                                        required
                                    />
                                </div>
                            </div>

                            <div class="form-group row">
                                    <label
                                        for="puesto"
                                        class="col-md-4 col-form-label text-md-right"
                                        {{$tipo[0]->role_id != 3 ?  " " : "hidden"}}
                                    >
                                        {{ __("Puesto") }}
                                    </label>

                                    <div class="col-md-6">
                                        <input
                                            id="puesto"
                                            type="text"
                                            class="form-control"
                                            name="puesto"
                                            {{$tipo[0]->role_id != 3 ?  " " : "hidden"}}
                                            required
                                        />
                                    </div>
                                </div>

                                <div class="form-group row">
                                        <label
                                            for="grado_academico"
                                            class="col-md-4 col-form-label text-md-right"
                                            {{$tipo[0]->role_id != 3 ?  " " : "hidden"}}
                                        >
                                            {{ __("Grado Academico") }}
                                        </label>

                                        <div class="col-md-6">
                                            <select name="grado_academico" class="form-control" id="grado_academico" {{$tipo[0]->role_id != 3 ?  " " : "hidden"}} required>
                                                <option value="" selected disabled>Selecciona tú Grado Academico</option>
                                                <option value="Lic.">Lic.</option>
                                                <option value="Ing.">Ing.</option>
                                                <option value="Dr.">Dr.</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="instituciones_id" class="col-md-4 col-form-label text-md-right">{{ __('Institución') }}</label>
                                    <div class="col-md-6">
                                        <select class="form-control{{ $errors->has('this') ? ' is-invalid' : '' }}" name="instituciones_id" id="instituciones_id" required>
                                            <!-- <option value="isset{{ $institucion[0]->id }}" selected disabled>isset{{ $institucion[0]->nombre }}</option> -->
                                            @foreach ($select as $sel)
                                                <option value="{{ $sel->id }}">{{ $sel->nombre }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="campus_id" class="col-md-4 col-form-label text-md-right">{{ __('Campus') }}</label>

                                    <div class="col-md-6">
                                        <select class="form-control{{ $errors->has('this') ? ' is-invalid' : '' }}" name="campus_id" id="campus_id" required>
                                            <!-- <option value="isset{{ $campus[0]->id }}" selected disabled>isset{{ $campus[0]->nombre }}</option> -->
                                            @foreach ($select as $sel)
                                                <option value="{{ $sel->id_camp }}">{{ $sel->nombre_camp }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="genero" class="col-md-4 col-form-label text-md-right">{{ __('Género') }}</label>

                                    <div class="col-md-6">
                                        <select class="form-control{{ $errors->has('this') ? ' is-invalid' : '' }}" name="genero" id="genero" required>
                                            <!-- <option value="isset{{$tipo[0]->genero}}" selected >isset{{$tipo[0]->genero}}</option> -->
                                            <option value="Masculino">Masculino</option>
                                            <option value="Femenino">Femenino</option>
                                            <option value="-">Prefiero no Responder</option>
                                        </select>
                                    </div>
                                </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __("Actualizar datos") }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                @if( ! $user->teacher)
                    <div class="card">
                        <div class="card-header">
                            {{ __("Convertirme en Investigador/Coordinador de la plataforma") }}
                        </div>
                        <div class="card-body">
                            <form action="{{ route('solicitude.teacher') }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-outline-primary btn-block">
                                    <i class="fa fa-graduation-cap"></i> {{ __("Solicitar") }}
                                </button>
                            </form>
                        </div>
                    </div>
                @else
                    <div class="card">
                        <div class="card-header">
                            {{ __("Administrar los cursos que imparto") }}
                        </div>
                        <div class="card-body">
                            <a href="{{ route('teacher.courses') }}" class="btn btn-secondary btn-block">
                                <i class="fa fa-leanpub"></i> {{ __("Administrar ahora") }}
                            </a>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header">
                            {{ __("Mis estudiantes") }}
                        </div>
                        <div class="card-body">
                            <table
                                class="table table-striped table-bordered nowrap"
                                cellspacing="0"
                                id="students-table"
                            >
                                <thead>
                                    <tr>
                                        <th>{{ __("ID") }}</th>
                                        <th>{{ __("Nombre") }}</th>
                                        <th>{{ __("Email") }}</th>
                                        <th>{{ __("Proyectos") }}</th>
                                        <th>{{ __("Acciones") }}</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                @endif

            </div>
        </div>
    </div>
    @include('partials.modal')
@endsection

@push('scripts')
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script>
        let dt;
        let modal = jQuery("#appModal");
        jQuery(document).ready(function() {
            dt = jQuery("#students-table").DataTable({
                pageLength: 5,
                lengthMenu: [ 5, 10, 25, 50, 75, 100 ],
                processing: true,
                serverSide: true,
                ajax: '{{ route('teacher.students') }}',
                language: {
                    url: "//cdn.datatables.net/plug-ins/1.10.16/i18n/Spanish.json"
                },
                columns: [
                    {data: 'user.id', visible: false},
                    {data: 'user.name'},
                    {data: 'user.email'},
                    {data: 'courses_formatted'},
                    {data: 'actions'}
                ]
            });

            jQuery(document).on("click", '.btnEmail', function (e) {
                e.preventDefault();
                const id = jQuery(this).data('id');
                modal.find('.modal-title').text('{{ __("Enviar mensaje") }}');
                modal.find('#modalAction').text('{{ __("Enviar mensaje") }}').show();
                let $form = $("<form id='studentMessage'></form>");
                $form.append(`<input type="hidden" name="user_id" value="${id}" />`);
                $form.append(`<textarea class="form-control" name="message"></textarea>`);
                modal.find('.modal-body').html($form);
                modal.modal();
            });

            jQuery(document).on("click", "#modalAction", function (e) {
                jQuery.ajax({
                    url: '{{ route('teacher.send_message_to_student') }}',
                    type: 'POST',
                    headers: {
                        'x-csrf-token': $("meta[name=csrf-token]").attr('content')
                    },
                    data: {
                        info: $("#studentMessage").serialize()
                    },
                    success: (res) => {
                        if(res.res) {
                            modal.find('#modalAction').hide();
                            modal.find('.modal-body').html('<div class="alert alert-success">{{ __("Mensaje enviado correctamente") }}</div>');
                        } else {
                            modal.find('.modal-body').html('<div class="alert alert-danger">{{ __("Ha ocurrido un error enviando el correo") }}</div>');
                        }
                    }
                })
            })
        })
    </script>
@endpush
