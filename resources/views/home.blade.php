@extends('layouts.app')
@section('title','Home')
@section('content')
@include('layouts.banner')

    <article>
        <div class="container">
            <div class="container-home">
            @if(count($imoveis_venda))
                <div class="destaques-vendas pb-2">
                    <div class="row">
                        <div class="col-md-12 destaques">
                            <h2>Destaques para venda</h2>
                        </div>
                    </div>
                    
                    <div class="cards-vendas">
                        <div    class="row m-0" >
                        @foreach($imoveis_venda as $imovel )
                                <div class="col-md-3">
                                    <a href="/detail/{{$imovel->cd_imovel}}" class="text-decoration-none text-dark"> 
                                        <div class="card">
                                            <div class="card-img-header">
                                                <img class="card-img-top" src="{{'/images/lg/'.$imovel->cd_imovel.'/'.$imovel->nm_link}}" onerror=' this.src = "/images/default.png"'>
                                            </div>
                                            <div class="imovel-vl-home">R$ {{number_format($imovel->vl_imovel,2,',','.')}}</div>
                                            <div class="card-body">
                                                <h4 class="card-title">{{$imovel->nm_tipo_imovel}}/{{$imovel->nm_tipo_anuncio}}</h4>
                                                <h6 class="card-subtitle mb-2 text-muted">{{$imovel->nm_bairro}} - {{$imovel->nm_cidade}}/{{$imovel->cd_uf}}</h6>
                                                <!--<p class="card-text">Conteudo do card</p>-->
                                            </div>
                                            <div class="card-body icones-card">    
                                                <div class="icon-dormitorios">
                                                    <img class="card-img-top icones-home" src="/img/icon/cama_icon.png">
                                                    <span class="icone-info" id="qt_dormitorios">{{$imovel->qt_quartos}} Dorms.</span>
                                                </div>
                                                
                                                <div class="icon-area">
                                                    <img class="card-img-top icones-home" src="/img/icon/metro_icon.png">
                                                    <span class="icone-info" id="qt_area">{{$imovel->vl_area_total}}m²</span>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                        @endforeach
                            
                        </div>
                    </div>
                </div>
            @endif
            @if(count($imoveis_aluguel))
                <div class="destaques-locacao pb-2">
                    <div class="row">
                      <div class="col-md-12 destaques">
                        <h2>Destaques para locação</h2>
                      </div>
                    </div>
                    
                    <div class="cards-locacao">
                        <div class="row m-0" >
                            @foreach($imoveis_aluguel as $imovel )
                                <div class="col-md-3">
                                    <a href="/detail/{{$imovel->cd_imovel}}" class="text-decoration-none text-dark"> 
                                        <div class="card">
                                            <div class="card-img-header">
                                                <img class="card-img-top" src="{{'/images/lg/'.$imovel->cd_imovel.'/'.$imovel->nm_link}}" onerror=' this.src = "/images/default.png"'>
                                            </div>
                                            <div class="imovel-vl-home">R$ {{number_format($imovel->vl_imovel,2,',','.')}}</div>
                                            <div class="card-body">
                                                <h4 class="card-title">{{$imovel->nm_tipo_imovel}}/{{$imovel->nm_tipo_anuncio}}</h4>
                                                <h6 class="card-subtitle mb-2 text-muted">{{$imovel->nm_bairro}} - {{$imovel->nm_cidade}}/{{$imovel->cd_uf}}</h6>
                                                <!--<p class="card-text">Conteudo do card</p>-->
                                            </div>
                                            <div class="card-body icones-card">    
                                                <div class="icon-dormitorios">
                                                    <img class="card-img-top icones-home" src="/img/icon/cama_icon.png">
                                                    <span class="icone-info" id="qt_dormitorios">{{$imovel->qt_quartos}} Dorms.</span>
                                                </div>
                                                
                                                <div class="icon-area">
                                                    <img class="card-img-top icones-home" src="/img/icon/metro_icon.png">
                                                    <span class="icone-info" id="qt_area">{{$imovel->vl_area_total}}m²</span>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            @endforeach
                        
                        </div>
                    </div>
                    
                </div>
            @endif
            @if(count($imoveis_lancamentos))
                <div class="lancamentos-destaques pb-2">
                    <div class="row">
                      <div class="col-md-12 destaques">
                        <h2>Lançamentos em destaque</h2>
                      </div>
                    </div>
                    
                    <div class="cards-lancamentos">
                        <div class="row m-0" >
                            
                            @foreach($imoveis_lancamentos as $imovel )
                                <div class="col-md-3">
                                    <a href="/detail/{{$imovel->cd_imovel}}" class="text-decoration-none text-dark"> 
                                        <div class="card"> 
                                            <div class="card-img-header">
                                                <img class="card-img-top" src="{{'/images/lg/'.$imovel->cd_imovel.'/'.$imovel->nm_link}}" onerror=' this.src = "/images/default.png"'>
                                            </div>
                                            <div class="imovel-vl-home">R$ {{number_format($imovel->vl_imovel,2,',','.')}}</div>
                                            <div class="card-body">
                                                <h4 class="card-title">{{$imovel->nm_tipo_imovel}}/{{$imovel->nm_tipo_anuncio}}</h4>
                                                <h6 class="card-subtitle mb-2 text-muted">{{$imovel->nm_bairro}} - {{$imovel->nm_cidade}}/{{$imovel->cd_uf}}</h6>
                                                <!--<p class="card-text">Conteudo do card</p>-->
                                            </div>
                                            <div class="card-body icones-card">    
                                                <div class="icon-dormitorios">
                                                    <img class="card-img-top icones-home" src="/img/icon/cama_icon.png">
                                                    <span class="icone-info" id="qt_dormitorios">{{$imovel->qt_quartos}} Dorms.</span>
                                                </div>
                                                
                                                <div class="icon-area">
                                                    <img class="card-img-top icones-home" src="/img/icon/metro_icon.png">
                                                    <span class="icone-info" id="qt_area">{{$imovel->vl_area_total}}m²</span>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            @endif
        </div>
    </article>
@endsection
@section('scripts')
<script type="text/javascript" src="{{ asset('js/imob.js') }}"></script> 
  
@endsection

@section('styles')
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css"> 
<style>
    .card-img-header {
        height: 200px;
        display: flex;
        align-items: center;
        justify-content: center;
        overflow: hidden;
    }

    .card {
        height: 420px;
    }
</style>
@endsection