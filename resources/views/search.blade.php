@extends('layouts.app')
@section('title','Resultados da Busca')
@section('content')
@include('layouts.banner')

    <article>
        <div class="container">
            <div class="container-home">
                <div class="pb-2">
                    <div class="row pb-2">
                        <div class="col-md-12 destaques">
                            <h2 >Resultados da Busca</h2>
                        </div>
                    </div>
                    <div class="cards pb-2">
                        @foreach($imoveis as $imovel )
                            <div class="card mb-3 search-card-imovel" >
                                <div class="row no-gutters">
                                    @if($imovel->ic_destaque == 2)
                                    <span class="destacar_imovel" data-toggle="tooltip" data-placement="bottom" title="Imóvel Super Destaque.">
                                        <i class="fas super fa-bookmark"></i>
                                    </span>
                                    @elseif($imovel->ic_destaque == 1)
                                    <span class="destacar_imovel" data-toggle="tooltip" data-placement="bottom" title="Imóvel Destaque.">
                                        <i class="fas active fa-bookmark"></i>
                                    </span>
                                    @endif 
                                    <div class="col-md-4 img-search-card-imovel">
                                    <a href="/detail/{{$imovel->cd_imovel}}"> <img class="card-img-top" src="{{env('APP_URL').'/images/lg/'.$imovel->cd_imovel.'/'.$imovel->nm_link}}" onerror=' this.src = "/images/default.png"'></a>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="card-body">
                                            <div class="col-md-12 row no-gutters ">
                                            <div class="col-md-10">
                                                    <h4 class="flx-title">{{$imovel->nm_tipo_imovel}}/{{$imovel->nm_tipo_anuncio}} - {{$imovel->ic_destaque}}</h4>
                                                    <h5 class="flx-sub-title">{{$imovel->nm_bairro}} - {{$imovel->nm_cidade}}/{{$imovel->cd_uf}}</h5>
                                            </div>
                                            <div class="col-md-2">
                                                <img src="{{env('APP_URL').'/images/sm/'.$imovel->cd_imovel.'/'.$imovel->imagem_anunciante_nm_link}}" class="listimg" alt=" Logo do Anunciante">
                                            </div>
                                            </div>
                                            <div class="icons inline">
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
                                            <a href="/detail/{{$imovel->cd_imovel}}" class="btn btn-destaques destaques pin-bottom-right"> Ver detalhes </a>
                                            @if($imovel->vl_imovel > 0)
                                            <span class="value-search flx-title">R$ {{number_format($imovel->vl_imovel,2,',','.')}}</span>
                                            <span class="sub-value-search"><small class="text-muted">Valor do m² R$ {{number_format(($imovel->vl_imovel/$imovel->vl_area_util),2,',','.')}} </small></span>
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
                    
                    <div class="row">
                        <p class="col-md-6 centerY"> 
                            @if($imoveis->total()==0)
                            No momento não temos nenhum imóvel no perfil buscado
                            @else
                            {{ $imoveis->total() }} imoveis encontrados.
                            @endif
                        </p>
                        <div class="col-md-6 table-responsive">{{ $imoveis->links() }}</div>
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
.search-card-imovel .value-search {
    font-size: 25px;
    font-weight: inherit;
}
    </style>
@endsection