<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>{{config('dashboard.title')}}</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{asset('dist/css/adminlte.min.css')}}">
  <!-- Google Font: Source Raleway -->
<link href="https://fonts.googleapis.com/css?family=Cairo&display=swap" rel="stylesheet">
<!-- additional css style  -->
  <!-- bootstrap rtl -->
  @if(App::getLocale() == 'ar')
  <link rel="stylesheet" href="{{asset('dist/css/bootstrap-rtl.min.css')}}">
  <!-- template rtl version -->
  <link rel="stylesheet" href="{{asset('dist/css/custom-style.css')}}">
  @else 
  <link rel="stylesheet" href="{{asset('dist/css/adminlte.min.css')}}">
  @endif

    @yield('style') 
     
    <style>
    body{
font-family: 'Cairo', sans-serif;
    }
    </style>
</head>
<body class="hold-transition sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand bg-white navbar-light border-bottom">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fa fa-bars"></i></a>
      </li>

    </ul>

    <!-- Right navbar links -->
    @if(\App::getLocale() == 'en')
    <ul class="navbar-nav mr-auto" style="position: relative;left: 86%;" >
    @else 
    <ul class="navbar-nav mr-auto">

    @endif

    <li class="nav-item dropdown ">
        <a class="nav-link" data-toggle="dropdown" href="#" aria-expanded="true">
          <i class="fa fa-language"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right " style="left: inherit; right: 0px;">

          <a href="/language/en" class="dropdown-item">
           English 
          </a>
          <div class="dropdown-divider"></div>
          <a href="/language/ar" class="dropdown-item">
           العربية 

          </a>


      </li>
    <li class="nav-item dropdown ">
        <a class="nav-link" data-toggle="dropdown" href="#" aria-expanded="false">
          <i class="fa fa-sign-out"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-left ">
    
          <div class="dropdown-divider"></div>
          
          @auth('web')
          <a href="{{route('logout.admin')}}" class="dropdown-item">
          @endauth

          @auth('restaurants') 
          <a href="{{route('restaurants.logout')}}" class="dropdown-item">
          @endauth

          @auth('restaurant_emps') 
          <a href="{{route('restaurant.emp.logout')}}" class="dropdown-item">
          @endauth
            <i class="fa fa-sign-out ml-2"></i>   
            <span class="float-left text-muted text-sm">{{\App::getLocale() == "ar" ?" تسجيل الحروج ": "logout" }}  </span>
          </a>
         
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

