@extends('layouts.admin')

@section('title','Admin')

@section('content')
<div class="container-fluid my-4">
  
<div class="container search">
<h2 class="text-center title-table">Filtros</h2>
    <div class="search-banner-principal">
        <form action="#" method="get" >
            <div class="container area-busca">
            <div class="container-busca">
                <div class="class-1">
                    <div class="row">
                        <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-4 pl-3 pr-3 mb-2 pr-md-0">
                                        <div class="titulo-busca">
                                            <p>tipo de imóvel</p>
                                        </div>
                                        <div class="select-busca">
                                            <select class="select-imovel" name="cd_tipo_imovel" id="cd_tipo_imovel">
                                                <option value="" >Selecione...</option>
                                                @php
                                                    $res = "";
                                                    $com = "";
                                                    $etc = "";
                                                    foreach($tipo_imovel as $tipo){
                                                        if($old_values->cd_tipo_imovel == $tipo->cd_tipo_imovel){
                                                            $selected = 'selected';
                                                        }else{
                                                            $selected = '';
                                                        }
                                                        
                                                        switch($tipo->cd_categoria_imovel){
                                                            case "1":
                                                                $res .= '<option value="'.$tipo->cd_tipo_imovel.'" '.$selected.'>'.$tipo->nm_tipo_imovel.'</option>';
                                                                break;
                                                            case "2":
                                                                $com .= '<option value="'.$tipo->cd_tipo_imovel.'" '.$selected.'>'.$tipo->nm_tipo_imovel.'</option>';
                                                                break;
                                                            case "3":
                                                                $etc .= '<option value="'.$tipo->cd_tipo_imovel.'" '.$selected.' >'.$tipo->nm_tipo_imovel.'</option>';
                                                                break;
                                                        }
                                                        
                                                    }
                                                @endphp
                                                <optgroup label="Residencial" value="1">
                                                    {!! $res !!}
                                                </optgroup>
                                                <optgroup label="Comercial" value="2">
                                                    {!! $com !!}
                                                </optgroup>
                                                <optgroup label="Outros" value="3">
                                                    {!! $etc !!}
                                                </optgroup> 
                                            </select>
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-4 mb-2 d-md-block">
                                        <div class="titulo-busca">
                                            <p>Onde ?</p>
                                        </div>
                                        <input type="text" name="Endereco" id="endereco" Placeholder="Endereço / Bairro / Cidade / UF..." value="{{$old_values->Endereco}}" />
                                    </div>
                                    <div class="col-md-4 mb-2 d-md-block">
                                        <div class="titulo-busca">
                                            <p>Email ou Documento:</p>
                                        </div>
                                        <input type="text" name="u_search" id="u_search"  value="{{$old_values->u_search}}" />
                                    </div>
                                </div>
                            </div>
                    </div>
                </div>
                <div class="class-2 mb-2 d-md-block">
                    <div class="row">
                        <div class="col-sm-12">
                        

                            <div class="select-busca border-right">
                                <button class="btn btn- dropdown-toggle" type="button" id="dropdownMenuButton" 
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Faixa de Preço
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <div class="row">
                                        <div class="col"> 
                                            <label for='precoDe'>DE:</label> 
                                            <input type="text"  name="precoDe" id="precoDe" Placeholder="R$ 000.000.000,00" readonly="true"/>
                                        </div>
                                        <div class="col">  
                                            <label for='precoAte'>ATÉ:</label> 
                                            <input type="text"  name="precoAte" id="precoAte" Placeholder="R$ 000.000.000,00"  readonly="true"/>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <div id="slider-range"></div
                                        ></div>
                                    </div>
                                </div>
                        
                            </div>
                            <div class="select-busca border-right">
                                <select class="select-infos-imovel" name="qt_quartos" id="qt_quartos">
                                    <option value="">Quartos</option>
                                    <option value="0" @if($old_values->qt_quartos == '0') selected @endif >Sem quarto</option>
                                    <option value="1" @if($old_values->qt_quartos == '1') selected @endif >1 quarto</option>
                                    <option value="2" @if($old_values->qt_quartos == '2') selected @endif >2 quartos</option>
                                    <option value="3" @if($old_values->qt_quartos == '3') selected @endif >3 quartos</option>
                                    <option value="4" @if($old_values->qt_quartos == '4') selected @endif >4 quartos</option>
                                    <option value="5" @if($old_values->qt_quartos == '5') selected @endif >5 quartos</option>
                                    <option value="6" @if($old_values->qt_quartos == '6') selected @endif >6 ou mais quartos</option>
                                </select>
                            </div>
                            
                            <div class="select-busca border-right">
                                <select class="select-infos-imovel" name="qt_banheiro" id="qt_banheiro">
                                    <option value="">Banheiros</option>
                                    <option value="0" @if($old_values->qt_banheiro == '0') selected @endif >Sem Banheiro</option>
                                    <option value="1" @if($old_values->qt_banheiro == '1') selected @endif >1 banheiros</option>
                                    <option value="2" @if($old_values->qt_banheiro == '2') selected @endif >2 banheiros</option>
                                    <option value="3" @if($old_values->qt_banheiro == '3') selected @endif >3 banheiros</option>
                                    <option value="4" @if($old_values->qt_banheiro == '4') selected @endif >4 banheiros</option>
                                    <option value="5" @if($old_values->qt_banheiro == '5') selected @endif >5 banheiros</option>
                                    <option value="6" @if($old_values->qt_banheiro == '6') selected @endif >6 ou mais banheiros</option>
                                </select>
                            </div>
                        
                            <div class="select-busca border-right">
                                <select class="select-infos-imovel" name="qt_vagas" id="qt_vagas">
                                    <option value="">vagas</option>
                                    <option value="0"  @if($old_values->qt_vagas == '0') selected @endif>Sem vaga</option>
                                    <option value="1"  @if($old_values->qt_vagas == '1') selected @endif>1 vagas</option>
                                    <option value="2"  @if($old_values->qt_vagas == '2') selected @endif>2 vagas</option>
                                    <option value="3"  @if($old_values->qt_vagas == '3') selected @endif>3 vagas</option>
                                    <option value="4"  @if($old_values->qt_vagas == '4') selected @endif>4 vagas</option>
                                    <option value="5"  @if($old_values->qt_vagas == '5') selected @endif>5 vagas</option>
                                    <option value="6"  @if($old_values->qt_vagas == '6') selected @endif>6 ou mais vagas</option>
                                </select>
                            </div>
                        
                            <div class="select-busca border-right">
                                <select class="select-infos-imovel" name="metragem" id="metragem">
                                    <option value="">Metragem</option>
                                    <option value="1" @if($old_values->metragem == '1') selected @endif>Até 50 m²</option>
                                    <option value="2" @if($old_values->metragem == '2') selected @endif>De 51 m² Até 100 m²</option>
                                    <option value="3" @if($old_values->metragem == '3') selected @endif>De 101 m² Até 150 m²</option>
                                    <option value="4" @if($old_values->metragem == '4') selected @endif>De 151 m² Até 200 m²</option>
                                    <option value="5" @if($old_values->metragem == '5') selected @endif>De 201 m² Até 300 m²</option>
                                    <option value="6" @if($old_values->metragem == '6') selected @endif>Maior que 300 m²</option>
                                </select>
                            </div>
                        
                            <div class="select-busca">
                                <input type="text" name="cd_imovel" id="cd_imovel" Placeholder="CÓDIGO DO IMÓVEL" value="{{$old_values->cd_imovel}}"/>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="class-3">
                <button class="btn-search">
                    <i class="fa fa-search"></i>
                </button>
            </div>
            </div>
        </form>
    </div>
</div>
  <div class="row mt-5">
    <div class="col-md-12">
      <h3 class="text-center title-table">ANÚNCIOS {{$titulo}}</h3>
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
                  <a class="dropdown-item" href="{{url('/detail/'.$imovel->cd_imovel)}}">Visualizar</a>
                  <!-- <a class="dropdown-item" href="#">Desativar</a>
                  <a class="dropdown-item" href="#">Something else here</a> -->
                </div>
              </div>
            </td>
          </tr>
          @endforeach
          @if(count($imoveis)==0) <tr><td colspan="7" style="text-align:center">NENHUM IMÓVEL ENCONTRADO</td></tr> @endif
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
window.lrv_data = {
    min:{{$filter->min_value}},
    max:{{$filter->max_value}},
    values:[ {{($old_values->precoDe?$old_values->precoDe:$filter->min_value)}}, {{($old_values->precoAte?$old_values->precoAte:$filter->max_value)}}  ]
};
</script>
@endsection

@section('styles')
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
@endsection