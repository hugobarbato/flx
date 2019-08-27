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
                                    <div class="col-md-4 img-search-card-imovel">
                                        <img class="card-img-top" src="{{'/images/lg/'.$imovel->cd_imovel.'/'.$imovel->nm_link}}" onerror=' this.src = "/images/default.png"'>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="card-body">
                                            <h4 class="flx-title">{{$imovel->nm_tipo_imovel}}/{{$imovel->nm_tipo_anuncio}}</h4>
                                            <h5 class="flx-sub-title">{{$imovel->nm_bairro}} - {{$imovel->nm_cidade}}/{{$imovel->cd_uf}}</h5>
                                            <div class="icons inline">
                                                <div class="icon-dormitorios">
                                                    <img class="card-img-top icones-home" src="/img/icon/cama_icon.png">
                                                    <span class="icone-info" id="qt_dormitorios">{{($imovel->qt_quartos?$imovel->qt_quartos:'-')}} Dorm(s).</span>
                                                </div>
                                                <div class="icon-area">
                                                    <img class="card-img-top icones-home" src="/img/icon/metro_icon.png">
                                                    <span class="icone-info" id="qt_area">{{($imovel->vl_area_total?$imovel->vl_area_total:'-')}} m²</span>
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
                                            <span class="sub-value-search"><small class="text-muted">Valor do m² R$ {{number_format($imovel->ValorM2,2,',','.')}}</small></span>
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
                        <p class="col centerY"> {{ $imoveis->total() }} imoveis encontrados.</p>
                        <div class="col">{{ $imoveis->links() }}</div>
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
@endsection