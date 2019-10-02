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

<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">Navbar</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
    <div class="navbar-nav">
      <a class="nav-item nav-link active" href="#">Home <span class="sr-only">(current)</span></a>
      <a class="nav-item nav-link" href="#">Features</a>
      <a class="nav-item nav-link" href="#">Pricing</a>
      <a class="nav-item nav-link disabled" href="#">Disabled</a>
    </div>
  </div>
</nav>
  <div class="container-fluid">
    
    <div class="row my-3">
        <div class="col-xl-4">
          <div class="card border border-info">
            <div class="card-body">
              <h5 class="card-title text-center">Anúncios Ativos</h5>
              <h1 class="text-center dashbordFont">301</h1>
              
            </div>
          </div>
        </div>
        <div class="col-xl-4">
          <div class="card border border-info">
            <div class="card-body ">
              <h5 class="card-title text-center">Anúncios Ativos</h5>
              <h1 class="text-center dashbordFont">301</h1>
            </div>
          </div>
        </div>
        <div class="col-xl-4">
          <div class="card border border-info" >
            <div class="card-body">
              <h5 class="card-title text-center">Anúncios Ativos</h5>
              <h1 class="text-center dashbordFont">301</h1>
            </div>
          </div>
        </div>
    </div>
        <!-- <div class="col-3 dashbordCard mx-1">
          <h4>Anúncios Ativos</h4>
          <div class="mx-auto">301</div>
        </div>
        <div class="col-3 dashbordCard mx-1">
          <h4>Anúncios Ativos</h4>
          <div class="mx-auto">301</div>
        </div>
        <div class="col-3 dashbordCard mx-1">
          <h4>Anúncios Ativos</h4>
          <div class="mx-auto">301</div>
        </div> -->
    <div class="row my-5">
      <div class="col-md-12">
        <h3 class="text-center">Anúncios inserudis recentemente no site</h3>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <table class="table">
          <thead>
            <tr>
              <th scope="col">Título</th>
              <th scope="col">Data Inserção</th>
              <th scope="col">Pacote</th>
              <th scope="col">Data Término</th>
              <th scope="col">Teste</th>
              <th scope="col">Ações</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <th scope="row">Tatuape -  96m 3 dormitorios</th>
              <td>11/11/1111</td>
              <td>Semestral</td>
              <td>22/22/2222</td>
              <td>Não</td>
              <td><i class="fas fa-bars"></i></td>
            </tr>
          </tbody>
        </table>
      </div>

    </div>
  </div>
  <!-- <div class="container-fluid">
  </div> -->
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