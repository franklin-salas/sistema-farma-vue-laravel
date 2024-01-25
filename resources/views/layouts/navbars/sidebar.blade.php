<nav class="navbar-default navbar-static-side" role="navigation">
        <div class="sidebar-collapse">
            <ul class="nav metismenu" id="side-menu">
                <li class="nav-header">
                    <div class="dropdown profile-element">
                        <img alt="image" class="rounded-circle" src="{{ asset('assets') }}/img/profile_small.jpg"/>
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <span class="block m-t-xs font-bold">{{ auth()->user()->name }}</span>
                            <span class="text-muted text-xs block">Art Director <b class="caret"></b></span>
                        </a>
                        <ul class="dropdown-menu animated fadeInRight m-t-xs">
                            <li><a class="dropdown-item" href="profile.html">Profile</a></li>
                            <li>
                            <a href="{{ route('logout') }}" class="nav-item dropdown-item" onclick="event.preventDefault();  document.getElementById('logout-form').submit();">Logout</a>
                        </li>
                        </ul>
                    </div>
                    <div class="logo-element">
                        IN+
                    </div>
                </li>
                <li>
                    <a href="{{route('home')}}"><i class="fa fa-th-large"></i> <span class="nav-label">Dashboards</span> </span></a>
                    
                </li>
                <li>
                    <a href="index.html"><i class="fa fa-truck"></i> <span class="nav-label">Movimientos</span> <span
                            class="fa arrow"></span></a>
                    <ul class="nav nav-second-level collapse">
                        <li><a href="{{route('ingreso.index')}}">Ingreso</a></li>
                        <li><a href="{{route('salida.index')}}">Salida</a></li>
                        {{-- <li><a href="dashboard_3.html">Traspaso</a></li> --}}
                    </ul>
                </li>
                <li>
                        <a href=""><i class="fa fa-bank"></i> <span class="nav-label">Inventario</span><span
                        class="fa arrow"></span></a>
                        <ul class="nav nav-second-level collapse">
                            <li><a href="{{route('productos.index')}}">Producto</a></li>
                            <li><a href="{{route('categorias.index')}}">Categoria</a></li>
                            <li><a href="{{route('formas.index')}}">Forma de Presentación</a></li>
                            <li><a href="{{route('farmacos.index')}}">Farmacos</a></li>
                            <li><a href="{{route('tipos.index')}}">Tipo de Producto</a></li>
                            <li><a href="{{route('almacen.index')}}">Almacen</a></li>
                            <li><a href="{{route('lote.index')}}">Lote</a></li>
                        </ul>
                    
                </li>

                <li>
                    <a href=""><i class="fa fa-folder"></i> <span class="nav-label">Administración</span><span
                        class="fa arrow"></span></a>
                    <ul class="nav nav-second-level collapse">
                        <li><a href="{{route('proveedors.index')}}">Proveedores</a></li>
                        <li><a href="{{route('usuario.index')}}">Empleados</a></li>
                        <li><a href="{{route('laboratorios.index')}}">Laboratorios</a></li>
                       
                    </ul>
                </li>

                {{-- <li>
                    <a href="index.html"><i class="fa fa-folder-open"></i> <span class="nav-label">Reporte</span> <span
                            class="fa arrow"></span></a>
                    <ul class="nav nav-second-level collapse">
                        <li><a href="{{route('reporte')}}">Inventario</a></li>
                        <li><a href="">Almacenes</a></li> 
                    </ul>
                </li> --}}


                
            </ul>

    </div>
</nav>