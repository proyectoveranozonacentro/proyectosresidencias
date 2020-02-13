<li><a class="nav-link" href="{{ route('profile.index') }}">{{ __("Mi perfil") }}</a></li>
<li><a class="nav-link" href="{{ route('courses.subscribed') }}">{{ __("Mis Proyectos") }}</a></li>
<li><a class="nav-link" href="{{ route('courses.create') }}">{{ __("Crear Proyectos") }}</a></li>
@include('partials.navigations.logged')