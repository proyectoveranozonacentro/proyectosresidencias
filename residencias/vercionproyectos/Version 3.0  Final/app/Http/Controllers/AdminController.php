<?php

namespace App\Http\Controllers;

use App\User;
use App\Course;
use App\Mail\CourseApproved;
use App\Mail\CourseRejected;
use App\VueTables\EloquentVueTables;
use Illuminate\Http\Request;

class AdminController extends Controller
{
	public function courses () {
		return view('admin.courses');
	}

	public function coursesJson () {
		if(request()->ajax()) {
			$vueTables = new EloquentVueTables;
			$data = $vueTables->get(new Course, ['id', 'name', 'status'], ['reviews']);
			return response()->json($data);
		}
		return abort(401);
	}

	public function updateCourseStatus () {
		if (\request()->ajax()) {
			$course = Course::find(\request('courseId'));

			if(
				(int) $course->status !== Course::PUBLISHED &&
				! $course->previous_approved &&
				\request('status') === Course::PUBLISHED
			) {
				$course->previous_approved = true;
				\Mail::to($course->teacher->user)->send(new CourseApproved($course));
			}

			if(
				(int) $course->status !== Course::REJECTED &&
				! $course->previous_rejected &&
				\request('status') === Course::REJECTED
			) {
				$course->previous_rejected = true;
				\Mail::to($course->teacher->user)->send(new CourseRejected($course));
			}

			$course->status = \request('status');
			$course->save();
			return response()->json(['msg' => 'ok']);
		}
		return abort(401);
	}

	public function students () {
		$students = User::select('users.id','users.name','users.email','instituciones.nombre as name_i','campuses.nombre as name_c','users.promedio','users.carrera','users.genero')
		->leftJoin('instituciones', 'instituciones.id','=','users.instituciones_id')
		->leftJoin('campuses', 'campuses.id','=','users.campus_id')
		->where('role_id','=', 3)
		->paginate(20);
		return view('admin.students', compact('students'));
	}

	public function teachers () {
		$teachers = User::select('users.id','users.name','users.email','users.carrera','instituciones.nombre as nom_i','campuses.nombre as nom_c','users.puesto','users.grado_academico','users.genero')
		->leftJoin('instituciones', 'instituciones.id','=','users.instituciones_id')
		->leftJoin('campuses', 'campuses.id','=','users.campus_id')
		->where('role_id','=', 2)
		->paginate(20);
		return view('admin.teachers',compact('teachers'));
	}
}
