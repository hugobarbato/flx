@extends('layouts.app')
@section('title', strtoupper($imovel->nm_titulo))
@section('content')  
    <article>  
        <div id="detail_imovel_carousel" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                @foreach(array_chunk($imovel->imagens->all(), 2) as $k=>$images)
                    <div class="detail-image-carousel carousel-item @if($k==0) active @endif " >
                        <!-- <div class="row  "> -->
                            @foreach($images as $k2=>$img)
                                <!-- <div class="col no-gutters"> -->
                                    <img class="card-img-top d-block col-6 " 
                                            src="{{env('APP_URL').'/images/lg/'.$img->cd_imovel.'/'.$img->nm_link}}" 
                                                onerror=' this.src = "/images/default.png"'>
                                <!-- </div> -->
                            @endforeach
                        <!-- </div> -->
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

        <div class="container">
            <div class="container-home">
                <div class=" "> 
                    
                    <div class="row"> 
                        <div class="col-md-8 pt-2">

                            <h3 class="flx-title">{{$imovel->nm_titulo}}</h3>
                            <div class="dropdown-divider"></div> 
                            <div class="detail-icons icons inline">
                                <div class="icon-area">
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

                            <h4 class="flx-title">{{$imovel->nm_tipo_imovel}}/{{$imovel->nm_tipo_anuncio}}</h4>
                            <h5 class="flx-sub-title mb-2">{{$imovel->nm_endereco}}, {{$imovel->nm_bairro}} - {{$imovel->nm_cidade}}/{{$imovel->cd_uf}}</h5>
                             
                            <div class="form-row">
                                <div class="col-md-12">
                                    <h5 class="flx-title mt-4">Descrição</h5> 
                                </div>
                            </div>
                            <p class="m-2">
                                {{$imovel->ds_imovel}}
                            </p>     


                            @if(count($AreasComuns))
                                <div class="area-comuns mt-4" >
                                    <div class="dropdown-divider"></div> 
                                    <div class="form-row">
                                        <div class="col-md-12">
                                        <h5 class="flx-title">Áreas Comuns</h5> 
                                        </div>
                                    </div>
                                    <div id="AreasComunsChecks" class="form-row"> 
                                        @foreach( $AreasComuns as  $ac )
                                            <div class="col-md-4">
                                                <div> 
                                                    <i class="fa fa-check"></i>
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
                                    <div class="dropdown-divider"></div> 
                                    <div class="form-row">
                                        <div class="col-md-12">
                                            <h5 class="flx-title">Áreas Privativas</h5>
                                            <input type="hidden" id="ds_areas_privativas" value="{{$imovel->ds_areas_privativas}}">
                                        </div>
                                    </div>
                                    
                                    <div id="AreasPrivativasChecks" class="form-row">
                                        @foreach($AreasPrivativas as $k=>$ap)
                                            <div class="col-md-4">
                                                <div> 
                                                    <i class="fa fa-check"></i>
                                                    <label for="ap{{$ap->cd_areas_privativas}}" >
                                                        {{((ucwords($ap->nm_areas_privativas)))}}
                                                    </label> 
                                                </div>
                                            </div>
                                        @endforeach 
                                        
                                    </div>
                                </div>
                            @endif
                            <div class="dropdown-divider"></div> 
                            <div class="form-row">
                                <div class="col-md-12">
                                    <h5 class="flx-title">Mapa</h5>
                                    <input type="hidden" id="ds_areas_privativas" value="{{$imovel->ds_areas_privativas}}">
                                </div>
                            </div>

                            <div class="mapouter">
                                <div class="gmap_canvas">
                                    <iframe id="gmap_canvas" tyle="overflow:hidden;height:100%;width:100%" height="100%" width="100%"
                                        src="https://maps.google.com/maps?q={{urlencode($imovel->cd_cep)}}&t=&z=13&ie=UTF8&iwloc=&output=embed" 
                                            frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>
                                </div>
                            </div>
@if($imovel->nm_link_youtube)
                            <div class="mapouter m-2">
				<div class="gmap_canvas">
@php
echo preg_replace("/\s*[a-zA-Z\/\/:\.]*youtube.com\/watch\?v=([a-zA-Z0-9\-_]+)([a-zA-Z0-9\/\*\-\_\?\&\;\%\=\.]*)/i","<iframe width=\"100%\" height=\"100%\" src=\"//www.youtube.com/embed/$1\" frameborder=\"0\" allowfullscreen></iframe>",$imovel->nm_link_youtube );
@endphp
				</div>
                            </div>
@endif
                            
                        </div>
                        <div class="col-md-4 pt-2">
                                
                                <div class="row">
                                    <div class="col">
                                    <div class="card bg-silver card-border-azul"> 
                                        <div class="card-body">
                                            <span>Valor 
                                                @if($imovel->cd_tipo_anuncio == 2 || $imovel->cd_tipo_anuncio == 5 ) 
                                                    do Aluguel
                                                @else 
                                                    da Compra
                                                @endif
                                            </span>
                                            <div class="imovel-vl-home w-100"> 
                                                @if($imovel->vl_imovel > 0) 
                                                 <span>R$</span> {{number_format($imovel->vl_imovel,2,',','.')}} 
                                                @else 
                                                    Sob Consulta. 
                                                @endif
                                            </div>
                                            <div class="dropdown-divider"></div>
                                            <div class="row">
                                                <div class="col separeitor-rigth">
                                                    <div class="sub-value"><small class="text-muted"><b>Condomínio</b></small></div>
                                                    <span class="sub-value"><small class="text-muted">R$ {{number_format($imovel->vl_condominio,2,',','.')}}</small></span>
                                                </div>
                                                <div class="col">
                                                    <div class="sub-value"><small class="text-muted"><b>IPTU</b></small></div>
                                                    <span class="sub-value"><small class="text-muted">R$ {{number_format($imovel->vl_iptu,2,',','.')}}</small></span>
                                                </div>
                                                <div class="col separeitor-left">
                                                    <div class="sub-value"><small class="text-muted"><b>Valor do m²</b></small></div>
                                                    <span class="sub-value"><small class="text-muted">R$ {{number_format(($imovel->vl_imovel/$imovel->vl_area_util),2,',','.')}}</small></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="card bg-silver my-2"> 
                                        <div class="card-body"> 
                                            <div class="status_bar">
                                                <div class="line @if($imovel->ic_status>=1) active @endif">
                                                    <label > BREVE <br>LANÇAMENTO   </label>
                                                    <div class="line-active first"></div>
                                                    <div class="child"></div>
                                                </div>
                                                <div class="line @if($imovel->ic_status>=2) active @endif">
                                                    <label > NA <br>PLANTA </label>
                                                    <div class="line-active"></div>
                                                    <div class="child"></div>
                                                </div>
                                                <div class="line @if($imovel->ic_status>=3) active @endif">
                                                    <label > EM <br>CONSTRUÇÃO </label>
                                                    <div class="line-active"></div>
                                                    <div class="child"></div>
                                                </div>
                                                <div class="line @if($imovel->ic_status>=4) active @endif">
                                                    <label > MUDE <br>JÁ </label>
                                                    <div class="line-active last"></div>
                                                    <div class="child"></div>
                                                </div>
                                            </div> 
                                        </div>
                                    </div>

                                    <div class="card bg-silver"> 
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col">
                                                    <h5 class="flx-sub-title">Entre em contato</h5>
                                                </div>
                                                @if($imovel->imagem_anunciante)
                                                    <div class="col">
                                                        <div class="anunciante"> 
                                                            <img src="{{env('APP_URL').'/images/lg/'.$imovel->cd_imovel.'/'.$imovel->imagem_anunciante->nm_link}}" alt=" Logo do Anunciante">
                                                        </div>
                                                        <h5 style="text-align:center">{{ $imovel->user->name }}</h5>
                                                    </div>
                                                @endif
                                            </div>


                                            <form method="POST" action="#" >
                                            @if(\Session::get('send'))
                                                <div class="form-group alert alert-success">
                                                    Mensagem enviada com sucesso!!
                                                </div>
                                            @endif
                                                <div class="form-group">
                                                    <label for="nameContact">Nome Completo</label>
                                                    <input type="text" class="form-control rounded-0" name="name" id="nameContact" placeholder="Nome Completo">
                                                </div>
                                                <div class="form-group">
                                                    <label for="emailContact">E-mail</label>
                                                    <input type="email" class="form-control rounded-0" name="email" id="emailContact" placeholder="E-mail">
                                                </div>
                                                <div class="form-group">
                                                    <label for="telefoneContact">Telefone</label>
                                                    <input type="text" class="form-control rounded-0 mask_phone" name="tel" id="telefoneContact" placeholder="Telefone">
                                                </div>
                                                <div class="form-group">
                                                    <label for="msgContact">Mensagem</label>
                                                    <textarea class="form-control rounded-0" id="msgContact" name="mensagem" rows="3">Olá, gostaria de saber mais informações sobre o imóvel '{{$imovel->nm_titulo}} - {{$imovel->nm_tipo_imovel}}/{{$imovel->nm_tipo_anuncio}}', @if($imovel->vl_imovel > 0) no valor  R$ {{number_format($imovel->vl_imovel,2,',','.')}}, @endif no endreço {{$imovel->nm_endereco}}, {{$imovel->nm_bairro}} - {{$imovel->nm_cidade}}/{{$imovel->cd_uf}}. Aguardo contato. Obrigado(a). </textarea>
                                                </div>
                                                <div class="form-check mb-2">
                                                    <input type="checkbox" class="form-check-input" name="news" id="subcribeContact">
                                                    <label class="form-check-label" for="subcribeContact">Receber imóveis parecidos a este.</label>
                                                </div>
                                                    
                                                <button class="btn btn-destaques btn-block destaques m-auto" type="submit"> Enviar Mensagem </button>   
                                               
                                            </form>   
                                            <p class="accept-info">Ao enviar você concorda com os <a href="/institucional/termo-de-uso">Termos de Uso</a> do site e recebimento de sugestões de imóveis.</p>
                                            
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

.card .flx-sub-title {
    color: #424344;
    font-weight: 700;
    font-size: 24px;
    margin-top: 9px;
}
.bg-silver.card {
    background: #f5f6f5c7;
}
.card-border-azul{
    border-top: 5px solid #2355ab;
}
.accept-info {
    text-align: center;
    color: #838384;
    font-size: 10px;
    margin-top: 10px;
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
    border-top: 1px solid;
    flex: 1;
    position: relative;
}

.line .child {
    width: 10px;
    height: 10px;
    position: absolute;
    background: #e6e6e6;
    border-radius: 50%;
    TOP: -5px;
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
    top: 0;
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
 
.anunciante img {
    width: 80%;
    display: block;
    margin: auto;
}
</style>
@endsection
