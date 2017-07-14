<nav class="navbar navbar-default" role="navigation">
    <div class="container">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
          <span class="sr-only">Navegação</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
      </div>

      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
          <ul class="nav navbar-nav">
              @if(!empty(Auth::user()) && Auth::user()->tipo == 'usuario')
                <li><a href="{{ url('usuarios') }}">Home</a></li>
              @else
                <li><a href="{{ url('/') }}">Home</a></li>
              @endif

              @if(!empty(Auth::user()) && Auth::user()->tipo == 'admin')
              <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown">Users <b class="caret"></b></a>
                  <ul class="dropdown-menu">
                      <li><a href="{{ url('usuarios') }}">List</a></li>
                      <li><a href="{{ url('usuarios/inserir') }}">New</a></li>
                  </ul>
              </li>
              @endif
              
          </ul>
          
          @if(Auth::check())
          <a href="{{ url('sair') }}" class="btn btn-danger navbar-btn navbar-right">Sign out</a>
          @else
          <a href="{{ url('entrar') }}" class="btn btn-success navbar-btn navbar-right">Login</a>
          @endif
      </div>
    </div>
</nav>