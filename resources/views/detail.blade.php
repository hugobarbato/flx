@extends('layouts.app')
@section('title','Detalhe do Imóvel')
@section('content')
@include('layouts.banner')

    <article>
        <div class="container">
            <div class="container-home">
                <div class="pb-2">
                    <div class="row pb-2">
                        <div class="col-md-12 destaques">
                            <h2 >Detalhe do Imóvel</h2>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-8">

                            <div id="detail_imovel_carousel" class="carousel slide" data-ride="carousel">
                                <div class="carousel-inner">
                                    @foreach($imovel->imagens as $k=>$img)
                                    <div class="detail-image-carousel carousel-item @if($k==0) active @endif " >
                                        <img class="card-img-top" src="{{env('APP_URL').'/images/lg/'.$img->cd_imovel.'/'.$img->nm_link}}" onerror=' this.src = "/images/default.png"'>
                                    </div>
                                    @endforeach
                                </div>
                                <a class="carousel-control-prev" href="#detail_imovel_carousel" role="button" data-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Previous</span>
                                </a>
                                <a class="carousel-control-next" href="#detail_imovel_carousel" role="button" data-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Next</span>
                                </a>
                            </div>
                            <div class="scroll-imagem"> 
                            <!-- d-flex flex-wrap -->
                                @foreach($imovel->imagens as $id=>$img)
                                <div class="small-img-controls" data-target="#detail_imovel_carousel"data-slide-to="{{$id}}" class="active">
                                    <img width="70" height="50" src="{{env('APP_URL').'/images/lg/'.$img->cd_imovel.'/'.$img->nm_link}}" onerror=' this.src = "/images/default.png"'>
                                </div>
                                @endforeach
                            </div>

                            <div class="mapouter">
                                <div class="gmap_canvas">
                                    <iframe id="gmap_canvas" tyle="overflow:hidden;height:100%;width:100%" height="100%" width="100%"
                                        src="https://maps.google.com/maps?q={{urlencode($imovel->cd_cep)}}&t=&z=13&ie=UTF8&iwloc=&output=embed" 
                                            frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>
                                </div>
                            </div>

                        @if(count($AreasComuns))
                            <div class="area-comuns mt-4" >
                            <div class="form-row">
                                <div class="col-md-12">
                                    <h4>áreas Comuns</h4> 
                                </div>
                            </div>
                            <div id="AreasComunsChecks" class="form-row"> 
                                @foreach( $AreasComuns as  $ac )
                                    <div class="col-md-4">
                                        <div> 
                                            <i class="fa fa-circle"></i>
                                            <label for="ac{{$ac->cd_areas_comuns}}" >
                                                {{((ucwords($ac->nm_areas_comuns)))}}
                                            </label> 
                                        </div>
                                    </div>
                                @endforeach 
                            </div>
                        </div>
                        @endif
                        @if(count($AreasPrivativas))
                        
                        <div class="area-privativa"  >
                            <div class="form-row">
                                <div class="col-md-12">
                                    <h4>áreas Privativas</h4>
                                    <input type="hidden" id="ds_areas_privativas" value="{{$imovel->ds_areas_privativas}}">
                                </div>
                            </div>
                            
                            <div id="AreasPrivativasChecks" class="form-row">
                                @foreach($AreasPrivativas as $k=>$ap)
                                    <div class="col-md-4">
                                        <div> 
                                            <i class="fa fa-circle"></i>
                                            <label for="ap{{$ap->cd_areas_privativas}}" >
                                                {{((ucwords($ap->nm_areas_privativas)))}}
                                            </label> 
                                        </div>
                                    </div>
                                @endforeach 
                                
                            </div>
                        </div>
                        @endif

                            
                        </div>
                        <div class="col-md-4">
                                <h4>{{$imovel->nm_titulo}}</h4>
                                <h4 class="flx-title">{{$imovel->nm_tipo_imovel}}/{{$imovel->nm_tipo_anuncio}}</h4>
                                <h5 class="flx-sub-title">{{$imovel->nm_endereco}}, {{$imovel->nm_bairro}} - {{$imovel->nm_cidade}}/{{$imovel->cd_uf}}</h5>
                                <div class="imovel-vl-home w-100"> @if($imovel->vl_imovel > 0) R$ {{number_format($imovel->vl_imovel,2,',','.')}} @else Sob Consulta. @endif</div>
                                <div class="dropdown-divider"></div>
                                <div class="row">
                                    <div class="col">
                                        <div class="sub-value"><small class="text-muted"><b>Condomínio</b></small></div>
                                        <span class="sub-value"><small class="text-muted">R$ {{number_format($imovel->vl_condominio,2,',','.')}}</small></span>
                                    </div>
                                    <div class="col">
                                        <div class="sub-value"><small class="text-muted"><b>IPTU</b></small></div>
                                        <span class="sub-value"><small class="text-muted">R$ {{number_format($imovel->vl_iptu,2,',','.')}}</small></span>
                                    </div>
                                    <div class="col">
                                        <div class="sub-value"><small class="text-muted"><b>Valor do m²</b></small></div>
                                        <span class="sub-value"><small class="text-muted">R$ {{number_format($imovel->ValorM2,2,',','.')}}</small></span>
                                    </div>
                                </div>
                                <div class="dropdown-divider"></div> 
                                <div class=" icons inline">
                                    <div class="icon-dormitorios">
                                        <img class="card-img-top icones-home" src="/img/icon/cama_icon.png">
                                        <span class="icone-info text-muted" id="qt_dormitorios"><small>{{($imovel->qt_quartos?$imovel->qt_quartos:'-')}} Dorm(s).</small></span>
                                    </div>
                                    <div class="icon-area">
                                        <img class="card-img-top icones-home" src="/img/icon/metro_icon.png">
                                        <span class="icone-info text-muted" id="qt_area"><small>{{($imovel->vl_area_util?$imovel->vl_area_util:'-')}} m²</small></span>
                                    </div>
                                    <div class="icon-area">
                                        <img class="card-img-top icones-home" src="/img/icon/garagem_icon.png">
                                        <span class="icone-info text-muted" id="qt_area"><small>{{($imovel->qt_vagas?$imovel->qt_vagas:'-')}} Vaga(s)</small></span>
                                    </div>
                                    <div class="icon-area">
                                        <img class="card-img-top icones-home" src="/img/icon/banheiro_icon.png">
                                        <span class="icone-info text-muted" id="qt_area"><small>{{($imovel->qt_banheiro?$imovel->qt_banheiro:'-')}} Banheiro(s)</small></span>
                                    </div>
                                </div>
                                <div class="dropdown-divider"></div> 
                                <div class="status_bar">
                                    <div class="line @if($imovel->ic_status>=1) active @endif">
                                        <label > B/ LANÇAMENTO   </label>
                                        <div class="line-active first"></div>
                                        <div class="child"></div>
                                    </div>
                                    <div class="line @if($imovel->ic_status>=2) active @endif">
                                        <label > NA PLANTA </label>
                                        <div class="line-active"></div>
                                        <div class="child"></div>
                                    </div>
                                    <div class="line @if($imovel->ic_status>=3) active @endif">
                                        <label > EM CONSTRUÇÃO </label>
                                        <div class="line-active"></div>
                                        <div class="child"></div>
                                    </div>
                                    <div class="line @if($imovel->ic_status>=4) active @endif">
                                        <label > MUDE JÁ </label>
                                        <div class="line-active last"></div>
                                        <div class="child"></div>
                                    </div>
                                </div>
                                <div class="dropdown-divider"></div> 

                                <div class="row">
                                    <div class="col">
                                    <div class="card"> 
                                        <div class="card-body">
                                            <h5 class="flx-sub-title">Entre em contato</h5>
                                            <form>
                                                <div class="form-group">
                                                    <label for="nameContact">Nome Completo</label>
                                                    <input type="text" class="form-control" id="nameContact" placeholder="Nome Completo">
                                                </div>
                                                <div class="form-group">
                                                    <label for="emailContact">E-mail</label>
                                                    <input type="email" class="form-control" id="emailContact" placeholder="E-mail">
                                                </div>
                                                <div class="form-group">
                                                    <label for="telefoneContact">Telefone</label>
                                                    <input type="text" class="form-control" id="telefoneContact" placeholder="Telefone">
                                                </div>
                                                <div class="form-group">
                                                    <label for="msgContact">Mensagem</label>
                                                    <textarea class="form-control" id="msgContact" rows="3">Olá, gostaria de saber mais informações sobre o imóvel '{{$imovel->nm_tipo_imovel}}/{{$imovel->nm_tipo_anuncio}}', @if($imovel->vl_imovel > 0) no valor  R$ {{number_format($imovel->vl_imovel,2,',','.')}}, @endif no endreço {{$imovel->nm_endereco}}, {{$imovel->nm_bairro}} - {{$imovel->nm_cidade}}/{{$imovel->cd_uf}}. Aguardo contato. Obrigado(a). </textarea>
                                                </div>
                                                <div class="form-check mb-2">
                                                    <input type="checkbox" class="form-check-input" id="subcribeContact">
                                                    <label class="form-check-label" for="subcribeContact">Receber imóveis parecidos a este.</label>
                                                </div>
                                                    
                                                <button class="btn btn-destaques destaques m-auto" type="submit"> Enviar Mensagem </button>   
                                                <h5 class="my-2"><a href="tel:" class="flx-sub-title m-auto d-block text-center"> OU LIGUE: (11) 8888-9999 </a></h5>
                                            </form>   
                                            <small>Ao enviar você concorda com os <a href="#">Termos de Uso</a> do site e recebimento de sugestões de imóveis.</small>
                                            @if($imovel->imagem_anunciante)
                                            <div class="anunciante">
                                                <h4 class="text-center m-4 ">Anúncio por:</h4>
                                                <img src="{{env('APP_URL').'/images/lg/'.$imovel->cd_imovel.'/'.$imovel->imagem_anunciante->nm_link}}" alt=" Logo do Anunciante">
                                            </div>
                                            @endif
                                        </div>
                                    </div>

                                    </div>
                                </div>
                            
                        </div>
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
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">  
<style>
.scroll-imagem {
    display: flex;
    align-items: center;
    justify-content: center;
    overflow: hidden;
    overflow-x: scroll;
    height: 100px;
}

.scroll-imagem div {
    flex: 0 0 70px;
}


.status_bar {
    font-size: 9px;
    color: #969696;
    display: flex;
    width: 100%;
    text-align: center;
}

.status_bar .line {
    border-bottom: 1px solid;
    flex: 1;
    position: relative;
}

.line .child {
    width: 10px;
    height: 10px;
    position: absolute;
    background: #e6e6e6;
    border-radius: 50%;
    bottom: -4px;
    right: calc(50% - 10px);
    z-index: 2;
}
.line.active label{
    color: #000;
}
.line.active .child {
    background: #000;
}
.line-active{
    display:none;
}
.line.active 
.line-active{
    display:inherit;
    
}

.line-active {
    position: absolute;
    width: 100%;
    height: 1px;
    background: #000;
    margin-left: -50%;
    z-index: 1;
}

.line-active.first {
    width: 50%;
    margin: 0;
}

.line-active.last {
    width: 150%;
}
.flx-title{
    font-size:19px
}
.flx-sub-title{
    font-size:17px
}
.imovel-vl-home{
    font-weight:900;
    font-size:20px
}
.anunciante img {
    width: 80%;
    display: block;
    margin: auto;
}
</style>
@endsection