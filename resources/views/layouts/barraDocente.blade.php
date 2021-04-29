
@section('navbar')
<nav class="navbar navbar-expand-md navbar-light  shadow-sm">
  <div class="container">

    
    <a class="nav-link" href="{{url('docente')}}"><h3>CursosOnlineEasy-Docente</h3></a>
    <ul class="navbar-nav ml-auto">
      <!-- Authentication Links -->
      @guest

      @else
      <li class="nav-item">
      <li class="nav-item">
      <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#ModalCurso">
  Crear un nuevo curso 
</button>
      </li>

      <li class="nav-item">
      <a class="nav-link" href="{{url('docente')}}">Ver Cursos</a>
      </li>




      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
          <img src="{{ asset('img/charlando.png') }}" alt="campana-notificaciones" style="width: 30px;height:30px;">
        </a>
        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
          <li><a class="dropdown-item" href="">
              MENSAJES....
            </a>
          </li>
        </ul>
      </li>



      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
          {{ Auth::user()->nombre}}
        </a>
        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
          <li><a class="dropdown-item " href="{{url('mi-perfil') }}">Mi perfil</a>
          </li>
          <li><a class="dropdown-item" href="{{ url('logout') }}">
              Cerrar sesión
            </a>
            <form id="logout-form" action="{{ url('logout') }}" method="POST" class="d-none">
              @csrf
            </form>
          </li>
        </ul>
      </li>
      @endguest
    </ul>
  </div>
  </div>
</nav>
@endsection