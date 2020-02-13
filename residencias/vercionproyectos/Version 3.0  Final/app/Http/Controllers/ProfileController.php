<?php

namespace App\Http\Controllers;

use App\Rules\StrengthPassword;
use App\User;
use App\Campus;
use App\Instituciones;

class ProfileController extends Controller
{
    public function index () {
    		$user = auth()->user()->load('socialAccount');
    		$tipo = User::select('id', 'role_id', 'name','email','instituciones_id','campus_id', 'genero')
    		->where('id', '=', auth()->user()->id)
    		->get();
        $institucion = Instituciones::select('instituciones.id', 'instituciones.nombre')
        ->join('users', 'users.instituciones_id','=','instituciones.id')
        ->get();
        $campus = Campus::select('campuses.id', 'campuses.nombre')
        ->join('users', 'users.campus_id','=','campuses.id')
        ->get();
        $select = Instituciones::select('instituciones.id', 'instituciones.nombre', 'instituciones.calle', 'instituciones.numero', 'instituciones.cp', 'instituciones.telefono', 'campuses.id as id_camp', 'campuses.nombre as nombre_camp')
      	->join('campuses', 'campuses.institucion_id', '=', 'instituciones.id')
      	->get();
        	return view('profile.index', compact('user', 'tipo','select', 'institucion', 'campus'));
    }

    public function update () {
      		$this->validate(request(), [
      			'password' => ['confirmed', new StrengthPassword]
      		]);

      		$user = auth()->user();
      		// $user->password = bcrypt(request('password'));
      		$user->promedio = request( 'promedio' );
      		$user->carrera = request( 'carrera' );
      		$user->puesto = request( 'puesto' );
          $user->instituciones_id = request( 'instituciones_id' );
          $user->campus_id = request( 'campus_id' );
          $user->genero = request( 'genero' );
      		$user->grado_academico = request( 'grado_academico' );
      		$user->save();
	    return back()->with('message', ['success', __("Usuario actualizado correctamente")]);
    }
}
