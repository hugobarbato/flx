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
                            <h2>Detalhes da busca</h2>
                        </div>
                    </div>
                </div>
                
                <div class="detalhes-conteudo">
                    <div class="row">
                        <div class="col-md-7">
                            
                            <div class="img-imovel-detalhe">
                                <div class="img-principal">
                                    <img class="img-teste" src="img/img-teste.jpg"></img>
                                </div>
                                <div class="img-miniaturas">
                                    <h4>Aqui vão as imagens em miniaturas</h4>
                                </div>
                            </div>
                           <div class="title-buscar-imovel">
                                <h4 class="subtitulos-h4">apartamento/venda</h4>
                                <h6>Jabaquara</h6>
                            </div>
                            
                            <div class="map-detalhes">
                                <iframe src="https://www.google.com/maps/embed?pb=!1m10!1m8!1m3!1d14587.453540229671!2d-46.40567475!3d-23.92989125!3m2!1i1024!2i768!4f13.1!5e0!3m2!1spt-BR!2sbr!4v1558292182209!5m2!1spt-BR!2sbr" width="650" height="375" frameborder="0" style="border:0" allowfullscreen></iframe>
                            </div>
                        </div>
                        
                        
                         <div class="col-md-5">
                            
                            <div class="detalhes-preco">
                                <h4> R$ 300.000,00</h4>
                            </div> 
                            
                            <div class="detalhes-imovel">
                                <div class="detalhes-valor">
                                     <p>Valor m²</p>
                                     <span>R$ 4.367,81</span>
                                </div>
                                
                                <div class="detalhes-condominio">
                                    <p>Condomínio</p>
                                    <span>R$ 780,00</span>
                                </div>
                                
                                <div class="detalhes-valor">
                                    <p>IPTU</p>
                                    <span>R$ 220,00</span>
                                </div>
                            </div>
                            
                            
                            <div class="icon-detalhes-imovel">
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
                                    <span class="icone-info" id="qt_dormitorios">4 Vagas</span>
                                </div>
                                    
                                <div class="icon-area">
                                    <img class="card-img-top icones-home" src="img/icon/metro_icon.png"></img>
                                    <span class="icone-info" id="qt_area">3 Banheiros</span>
                                </div>
                            </div>
                            
                            <div class="detalhes-contato">
                                <h4 class="subtitulos-h4">Entre em Contato</h4>
                                
                                <form>
                                    <input class="input-detalhes-imovel" type="text" name="" placeholder="Nome"/>
                                    <input class="input-detalhes-imovel" type="text" name="" placeholder="E-mail"/>
                                    <input class="input-detalhes-imovel" type="text" name="" placeholder="Telefone"/>
                                    
                                    
                                    <div class="detalhe-mensagem">
                                        <p>Olá, gostaria de saber mais informações sobre o imóvel no valor de R$380.000,00 no Jabaquara, na Avenida Washington Luís, nº 1300</p>
                                        <br>
                                        <p>Aguardo contato. Obrigada</p>
                                    </div>
                                    
                                    <div class="detalhe-noticias">
                                        <input type="checkbox" name="receber-imovel" value="sim" checked> Receber imóveis similares a este
                                    </div>
                                    
                                     <div class="container-detalhe-msg">
                                        <button class="btn-flx btn-msg">Enviar Mensagem</button>
                                    </div>
                                    
                                    
                                    <div class="tel-msg">
                                        <h4>Ou ligue (11)8888-9999</h4>
                                        
                                        <p>Ao enviar, você concorda com os Termos de Uso do site e recebimento de sugestões dos imóveis</p>
                                    </div>
                                    
                                </form>
                            </div>
                            
                            <div class="codigo-imovel-detalhe">
                                <p>Código do imóvel 00043545</p>
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