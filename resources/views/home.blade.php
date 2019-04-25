@extends('layouts.app')
@section('title','Cadastro')
@section('content')

    <div class="container-fluid banner-principal">
        <div class="container search">
            <div class="row">
              <div class="col-12">
                <h1>Encontre seu imóvel</h1>
              </div>
            </div>
                
            <div class="search-banner-principal">

                <div class="container area-busca">
                   <div class="container-busca">
                       <div class="class-1">
                           <div class="row">
                               <div class="col-md-12">
                                    <div class="row">    
                                        <div class="col-md-5">
                                            <div class="titulo-busca">
                                                <p>O que vocÊ deseja</p>
                                            </div>
                                            <div class="select-busca">
                                                 <button>Comprar</button>
                                                 <button>alugar</button>
                                                 <button>lançamentos</button>
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-2">
                                            <div class="titulo-busca">
                                                <p>tipo de imovel</p>
                                            </div>
                                             <div class="select-busca">
                                                 <select class="select-imovel" name="" id="">
                                                     <option value="">apartamento</option>
                                                     <option value="">casa</option>
                                                 </select>
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-5">
                                            <div class="titulo-busca">
                                              <p>Onde</p>
                                            </div>
                                          
                                          <input type="text" name=""/>
                                        </div>
                                    </div>
                                </div>
                           </div>
                       </div>
                       <div class="class-2">
                           <div class="row">
                                        <div class="col-sm-12">
                                            <div class="select-busca">
                                                <select class="select-infos-imovel" name="" id="">
                                                    <option value="">Faixa de Preco</option>
                                                    <option value="">casa</option>
                                                </select>
                                            </div>
                                        
                                            <div class="select-busca">
                                                 <select class="select-infos-imovel" name="" id="">
                                                     <option value="">Quartos</option>
                                                     <option value="">casa</option>
                                                 </select>
                                            </div>
                                            
                                            <div class="select-busca">
                                                 <select class="select-infos-imovel" name="" id="">
                                                     <option value="">Banheiros</option>
                                                     <option value="">casa</option>
                                                 </select>
                                            </div>
                                        
                                            <div class="select-busca">
                                                 <select class="select-infos-imovel" name="" id="">
                                                     <option value="">vagas</option>
                                                     <option value="">casa</option>
                                                 </select>
                                            </div>
                                        
                                            <div class="select-busca">
                                                 <select class="select-infos-imovel" name="" id="">
                                                     <option value="">metragem</option>
                                                     <option value="">casa</option>
                                                 </select>
                                            </div>
                                        
                                            <div class="select-busca">
                                                 <select class="select-infos-imovel" name="" id="">
                                                     <option value="">codigo do imovel</option>
                                                     <option value="">casa</option>
                                                 </select>
                                            </div>
                                        </div>
                                    </div>
                       </div>
                   </div>
                   
                   
                   
                   <div class="class-3">
                       <button class="btn-search">Buscar</button>
                   </div>
                   
                </div>
           
            </div>
        </div>
    </div>

    <article>
        <div class="container">
            <div class="container-home">
                <div class="destaques-vendas">
                    <div class="row">
                        <div class="col-md-12 destaques-home">
                            <h2>Destaques para venda</h2>
                        </div>
                    </div>
                    
                    <div class="cards-vendas">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="card">
                                    <img class="card-img-top" src="img/img-teste.jpg"></img>
                                    <div class="card-body">
                                        <h4 class="card-title">apartamento/venda</h4>
                                        <h6 class="card-subtitle mb-2 text-muted">Jabaquara</h6>
                                        <!--<p class="card-text">Conteudo do card</p>-->
                                    </div>
                                    <div class="card-body icones-card">    
                                        <div class="icon-dormitorios">
                                            <img class="card-img-top icones-home" src="img/icon/cama_icon.png"></img>
                                            <span class="icone-info" id="qt_dormitorios">3 Dorms.</span>
                                        </div>
                                        
                                        <div class="icon-area">
                                            <img class="card-img-top icones-home" src="img/icon/metro_icon.png"></img>
                                            <span class="icone-info" id="qt_area">87m</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-md-3">
                                <div class="card">
                                    <img class="card-img-top" src="img/img-teste.jpg"></img>
                                    <div class="card-body">
                                        <h4 class="card-title">apartamento/venda</h4>
                                        <h6 class="card-subtitle mb-2 text-muted">Jabaquara</h6>
                                        <!--<p class="card-text">Conteudo do card</p>-->
                                    </div>
                                    <div class="card-body icones-card">    
                                        <div class="icon-dormitorios">
                                            <img class="card-img-top icones-home" src="img/icon/cama_icon.png"></img>
                                            <span class="icone-info" id="qt_dormitorios">3 Dorms.</span>
                                        </div>
                                        
                                        <div class="icon-area">
                                            <img class="card-img-top icones-home" src="img/icon/metro_icon.png"></img>
                                            <span class="icone-info" id="qt_area">87m</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-md-3">
                                <div class="card">
                                    <img class="card-img-top" src="img/img-teste.jpg"></img>
                                    <div class="card-body">
                                        <h4 class="card-title">apartamento/venda</h4>
                                        <h6 class="card-subtitle mb-2 text-muted">Jabaquara</h6>
                                        <!--<p class="card-text">Conteudo do card</p>-->
                                    </div>
                                    <div class="card-body icones-card">    
                                        <div class="icon-dormitorios">
                                            <img class="card-img-top icones-home" src="img/icon/cama_icon.png"></img>
                                            <span class="icone-info" id="qt_dormitorios">3 Dorms.</span>
                                        </div>
                                        
                                        <div class="icon-area">
                                            <img class="card-img-top icones-home" src="img/icon/metro_icon.png"></img>
                                            <span class="icone-info" id="qt_area">87m</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-md-3 ">
                                <div class="card">
                                    <img class="card-img-top" src="img/img-teste.jpg"></img>
                                    <div class="card-body">
                                        <h4 class="card-title">apartamento/venda</h4>
                                        <h6 class="card-subtitle mb-2 text-muted">Jabaquara</h6>
                                        <!--<p class="card-text">Conteudo do card</p>-->
                                    </div>
                                    <div class="card-body icones-card">    
                                        <div class="icon-dormitorios">
                                            <img class="card-img-top icones-home" src="img/icon/cama_icon.png"></img>
                                            <span class="icone-info" id="qt_dormitorios">3 Dorms.</span>
                                        </div>
                                        
                                        <div class="icon-area">
                                            <img class="card-img-top icones-home" src="img/icon/metro_icon.png"></img>
                                            <span class="icone-info" id="qt_area">87m</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>
                
                <div class="destaques-locacao">
                    <div class="row">
                      <div class="col-md-12 destaques-home">
                        <h2>Destaques para locação</h2>
                      </div>
                    </div>
                    
                    <div class="cards-locacao">
                        <div class="row">
                            
                            <div class="col-md-3 ">
                                <div class="card">
                                    <img class="card-img-top" src="img/books.jpg"></img>
                                    <div class="card-body">
                                        <h4 class="card-title">apartamento/locação</h4>
                                        <h6 class="card-subtitle mb-2 text-muted">Jabaquara</h6>
                                        <!--<p class="card-text">Conteudo do card</p>-->
                                    </div>
                                    <div class="card-body icones-card">    
                                        <div class="icon-dormitorios">
                                            <img class="card-img-top icones-home" src="img/icon/cama_icon.png"></img>
                                            <span class="icone-info" id="qt_dormitorios">3 Dorms.</span>
                                        </div>
                                        
                                        <div class="icon-area">
                                            <img class="card-img-top icones-home" src="img/icon/metro_icon.png"></img>
                                            <span class="icone-info" id="qt_area">87m</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-md-3">
                                <div class="card">
                                    <img class="card-img-top" src="img/books.jpg"></img>
                                    <div class="card-body">
                                        <h4 class="card-title">apartamento/locação</h4>
                                        <h6 class="card-subtitle mb-2 text-muted">Jabaquara</h6>
                                        <!--<p class="card-text">Conteudo do card</p>-->
                                    </div>
                                    <div class="card-body icones-card">    
                                        <div class="icon-dormitorios">
                                            <img class="card-img-top icones-home" src="img/icon/cama_icon.png"></img>
                                            <span class="icone-info" id="qt_dormitorios">3 Dorms.</span>
                                        </div>
                                        
                                        <div class="icon-area">
                                            <img class="card-img-top icones-home" src="img/icon/metro_icon.png"></img>
                                            <span class="icone-info" id="qt_area">87m</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-md-3">
                                <div class="card">
                                    <img class="card-img-top" src="img/books.jpg"></img>
                                    <div class="card-body">
                                        <h4 class="card-title">apartamento/locação</h4>
                                        <h6 class="card-subtitle mb-2 text-muted">Jabaquara</h6>
                                        <!--<p class="card-text">Conteudo do card</p>-->
                                    </div>
                                    <div class="card-body icones-card">    
                                        <div class="icon-dormitorios">
                                            <img class="card-img-top icones-home" src="img/icon/cama_icon.png"></img>
                                            <span class="icone-info" id="qt_dormitorios">3 Dorms.</span>
                                        </div>
                                        
                                        <div class="icon-area">
                                            <img class="card-img-top icones-home" src="img/icon/metro_icon.png"></img>
                                            <span class="icone-info" id="qt_area">87m</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-md-3 ">
                                <div class="card">
                                    <img class="card-img-top" src="img/books.jpg"></img>
                                    <div class="card-body">
                                        <h4 class="card-title">apartamento/locação</h4>
                                        <h6 class="card-subtitle mb-2 text-muted">Jabaquara</h6>
                                        <!--<p class="card-text">Conteudo do card</p>-->
                                    </div>
                                    <div class="card-body icones-card">    
                                        <div class="icon-dormitorios">
                                            <img class="card-img-top icones-home" src="img/icon/cama_icon.png"></img>
                                            <span class="icone-info" id="qt_dormitorios">3 Dorms.</span>
                                        </div>
                                        
                                        <div class="icon-area">
                                            <img class="card-img-top icones-home" src="img/icon/metro_icon.png"></img>
                                            <span class="icone-info" id="qt_area">87m</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                        
                        </div>
                    </div>
                    
                </div>
                
                <div class="lancamentos-destaques">
                    <div class="row">
                      <div class="col-md-12 destaques-home">
                        <h2>Lançamentos em destaque</h2>
                      </div>
                    </div>
                    
                    <div class="cards-lancamentos">
                        <div class="row">
                            <div class="col-md-3 ">
                                <div class="card">
                                    <img class="card-img-top" src="img/welcome.jpg"></img>
                                    <div class="card-body">
                                        <h4 class="card-title">lançamentos</h4>
                                        <h6 class="card-subtitle mb-2 text-muted">Jabaquara</h6>
                                        <!--<p class="card-text">Conteudo do card</p>-->
                                    </div>
                                    <div class="card-body icones-card">    
                                        <div class="icon-dormitorios">
                                            <img class="card-img-top icones-home" src="img/icon/cama_icon.png"></img>
                                            <span class="icone-info" id="qt_dormitorios">3 Dorms.</span>
                                        </div>
                                        
                                        <div class="icon-area">
                                            <img class="card-img-top icones-home" src="img/icon/metro_icon.png"></img>
                                            <span class="icone-info" id="qt_area">87m</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-md-3">
                                <div class="card">
                                    <img class="card-img-top" src="img/welcome.jpg"></img>
                                    <div class="card-body">
                                        <h4 class="card-title">lançamentos</h4>
                                        <h6 class="card-subtitle mb-2 text-muted">Jabaquara</h6>
                                        <!--<p class="card-text">Conteudo do card</p>-->
                                    </div>
                                    <div class="card-body icones-card">    
                                        <div class="icon-dormitorios">
                                            <img class="card-img-top icones-home" src="img/icon/cama_icon.png"></img>
                                            <span class="icone-info" id="qt_dormitorios">3 Dorms.</span>
                                        </div>
                                        
                                        <div class="icon-area">
                                            <img class="card-img-top icones-home" src="img/icon/metro_icon.png"></img>
                                            <span class="icone-info" id="qt_area">87m</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-md-3">
                                <div class="card">
                                    <img class="card-img-top" src="img/welcome.jpg"></img>
                                    <div class="card-body">
                                        <h4 class="card-title">lançamentos</h4>
                                        <h6 class="card-subtitle mb-2 text-muted">Jabaquara</h6>
                                        <!--<p class="card-text">Conteudo do card</p>-->
                                    </div>
                                    <div class="card-body icones-card">    
                                        <div class="icon-dormitorios">
                                            <img class="card-img-top icones-home" src="img/icon/cama_icon.png"></img>
                                            <span class="icone-info" id="qt_dormitorios">3 Dorms.</span>
                                        </div>
                                        
                                        <div class="icon-area">
                                            <img class="card-img-top icones-home" src="img/icon/metro_icon.png"></img>
                                            <span class="icone-info" id="qt_area">87m</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-md-3 ">
                                <div class="card">
                                    <img class="card-img-top" src="img/welcome.jpg"></img>
                                    <div class="card-body">
                                        <h4 class="card-title">lançamentos</h4>
                                        <h6 class="card-subtitle mb-2 text-muted">Jabaquara</h6>
                                        <!--<p class="card-text">Conteudo do card</p>-->
                                    </div>
                                    <div class="card-body icones-card">    
                                        <div class="icon-dormitorios">
                                            <img class="card-img-top icones-home" src="img/icon/cama_icon.png"></img>
                                            <span class="icone-info" id="qt_dormitorios">3 Dorms.</span>
                                        </div>
                                        
                                        <div class="icon-area">
                                            <img class="card-img-top icones-home" src="img/icon/metro_icon.png"></img>
                                            <span class="icone-info" id="qt_area">87m</span>
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