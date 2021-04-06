@section('navbar')
<nav class="navbar navbar-expand-md navbar-light  shadow-sm">
  <div class="container">
    <h3>CursosOnlineEasy-Estudiante</h3>  
    <ul class="navbar-nav ml-auto">
      <!-- Authentication Links -->
      @guest

      @else
      <form class="">
        <div class="d-flex justify-content-center h-100"> 
        <div class="searchbar"> <input class="search_input" type="text" name="search" placeholder="Buscar curso"> 
        <a class="search_icon"><i class="fas fa-search"></i></a> 
        </div> 
      </form>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
          Mis cursos
        </a>
        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <li>
            <div class="dropdown-item" href="#">
              <div class="card card border-warning ">
                <div class="card-header">
                  curso
                </div>
                <div class="card-body">
                  <div class="progress">
                    <div class="progress-bar" role="progressbar" style="width: 50%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">50%</div>
                  </div>
                  <a href="#" class="btn btn-warning btn-sm">Continuar...</a>
                </div>
              </div>
            </div>

          </li>
        </ul>
  
      </li>

      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
          <img src="{{ asset('img/campana.png') }}" alt="campana-notificaciones" style="width: 30px;height:30px;">
        </a>
        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
          <li><a class="dropdown-item" href="">
              notificacion....
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

@section('script')
<script src="{{asset('js/dop.js')}}"></script>
@endsection
