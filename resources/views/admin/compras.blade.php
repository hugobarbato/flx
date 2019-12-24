@extends('layouts.admin')
@inject('pagseguro', 'App\Http\Controllers\PagseguroService')
@section('title','Admin')

@section('content')
<div class="container-fluid my-4">
  <div class="row mt-5">
    <div class="col-md-12">
      <h3 class="text-center title-table">Filtrar Compras</h3>
    </div>
  </div>
  <form action="#" method="get">
    <div class="row p-1" id="filtro_compras" style="background:#fff; margin:0">
        <div class="col-md-4">
          <div class="form-group">
            <label for="status">Status Pagseguro</label>
            <select name="status" id="status" class="form-control">
              <option value="" selected> Selecione o status </option>
              <option value="0" {{ $inputs['status'] == '0' ? 'selected':'' }}> Pendente </option>
              <option value="1" {{ $inputs['status'] == '1' ? 'selected':'' }}> Ativo </option>
              <option value="2" {{ $inputs['status'] == '2' ? 'selected':'' }}> Cartão Expirado, Cancelado ou Bloqueado </option>
              <option value="3" {{ $inputs['status'] == '3' ? 'selected':'' }}> Suspensa </option>
              <option value="4,5,6" {{ $inputs['status'] == '4,5,6' ? 'selected':'' }}> Cancelado </option>
              <option value="7" {{ $inputs['status'] == '7' ? 'selected':'' }}> Expirado </option>
            </select>
          </div>
        </div>
        <div class="col-md-8">
          <div class="form-group">
            <label for="cliente">Cliente</label>
            <input name="cliente" id="cliente" class="form-control" placeholder="Nome, E-mail ou COD do Cliente" value="{{ $inputs['cliente'] }}" >
          </div>
        </div>
        <div class="col-md-4">
          <div class="form-group">
            <label for="plano">Plano</label>
            <select name="plano" id="plano" class="form-control">
              <option value="" selected> Selecione o plano </option>
              @foreach($pacotes as $pacote)
              <option value="{{$pacote->cd_pacote}}" {{ $inputs['plano'] == $pacote->cd_pacote ? 'selected':'' }} > {{$pacote->nm_titulo}} </option>
              @endforeach
            </select>
          </div>
        </div>
        <div class="col-md-4">
          <div class="form-group">
            <label for="dateInical">Data Inicial</label>
            <input type="date" name="dateInical" id="dateInical" class="form-control" value="{{ $inputs['dateInical'] }}">
          </div>
        </div>
        <div class="col-md-4">
          <div class="form-group">
            <label for="dateFinal">Data Final</label>
            <input type="date" name="dateFinal" id="dateFinal" class="form-control" value="{{ $inputs['dateFinal'] }}">
          </div>
        </div>
        <div class="col-md-8">
          <div class="form-group">
            <label><input type="radio" name="dtBy" id="dtBy1" value='1' {{ $inputs['dtBy'] != '2' ? 'checked':'' }}> Data da Contratação</label>
            <label><input type="radio" name="dtBy" id="dtBy2" value='2' {{ $inputs['dtBy'] == '2' ? 'checked':'' }}> Data da Ultima Atualização</label>
          </div>
        </div>
        <div class="col-md-4">
          <button class="btn btn-sm btn-primary btn-block" type="submit">Pesquisar</button>
        </div>
    </div>
  </form>
  <div class="row mt-5">
    <div class="col-md-12">
      <h3 class="text-center title-table">Compras e Assinaturas</h3>
    </div>
  </div>
  <div class="row">
    <div class="col-md-12 table-responsive">
      <table class="table flx-table m-0">
        <thead>
          <tr>
            <th scope="col">Cliente</th>
            <th scope="col">E-mail</th>
            <th scope="col">Dt. Contratação</th>
            <th scope="col">Título</th>
            <th scope="col">Valor</th>
            <th scope="col">Ult. Atualização</th> 
            <th scope="col">Status PagSeguro</th>
            <th scope="col">Ações</th>
          </tr>
        </thead>
        <tbody>
          @foreach($compras as $c)
          <tr >
            <th scope="row">{{$c->name}}</th> 
            <td scope="row">{{$c->email}}</td> 
            <td >{{date('d/m/Y H:i',strtotime($c->created_at))}}</td> 
            <td >{{$c->nm_titulo}}</td> 
            <td>R$ {{ number_format($c->vl_total,2,',',' ') }}</td>
            <td >{{date('d/m/Y H:i',strtotime($c->updated_at))}}</td>  
            <td>{{$pagseguro->statusCompra($c->ic_processado)}}</td>
            <td>
              @if($c->ic_processado == 1)
                  @php $canBuy = false; @endphp
                  <a class="btn btn-danger btn-sm" href="/cancelamento/{{$c->cd_pagseguro}}" onclick="return confirm(' Deseja cancelar está assinatura? \n Está ação cancelará cobranças futuras do cliente, não podendo ser revertida.  ')">Cancelar</a>
              @else
                  -
              @endif
            </td>
          </tr>
          @endforeach
          @if(count($compras)==0) <tr><td colspan="7" style="text-align:center">NENNHUMA COMPRA ENCONTRADA</td></tr> @endif
        </tbody>
      </table>
    </div>

  </div>
  <div class="row">
    <div class="col-md-12">
      <h3 class="text-center title-table table-responsive"> <Small>{{$compras->links()}} </Small></h3>
    </div>
  </div>
</div>



@endsection

@section('scripts')
<script type="text/javascript" src="{{ asset('js/imob.js') }}"></script> 
<script>
 
</script>
@endsection

@section('styles')
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
@endsection