@extends('layouts.app')
@section('title','Cadastro')
@section('content')
@include('layouts.banner')

    <article>
        <div class="container">
            <div class="container-home">
                <div class="destaques-vendas">
                    <div class="row">
                        <div class="col-md-12 destaques">
                            <h2>Resultado da busca</h2>
                        </div>
                    </div>
                </div>
                
                <div class="destaques-buscas">
                     <div class="row">
                        <div class="img-busca col-md-4">
                            <img class="card-img-top" src="img/img-teste.jpg"></img>
                        </div>
                         
                        <div class="info-busca col-md-8">
                            <div class="container-body">
                                <div class="title-buscar-imovel">
                                    <h4>apartamento/venda</h4>
                                    <h6>Jabaquara</h6>
                                </div>
                                
                                
                                <div class="icon-buscar-imovel">
                                    <div class="icon-dormitorios">
                                        <img class="card-img-top icones-home" src="img/icon/cama_icon.png"></img>
                                        <span class="icone-info" id="qt_dormitorios">3 Dorms.</span>
                                    </div>
                                    
                                    <div class="icon-area">
                                        <img class="card-img-top icones-home" src="img/icon/metro_icon.png"></img>
                                        <span class="icone-info" id="qt_area">87m</span>
                                    </div>
                                        
                                    <div class="icon-dormitorios">
                                        <img class="card-img-top icones-home" src="img/icon/cama_icon.png"></img>
                                        <span class="icone-info" id="qt_dormitorios">3 Dorms.</span>
                                    </div>
                                        
                                    <div class="icon-area">
                                        <img class="card-img-top icones-home" src="img/icon/metro_icon.png"></img>
                                        <span class="icone-info" id="qt_area">87m</span>
                                    </div>
                                </div>
                                    
                                <div class="dados-buscar-imovel">
                                    
                                    <div class="buscar-detalhes-preco">
                                        <h4> R$ 300.000,00</h4>
                                        <p>Valor do m²: R$ 4.367,81</p>
                                    </div>    
                                    
                                    <div class="buscar-detalhes">
                                        <p>Ver detalhes</p>
                                    </div>
                                </div>
                                
                                
                            </div>
                        </div>
                     </div>
                </div>
                
                <div class="destaques-buscas">
                     <div class="row">
                        <div class="img-busca col-md-4">
                            <img class="card-img-top" src="img/img-teste.jpg"></img>
                        </div>
                         
                        <div class="info-busca col-md-8">
                            <div class="container-body">
                                <div class="title-buscar-imovel">
                                    <h4>apartamento/venda</h4>
                                    <h6>Jabaquara</h6>
                                </div>
                                
                                
                                <div class="icon-buscar-imovel">
                                    <div class="icon-dormitorios">
                                        <img class="card-img-top icones-home" src="img/icon/cama_icon.png"></img>
                                        <span class="icone-info" id="qt_dormitorios">3 Dorms.</span>
                                    </div>
                                    
                                    <div class="icon-area">
                                        <img class="card-img-top icones-home" src="img/icon/metro_icon.png"></img>
                                        <span class="icone-info" id="qt_area">87m</span>
                                    </div>
                                        
                                    <div class="icon-dormitorios">
                                        <img class="card-img-top icones-home" src="img/icon/cama_icon.png"></img>
                                        <span class="icone-info" id="qt_dormitorios">3 Dorms.</span>
                                    </div>
                                        
                                    <div class="icon-area">
                                        <img class="card-img-top icones-home" src="img/icon/metro_icon.png"></img>
                                        <span class="icone-info" id="qt_area">87m</span>
                                    </div>
                                </div>
                                    
                                <div class="dados-buscar-imovel">
                                    
                                    <div class="buscar-detalhes-preco">
                                        <h4> R$ 300.000,00</h4>
                                        <p>Valor do m²: R$ 4.367,81</p>
                                    </div>    
                                    
                                    <div class="buscar-detalhes">
                                        <a class="nav-link" href="/resultadoDetalhes">Ver detalhes</a>
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