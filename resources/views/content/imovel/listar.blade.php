@extends('layouts.app')
@section('title','Meus Imóveis')
@section('content')
    <div class="container">
        <hr>
    </div>
    <article>
        <div class="container-home">
            <div class="container-content" style="min-height: unset;">
                <div class="row">
                    <div class="col-md-5"></div>
                    <div class="col-md-7 row btn-group-lg btn-listar-inicio ">
                        <a href="/planos" class="btn btn-success w-50 rounded-0">VER PLANOS</a> 
                        <a href="/imovel/adicionar" class="btn btn-primary  ml-2 rounded-0">CADASTRAR NOVO IMÓVEL</a>
                    </div>
                </div>
                <h4>Meus Imóveis Cadastrados</h4>
                <p>
                    @if($imoveis_c == 0 )
                        Você não possui nenhum imovél cadastrado.
                    @else 
                        Você possui {{$imoveis_c}} {{ $imoveis_c == 1 ? 'imóvel cadastrado' : 'imóveis cadastrados'  }}. <br>
                        Você possui {{ $destaque->qt_destaques }} destaque(s) e está utilizando {{ $destaque->qt_imoveis_destacados }} destaque(s).<br>
                        Você possui {{ $super_destaque->qt_destaque }}  super destaque(s) e está utilizando {{ $super_destaque->qt_imoveis_destacados }} super destaque(s).<br>

                        
                    @endif
                </p>
                    @if($destaque && ($destaque->qt_destaques - $destaque->qt_imoveis_destacados < 0) )
                        <p class="alert alert-danger"> Você está utilizando mais <b>destaques</b> do que possui! Por gentileza ajuste seus destaques para que o mesmos funcionem perfeitamente. </p>
                    @endif
                    @if($super_destaque && ($super_destaque->qt_destaque - $super_destaque->qt_imoveis_destacados < 0) )
                        <p class="alert alert-danger"> Você está utilizando mais <b>super destaques</b> do que possui! Por gentileza ajuste seus destaques para que o mesmos funcionem perfeitamente. </p>
                    @endif
                <div class="row mt-4 mb-4">
                    <div class="col-md-6">
                    <b>Sobre o período de gratuidade:</b>
                    <p> Você terá 25 anúncios gratuitos com exibição padrão. Essa cortesia tem validade de 45 dias. 
                        Após este período, seus anúncios deixarão de ser exibidos e será necessário contratar um dos 
                        planos.  </p>
                    </div>
                </div>
            </div>
            <div class="container search">
                <div class="search-banner-principal px-4">
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
                                                
                                                <div class="col-md-8 mb-2 d-md-block">
                                                    <div class="titulo-busca">
                                                        <p>Onde ?</p>
                                                    </div>
                                                    <input type="text" name="Endereco" id="endereco" Placeholder="Endereço / Bairro / Cidade / UF..." value="{{$old_values->Endereco}}" />
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
            <div class="container-content">
                <div class="cards pb-2">
                    @foreach($imoveis as $imovel) 
                    <div class="card mb-3 search-card-imovel" >
                        <div class="row no-gutters relative">
                            <span class="destacar_imovel" data-toggle="tooltip" data-placement="bottom" title="
                            {{($imovel->ic_destaque == 2 ? 'Imóvel Super Destaque.' : ($imovel->ic_destaque == 1 ? 'Imóvel Destaque.' : 'Imóvel sem destaque.')) }} 
                            " onclick="destacarImovel({{$imovel->cd_imovel}},{{$imovel->ic_destaque}},'{{$imovel->nm_titulo}}')" >
                                <i class="{{ $imovel->ic_destaque >= 1 ? 'fas' : 'far' }} {{ ($imovel->ic_destaque == 1 ? 'active' : ($imovel->ic_destaque == 2 ? 'super' : '')) }} fa-bookmark"></i>
                            </span>
                            <div class="col-md-4 img-search-card-imovel">
                            <a href="/imovel/editar/{{$imovel->cd_imovel}}"> <img class="card-img-top" src="{{env('APP_URL').'/images/lg/'.$imovel->cd_imovel.'/'.$imovel->nm_link}}" onerror=' this.src = "/images/default.png"'></a>
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <div class="col-md-12 row">
                                      <div class="col-md-10">
                                            <h4 class="flx-title">{{$imovel->nm_tipo_imovel}}/{{$imovel->nm_tipo_anuncio}} - {{$imovel->ic_destaque}}</h4>
                                            <h5 class="flx-sub-title">{{$imovel->nm_bairro}} - {{$imovel->nm_cidade}}/{{$imovel->cd_uf}}</h5>
                                      </div>
                                      <div class="col-md-2">
                                        <img src="{{env('APP_URL').'/images/sm/'.$imovel->cd_imovel.'/'.$imovel->imagem_anunciante_nm_link}}" height="50" alt=" Logo do Anunciante">
                                      </div>
                                    </div>
                                    <div class="icons inline" style="padding:10px 1px">
                                        <div class="icon-dormitorios">
                                            <img class="card-img-top icones-home" src="/img/icon/cama_icon.png"> 
                                            <span class="icone-info" id="qt_dormitorios">{{($imovel->qt_quartos?$imovel->qt_quartos:'-')}} Dorm(s).</span>
                                        </div>
                                        <div class="icon-area">
                                            <img class="card-img-top icones-home" src="/img/icon/metro_icon.png">
                                            <span class="icone-info" id="qt_area">{{($imovel->vl_area_util?$imovel->vl_area_util:'-')}} m²</span>
                                        </div>
                                        <div class="icon-area">
                                            <img class="card-img-top icones-home" src="/img/icon/garagem_icon.png">
                                            <span class="icone-info" id="qt_area">{{($imovel->qt_vagas?$imovel->qt_vagas:'-')}} Vaga(s)</span>
                                        </div>
                                        <div class="icon-area">
                                            <img class="card-img-top icones-home" src="/img/icon/banheiro_icon.png">
                                            <span class="icone-info" id="qt_area">{{($imovel->qt_banheiro?$imovel->qt_banheiro:'-')}} Banheiro(s)</span>
                                        </div>
                                    </div>
                                    <a href="/imovel/editar/{{$imovel->cd_imovel}}" class="btn btn-destaques destaques pin-bottom-right"> Editar </a>
                                    @if($imovel->vl_imovel > 0)
                                    <span class="value-search flx-title">R$ {{number_format($imovel->vl_imovel,2,',','.')}}</span>
                                    <span class="sub-value-search"><small class="text-muted">Valor do m² R$ {{number_format(($imovel->vl_imovel/$imovel->vl_area_util),2,',','.')}}</small></span>
                                    @else
                                    <span class="value-search flx-title">Sob Consulta.</span>
                                    <span class="sub-value-search"><small class="text-muted">Para mais informações entre em contato.</small></span>

                                    @endif
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                <div class="pagination-container my-3 float-right table-responsive">
                    {{ $imoveis->links() }}
                </div>
            </div>
        </div>
    </article>
@endsection
@section('scripts')
<script type="text/javascript" src="{{ asset('js/imob.js') }}"></script>
<script>
window.lrv_data = {
    min:{{$filter->min_value}},
    max:{{$filter->max_value}},
    values:[ {{($old_values->precoDe?$old_values->precoDe:$filter->min_value)}}, {{($old_values->precoAte?$old_values->precoAte:$filter->max_value)}}  ]
};
function destacarImovel(id, status_imovel, titulo) {
    let destaques = {{ $destaque->qt_destaques - $destaque->qt_imoveis_destacados }};
    let super_destaques = {{ $super_destaque->qt_destaque - $super_destaque->qt_imoveis_destacados }}; 
    switch (status_imovel) {
        case 0:
            if(destaques>0){
                $.sweetModal({
                    title: 'Destacar imóvel "'+titulo+'"?',
                    content: 'Você possui "'+destaques+'" destaque(s) disponível(eis), deseja dar destaque a este imóvel ?',
                    buttons: {
                        someOtherAction: {
                            label: 'Cancelar',
                            classes: 'secondaryB bordered flat',
                            action: function() {
                                $(".sweet-modal-close-link").click();
                                return false;
                            }
                        },

                        someAction: {
                            label: 'Destacar',
                            classes: '',
                            action: function() {
                                postDestaque(id);
                                $(".sweet-modal-close-link").click();
                                return false
                            }
                        },
                    }
                });
            }else{
                $.sweetModal('Você não possui destaques!', '<a href="/planos">Para dar destaques em seus imóveis, compre destaques aqui.</a>');
            }
            break;
        case 1:
        case 2:
            let actions = {
                cancelar: {
                    label: 'Cancelar',
                    classes: 'secondaryB bordered flat',
                    action: function() {
                        $(".sweet-modal-close-link").click();
                        return false;
                    }
                },

                retirarDestaque: {
                    label: 'Retirar Destaque',
                    classes: 'redB',
                    action: function() {
                        postDestaque(id, 1);
                        $(".sweet-modal-close-link").click();
                        return false
                    }
                }
            };
            if(super_destaques > 0 && status_imovel == 1){
                actions.destacar= {
                    label: 'Super Destaque',
                    classes: '',
                    action: function() {
                        postDestaque(id);
                        $(".sweet-modal-close-link").click();
                        return false
                    }
                };
            }
            $.sweetModal({
                title: ' Alterando Destaque do imóvel "'+titulo+'" ',
                content: ' Você possui "'+super_destaques+'" super destaque(s) disponível(eis), o que deseja fazer ?',
                buttons: actions
            }); 
            break;
    }
}
function postDestaque(id, retirar = 0){
    $.post('/imovel/destacar',{id:id, retirar:retirar}).done(function(){
        window.location.reload();
    });
}
</script>
@endsection

@section('styles')
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">  
<style>
</style>
@endsection