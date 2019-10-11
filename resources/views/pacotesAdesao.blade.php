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
                        @foreach($pacotes as $pacote)
                                <div class="col-md-4">
                                    <label>
                                    <input type="radio" name="pacote_selected" id="pacote_selected" style="display:none">
                                    <div class="card">
                                        <h4 class="card-header">{{$pacote->nm_titulo}}</h4>
                                        <div class="card-body">
                                            <p><span class="vl-anuncio">R$ {{ number_format($pacote->vl_pacote,2,',',' ') }}</span> / mês</p>
                                            <div class="detalhes-planos">
                                                @if($pacote->qt_anuncio > 0 )
                                                <p><span class="qt-anuncios">{{$pacote->qt_anuncio}} anúncios</span></p>
                                                @else
                                                <p><span class="qt-anuncios">anúncios ilimitados</span></p>
                                                @endif    
                                                <p>inclui {{$pacote->qt_destaques}} destaque</p>
                                            </div>
                                        </div>
                                        <div class="card-footer">Somente R$ {{ number_format(($pacote->vl_pacote/30),2,',',' ') }} por dia</div>
                                    </div>
                                    </label>
                                </div>                 
                        @endforeach
                        </div>
<!--                         
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
                                </div> -->
                        <!-- <div class="row">
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
                                        <p><span class="vl-anuncio">R$ 499,90</span> / mês</p>
                                        <div class="detalhes-planos">
                                            <p><span class="qt-anuncios">anúncios ilimitados</span></p>
                                            <p>inclui 50 destaques</p>
                                        </div>
                                    </div>
                                    <div class="card-footer">Somente R$ 13,33 por dia</div>
                                </div>
                            </div>
                            
                        </div> -->
                    </div>
                </div>
                
                <div class="destaque-anuncio">
                    <div class="row">
                        <div class="col-md-12">
                            <h4 class="subtitulos-h4">Dê mais Destaque aos seus anúncios</h4>
                        </div>
                    </div>
                    
                    <div class="destaques-planos">
                         <div class="row">
                            <div class="col-md-6">
                                <h4>Destaques</h4>
                                
                                <div class="destaque-anuncio-info">
                                    
                                     <div>
                                        <input type="radio" name="scales" checked>
                                        <label for="scales">Compre 10 destaques - R$100,00 </label>
                                    </div>
                                    
                                    <div>
                                        <input type="radio" name="scales">
                                        <label for="scales">Compre 25 destaques - R$200,00</label>
                                    </div>
                                    
                                    <div>
                                        <input type="radio" name="scales">
                                        <label for="scales">Compre 50 destaques - R$350,00</label>
                                    </div>
                                    
                                    <div>
                                        <input type="radio" name="scales">
                                        <label for="scales">Compre 100 destaques - R$600,00</label>
                                    </div> 
                        
                                </div>
                            </div>
                            
                            <div class="col-md-6">
                                <h4>Super Destaques</h4>
                                
                                <div class="destaque-anuncio-info">
                                    
                                    <div>
                                        <input type="radio" name="scalesSuper" checked>
                                        <label for="scales">Compre 01 destaque - R$100,00 </label>
                                    </div>
                                    
                                    <div>
                                        <input type="radio" name="scalesSuper">
                                        <label for="scales">Compre 03 destaques - R$250,00</label>
                                    </div>
                                    
                                    <div>
                                        <input type="radio" name="scalesSuper">
                                        <label for="scales">Compre 06 destaques - R$500,00</label>
                                    </div>
                                    
                                    <div>
                                        <input type="radio" name="scalesSuper">
                                        <label for="scales">Compre 12 destaques - R$1.000,00</label>
                                    </div> 
                                </div>
                            </div>
                        </div>
                    </div>
                    
                     <!-- <div class="row">
                        <div class="col-md-12">
                            <textarea class="destaque-anuncio-detalhe"></textarea>
                        </div>
                    </div> -->
                </div>
                <div class="destaque-anuncio">
                    <div class="row">
                        <div class="col-md-12">
                            <h4 class="subtitulos-h4">Escolha a forma de pagamento</h4>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-12">
                            <div class="pagamento-detalhe">
                                <p>
                                    A FLX utiliza a plataforma PAGSEGURO para processar seus pagamentos, considerada uma das plataformas mais seguras e rápidas, oferecemos para os nossos clientes diversas formas de pagamento entre eles: boleto, cartão de crédito e transferência.
                                </p>
    
                                <p class="pagamento-detalhe-finalizar">
                                    Clique no logotipo abaixo para escolher a forma de pagamento e finalizar
                                </p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-12">
                            <div class="pagamento-icon pagseguro-card"> 
                                    <img class="img-pagseguro-adesao" src="img/pagseguro.jpg"> 
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
<style>
.pagseguro-card{
    display: block;
    margin: auto;
    height: fit-content;
    margin-bottom: 50px;
    width: fit-content;
}
.cards-planos label {
    display: block;
    width: 100%;
}
.cards-planos input:checked + div.card {
    border: 2px solid red;
}
</style>
@endsection