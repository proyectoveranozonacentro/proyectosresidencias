@extends('layouts.app')

@section('jumbotron')
    @include('partials.jumbotron', ['title' => 'Administrar estudiantes', 'icon' => 'unlock-alt'])
@endsection

@section('content')
<div class="pl-5 pr-5">


<div class="VueTables VueTables--server">
  <div class="row">

      <div class="table-responsive">


      <table class="VueTables__table table table-striped table-bordered table-hover" style="overflow: hidden;">
        <thead>
          <tr>
            <th id="VueTables_th--id" tabindex="0" class="VueTables__sortable " style="position: relative;">
              <span title="" class="VueTables__heading">Nombre</span>
              <span class="VueTables__sort-icon float-right glyphicon glyphicon-sort "></span>
              <div style="top: 0px; right: 0px; width: 5px; position: absolute; cursor: col-resize; user-select: none; height: 161px;" class="resize-handle"></div>
            </th>
            <th id="VueTables_th--id" tabindex="0" class="VueTables__sortable " style="position: relative;">
              <span title="" class="VueTables__heading">Correo</span>
              <span class="VueTables__sort-icon float-right glyphicon glyphicon-sort "></span>
              <div style="top: 0px; right: 0px; width: 5px; position: absolute; cursor: col-resize; user-select: none; height: 161px;" class="resize-handle"></div>
            </th>
            <th id="VueTables_th--id" tabindex="0" class="VueTables__sortable " style="position: relative;">
              <span title="" class="VueTables__heading">Institucion</span>
              <span class="VueTables__sort-icon float-right glyphicon glyphicon-sort "></span>
              <div style="top: 0px; right: 0px; width: 5px; position: absolute; cursor: col-resize; user-select: none; height: 161px;" class="resize-handle"></div>
            </th>
            <th id="VueTables_th--id" tabindex="0" class="VueTables__sortable " style="position: relative;">
              <span title="" class="VueTables__heading">Campus</span>
              <span class="VueTables__sort-icon float-right glyphicon glyphicon-sort "></span>
              <div style="top: 0px; right: 0px; width: 5px; position: absolute; cursor: col-resize; user-select: none; height: 161px;" class="resize-handle"></div>
            </th>
            <th id="VueTables_th--id" tabindex="0" class="VueTables__sortable " style="position: relative;">
              <span title="" class="VueTables__heading">Promedio</span>
              <span class="VueTables__sort-icon float-right glyphicon glyphicon-sort "></span>
              <div style="top: 0px; right: 0px; width: 5px; position: absolute; cursor: col-resize; user-select: none; height: 161px;" class="resize-handle"></div>
            </th>
            <th id="VueTables_th--id" tabindex="0" class="VueTables__sortable " style="position: relative;">
              <span title="" class="VueTables__heading">Carrera</span>
              <span class="VueTables__sort-icon float-right glyphicon glyphicon-sort "></span>
              <div style="top: 0px; right: 0px; width: 5px; position: absolute; cursor: col-resize; user-select: none; height: 161px;" class="resize-handle"></div>
            </th>
            <th id="VueTables_th--id" tabindex="0" class="VueTables__sortable " style="position: relative;">
              <span title="" class="VueTables__heading">Genero</span>
              <span class="VueTables__sort-icon float-right glyphicon glyphicon-sort "></span>
              <div style="top: 0px; right: 0px; width: 5px; position: absolute; cursor: col-resize; user-select: none; height: 161px;" class="resize-handle"></div>
            </th>
          </tr>
          <!-- Body -->
          <tbody>
            @foreach($students as $stud)
            <tr class="VueTables__row " id="{{$stud->id}}">
              <td tabindex="0" class="">{{$stud->name}}</td>
              <td tabindex="0" class="">{{$stud->email}}</td>
              <td tabindex="0" class="">{{$stud->name_i}}</td>
              <td tabindex="0" class="">{{$stud->name_c}}</td>
              <td tabindex="0" class="">{{$stud->promedio}}</td>
              <td tabindex="0" class="">{{$stud->carrera}}</td>
              <td tabindex="0" class="">{{$stud->genero}}</td>
            </tr>
            @endforeach
          </tbody>
        </table>
        {{$students->links()}}
        </div>
  </div>
  </div>
</div>
@endsection
