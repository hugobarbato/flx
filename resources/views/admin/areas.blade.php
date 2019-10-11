@extends('layouts.admin')

@section('title','Admin')

@section('content')
<div class="container-fluid my-4">
  
  <div class="row mt-5">
    <div class="col-md-12">
      <h3 class="text-center title-table">Areas {{$titulo}} <span class="btn btn-success btn-add-title" onclick="ADD()">ADICIONAR</span></h3>
    </div>
  </div>
  <div class="row">
    <div class="col-md-12 table-responsive">
      <table class="table flx-table m-0">
        <thead>
          <tr>
            <th scope="col">Título</th>
            <th scope="col">CATEGORIA</th>
            <th scope="col">Ações</th>
          </tr>
        </thead>
        <tbody>
          @foreach($areas as $area)
          <tr >
            @if(isset($area->cd_areas_comuns))
              <th scope="row">{{$area->nm_areas_comuns}}</th> 
              <td>
                @if($area->cd_categoria_imovel==1)
                  Residencial
                @elseif($area->cd_categoria_imovel==2)
                  Comercial
                @else
                  Outros
                @endif
              </td>
              <td>
                <div class="dropdown">
                  <button class="btn btn-default" type="button" id="menuImovel{{$area->cd_area_comuns}}" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-bars actions-menu-table"></i>
                  </button>
                  <div class="dropdown-menu" aria-labelledby="menuImovel{{$area->cd_area_comuns}}">
                    <a class="dropdown-item" href="#" onclick=" Edit('{{$area->cd_area_comuns}}','{{$area->nm_areas_comuns}}','{{ $area->cd_categoria_imovel }}')" >Editar</a>
                    <a class="dropdown-item" href="{{url('')}}/admin/areas/comuns/excluir/{{$area->cd_area_comuns}}" onclick="confirm('Deseja excluir esta área comum?')" >Excluir</a>
                  </div>
                </div>
              </td>
            @else
              <th scope="row">{{$area->nm_areas_privativas}}</th> 
              <td>
                @if($area->cd_categoria_imovel==1)
                  Residencial
                @elseif($area->cd_categoria_imovel==2)
                  Comercial
                @else
                  Outros
                @endif
              </td>
              <td>
                <div class="dropdown">
                  <button class="btn btn-default" type="button" id="menuImovel{{$area->cd_area_privativas}}" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-bars actions-menu-table"></i>
                  </button>
                  <div class="dropdown-menu" aria-labelledby="menuImovel{{$area->cd_area_privativas}}">
                    <a class="dropdown-item" href="#" onclick=" Edit('{{$area->cd_area_privativas}}','{{$area->nm_areas_privativas}}','{{ $area->cd_categoria_imovel }}')" >Editar</a>
                    <a class="dropdown-item" href="{{url('')}}/admin/areas/privativas/excluir/{{$area->cd_area_privativas}}" onclick="confirm('Deseja excluir esta área comum?')" >Excluir</a>
                  </div>
                </div>
              </td>
            @endif
          </tr>
          @endforeach
          @if(count($areas)==0) <tr><td colspan="7" style="text-align:center">NENNHUM area ENCONTRADO</td></tr> @endif
        </tbody>
      </table>
    </div>

  </div>
  <div class="row">
    <div class="col-md-12">
      <h3 class="text-center title-table"> <Small>OBS.: areaS COM ANUNCIOS IGUAL A 0 SERÃO CONSIDERADOS SEM LIMITES! </Small></h3>
    </div>
  </div>
</div>


<div id="Formarea" class="modal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title"> <span id="acao_area">Cadastrar</span> Área {{$titulo}}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form onsubmit="return false;">
          <div class="form-group row">
            <label for="nm_area" class="col-sm-3 col-form-label">Área {{$titulo}}</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" id="nm_area" placeholder="Área {{$titulo}}">
            </div>
          </div>
          <div class="form-group row">
            <label for="categoria" class="col-sm-3 col-form-label">Categoria do Imóvel</label>
            <div class="col-sm-9">

              <select name="categoria" id="categoria" class="form-control" required>
                <option value="">Selecione a categoria do imóvel</option>
                <option value="1">Residencial</option>
                <option value="2">Comercial</option>
                <option value="3">Outros</option>  
              </select>
            </div>
          </div>   
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">CANCELAR</button>
        <button type="button" class="btn btn-primary" onclick="p_save()">SALVAR</button>
      </div>
    </div>
  </div>
</div>

@endsection

@section('scripts')
<script type="text/javascript" src="{{ asset('js/imob.js') }}"></script> 
<script>
  $('.mask_money').mask('000.000.000.000.000,00', {reverse: true});
  var id="";
  function ADD(){
    $('#acao_area').text('Cadastrar');
    id="";
    nm_area.value="";
    categoria.value="";
    $('#Formarea').modal();
  }
  function Edit(p_id,p_name,p_cat){
    $('#acao_area').text('Editar');
    id=id;
    nm_area.value=p_name;
    categoria.value=p_cat;
    $('#Formarea').modal();
  }
  function p_save(){
    $.post( {{ url(''). '/admin/areas/' }},{
      id: id,
      titulo: nm_area.value,
      categoria: categoria.value,
    }).done((data)=>{
      alert('Salvo com sucesso!');
      window.location.reload();
    });
  }
</script>
@endsection

@section('styles')
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
@endsection