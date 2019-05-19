@extends('layouts.app')
@section('title','Cadastro')
@section('content')

    <article>
        <div class="container">
            <div class="container-content">
                <div class="destaques-vendas">
                    <div class="row">
                        <div class="col-md-12">
                            <h4 class="subtitulos-h4">Destaques para venda</h4>
                        </div>
                    </div>
                    
                    <div class="promocao-lancamentos">
                        <p>Promoção de lançamento</p>
                        <p>25 anúncios <span>grátis</span> por 45 dias</p>
                    </div>
                    <div class="detalhe-adesao">
                        <p>Promoção válida para 25 anúncios simples ou 45 dias, valendo o que ocorrer primeiro.</p>
                        <p>Não é válida para proprietários diretos</p>
                    </div>
                    
                    <div class="cards-planos">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="card">
                                    <h4 class="card-header">plano 15</h4>
                                    <div class="card-body">
                                        <p><span class="vl-anuncio">R$ 49,90</span> / mês</p>
                                        <div class="detalhes-planos">
                                            <p><span class="qt-anuncios">15 anúncios</span></p>
                                            <p>inclui 01 destaque</p>
                                        </div>
                                    </div>
                                    <div class="card-footer">Somente R$ 1,00 por dia</div>
                                </div>
                            </div>
                            
                            <div class="col-md-4">
                                <div class="card">
                                    <h4 class="card-header">plano 25</h4>
                                    <div class="card-body">
                                        <p><span class="vl-anuncio">R$ 59,90</span> / mês</p>
                                        <div class="detalhes-planos">
                                            <p><span class="qt-anuncios">25 anúncios</span></p>
                                            <p>inclui 03 destaques</p>
                                        </div>
                                    </div>
                                    <div class="card-footer">Somente R$ 2,00 por dia</div>
                                </div>
                            </div>
                            
                            <div class="col-md-4">
                                <div class="card">
                                    <h4 class="card-header">plano 50</h4>
                                    <div class="card-body">
                                        <p><span class="vl-anuncio">R$ 79,90</span> / mês</p>
                                        <div class="detalhes-planos">
                                            <p><span class="qt-anuncios">50 anúncios</span></p>
                                            <p>inclui 06 destaques</p>
                                        </div>
                                    </div>
                                    <div class="card-footer">Somente R$ 2,00 por dia</div>
                                </div>
                            </div>
                            
                        </div>
                        
                        <div class="row">
                            <div class="col-md-4">
                                <div class="card">
                                    <h4 class="card-header">plano 100</h4>
                                    <div class="card-body">
                                        <p><span class="vl-anuncio">R$ 99,90</span> / mês</p>
                                        <div class="detalhes-planos">
                                            <p><span class="qt-anuncios">100 anúncios</span></p>
                                            <p>inclui 10 destaques</p>
                                        </div>
                                    </div>
                                    <div class="card-footer">Somente R$ 3,33 por dia</div>
                                </div>
                            </div>
                            
                            <div class="col-md-4">
                                <div class="card">
                                    <h4 class="card-header">plano 250</h4>
                                    <div class="card-body">
                                        <p><span class="vl-anuncio">R$ 199,90</span> / mês</p>
                                        <div class="detalhes-planos">
                                            <p><span class="qt-anuncios">250 anúncios</span></p>
                                            <p>inclui 25 destaques</p>
                                        </div>
                                    </div>
                                    <div class="card-footer">Somente R$ 6,00 por dia</div>
                                </div>
                            </div>
                            
                            <div class="col-md-4">
                                <div class="card">
                                    <h4 class="card-header">plano ilimitado</h4>
                                    <div class="card-body">
                                        <p><span class="vl-anuncio">R$ 399,90</span> / mês</p>
                                        <div class="detalhes-planos">
                                            <p><span class="qt-anuncios">anúncios ilimitados</span></p>
                                            <p>inclui 50 destaques</p>
                                        </div>
                                    </div>
                                    <div class="card-footer">Somente R$ 13,33 por dia</div>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>
                
                <div class="destaque-anuncio">
                    <div class="row">
                        <div class="col-md-12">
                            <h4 class="subtitulos-h4">Dê mais Destaque aos seus anúncios</h4>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-6">
                            <h4>Destaque</h4>
                            <div class="detalhe-noticias">
                                
                                 <div>
                                    <input type="checkbox" id="scales" name="scales" checked>
                                    <label for="scales">Compre 10 destaques - R$100,00 </label>
                                </div>
                                
                                <div>
                                    <input type="checkbox" id="scales" name="scales">
                                    <label for="scales">Compre 25 destaques - R$200,00</label>
                                </div>
                                
                                <div>
                                    <input type="checkbox" id="scales" name="scales">
                                    <label for="scales">Compre 50 destaques - R$350,00</label>
                                </div>
                                
                                <div>
                                    <input type="checkbox" id="scales" name="scales">
                                    <label for="scales">Compre 100 destaques - R$600,00</label>
                                </div> 
                    
                            </div>
                        </div>
                        
                        <div class="col-md-6">
                            <h4>Super Destaque</h4>
                            <div class="detalhe-noticias">
                                
                                <div>
                                    <input type="checkbox" id="scales" name="scales" checked>
                                    <label for="scales">Compre 01 destaques - R$200,00 </label>
                                </div>
                                
                                <div>
                                    <input type="checkbox" id="scales" name="scales">
                                    <label for="scales">Compre 03 destaques - R$500,00</label>
                                </div>
                                
                                <div>
                                    <input type="checkbox" id="scales" name="scales">
                                    <label for="scales">Compre 06 destaques - R$1.000,00</label>
                                </div>
                                
                                <div>
                                    <input type="checkbox" id="scales" name="scales">
                                    <label for="scales">Compre 12 destaques - R$1.000,00</label>
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