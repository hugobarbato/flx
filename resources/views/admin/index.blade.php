@extends('layouts.admin')

@section('title','Admin')

@section('content')

<div class="d-flex" id="wrapper">

<!-- Sidebar -->
<div class="bg-dark border-right" id="sidebar-wrapper">
  <div class="sidebar-heading fontMenu">Teste </div>
  <div class="list-group list-group-flush">
    <a href="#" class="list-group-item list-group-item-action bg-dark fontMenu"><i class="fas fa-bullhorn"></i> Anúncios Ativos</a>
    <a href="#" class="list-group-item list-group-item-action bg-dark fontMenu"><i class="fas fa-bullhorn"></i> Anúncios Inativos</a>
    <a href="#" class="list-group-item list-group-item-action bg-dark fontMenu"><i class="far fa-calendar-alt"></i> Em periodo de teste</a>
    <a href="#" class="list-group-item list-group-item-action bg-dark fontMenu"><i class="fas fa-box-open"></i> Gerenciar Pacotes</a>
    <a href="#" class="list-group-item list-group-item-action bg-dark fontMenu"><i class="fas fa-ticket-alt"></i> Gerenciar Cupons</a>
    <a href="#" class="list-group-item list-group-item-action bg-dark fontMenu"><i class="fas fa-university"></i>Textos institucionais</a>
  </div>
</div>
<!-- /#sidebar-wrapper -->

<!-- Page Content -->
<div id="page-content-wrapper">

  <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
    <!-- <button class="btn btn-primary" id="menu-toggle">Toggle Menu</button> -->

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
        <li class="nav-item active">
          <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Link</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Dropdown
          </a>
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="#">Action</a>
            <a class="dropdown-item" href="#">Another action</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">Something else here</a>
          </div>
        </li>
      </ul>
    </div>
  </nav>

  <div class="container-fluid fundoDashbord">
    <div class="row">
        <div class="col-4 dashbordCard">

        </div>
        <div class="col-4 ">
            
        </div>
        <div class="col-4">
            
        </div>
    </div>
  </div>
</div>
<!-- /#page-content-wrapper -->

</div>

@endsection

@section('scripts')
<script type="text/javascript" src="{{ asset('js/imob.js') }}"></script> 
<script>
    $("#menu-toggle").click(function(e) {
      e.preventDefault();
      $("#wrapper").toggleClass("toggled");
    });
</script>
@endsection

@section('styles')
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css"> 
<style>
  
</style>
@endsection