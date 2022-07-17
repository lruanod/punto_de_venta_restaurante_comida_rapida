<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">pikanas.com</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <ul class="navbar-nav me-auto mb-2 mb-md-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="/">Home</a>
                </li>
                @if(empty(session('usuario')))
                <li class="nav-item">
                    <a class="nav-link" href="/login">Ingresar</a>
                </li>
                @endif

                @if(!empty(session('usuario')))

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-bs-toggle="dropdown" aria-expanded="true" >Productos</a>
                        <ul class="dropdown-menu" aria-labelledby="dropdown01">
                            <li><a class="dropdown-item" href="{{url('/categorias')}}">Categoría</a></li>
                            <li><a class="dropdown-item" href="{{url('/productos')}}">Productos</a></li>
                            <li><a class="dropdown-item" href="{{url('/ingredientes')}}">Ingredientes</a></li>
                            <li><a class="dropdown-item" href="{{url('/entradas')}}">Entradas</a></li>
                        </ul>
                    </li>
                @endif

                @if(!empty(session('usuario')))

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-bs-toggle="dropdown" aria-expanded="true" >Ventas</a>
                        <ul class="dropdown-menu" aria-labelledby="dropdown01">
                            <li><a class="dropdown-item" href="{{url('/pedidos')}}">Pedidos</a></li>
                            <li><a class="dropdown-item" href="{{url('/pagos')}}">Pagos</a></li>
                        </ul>
                    </li>
                @endif

                @if(!empty(session('usuario')))
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-bs-toggle="dropdown" aria-expanded="true" >{{session('usuario')}}</a>
                        <ul class="dropdown-menu" aria-labelledby="dropdown01">
                            <li><a class="dropdown-item" href="{{url('/actualizarpass')}}">Cambiar contraseña</a></li>
                            <li><a class="dropdown-item" href="{{url('/login')}}">Cerrar sesión</a></li>
                        </ul>
                    </li>
                @endif
                @if(!empty(session('usuario')))
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-bs-toggle="dropdown" aria-expanded="true" >Clientes</a>
                        <ul class="dropdown-menu" aria-labelledby="dropdown01">
                            <li><a class="dropdown-item" href="{{url('/clientes')}}">Clientes</a></li>
                        </ul>
                    </li>
                @endif
                @if(!empty(session('usuario')))
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-bs-toggle="dropdown" aria-expanded="true" >Reportes</a>
                        <ul class="dropdown-menu" aria-labelledby="dropdown01">
                            <li><a class="dropdown-item" href="{{url('/reporteventas')}}">Reportes de ventas</a></li>
                            <li><a class="dropdown-item" href="{{url('/reportestocks')}}">Reportes de stock actual</a></li>
                            <li><a class="dropdown-item" href="{{url('/reporteentradas')}}">Reportes de entradas</a></li>

                        </ul>
                    </li>
                @endif

                @if(!empty(session('usuario')&&session('rol')=='Administrador'))
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-bs-toggle="dropdown" aria-expanded="true" >Usuarios</a>
                        <ul class="dropdown-menu" aria-labelledby="dropdown01">
                            <li><a class="dropdown-item" href="{{url('/usuarios')}}">Usuarios</a></li>
                        </ul>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</nav>
