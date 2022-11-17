<header class="header-area header-sticky">
    <section id="barra" class="inner-width">
        <!-- ***** Logo Start ***** -->
        <a href="/" class="logo">
            <img src="{{URL::asset('images/logomcjobs3.png')}}" alt="MC-JOBS">
        </a>
        <i class="menu-toggle-btn fas fa-bars"></i>
        <!-- ***** Menu Start ***** -->
        <nav class="navigation-menu">
            <a href="/"><i class="fas fa-home home"></i> Inicio</a>
            <a href="/vacante"><i class="fas fa-suitcase works"></i> Vacantes</a>
            @if (Route::has('login'))
                @auth
                    <a href="/empresa"><i class="fas fa-building contact"></i> Empresas</a>
                    <a href="/empleado"><i class="fas fa-users about"></i> Empleados</a>
                    <a href="/departamento"><i class="fas fa-user-tag contact"></i> Departamentos</a>
                    <!-- <a href="/solicitude"><i class="fas fa-folder"></i> Solicitudes</a> -->
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <x-jet-dropdown-link href="{{ route('logout') }}"
                        onclick="event.preventDefault(); this.closest('form').submit();">
                            {{ __('Log Out') }}
                        </x-jet-dropdown-link>
                    </form>
                @else
                    <a href="{{ route('login') }}"><i class="fas fa-sign-in-alt"></i> Login</a>
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}"><i class="fas fa-user-plus"></i> Register</a>
                    @endif
                @endauth
            @endif
        </nav>
    </section>
</header>