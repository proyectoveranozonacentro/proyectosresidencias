<div class="col-2">
        @can('opt_for_course', $course)
                <a class="btn btn-subscribe btn-bottom btn-block" href="{{ route('courses.inscribe', ['slug' => $course->slug]) }}">
                    <i class="fa fa-bolt"></i> {{ __("Inscribirme") }}
                </a>

        @else
            <a class="btn btn-subscribe btn-bottom btn-block" href="#">
                <i class="fa fa-user"></i> {{ __("Soy investigador") }}
            </a>
        @endcan

       

</div>
