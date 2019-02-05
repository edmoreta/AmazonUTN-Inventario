<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>AmazonUTN</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap-select.min.css') }}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('css/font-awesome.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('css/AdminLTE.min.css') }}">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="{{ asset('css/_all-skins.min.css') }}">
    <link rel="apple-touch-icon" href="{{ asset('img/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" href="{{ asset('img/icono_pagina.png') }}"/>
  </head>
  <body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">

      <header class="main-header">

        <!-- Logo -->
        <a href="#" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini"><b>A</b>MZN</span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg"><b>AmazonUTN</b></span>
        </a>

        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Navegación</span>
          </a>
          <!-- Navbar Right Menu -->
          @auth
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <!-- Messages: style can be found in dropdown.less-->
              
              <!-- User Account: style can be found in dropdown.less -->
              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <i class="fa fa-circle" style="color:green" aria-hidden="true"></i>
                <!-- <small class="">Online</small> -->
                  <span class="hidden-xs">{{ Auth::user()->usu_nombre }}</span>
                </a>
                <ul class="dropdown-menu">
                  <!-- Menu Footer-->
                  <li class="user-footer">
                    
                    <div class="pull-right">
                      <a href="{{ route('logout') }}" onclick="event.preventDefault();
                      document.getElementById('logout-form').submit();" class="btn btn-default btn-flat">Cerrar Sesión</a>
                    </div>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                      @csrf
                    </form>
                  </li>
                </ul>
              </li>

              

            </ul>
                <ul class="nav navbar-nav">
                  <li class="dropdown user user-menu">
            
                   <a href="#" class="dropdown-toggle" data-toggle="dropdown">{{ ('ddd') }}</a> 
                   <ul class="dropdown-menu">
                  <!-- Menu Footer-->
                  <li class="user-footer">
                    
                    <div class="pull-right">
                      <a href="#" onclick="event.preventDefault();
                      document.getElementById('logout-form').submit();" class="btn btn-default btn-flat">Cambiar contraseña</a>
                    </div>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                      @csrf
                    </form>
                  </li>
                </ul>
              </li>

                 
                 
                 
                 
                  </li> 
                </ul>
                  </div>
          @endauth
        </nav>
      </header>
      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->
                    
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
        
            <li class="header"></li>
            
            <li>
              <a href="{{ url('home') }}">
                <span>Inicio</span>
                <small class="label pull-right"><i class="fa fa-home" style="font-size: 18px;"></i></small>
              </a>
            </li>
            <li>
              <a href="{{ url('proveedores') }}">
                <span>Proveedores</span>
                <small class="label pull-right "><i class="fa fa-user" style="font-size: 18px;"></i></small>
              </a>
            </li>
            <li>
              <a href="{{ url('categorias') }}">
                <span>Categorías</span>
                <small class="label pull-right "><i class="fa fa-th" style="font-size: 18px;"></i></small>
              </a>
            </li>
            <li>
              <a href="{{ url('productos') }}">
                <span>Productos</span>
                <small class="label pull-right "><i class="fa fa-folder" style="font-size: 18px;"></i></small>
              </a>
            </li>            
            <li>
            <a href="{{ url('documentos') }}">
                 <span>Inventario</span>
                <small class="label pull-right "><i class="fa fa-pencil-square-o" style="font-size: 18px;"></i></small>
              </a>
            </li>
            <li>
            <a href="{{ url('stock') }}">
                 <span>Stock</span>
                <small class="label pull-right "><i class="fa fa-line-chart" style="font-size: 18px;"></i></small>
              </a>
            </li>
            @role(['administrador','root'])
              <li>
                <a href="{{ url('usuarios') }}">
                  <span>Usuarios</span>
                  <small class="label pull-right "><i class="	fa fa-group" style="font-size: 18px;"></i></small>
                </a>
              </li>
            @endrole            
        
          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>

       <!--Contenido-->
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        
        <!-- Main content -->
        <section class="content">
          
          <div class="row">
            <div class="col-md-12">
              <div class="box">
                <div class="box-header with-border">
                  <h3 class="box-title">Sistema de Inventario</h3>
                  <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                  </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                  	<div class="row">
	                  	<div class="col-md-12">
		                         <!--Contenido-->
                             @yield('contenido')
                              <!--Fin Contenido-->
                              
                           </div>
                        </div>
		                    
                  		</div>
                  	</div><!-- /.row -->
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
      <!--Fin-Contenido-->
      <footer class="main-footer">
        <div class="pull-right hidden-xs">
          <b>Version</b> 1.0
        </div>
        <strong> &copy; 2018 <a href="#">LAREX</a>.</strong> Derechos Reservados.
      </footer>

      
  
    <!-- jQuery 2.1.4 -->
    <script src="{{ asset('js/jQuery-2.1.4.min.js') }}"></script>
    @stack('modals')
    @stack('scripts')  
    <!-- Bootstrap 3.3.5 -->
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('dist/js/bootstrap-select.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('js/app.min.js') }}"></script>



    @yield('script')
    
    
  </body>
</html>
