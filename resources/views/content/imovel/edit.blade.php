@extends('layouts.app')
@section('title', 'Editando - '.$imovel->nm_titulo)
@section('content')
    <div class="container">
        <hr>
    </div>
    <article>
        <div class="container">
            <div class="container-content">
                <form id="container-anuncio" action="#" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="bloco-anunciar">
                        <div class="form-row">
                            <div class="col-md-12">
                                <h4>Anunciar como</h4>
                            </div>
                            <div class="col-md-3">
                                <select name="cd_tipo_anunciante" id="cd_tipo_anunciante" class="form-control" required>
                                    <option value="">Selecionar</option>
                                    @foreach($tipo_anunciante as $anunciante)
                                     <option value="{{$anunciante->cd_tipo_anunciante}}" @if($anunciante->cd_tipo_anunciante == $imovel->cd_tipo_anunciante) selected @endif>{{$anunciante->nm_tipo_anunciante}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="cadastro-geral">   
                        <div class="bloco-cadastro-imovel">
                            <div class="form-row">
                                <div class="col-md-12">
                                    <h4>Cadastro de imóvel</h4>
                                </div>
                            </div>
                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                            <div class="form-row">
                                <div class="col-md-6">
                                    <select name="cd_tipo_anuncio" id="cd_tipo_anuncio" class="form-control" required>
                                        <option value="">Selecione o tipo do anuncio.</option>
                                        @foreach($tipo_anuncio as $anuncio)
                                         <option value="{{$anuncio->cd_tipo_anuncio}}" @if($anuncio->cd_tipo_anuncio == $imovel->cd_tipo_anuncio) selected @endif>{{$anuncio->nm_tipo_anuncio}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                
                                <div class="col-md-6">
                                     <select name="cd_tipo_imovel" id="cd_tipo_imovel" class="form-control" required>
                                        <option value="">Selecione o tipo do imóvel</option>
                                        @php
                                            $res = "";
                                            $com = "";
                                            $etc = "";
                                            foreach($tipo_imovel as $tipo){
                                                
                                                switch($tipo->cd_categoria_imovel){
                                                    case "1":
                                                        $res .= '<option value="'.$tipo->cd_tipo_imovel.'" '.($tipo->cd_tipo_imovel == $imovel->cd_tipo_imovel ? 'selected' : '' ).' >'.$tipo->nm_tipo_imovel.'</option>';
                                                        break;
                                                    case "2":
                                                        $com .= '<option value="'.$tipo->cd_tipo_imovel.'" '.($tipo->cd_tipo_imovel == $imovel->cd_tipo_imovel ? 'selected' : '' ).'>'.$tipo->nm_tipo_imovel.'</option>';
                                                        break;
                                                    case "3":
                                                        $etc .= '<option value="'.$tipo->cd_tipo_imovel.'" '.($tipo->cd_tipo_imovel == $imovel->cd_tipo_imovel ? 'selected' : '' ).' >'.$tipo->nm_tipo_imovel.'</option>';
                                                        break;
                                                }
                                                
                                            }
                                        @endphp
                                        
                                        
                                                <optgroup label="Residencial">
                                                    {!! $res !!}
                                                </optgroup>
                                                <optgroup label="Comercial">
                                                    {!! $com !!}
                                                </optgroup>
                                                <optgroup label="Outros">
                                                    {!! $etc !!}
                                                </optgroup>
                                        
                                    </select>
                                </div>
                                
                            </div>
                        </div>
                        
                        <div class="bloco-titulo-cadastro">
                            <div class="form-row">
                                <div class="col-md-12">
                                    <h4>título do anúncio</h4>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-12">
                                   <input type="text" name="nm_titulo" id="nm_titulo" class="form-control" value="{{ $imovel->nm_titulo }}">
                                </div>
                            </div>
                        </div>
                        
                        <div class="bloco-endereco">
                            <div class="form-row">
                                <div class="col-md-12">
                                    <h4>Endereço</h4>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-4">
                                   <input type="text" name="cd_cep" id="cd_cep"  placeholder="CEP" class="form-control via_cep mask_cep" viacep="cep"  value="{{ $imovel->cd_cep }}">
                                </div>
                                
                                <div class="col-md-6">
                                   <input type="text" name="nm_endereco" id="nm_endereco"  placeholder="Endereco" class="form-control" viacep="logradouro"  value="{{ $imovel->nm_endereco }}">
                                </div>
                                
                                <div class="col-md-2">
                                   <input type="text" name="nm_numero" id="nm_numero" placeholder="nº" class="form-control"  viacep="numero"  value="{{ $imovel->nm_numero }}">
                                </div>
                            </div>
                            
                            <div class="form-row">
                                <div class="col-md-2">
                                   <input type="text" name="nm_complemento" id="nm_complemento" placeholder="Complemento" viacep="complemento" class="form-control" value="{{ $imovel->nm_complemento }}">
                                </div>
                                
                                <div class="col-md-2">
                                   <input type="text" name="nm_bairro" id="nm_bairro" placeholder="Bairro" viacep="bairro" class="form-control"  value="{{ $imovel->nm_bairro }}">
                                </div>
                                
                                <div class="col-md-6">
                                   <input type="text" name="nm_cidade" id="nm_cidade" placeholder="Cidade"  viacep="localidade" class="form-control" readonly="true"  value="{{ $imovel->nm_cidade }}">
                                </div>
                                <div class="col-md-2">
                                   <select id="cd_uf" name="cd_uf" class=" form-control{{ $errors->has('cd_uf') ? ' is-invalid' : '' }}" 
                                   readonly="true" viacep="uf" required>
                                    <option selected value disabled > UF </option>
                                    <option value="AC" @if($imovel->cd_uf == 'AC' ) selected @endif>AC </option>
                                    <option value="AL" @if($imovel->cd_uf == 'AL' ) selected @endif>AL </option>    
                                    <option value="AP" @if($imovel->cd_uf == 'AP' ) selected @endif>AP </option>    
                                    <option value="AM" @if($imovel->cd_uf == 'AM' ) selected @endif>AM </option>    
                                    <option value="BA" @if($imovel->cd_uf == 'BA' ) selected @endif >BA </option>  
                                    <option value="CE" @if($imovel->cd_uf == 'CE' ) selected @endif>CE </option> 
                                    <option value="DF" @if($imovel->cd_uf == 'DF' ) selected @endif>DF </option> 
                                    <option value="ES" @if($imovel->cd_uf == 'ES' ) selected @endif>ES  </option>                                   
                                    <option value="GO" @if($imovel->cd_uf == 'GO' ) selected @endif>GO </option>
                                    <option value="MA" @if($imovel->cd_uf == 'MA' ) selected @endif>MA </option>
                                    <option value="MT" @if($imovel->cd_uf == 'MT' ) selected @endif>MT  </option>
                                    <option value="MS" @if($imovel->cd_uf == 'MS' ) selected @endif>MS </option>    
                                    <option value="MG" @if($imovel->cd_uf == 'MG' ) selected @endif>MG </option>    
                                    <option value="PA" @if($imovel->cd_uf == 'PA' ) selected @endif>PA </option>    
                                    <option value="PB" @if($imovel->cd_uf == 'PB' ) selected @endif>PB </option>  
                                    <option value="PR" @if($imovel->cd_uf == 'PR' ) selected @endif>PR </option> 
                                    <option value="PE" @if($imovel->cd_uf == 'PE' ) selected @endif>PE </option> 
                                    <option value="PI" @if($imovel->cd_uf == 'PI' ) selected @endif>PI  </option>                                   
                                    <option value="RJ" @if($imovel->cd_uf == 'RJ' ) selected @endif >RJ </option>
                                    <option value="RN" @if($imovel->cd_uf == 'RN' ) selected @endif>RN</option>
                                    <option value="RS" @if($imovel->cd_uf == 'RS' ) selected @endif>RS</option> 
                                    <option value="RO" @if($imovel->cd_uf == 'RO' ) selected @endif>RO </option> 
                                    <option value="RR" @if($imovel->cd_uf == 'RR' ) selected @endif>RR  </option>                                   
                                    <option value="SC" @if($imovel->cd_uf == 'SC' ) selected @endif>SC</option>
                                    <option value="SP" @if($imovel->cd_uf == 'SP' ) selected @endif>SP</option>
                                    <option value="SE" @if($imovel->cd_uf == 'SE' ) selected @endif>SE</option>
                                    <option value="TO" @if($imovel->cd_uf == 'TO' ) selected @endif>TO</option>
                                </select>
                                </div>
                            </div>
                            
                        </div>
                        
                        <div class="dados-imovel">
                            <div class="form-row">
                                <div class="col-md-12">
                                    <h4>Dados do imóvel</h4>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-6">
                                    <select name="qt_quartos"  id="qt_quartos" class="form-control">
                                        <option disabled selected>Quartos</option>
                                        <option value="0" @if($imovel->qt_quartos == '0' ) selected @endif>Sem quarto</option>
                                        <option value="1" @if($imovel->qt_quartos == '1' ) selected @endif>1 quarto</option>
                                        <option value="2" @if($imovel->qt_quartos == '2' ) selected @endif>2 quartos</option>
                                        <option value="3" @if($imovel->qt_quartos == '3' ) selected @endif>3 quartos</option>
                                        <option value="4" @if($imovel->qt_quartos == '4' ) selected @endif>4 quartos</option>
                                        <option value="5" @if($imovel->qt_quartos == '5' ) selected @endif>5 quartos</option>
                                        <option value="6" @if($imovel->qt_quartos == '6' ) selected @endif>6 ou mais quartos</option>
                                    </select>
                                </div>
                                
                                <div class="col-md-6">
                                    <select name="qt_suites" id="qt_suites" class="form-control">
                                        <option disabled selected>Suítes</option>
                                        <option value="0" @if($imovel->qt_suites == '0' ) selected @endif>Sem suíte</option>
                                        <option value="1" @if($imovel->qt_suites == '1' ) selected @endif>1 suíte</option>
                                        <option value="2" @if($imovel->qt_suites == '2' ) selected @endif>2 suítes</option>
                                        <option value="3" @if($imovel->qt_suites == '3' ) selected @endif>3 suítes</option>
                                        <option value="4" @if($imovel->qt_suites == '4' ) selected @endif>4 suítes</option>
                                        <option value="5" @if($imovel->qt_suites == '5' ) selected @endif>5 suítes</option>
                                        <option value="6" @if($imovel->qt_suites == '6' ) selected @endif>6 ou mais suítes</option>
                                    </select>
                                </div>
                            </div>
                            
                            <div class="form-row">
                                <div class="col-md-6">
                                    <select name="qt_banheiro" id="qt_banheiro" class="form-control">
                                        <option disabled selected>Banheiros</option>
                                        <option value="0" @if($imovel->qt_banheiro == '0' ) selected @endif>Sem Banheiro</option>
                                        <option value="1" @if($imovel->qt_banheiro == '1' ) selected @endif>1 banheiros</option>
                                        <option value="2" @if($imovel->qt_banheiro == '2' ) selected @endif>2 banheiros</option>
                                        <option value="3" @if($imovel->qt_banheiro == '3' ) selected @endif>3 banheiros</option>
                                        <option value="4" @if($imovel->qt_banheiro == '4' ) selected @endif>4 banheiros</option>
                                        <option value="5" @if($imovel->qt_banheiro == '5' ) selected @endif>5 banheiros</option>
                                        <option value="6" @if($imovel->qt_banheiro == '6' ) selected @endif>6 ou mais banheiros</option>
                                    </select>
                                </div>
                                
                                <div class="col-md-6">
                                    <select name="qt_vagas" id="qt_vagas" class="form-control">
                                        <option disabled selected>Vagas</option>
                                        <option value="0"@if($imovel->qt_vagas == '0' ) selected @endif>Sem vaga</option>
                                        <option value="1"@if($imovel->qt_vagas == '1' ) selected @endif>1 vaga</option>
                                        <option value="2"@if($imovel->qt_vagas == '2' ) selected @endif >2 vagas</option>
                                        <option value="3"@if($imovel->qt_vagas == '3' ) selected @endif>3 vagas</option>
                                        <option value="4"@if($imovel->qt_vagas == '4' ) selected @endif>4 vagas</option>
                                        <option value="5"@if($imovel->qt_vagas == '5' ) selected @endif>5 vagas</option>
                                        <option value="6"@if($imovel->qt_vagas == '6' ) selected @endif>6 ou mais vagas</option>
                                    </select>
                                </div>
                            </div>
                            
                            <div class="form-row" style="display:none">
                                <div class="col-md-6">
                                    <select name="ic_deposito" id="ic_deposito" class="form-control">
                                        <option disabled selected>Depósito</option>
                                        <option value="1" @if($imovel->ic_deposito == '1' ) selected @endif>Sim</option>
                                        <option value="2" @if($imovel->ic_deposito == '2' ) selected @endif>Não</option>
                                    </select>
                                </div>
                                
                                <div class="col-md-6">
                                    <input type="date" name="dt_previsao_entrega" id="dt_previsao_entrega" value="{{ $imovel->dt_previsao_entrega }}" placeholder="Previsão de Entrega" class="form-control">
                                </div>
                            </div>
                            
                            <div class="form-row">
                                <div class="col-md-6">
                                    <input type="number" name="vl_area_util" id="vl_area_util" placeholder="Área útil (m2)" value="{{ $imovel->vl_area_util }}" class="form-control">
                                </div>
                                
                                <div class="col-md-6">
                                    <input type="number" name="vl_area_total" id="vl_area_total" placeholder="Área total (m2)" value="{{ $imovel->vl_area_total }}" class="form-control">
                                </div>
                            </div>
                            
                        </div>
                        <div class="status-imovel">
                            <div class="form-row" style="display:none">
                               <label for="customRange2">Range exemplo</label>
                                <input type="range" class="custom-range" min="0" max="5" id="customRange2">
                            </div>
                        </div>
                        
                        <div >
                            <div class="form-row">
                               <div class="col-md-12">
                                   <h4>Descrição do imóvel</h4>
                               </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-12">
                                    <textarea rows="4" cols="50" name="ds_imovel" id="ds_imovel" class="form-control">{{ $imovel->ds_imovel }}</textarea>
                                </div>
                            </div>
                        </div>
                        
                         <div class="valor-imovel">
                            <div class="form-row">
                               <div class="col-md-12">
                                   <h4>Valor do imóvel</h4>
                               </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-12">
                                    <div class="form-row">
                                        <div class="col-md-3">
                                            <label for="">Valor</label>
                                            <input type="text" name="vl_imovel" id="vl_imovel" placeholder="Valor do imóvel" class="form-control mask_money" value="{{ $imovel->vl_imovel }}">
                                        </div>
                                        
                                        <div class="col-md-3">
                                            <label for="">Valor do condomínio</label>
                                            <input type="text" name="vl_condominio" id="vl_condominio" placeholder="Valor condomínio" class="form-control mask_money" value="{{ $imovel->vl_condominio }}">
                                        </div>
                                        
                                        <div class="col-md-3">
                                            <label for="">Valor IPTU</label>
                                            <input type="text" name="vl_iptu" id="vl_iptu" placeholder="Valor IPTU" class="form-control mask_money" value="{{ $imovel->vl_iptu }}">
                                        </div>
                                        
                                        <div class="col-md-3">
                                            <label for="">Valor do m²</label>
                                            <input type="vl_m2" name="" id="vl_m2" placeholder="Valor do m²" class="form-control" readonly="true" >
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="col-md-6">
                                            <select name="cd_forma_pagamento" id="cd_forma_pagamento" class="form-control" >
                                                <option disabled selected>Forma de pagamento</option>
                                                <option value="1" @if($imovel->cd_forma_pagamento == '1' ) selected @endif> A vista </option>
                                                <option value="2" @if($imovel->cd_forma_pagamento == '2' ) selected @endif> Parcelado </option>
                                                <option value="3" @if($imovel->cd_forma_pagamento == '3' ) selected @endif> Permuta </option>
                                            </select>
                                        </div>
                                        <div class="col-md-6">
                                            
                                              
                                              <select name="ic_permuta" id="ic_permuta" class="form-control">
                                                <option disabled selected>Aceita Permuta?</option>
                                                <option value="1" @if($imovel->ic_permuta == '1' ) selected @endif> Sim </option>
                                                <option value="0" @if($imovel->ic_permuta == '0' ) selected @endif> Não </option>
                                                
                                            </select>
                                              
                                              
                                              
                                            
                                        </div>
                                    </div> 
                                </div>
                            </div>
                        </div>
                        
                        <div class="area-comuns" >
                            <div class="form-row">
                                <div class="col-md-12">
                                    <h4>áreas Comuns</h4>
                                </div>
                            </div>
                            <div class="form-row"> 
                                @php $ds_areas_comuns =  explode(';',$imovel->ds_areas_comuns); @endphp
                                @foreach( $AreasComuns as  $ac )
                                    <div class="col-md-4">
                                        <div>
                                            <input type="checkbox" name="ds_areas_comuns[]" 
                                             id="ac{{$ac->cd_areas_comuns}}" value="{{$ac->cd_areas_comuns}}" 
                                               @if(in_array($ac->cd_areas_comuns, $ds_areas_comuns)) checked @endif > 
                                            <label for="ac{{$ac->cd_areas_comuns}}" >
                                                {{((strtolower($ac->nm_areas_comuns)))}}
                                            </label> 
                                        </div>
                                    </div>
                                @endforeach 
                            </div>
                        </div>
                        
                        
                        <div class="area-privativa"  >
                            <div class="form-row">
                                <div class="col-md-12">
                                    <h4>áreas Privativas</h4>
                                </div>
                            </div>
                            
                            <div class="form-row">
                                
                                @php $ds_areas_privativas =  explode(';',$imovel->ds_areas_privativas); @endphp
                                @foreach($AreasPrivativas as $k=>$ap)
                                    <div class="col-md-4">
                                        <div>
                                            <input type="checkbox" name="ds_areas_privativas[]" 
                                            id="ap{{$ap->cd_areas_privativas}}" value="{{$ap->cd_areas_privativas}}" 
                                               @if(in_array($ap->cd_areas_privativas, $ds_areas_privativas)) checked @endif > 
                                            <label for="ap{{$ap->cd_areas_privativas}}" >
                                                {{((strtolower($ap->nm_areas_privativas)))}}
                                            </label> 
                                        </div>
                                    </div>
                                @endforeach 
                                
                            </div>
                        </div>
                        
                        <div class="fotos-imovel" > 
                            <div class="form-row">
                                <div class="col-md-12">
                                    <h4>Logo do Anunciante</h4>
                                </div>
                            </div>
                            <div class="form-row">
                                <div>
                                    <input type="file" accept="image/*" name="pic_anunciante"/>
                                    @if($imovel->cd_image_anunciante)
                                        <div class="alert alert-warning" >
                                            <p >Ao selecionar uma imagem você estará substituindo a imagem abaixo:</p>
                                            <img src="/images/sm/{{$imovel->cd_imovel}}/{{$imovel->imagem_anunciante->nm_link_sm}}" alt="Lodo do Anunciante">
                                            <a href="/imovel/fotos/{{$imovel->cd_imovel}}/anunciante" class="btn btn_danger"> Remover </a>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        
                        </div>
                        
                        <div class="fotos-imovel"  > 
                            <div class="form-row">
                                <div class="col-md-12">
                                    <h4>Vídeo do imóvel</h4>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-12">
                                    <input type="text" name="nm_link_youtube" placeholder="Link do youtube" class="form-control" value="{{$imovel->nm_link_youtube}}">
                                </div>
                            </div>
                        
                        </div>
                        
                        <button class="btn-flx" type="submit">ENVIAR</button>
                    </div>   
                   
                </form>
                
                <div class="fotos-imovel" > 
                    <div class="form-row">
                        <div class="col-md-12">
                            <h4> Fotos do Imóvel <small>(15 fotos)</small> </h4>
                        </div>
                    </div>
                    <div class="form-row">
                        <div>
                            <form id="container-anuncio-fotos" action="/imovel/fotos/{{$imovel->cd_imovel}}" method="POST" enctype="multipart/form-data">
                                 @csrf
                                <input type="file" id="pics_imovel" name="pics[]" multiple accept="image/*" style="display:none"/>
                                <button type="button" class="btn-flx" id="btn_pics" style=" width: unset; "> Selecionar novas fotos</button>
                                <div id="pics_list" style="display:none">
                                    <p> Arquivos selecionados: </p>
                                    <div id="preview_list">
                                        <li></li>
                                    </div>
                                    
                                    
                                    <button type="submit" class="btn-flx" > Enviar fotos </button>
                                </div>
                                
                            </form>
                        </div>
                    </div>
                </div>
                
                <div class="fotos-imovel" > 
                    <div class="form-row">
                        <div class="col-md-12">
                            <h5> Lista de fotos do imóvel: @if( count($imovel->imagens) > 0) {{ count($imovel->imagens) }} de 15 imagens @endif </h5>
                        </div>
                    </div>
                    <div class="form-row" id="list_pics">
                        @foreach($imovel->imagens as $im)
                            <div class="col-12 alert" >
                                <img src="/images/sm/{{$imovel->cd_imovel}}/{{$im->nm_link_sm}}" alt="{{$im->nm_descricao}}">
                                <a href="/imovel/fotos/{{$imovel->cd_imovel}}/remover/{{$im->cd_imagem}}" class="btn btn_danger"> Remover </a>
                            </div>
                        @endforeach
                    </div>
                </div>
                
            </div>
        </div>

    </article>
@endsection
@section('scripts')
<script type="text/javascript" src="{{ asset('js/imob.js') }}"></script>
@endsection
@section('styles')
<style type="text/css">
#preview_list {
    display: flex;
    flex-direction: row;
    height: 200px;
    width: 70vw;
    overflow: auto;
}

#preview_list img {
    width: unset;
    height: 170px;
    margin: 5px;
}
</style>
@endsection