<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Instituciones;
use App\Campus;

class InstitucionesController extends Controller
{
    static function selectInstituciones(){
        $select = Instituciones::select('instituciones.id', 'instituciones.nombre', 'instituciones.calle', 'instituciones.numero', 'instituciones.cp', 'instituciones.telefono', 'campuses.id as id_camp', 'campuses.nombre as nombre_camp')
        ->join('campuses', 'campuses.instituciones_id', '=', 'instituiones.id')
        ->get();
        return $select;
    }

}
