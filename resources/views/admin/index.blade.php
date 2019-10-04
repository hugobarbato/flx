@extends('layouts.admin')

@section('title','Admin')

@section('content')
<div class="container-fluid">
  <div class="col-12"></div>
  <div class="row my-3 dashboard-cards">
      <div class="col-xl-4">
        <div class="card border mb-2">
          <div class="card-body">
            <h5 class="card-title text-center dash-cont-font-title">Anúncios Ativos</h5>
            <h1 class="text-center dashbordFont dash-cont-font">{{$dash->ativos}}</h1>
            
          </div>
        </div>
      </div>
      <div class="col-xl-4">
        <div class="card border mb-2">
          <div class="card-body ">
            <h5 class="card-title text-center dash-cont-font-title">Anúncios Inativos</h5>
            <h1 class="text-center dashbordFont dash-cont-font">{{$dash->inativos}}</h1>
          </div>
        </div>
      </div>
      <div class="col-xl-4">
        <div class="card border mb-2" >
          <div class="card-body">
            <h5 class="card-title text-center dash-cont-font-title">Em período de teste</h5>
            <h1 class="text-center dashbordFont dash-cont-font">{{$dash->teste}}</h1>
          </div>
        </div>
      </div>
  </div> 
  <div class="row mt-5">
    <div class="col-md-12">
      <h3 class="text-center title-table">ANÚNCIOS INSERIDOS NO SITE RECENTEMENTE</h3>
    </div>
  </div>
  <div class="row">
    <div class="col-md-12 table-responsive">
      <table class="table flx-table m-0">
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
  <div class="row">
    <div class="col-md-12">
      <h3 class="text-center title-table"> </h3>
    </div>
  </div>
</div>

@endsection

@section('scripts')
<script type="text/javascript" src="{{ asset('js/imob.js') }}"></script> 
<script>
    $("#menu-toggle").click(function(e) {
      e.preventDefault();
      $("#wrapper").toggleClass("toggled");
    });
    $('#sidebarCollapse').on('click', function () {
        $('#sidebar-wrapper').toggleClass('active');
    });
    $("#page-content-wrapper").on('click', function () {
      $('#sidebar-wrapper').removeClass('active');
    });
</script>
@endsection

@section('styles')
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
@endsection