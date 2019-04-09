@extends('layouts.app')
@section('title','Cadastro')
@section('content')
    <div class="container">
        <hr>
    </div>
    <article>
        <div class="container">
            <div class="container-content">
                <form id="container-anuncio" action="#" method="POST">
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
                                     <option value="{{$anunciante->cd_tipo_anunciante}}">{{$anunciante->nm_tipo_anunciante}}</option>
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
                                        <option value="">Selecione o tipo do anúncio</option>
                                        @foreach($tipo_anuncio as $anuncio)
                                         <option value="{{$anuncio->cd_tipo_anuncio}}" >{{$anuncio->nm_tipo_anuncio}}</option>
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
                                                        $res .= '<option value="'.$tipo->cd_tipo_imovel.'">'.$tipo->nm_tipo_imovel.'</option>';
                                                        break;
                                                    case "2":
                                                        $com .= '<option value="'.$tipo->cd_tipo_imovel.'">'.$tipo->nm_tipo_imovel.'</option>';
                                                        break;
                                                    case "3":
                                                        $etc .= '<option value="'.$tipo->cd_tipo_imovel.'">'.$tipo->nm_tipo_imovel.'</option>';
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
                                   <input type="text" name="nm_titulo" id="nm_titulo" class="form-control">
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
                                   <input type="text" name="cd_cep" id="cd_cep"  placeholder="CEP" class="form-control via_cep mask_cep" viacep="cep">
                                </div>
                                
                                <div class="col-md-6">
                                   <input type="text" name="nm_endereco" id="nm_endereco"  placeholder="Endereço" class="form-control" viacep="logradouro">
                                </div>
                                
                                <div class="col-md-2">
                                   <input type="text" name="nm_numero" id="nm_numero" placeholder="nº" class="form-control"  viacep="numero">
                                </div>
                            </div>
                            
                            <div class="form-row">
                                <div class="col-md-2">
                                   <input type="text" name="nm_complemento" id="nm_complemento" placeholder="Complemento" viacep="complemento" class="form-control">
                                </div>
                                
                                <div class="col-md-2">
                                   <input type="text" name="nm_bairro" id="nm_bairro" placeholder="Bairro" viacep="bairro" class="form-control">
                                </div>
                                
                                <div class="col-md-6">
                                   <input type="text" name="nm_cidade" id="nm_cidade" placeholder="Cidade"  viacep="localidade" class="form-control" readonly="true">
                                </div>
                                <div class="col-md-2">
                                   <select id="cd_uf" name="cd_uf" class=" form-control{{ $errors->has('cd_uf') ? ' is-invalid' : '' }}" 
                                   readonly="true" viacep="uf" required>
                                    <option selected value disabled > UF </option>
                                    <option value="AC">AC </option>
                                    <option value="AL">AL </option>    
                                    <option value="AP">AP </option>    
                                    <option value="AM">AM </option>    
                                    <option value="BA">BA </option>  
                                    <option value="CE">CE </option> 
                                    <option value="DF">DF </option> 
                                    <option value="ES">ES  </option>                                   
                                    <option value="GO">GO </option>
                                    <option value="MA">MA </option>
                                    <option value="MT">MT  </option>
                                    <option value="MS">MS </option>    
                                    <option value="MG">MG </option>    
                                    <option value="PA">PA </option>    
                                    <option value="PB">PB </option>  
                                    <option value="PR">PR </option> 
                                    <option value="PE">PE </option> 
                                    <option value="PI">PI  </option>                                   
                                    <option value="RJ">RJ </option>
                                    <option value="RN">RN</option>
                                    <option value="RS">RS</option> 
                                    <option value="RO">RO </option> 
                                    <option value="RR">RR  </option>                                   
                                    <option value="SC">SC</option>
                                    <option value="SP">SP</option>
                                    <option value="SE">SE</option>
                                    <option value="TO">TO</option>
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
                                        <option value="0">Sem quarto</option>
                                        <option value="1">1 quarto</option>
                                        <option value="2">2 quartos</option>
                                        <option value="3">3 quartos</option>
                                        <option value="4">4 quartos</option>
                                        <option value="5">5 quartos</option>
                                        <option value="6">6 ou mais quartos</option>
                                    </select>
                                </div>
                                
                                <div class="col-md-6">
                                    <select name="qt_suites" id="qt_suites" class="form-control">
                                        <option disabled selected>Suítes</option>
                                        <option value="0">Sem suíte</option>
                                        <option value="1">1 suíte</option>
                                        <option value="2">2 suítes</option>
                                        <option value="3">3 suítes</option>
                                        <option value="4">4 suítes</option>
                                        <option value="5">5 suítes</option>
                                        <option value="6">6 ou mais suítes</option>
                                    </select>
                                </div>
                            </div>
                            
                            <div class="form-row">
                                <div class="col-md-6">
                                    <select name="qt_banheiro" id="qt_banheiro" class="form-control">
                                        <option disabled selected>Banheiros</option>
                                        <option value="0">Sem Banheiro</option>
                                        <option value="1">1 banheiros</option>
                                        <option value="2">2 banheiros</option>
                                        <option value="3">3 banheiros</option>
                                        <option value="4">4 banheiros</option>
                                        <option value="5">5 banheiros</option>
                                        <option value="6">6 ou mais banheiros</option>
                                    </select>
                                </div>
                                
                                <div class="col-md-6">
                                    <select name="qt_vagas" id="qt_vagas" class="form-control">
                                        <option disabled selected>Vagas</option>
                                        <option value="0">Sem vaga</option>
                                        <option value="1">1 vaga</option>
                                        <option value="2">2 vagas</option>
                                        <option value="3">3 vagas</option>
                                        <option value="4">4 vagas</option>
                                        <option value="5">5 vagas</option>
                                        <option value="6">6 ou mais vagas</option>
                                    </select>
                                </div>
                            </div>
                            
                            <div class="form-row" style="display:none">
                                <div class="col-md-6">
                                    <select name="cadastro_dados_imovel_deposito" id="cadastro_dados_imovel_deposito" class="form-control">
                                        <option disabled selected>Depósito</option>
                                        <option value="1">Sim</option>
                                        <option value="2">Não</option>
                                    </select>
                                </div>
                                
                                <div class="col-md-6">
                                    <input type="date" name="cadastro_dados_dt_entrega" id="cadastro_dados_dt_entrega" placeholder="Previsão de Entrega" class="form-control">
                                </div>
                            </div>
                            
                            <div class="form-row">
                                <div class="col-md-6">
                                    <input type="number" name="vl_area_util" id="vl_area_util" placeholder="Área útil (m2)" class="form-control">
                                </div>
                                
                                <div class="col-md-6">
                                    <input type="number" name="vl_area_total" id="vl_area_total" placeholder="Área total (m2)" class="form-control">
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
                                    <textarea rows="4" cols="50" name="ds_imovel" id="ds_imovel" class="form-control"></textarea>
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
                                            <input type="text" name="vl_imovel" id="vl_imovel" placeholder="Valor do Imóvel" class="form-control mask_money">
                                        </div>
                                        
                                        <div class="col-md-3">
                                            <label for="">Valor do condomínio</label>
                                            <input type="text" name="vl_condominio" id="vl_condominio" placeholder="Valor condomínio" class="form-control mask_money">
                                        </div>
                                        
                                        <div class="col-md-3">
                                            <label for="">Valor IPTU</label>
                                            <input type="text" name="vl_iptu" id="vl_iptu" placeholder="Valor IPTU" class="form-control mask_money">
                                        </div>
                                        
                                        <div class="col-md-3">
                                            <label for="">Valor do m²</label>
                                            <input type="vl_m2" name="" id="vl_m2" placeholder="Valor do m²" class="form-control" readonly="true">
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="col-md-6">
                                            <select name="cd_forma_pagamento" id="cd_forma_pagamento" class="form-control">
                                                <option disabled selected>Forma de pagamento</option>
                                                <option value="1"> A vista </option>
                                                <option value="2"> Parcelado </option>
                                                <option value="3"> Permuta </option>
                                            </select>
                                        </div>
                                        <div class="col-md-6">
                                            
                                              
                                              <select name="ic_permuta" id="ic_permuta" class="form-control">
                                                <option disabled selected>Aceita Permuta</option>
                                                <option value="1"> Sim </option>
                                                <option value="0"> Não </option>
                                                
                                            </select>
                                              
                                              
                                              
                                            
                                        </div>
                                    </div> 
                                </div>
                            </div>
                        </div>
                        
                        <div class="area-comuns" style="display:none">
                            <div class="form-row">
                                <div class="col-md-12">
                                    <h4>Areas Comuns</h4>
                                </div>
                            </div>
                            
                            <div class="form-row">
                                <div class="col-md-2">
                                    <div>
                                      <input type="checkbox" id="scales" name="scales" checked>
                                      <label for="scales">Scales</label>
                                    </div>
                                    
                                    <div>
                                      <input type="checkbox" id="horns" name="horns">
                                      <label for="horns">Horns</label>
                                    </div>
                                    
                                    <div>
                                      <input type="checkbox" id="horns" name="horns">
                                      <label for="horns">Horns</label>
                                    </div>
                                </div>
                                
                                <div class="col-md-2">
                                    <div>
                                      <input type="checkbox" id="scales" name="scales" checked>
                                      <label for="scales">Scales</label>
                                    </div>
                                    
                                    <div>
                                      <input type="checkbox" id="horns" name="horns">
                                      <label for="horns">Horns</label>
                                    </div>
                                    
                                    <div>
                                      <input type="checkbox" id="horns" name="horns">
                                      <label for="horns">Horns</label>
                                    </div>
                                </div>
                                
                                <div class="col-md-2">
                                    <div>
                                      <input type="checkbox" id="scales" name="scales" checked>
                                      <label for="scales">Scales</label>
                                    </div>
                                    
                                    <div>
                                      <input type="checkbox" id="horns" name="horns">
                                      <label for="horns">Horns</label>
                                    </div>
                                    
                                    <div>
                                      <input type="checkbox" id="horns" name="horns">
                                      <label for="horns">Horns</label>
                                    </div>
                                </div>
                                
                                <div class="col-md-2">
                                    <div>
                                      <input type="checkbox" id="scales" name="scales" checked>
                                      <label for="scales">Scales</label>
                                    </div>
                                    
                                    <div>
                                      <input type="checkbox" id="horns" name="horns">
                                      <label for="horns">Horns</label>
                                    </div>
                                    
                                    <div>
                                      <input type="checkbox" id="horns" name="horns">
                                      <label for="horns">Horns</label>
                                    </div>
                                </div>
                                
                                <div class="col-md-2">
                                    <div>
                                      <input type="checkbox" id="scales" name="scales" checked>
                                      <label for="scales">Scales</label>
                                    </div>
                                    
                                    <div>
                                      <input type="checkbox" id="horns" name="horns">
                                      <label for="horns">Horns</label>
                                    </div>
                                    
                                    <div>
                                      <input type="checkbox" id="horns" name="horns">
                                      <label for="horns">Horns</label>
                                    </div>
                                </div>
                                
                                <div class="col-md-2">
                                    <div>
                                      <input type="checkbox" id="scales" name="scales" checked>
                                      <label for="scales">Scales</label>
                                    </div>
                                    
                                    <div>
                                      <input type="checkbox" id="horns" name="horns">
                                      <label for="horns">Horns</label>
                                    </div>
                                    
                                    <div>
                                      <input type="checkbox" id="horns" name="horns">
                                      <label for="horns">Horns</label>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                        
                        
                        <div class="area-privativa" style="display:none">
                            <div class="form-row">
                                <div class="col-md-12">
                                    <h4>Areas Privativas</h4>
                                </div>
                            </div>
                            
                            <div class="form-row">
                                <div class="col-md-2">
                                    <div>
                                      <input type="checkbox" id="scales" name="scales" checked>
                                      <label for="scales">Scales</label>
                                    </div>
                                    
                                    <div>
                                      <input type="checkbox" id="horns" name="horns">
                                      <label for="horns">Horns</label>
                                    </div>
                                    
                                    <div>
                                      <input type="checkbox" id="horns" name="horns">
                                      <label for="horns">Horns</label>
                                    </div>
                                </div>
                                
                                <div class="col-md-2">
                                    <div>
                                      <input type="checkbox" id="scales" name="scales" checked>
                                      <label for="scales">Scales</label>
                                    </div>
                                    
                                    <div>
                                      <input type="checkbox" id="horns" name="horns">
                                      <label for="horns">Horns</label>
                                    </div>
                                    
                                    <div>
                                      <input type="checkbox" id="horns" name="horns">
                                      <label for="horns">Horns</label>
                                    </div>
                                </div>
                                
                                <div class="col-md-2">
                                    <div>
                                      <input type="checkbox" id="scales" name="scales" checked>
                                      <label for="scales">Scales</label>
                                    </div>
                                    
                                    <div>
                                      <input type="checkbox" id="horns" name="horns">
                                      <label for="horns">Horns</label>
                                    </div>
                                    
                                    <div>
                                      <input type="checkbox" id="horns" name="horns">
                                      <label for="horns">Horns</label>
                                    </div>
                                </div>
                                
                                <div class="col-md-2">
                                    <div>
                                      <input type="checkbox" id="scales" name="scales" checked>
                                      <label for="scales">Scales</label>
                                    </div>
                                    
                                    <div>
                                      <input type="checkbox" id="horns" name="horns">
                                      <label for="horns">Horns</label>
                                    </div>
                                    
                                    <div>
                                      <input type="checkbox" id="horns" name="horns">
                                      <label for="horns">Horns</label>
                                    </div>
                                </div>
                                
                                <div class="col-md-2">
                                    <div>
                                      <input type="checkbox" id="scales" name="scales" checked>
                                      <label for="scales">Scales</label>
                                    </div>
                                    
                                    <div>
                                      <input type="checkbox" id="horns" name="horns">
                                      <label for="horns">Horns</label>
                                    </div>
                                    
                                    <div>
                                      <input type="checkbox" id="horns" name="horns">
                                      <label for="horns">Horns</label>
                                    </div>
                                </div>
                                
                                <div class="col-md-2">
                                    <div>
                                      <input type="checkbox" id="scales" name="scales" checked>
                                      <label for="scales">Scales</label>
                                    </div>
                                    
                                    <div>
                                      <input type="checkbox" id="horns" name="horns">
                                      <label for="horns">Horns</label>
                                    </div>
                                    
                                    <div>
                                      <input type="checkbox" id="horns" name="horns">
                                      <label for="horns">Horns</label>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                        
                        <div class="fotos-imovel"  style="display:none"> 
                            <div class="form-row">
                                <div class="col-md-12">
                                    <h4>Fotos do Imóvel</h4>
                                </div>
                            </div>
                            <div class="form-row">
                                <div>
                                    <button type="button" class="btn btn-success">Cancelar envio</button>
                                    <button type="button" class="btn btn-primary">Enviar</button>
                                    <button type="button" class="btn btn-warning">Cancelar envio</button>
                                    <button type="button" class="btn btn-danger">Apagar todos</button>
                                </div>
                            </div>
                        
                        </div>
                         
                        <div class="fotos-imovel"  style="display:none"> 
                            <div class="form-row">
                                <div class="col-md-12">
                                    <h4>Logo do Anunciante</h4>
                                </div>
                            </div>
                            <div class="form-row">
                                <div>
                                    <input type="file" name=""/>
                                </div>
                            </div>
                        
                        </div>
                        
                        <div class="fotos-imovel"  style="display:none"> 
                            <div class="form-row">
                                <div class="col-md-12">
                                    <h4>Video do imóvel</h4>
                                </div>
                            </div>
                            <div class="form-row">
                                <div>
                                    <input type="text" name="" placeholder="link do youtube" class="form-control">
                                </div>
                            </div>
                        
                        </div>
                        
                        <button class="btn-flx" type="submit">ENVIAR</button>
                    </div>   
                   
                </form>
            </div>
        </div>

    </article>
@endsection
@section('scripts')
<script type="text/javascript" src="{{ asset('js/imob.js') }}"></script>
@endsection