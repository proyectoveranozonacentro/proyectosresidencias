<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Campus;

class CampusesController extends Controller
{
    static function selectCampus($id){
        $select = Campus::select('id', 'institucion')
        ->where('instituciones_id','=', $id)
        ->get();
        return response()->json($select);
    }
}
