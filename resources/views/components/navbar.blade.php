<header class="header-area header-sticky">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav class="main-nav">
                    <!-- ***** Logo Start ***** -->
                    <a href="#" class="logo">
                        <img src="{{URL::asset('images/logomcjobs3.png')}}" alt="MC-JOBS">
                    </a>
                    <!-- ***** Logo End ***** -->
                    <!-- ***** Menu Start ***** -->
                    <ul class="nav">
                        <li><a href="/">Inicio</a></li>
                        <li><a href="/vacante">Vacantes</a></li>
                        @if (Route::has('login'))
                            @auth
                                <li><a href="/empresa">Empresas</a></li>
                                <li><a href="/empleado">Empleados</a></li>
                                <li><a href="/departamento">Departamentos</a></li>
                                <li>
                                    <form action="{{ route('logout') }}" method="POST">
                                        @csrf
                                        <x-jet-dropdown-link href="{{ route('logout') }}"
                                        onclick="event.preventDefault(); this.closest('form').submit();">
                                            {{ __('Log Out') }}
                                        </x-jet-dropdown-link>
                                    </form>
                                </li>
                            @else
                                <li><a href="{{ route('login') }}">Login</a></li>
                                @if (Route::has('register'))
                                    <li><a href="{{ route('register') }}">Registrarse</a></li>
                                @endif
                            @endauth
                        @endif
                        <!-- <li><a href="">Contacto</a></li> -->
                    </ul>   
                    <a class="menu-trigger">
                        <span>Menu</span>
                    </a>
                    <!-- ***** Menu End ***** -->
                </nav>
            </div>
        </div>
    </div>
</header>