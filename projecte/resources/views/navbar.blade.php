
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
                <a href="{{url('/')}}"> <img src="{{url('images/logo.png')}}" style="height: 50px; margin-right: 25px"></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarSupportedContent"
                        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{url('/')}}">Inici</a>
            </li>
            @if (Auth::user()->esAdmin())
                @auth
                    <li class="nav-item">
                        <div class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                               data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                Usuaris
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="{{url('/usuaris')}}">Llistat Usuaris</a></li>
                                <li><a class="dropdown-item" href="{{url('/usuaris/create')}}">Afegir Usuari</a></li>
                            </ul>
                        </div>
                    </li>
                @endauth
            @endif

            <li class="nav-item">
                <div class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                       data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        Ong's
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="{{url('/ong')}}">Llistat Ong's</a></li>
                        <li><a class="dropdown-item" href="{{url('/ong/create')}}">Afegir Ong</a></li>
                    </ul>
                </div>
            </li>

            <li class="nav-item">
                <div class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                       data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        Socis
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="{{url('/socis')}}">Socis</a></li>
                        <li><a class="dropdown-item" href="{{url('/socis/create')}}">Alta Soci</a></li>
                    </ul>
                </div>
            </li>

            <li class="nav-item">
                <div class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                       data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        Treballadors
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><h1 class="dropdown-header">Professionals</h1></li>
                        <li><a class="dropdown-item" href="{{ url('/professional') }}">Llistat Profesionals</a></li>
                        <li><a class="dropdown-item" href="{{ url('/professional/create') }}">Afegir Profesional</a></li>
                        <div class="dropdown-divider"></div>
                        <li><h1 class="dropdown-header">Voluntaris</h1></li>
                        <li><a class="dropdown-item" href="{{ url('/voluntari') }}">Llistat Voluntaris</a></li>
                        <li><a class="dropdown-item" href="{{ url('/voluntari/create') }}">Afegir Voluntari</a></li>
                    </ul>
                </div>
            </li>
            
            <li class="nav-item">
                <div class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                       data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->name }}
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">

                        <li><a class="dropdown-item" href="{{url('/usuaris/'.Auth::user()->id.'/edit') }}">Les meves dades</a></li>
                        <li><a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}</a></li>

                    </ul>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>
            </li>
        </ul>
    </div>


