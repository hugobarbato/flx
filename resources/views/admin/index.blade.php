@extends('layouts.admin')

@section('title','Admin')

@section('content')
<div class="container-fluid">
  <div class="col-12"></div>
  <div class="row my-3 dashboard-cards">
      <div class="col-xl-6">
        <div class="card border mb-2">
          <div class="card-body">
            <h5 class="card-title text-center dash-cont-font-title">Anúncios Ativos</h5>
            <h1 class="text-center dashbordFont dash-cont-font">{{$dash->ativos}}</h1>
            
          </div>
        </div>
      </div>
      <div class="col-xl-6">
        <div class="card border mb-2">
          <div class="card-body ">
            <h5 class="card-title text-center dash-cont-font-title">Anúncios Inativos</h5>
            <h1 class="text-center dashbordFont dash-cont-font">{{$dash->inativos}}</h1>
          </div>
        </div>
      </div>
      <div class="col-xl-6">
        <div class="card border mb-2" >
          <div class="card-body">
            <h5 class="card-title text-center dash-cont-font-title">Em período de teste</h5>
            <h1 class="text-center dashbordFont dash-cont-font">{{$dash->teste}}</h1>
          </div>
        </div>
      </div>
      <div class="col-xl-6">
        <div class="card border mb-2" >
          <div class="card-body">
            <h5 class="card-title text-center dash-cont-font-title">Anúncios dos Admins</h5>
            <h1 class="text-center dashbordFont dash-cont-font">{{$dash->admin}}</h1>
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
            <th scope="col">Entrada</th>
            <th scope="col">Status</th>
            <th scope="col">Anunciante</th>
            <th scope="col">Email</th>
            <th scope="col">Documento</th>
            <th scope="col">Ações</th>
          </tr>
        </thead>
        <tbody>
          @foreach($imoveis as $imovel)
          <tr >
            <th scope="row">{{$imovel->nm_titulo}}</th>
            <td>{{date('d/m/Y H:i', strtotime($imovel->created_at)) }}</td>
            <td>{{$imovel->status}}</td>
            <td>{{$imovel->name}}</td>
            <td>{{$imovel->email}}</td>
            <td>{{$imovel->doc}}</td>
            <td>
              <div class="dropdown">
                <button class="btn btn-default" type="button" id="menuImovel{{$imovel->cd_imovel}}" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="fas fa-bars actions-menu-table"></i>
                </button>
                <div class="dropdown-menu" aria-labelledby="menuImovel{{$imovel->cd_imovel}}">
                  <a class="dropdown-item" href="{{url('/detail/438')}}">Visualizar</a>
                  <!-- <a class="dropdown-item" href="#">Desativar</a>
                  <a class="dropdown-item" href="#">Something else here</a> -->
                </div>
              </div>
            </td>
          </tr>
          @endforeach
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