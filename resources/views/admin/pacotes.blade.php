@extends('layouts.admin')

@section('title','Admin')

@section('content')
<div class="container-fluid my-4">
  
  <div class="row mt-5">
    <div class="col-md-12">
      <h3 class="text-center title-table">Pacotes Cadastrados <span class="btn btn-success btn-add-title" onclick="AddPacote()">ADICIONAR</span></h3>
    </div>
  </div>
  <div class="row">
    <div class="col-md-12 table-responsive">
      <table class="table flx-table m-0">
        <thead>
          <tr>
            <th scope="col">Título</th>
            <th scope="col">Valor</th>
            <th scope="col">Anuncios</th>
            <th scope="col">Destaques</th>
            <th scope="col">Status</th>
            <th scope="col">Ações</th>
          </tr>
        </thead>
        <tbody>
          @foreach($pacotes as $pacote)
          <tr >
            <th scope="row">{{$pacote->nm_titulo}}</th> 
            <td>R$ {{ number_format($pacote->vl_pacote,2,',',' ') }}</td>
            <td>{{$pacote->qt_anuncio}}</td>
            <td>{{$pacote->qt_destaques}}</td>
            <td>{{$pacote->cd_status?'Ativo':'Inativo'}}</td> 
            <td>
              <div class="dropdown">
                <button class="btn btn-default" type="button" id="menuImovel{{$pacote->cd_pacote}}" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="fas fa-bars actions-menu-table"></i>
                </button>
                <div class="dropdown-menu" aria-labelledby="menuImovel{{$pacote->cd_pacote}}">
                  <a class="dropdown-item" href="#" onclick=" EditPacote('{{$pacote->cd_pacote}}','{{$pacote->nm_titulo}}','{{ number_format($pacote->vl_pacote,2,',',' ') }}','{{$pacote->qt_anuncio}}','{{$pacote->qt_destaques}}')" >Editar</a>
                  <a class="dropdown-item" href="{{url('')}}/admin/pacote/alter_status/{{$pacote->cd_pacote}}"  >{{$pacote->cd_status?'Inativar':'Ativar'}}</a>
                  <a class="dropdown-item" href="{{url('')}}/admin/pacote/excluir/{{$pacote->cd_pacote}}" onclick="confirm('Deseja excluir este pacote?')" >Excluir</a>
                </div>
              </div>
            </td>
          </tr>
          @endforeach
          @if(count($pacotes)==0) <tr><td colspan="7" style="text-align:center">NENNHUM PACOTE ENCONTRADO</td></tr> @endif
        </tbody>
      </table>
    </div>

  </div>
  <div class="row">
    <div class="col-md-12">
      <h3 class="text-center title-table"> <Small>OBS.: PACOTES COM ANUNCIOS IGUAL A 0 SERÃO CONSIDERADOS SEM LIMITES! </Small></h3>
    </div>
  </div>
</div>


<div id="FormPacote" class="modal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title"> <span id="acao_pacote">Cadastrar</span> Pacote</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form onsubmit="return false;">
          <div class="form-group row">
            <label for="p_titulo" class="col-sm-3 col-form-label">Titulo</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" id="p_titulo" placeholder="Tiulo do Pacote">
            </div>
          </div>
          <div class="form-group row">
            <label for="p_valor" class="col-sm-3 col-form-label">Valor</label>
            <div class="col-sm-9">
              <input type="text" class="form-control mask_money" id="p_valor" placeholder="Valor do Pacote">
            </div>
          </div>  
          <div class="form-group row">
            <label for="p_anuncios" class="col-sm-3 col-form-label">Anuncios</label>
            <div class="col-sm-9">
              <input type="number" class="form-control price" id="p_anuncios" placeholder="Quantidade de Anuncios">
            </div>
          </div>  
          <div class="form-group row">
            <label for="p_destaques" class="col-sm-3 col-form-label">Destaques</label>
            <div class="col-sm-9">
              <input type="number" class="form-control price" id="p_destaques" placeholder="Quantidade de Destaques">
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
  var p_id="";
  function AddPacote(){
    $('#acao_pacote').text('Cadastrar');
    p_id="";
    p_titulo.value="";
    p_valor.value="";
    p_anuncios.value="";
    p_destaques.value="";
    $('#FormPacote').modal();
  }
  function EditPacote(id,titulo,valor,anuncios,destaques){
    $('#acao_pacote').text('Editar');
    p_id=id;
    p_titulo.value=titulo;
    p_valor.value=valor;
    p_anuncios.value=anuncios;
    p_destaques.value=destaques;
    $('#FormPacote').modal();
  }
  function p_save(){
    $.post('{{url("")}}/admin/pacote/save',{
      id: p_id,
      titulo: p_titulo.value,
      valor: p_valor.value,
      anuncios: p_anuncios.value,
      destaques: p_destaques.value
    }).done((data)=>{
      alert('Pacote salvo com sucesso!');
      window.location.reload();
    });
  }
</script>
@endsection

@section('styles')
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
@endsection