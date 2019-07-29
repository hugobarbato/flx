@extends('layouts.app')
@section('title','Cadastro')
@section('content')
    <div class="container">
        <hr>
    </div>
    <article style=" padding-bottom: 30px;">
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
                                     <option value="{{$anunciante->cd_tipo_anunciante}}">{{$anunciante->nm_tipo_anunciante}}</option>
                                    @endforeach
                                    <option value="5">Hotel ( em desenvolvimento )</option>
                                    <option value="-2" disabled>Hotel - venda ( em desenvolvimento )</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="cadastro-geral">   
                        <div class="bloco-cadastro-imovel" id="bloco_cadastro_imovel">
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
                                        <option value="">Selecione o tipo </option>
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
                        
                        <!-- <div class="classificacao">
                            <div class="row">
                                <div class="col-md-12">
                                    <h4>Classificação (estrelas) </h4>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="classificacao-tipos">                                    
                                        <div class="simples" value="1">
                                            <p>Simples</p>
                                            <div class="star">
                                                <i class="fa fa-star" aria-hidden="true"></i>
                                            </div>
                                        </div>
                                        <div class="econimico" value="2">
                                            <p>Econômico</p>
                                            <div class="star">
                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                <i class="fa fa-star" aria-hidden="true"></i>
                                            </div>
                                            
                                        </div>
                                        <div class="turismo" value="3">
                                            <p>Turismo</p>
                                             <div class="star">
                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                <i class="fa fa-star" aria-hidden="true"></i>
                                            </div>
                                        </div>
                                        <div class="superior" value="4">
                                            <p>Superior</p>
                                             <div class="star">
                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                <i class="fa fa-star" aria-hidden="true"></i>
                                            </div>
                                        </div>
                                        <div class="luxo" value="5">
                                            <p>Luxo</p>
                                             <div class="star">
                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                <i class="fa fa-star" aria-hidden="true"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                        </div> -->
                        
                        <div class="dados-imovel">
                            <div class="form-row">
                                <div class="col-md-12">
                                    <h4>Informações</h4>
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
                            
                            <div class="form-row">
                                <div class="col-md-6">
                                    <input type="number" name="vl_area_util" id="vl_area_util" placeholder="Área útil (m2)" class="form-control">
                                </div>
                                
                                <div class="col-md-6">
                                    <input type="number" name="vl_area_total" id="vl_area_total" placeholder="Área total (m2)" class="form-control">
                                </div>
                            </div>

                            <div class="form-row IncorporadoraFields" style="display:none" >
                                <div class="col-md-6">
                                    <select name="ic_status" id="ic_status" class="form-control" required>
                                        <option disabled selected> Status atual </option>
                                        <option value="1">Breve Lançamento </option>
                                        <option value="2">Na Planta</option>
                                        <option value="3">Em Obras</option>
                                        <option value="4">Pronto</option>
                                    </select>
                                </div>
                                
                                <div class="col-md-4">
                                    <input type="date" name="dt_previsao_entrega" id="dt_previsao_entrega" placeholder="Entrega em:" class="form-control">
                                </div>
                                
                                <div class="col-md-2">
                                    <select name="ic_deposito" id="ic_deposito" class="form-control">
                                        <option disabled selected>Depósito</option>
                                        <option value="1">Sim</option>
                                        <option value="2">Não</option>
                                    </select>
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
                                   <h4>Descrição </h4>
                               </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-12">
                                    <textarea rows="4" cols="50" name="ds_imovel" id="ds_imovel" class="form-control"></textarea>
                                </div>
                            </div>
                        </div>
                        
                       
                        
                        <!-- <div class="animais-estimacao">
                            <div class="form-row">
                                <div class="col-md-12">
                                    <h4>Animais de Estimção?</h4>
                                </div>
                            </div>
                             <div class="form-row">
                                <div class="col-md-6">
                                    <select name="ic_animal_estimacao" id="ic_animal_estimacao" class="form-control">
                                        <option disabled selected>Selecione</option>
                                        <option value="1">Permitido</option>
                                        <option value="2">Não Permitido</option>
                                    </select>
                                </div>
                            </div>
                        </div> -->
                        
                        
                        
                         <div class="valor-imovel">
                            <div class="form-row">
                               <div class="col-md-12">
                                   <h4>Valor </h4>
                               </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-12">
                                    <div class="form-row IncorporadoraFields" >

                                        <div class="col-md-3">
                                            <label> <input type="radio" name="ic_valor_mensagem" class="valor_mensagem" value="1" checked > Valor </label>
                                        </div>
                                        <div class="col-md-3">
                                            <label> <input type="radio" name="ic_valor_mensagem" class="valor_mensagem" value="2"> A partir de </label>
                                        </div>
                                        <div class="col-md-3">
                                            <label> <input type="radio" name="ic_valor_mensagem" class="valor_mensagem" value="" > Sob consulta </label>
                                        </div>

                                    </div>
                                    <div class="form-row InputsValores">
                                        <div class="col-md-3">
                                            <label for="">Valor</label>
                                            <input type="text" name="vl_imovel" id="vl_imovel" placeholder="Valor " class="form-control mask_money">
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
                                    <div class="form-row InputsValores">
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
                                    
                                    <!-- <div class="hotelFields">
                                        <div class="row">
                                            <div class="col-md-3">
                                                <label for="">Valor da diária</label>
                                                <input type="text" name="vl_condominio" id="vl_condominio" placeholder="Valor da diária" class="form-control mask_money">
                                            </div>
                                            
                                            <div class="col-md-3">
                                                <label for="">Promoção(%)</label>
                                                <input type="text" name="vl_iptu" id="vl_iptu" placeholder="Promoção" class="form-control mask_money">
                                            </div>
                                            
                                            <div class="col-md-6">
                                                <label for="">Cancelamento</label>
                                                <select name="" id="" class="form-control">
                                                    <option disabled selected>Cancelamento</option>
                                                    <option value="1"> Sim </option>
                                                    <option value="0"> Não </option> 
                                                </select>
                                                
                                            </div>
                                        </div>
                                    </div> -->
                                    
                                    
                                </div>
                            </div>
                        </div>
                        
                        <div class="area-comuns" style="display:none">
                            <div class="form-row">
                                <div class="col-md-12">
                                    <h4>áreas Comuns</h4>
                                </div>
                            </div>
                            
                            <div id="AreasComunsChecks" class="form-row">
                                
                            </div>
                        </div>
                        
                        
                        <div class="area-privativa" style="display:none">
                            <div class="form-row">
                                <div class="col-md-12">
                                    <h4>áreas Privativas</h4>
                                </div>
                            </div>
                            
                            <div id="AreasPrivativasChecks" class="form-row">
                                
                            </div>
                        </div>
                        
                         
                        <div > 
                            <div class="form-row">
                                <div class="col-md-12">
                                    <h4>Logo do <span class="logo-anunciante">Anunciante</span></h4>
                                </div>
                            </div>
                            <div class="form-row">
                                <div>
                                    <input type="file" accept="image/*" name="pic_anunciante"/>
                                </div>
                            </div>
                        
                        </div>
                        
                        <div > 

                            <div class="form-row">
                                <div class="col-md-12">
                                    <h4>Vídeo do <span class="video-anunciante">Anunciante</span></h4>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-12">
                                    <input type="text" name="nm_link_youtube" placeholder="Link do youtube" class="form-control" >
                                </div>
                            </div>
                        
                        </div>
                        
                        <button class="btn-flx" type="submit">Cadastrar</button>
                    </div>   
                   
                </form>
            </div>
        </div>

    </article>
@endsection
@section('scripts')
<script type="text/javascript" src="{{ asset('js/imob.js') }}"></script>
@endsection