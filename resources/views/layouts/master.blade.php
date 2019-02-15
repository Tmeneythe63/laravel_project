<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

<title>{{ config('app.name', 'Laravel') }}</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="{{ asset('bower_components/bootstrap/dist/css/bootstrap.min.css') }}">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('bower_components/font-awesome/css/font-awesome.min.css') }}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="{{ asset('bower_components/Ionicons/css/ionicons.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('dist/css/AdminLTE.min.css') }}">
  <!-- AdminLTE Skins. We have chosen the skin-blue for this starter
        page. However, you can choose any other skin. Make sure you
        apply the skin class to the body tag so the changes take effect. -->
  <link rel="stylesheet" href="{{ asset('dist/css/skins/skin-blue.min.css') }}">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<!--
BODY TAG OPTIONS:
=================
Apply one or more of the following classes to get the
desired effect
|---------------------------------------------------------|
| SKINS         | skin-blue                               |
|               | skin-black                              |
|               | skin-purple                             |
|               | skin-yellow                             |
|               | skin-red                                |
|               | skin-green                              |
|---------------------------------------------------------|
|LAYOUT OPTIONS | fixed                                   |
|               | layout-boxed                            |
|               | layout-top-nav                          |
|               | sidebar-collapse                        |
|               | sidebar-mini                            |
|---------------------------------------------------------|
-->
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <!-- Main Header -->
  <header class="main-header">

    <!-- Logo -->
    <a href="/home" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>L</b>Sh</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Lab</b>Share</span>
    </a>

    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top" role="navigation">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          

          <!-- Notifications Menu -->
          <li class="dropdown notifications-menu">
            <!-- Menu toggle button -->
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-bell-o"></i>
              <span class="label label-warning">10</span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">You have 10 notifications</li>
              <li>
                <!-- Inner Menu: contains the notifications -->
                <ul class="menu">
                  <li><!-- start notification -->
                    <a href="#">
                      <i class="fa fa-users text-aqua"></i> 5 new members joined today
                    </a>
                  </li>
                  <!-- end notification -->
                </ul>
              </li>
              <li class="footer"><a href="#">View all</a></li>
            </ul>
          </li>
         
          <!-- User Account Menu -->
          <li class="dropdown user user-menu">
            <!-- Menu Toggle Button -->
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <!-- The user image in the navbar-->
              <img src="{{asset(Auth::user()->profile->avatar)}}" class="user-image" alt="User Image">
              <!-- hidden-xs hides the username on small devices so only the image appears. -->
              <span class="hidden-xs">{{Auth::user()->name}}</span>
            </a>
            <ul class="dropdown-menu">
              <!-- The user image in the menu -->
              <li class="user-header">
                <img src="{{asset(Auth::user()->profile->avatar)}}" class="img-circle" alt="User Image">

                <p>
                {{Auth::user()->name}} - @if(Auth::user()->admin) Admin du System @else Utilisateur @endif
                  <small>{{Auth::user()->profile->about}}</small>
                </p>
              </li>
              <!-- Menu Body -->
              @if(Auth::user()->admin)

              @else
              @if(Auth::user()->aproved)
              <li class="user-body">
                <div class="row">
                  <div class="col-xs-4 text-center">
                    <a href="#">Respons</a>
                  </div>
                  <div class="col-xs-4 text-center">
                    <a href="/offre/showoffre/{{Auth::user()->id}}">Offres</a>
                  </div>
                  <div class="col-xs-4 text-center">
                    <a href="/produit">Produits</a>
                  </div>
                </div>
                <!-- /.row -->
              </li>
              @endif
            @endif
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="{{ route('profile.index') }}" class="btn btn-default btn-flat"><i class="fa fa-user"></i> Profile</a>
                </div>
                <div class="pull-right">
                  

                  <a href="{{ route('logout') }}" class="btn btn-default btn-flat"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                           <i class="fa fa-power-off"></i> Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>

                </div>
              </li>
            </ul>
          </li>
          
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

      
      

      <!-- Sidebar Menu -->
      <ul class="sidebar-menu" data-widget="tree">
         @guest
                           <!--  <li><a href="{{ route('login') }}">Login</a></li>
                            <li><a href="{{ route('register') }}">Register</a></li>
                       -->
                       
         @else
 
            @if(Auth::user()->admin)
            
                <!-- Optionally, you can add icons to the links -->
                <li class=""><a href="/home"><i class="fa fa-tachometer "></i> <span>Dashbord</span></a></li>
                <li class=""><a href="/users"><i class="fa fa-users"></i> <span>Users</span></a></li>


                <li class="treeview">
                <a href="#"><i class="fa fa-flask"></i> <span>Labos</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="/labos/create"><i class="fa fa-plus"></i>Create</a></li>
                    <li><a href="/labos"><i class="fa fa-cogs "></i>Manage Labos</a></li>
                </ul>
                </li>
                <li class="treeview">
                <a href="#"><i class="fa fa-bank"></i> <span>Magasins</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="/magasins/create"><i class="fa fa-plus"></i>Create</a></li>
                    <li><a href="/magasins"><i class="fa fa-cogs "></i>Manage Magasins</a></li>
                </ul>
                </li>
                <li class="treeview">
                <a href="#"><i class="fa fa-tags"></i> <span>Categories</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="/categories/create"><i class="fa fa-plus"></i>Create</a></li>
                    <li><a href="/categories"><i class="fa fa-cogs "></i>Manage Categories</a></li>
                </ul>
                </li>
                <li class=""><a href="#"><i class="fa fa-commenting"></i> <span>Discution</span></a></li>
                <li class=""><a href="#"><i class="fa fa-wrench "></i> <span>Centre D'aide</span></a></li>
                <li class=""><a href="#"><i class="fa fa-cogs"></i> <span>Parametres</span></a></li>


            @else
              @if(Auth::user()->aproved)
              <li class=""><a href="/offre"><i class="fa fa-users"></i> <span>Tous Les Offres</span></a></li>
                
                <li class="treeview">
                <a href="#"><i class="fa fa-bullhorn "></i> <span>Mes Offres</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="/offre/create"><i class="fa fa-plus"></i>Create</a></li>
                    <li><a href="/offre/showoffre/{{Auth::user()->id}}"><i class="fa fa-cogs "></i>manage offres</a></li>
                </ul>
                </li>
                <li class="treeview">
                <a href="#"><i class="fa fa-product-hunt "></i> <span>Mes Produits</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="/produit/create"><i class="fa fa-plus"></i>Create</a></li>
                    <li><a href="/produit"><i class="fa fa-cogs "></i>Manage Produits</a></li>
                </ul>
                </li>
                <li class=""><a href="#"><i class="fa fa-commenting"></i> <span>Discution</span></a></li>

              @endif
            @endif
         
         @endguest


      </ul>
      <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    


    

    <!-- Main content -->
    <section class="content container-fluid">

      <!--------------------------
        | Your Page Content Here |
        -------------------------->
        @yield('content')

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    <div class="pull-right hidden-xs">
      
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; 2019 <a href="#">Lab Share</a>.</strong> All rights reserved.
  </footer>

  

<!-- REQUIRED JS SCRIPTS -->

<!-- jQuery 3 -->
<script src="{{ asset('bower_components/jquery/dist/jquery.min.js') }}"></script>
<!-- Bootstrap 3.3.7 -->
<script src="{{ asset('bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('dist/js/adminlte.min.js') }}"></script>

<!-- Optionally, you can add Slimscroll and FastClick plugins.
     Both of these plugins are recommended to enhance the
     user experience. -->
</body>
</html>