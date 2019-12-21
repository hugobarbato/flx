
<!doctype html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Styles -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
    <!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">-->
    <link rel="stylesheet" href="{{ url('/css/style.css') }} ">

    <title>  @yield('title') - FLX IMOVEIS </title>
    
    @yield('styles')
  </head>
  <body id="app">
  <header>
        <div class="container-fluid menu-nav" >
            <nav class="navbar navbar-expand-lg navbar-light">
                <div class="logo-flx">
                    <a class="navbar-brand" href="{{url('/admin')}}"><img src="{{url('img/logo.png')}}" height="50" > </a>
                </div>
                
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSite">
                    <span class="navbar-toggle-icon"></span>
                </button>
                
                
            </nav> 
            <div class="align-items-center d-flex justify-content-between rigth"> 
                <a href="{{url('')}}">SAIR </a>  
                <i class="fa-user-circle fas ml-2 user-nav-icon"></i>  
                <i class="fas fa-bars ml-2 user-nav-icon" id="sidebarCollapse" ></i>
            </div>
        </div>
    </header>
 
  <div class="d-flex" id="wrapper">
    <!-- Sidebar -->
    <div class="bg-dark border-right" id="sidebar-wrapper">
      <div class="sidebar-heading fontMenu">
        <div class="row">
          <div class="col-5">
            <img src="https://www.pavilionweb.com/wp-content/uploads/2017/03/man-300x300.png" alt="USER" class="rounded-circle user-img ">
          </div>
          <div class="col-7 font-user-card">
            <h3> {{   Auth::user()->name }} </h3>
            <h4> Usuário administrador </h4>
          </div>
        </div>
      </div>
      <div class="divider-line"></div>
      <div class="list-group list-group-flush w-100">
        <a href="{{url('').'/admin/anuncios/ativos'}}" class="list-group-item list-group-item-action bg-dark fontMenu">
          <i class="fas fa-tachometer-alt"></i>
          <span class="ml-2">  Anúncios Ativos</span> 
          <i class="fas fa-chevron-right float-right mt-1"></i>  
        </a>
        <div class="divider-line"></div>
        <a href="{{url('').'/admin/anuncios/inativos'}}" class="list-group-item list-group-item-action bg-dark fontMenu">
          <i class="fas fa-globe"></i>
          <span class="ml-2">  Anúncios Inativos</span>
          <i class="fas fa-chevron-right float-right mt-1"></i>
        </a>
        <div class="divider-line"></div>
        <a href="{{url('').'/admin/anuncios/teste'}}" class="list-group-item list-group-item-action bg-dark fontMenu">
          <i class="far fa-calendar-alt"></i>
          <span class="ml-2">  Em periodo de teste</span>
          <i class="fas fa-chevron-right float-right mt-1"></i>
        </a>
        <div class="divider-line"></div>
        <a href="{{url('').'/admin/pacotes'}}" class="list-group-item list-group-item-action bg-dark fontMenu">
          <i class="fas fa-box-open"></i>
          <span class="ml-2">  Gerenciar Pacotes</span> 
          <i class="fas fa-chevron-right float-right mt-1"></i>
        </a>
        <div class="divider-line"></div>
        <a href="{{url('').'/admin/compras'}}" class="list-group-item list-group-item-action bg-dark fontMenu">
          <i class="fas fa-money-check-alt"></i>
          <span class="ml-2">  Gerenciar Compras</span> 
          <i class="fas fa-chevron-right float-right mt-1"></i>
        </a>
        <!-- <div class="divider-line"></div> -->
        <!-- <a href="#" class="list-group-item list-group-item-action bg-dark fontMenu">
          <i class="fas fa-ticket-alt"></i> 
          <span class="ml-2"> Gerenciar Cupons </span> 
          <i class="fas fa-chevron-right float-right mt-1"></i> 
        </a> -->
        <div class="divider-line"></div>
        <a href="{{url('').'/admin/areas/privativas'}}" class="list-group-item list-group-item-action bg-dark fontMenu">
          <i class="fas fa-university"></i>
          <span class="ml-2"> Áreas Privativas </span> 
          <i class="fas fa-chevron-right float-right mt-1"></i>
        </a>
        <div class="divider-line"></div>
        <a href="{{url('').'/admin/areas/comuns'}}" class="list-group-item list-group-item-action bg-dark fontMenu">
          <i class="fas fa-university"></i>
          <span class="ml-2"> Áreas Comuns </span> 
          <i class="fas fa-chevron-right float-right mt-1"></i>
        </a>
        <div class="divider-line"></div>
        <a href="{{url('').'/admin/paginas'}}" class="list-group-item list-group-item-action bg-dark fontMenu">
          <i class="fas fa-building"></i>
          <span class="ml-2"> Páginas Institucionais </span> 
          <i class="fas fa-chevron-right float-right mt-1"></i>
        </a>
      </div>
    </div>
    <!-- /#sidebar-wrapper -->

    <!-- Page Content -->
      <div id="page-content-wrapper" >
        @yield('content') 
      </div>
    </div>
    <!-- /#page-content-wrapper -->

  </div>
    <script type="text/javascript" src="{{ asset('js/app.js') }}"></script>
     
    @yield('scripts')
  </body>
</html>