@extends('layouts.app')
@section('title','Cadastro')
@section('content')

<!-- c74561683734852837592@sandbox.pagseguro.com.br -->
<!-- bNW3EEf5D26RpK3e -->

    <article>
        <div class="container">
            <div class="container-content">
                
                @if (session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif

                @if(count($compra) >= 0)

                    <div class="meus-planos">
                        <div class="row">
                            <h2>Histórico de Assinaturas</h2>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Plano</th> 
                                        <th>Status</th> 
                                        <th>Valor</th> 
                                        <th>Ações</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($compra as $c)
                                        <tr>
                                            <td>{{$c->nm_titulo}}</td>
                                            <td>{{ $c->status }}</td>
                                            <td>{{$c->vl_total}}</td>
                                            <td>
                                            @if($c->ic_processado == 1)
                                                @php $canBuy = false; @endphp
                                                <a class="btn btn-danger btn-sm" href="/pagseguro/cancelamento/{{$c->cd_pagseguro}}" onclick="return confirm(' Deseja cancelar sua assinatura? \n Está ação cancelará cobranças futuras.  ')">Cancelar Assinatura</a>
                                            @else
                                                -
                                            @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>

                @endif
                @if($canBuy)
                    <div class="destaques-vendas">
                            
                        <div class="row">
                            <div class="col-md-12">
                                <h4 class="subtitulos-h4 my-3">Destaques para venda</h4>
                            </div>
                        </div>
                        
                        <label class="pacote-free w-100 m-0">
                            <input type="radio" name="pacote_selected" id="pacote_selected" value="FREE" style="display:none">
                            <div class="card-pacote">
                                <div class="promocao-lancamentos">
                                    <p>Promoção de lançamento</p>
                                    <p>25 anúncios <span>grátis</span> por 45 dias</p>
                                </div>
                                <div class="detalhe-adesao">
                                    <p>Promoção válida para 25 anúncios simples ou 45 dias, valendo o que ocorrer primeiro.</p>
                                    <p>Não é válida para proprietários diretos</p>
                                </div>
                            </div>
                        </label>
                        
                        <div class="cards-planos">
                            <div class="row">
                            @foreach($pacotes as $pacote)
                                <div class="col-md-4">
                                    <label onclick="setPagSeguroUrl('{{$pacote->cd_pagseguro}}')">
                                    <input type="radio" name="pacote_selected" id="pacote_selected" value="{{$pacote->cd_pacote}}" style="display:none">
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
                        </div>
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
                                <div class="pagamento-icon pagseguro-card pointer"> 
                                    <a href="#" id="pagar_com_pagseguro_button">
                                        <img src="https://stc.pagseguro.uol.com.br/public/img/botoes/assinaturas/184x42-assinar-azul-assina.gif" alt="Pague com PagSeguro - É rápido, grátis e seguro!" width="209" height="48">
                                    </a>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                @else
                
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
                                        <label > <input type="radio" name="scales" value="1"> Compre 10 destaques - R$100,00 </label>
                                    </div>
                                    
                                    <div> 
                                        <label > <input type="radio" name="scales" value="2"> Compre 25 destaques - R$200,00</label>
                                    </div>
                                    
                                    <div> 
                                        <label > <input type="radio" name="scales" value="3"> Compre 50 destaques - R$350,00</label>
                                    </div>
                                    
                                    <div>
                                        <label > <input type="radio" name="scales" value="4"> Compre 100 destaques - R$600,00</label>
                                    </div> 

                                    <div class="cleanDestaquesOptions">
                                        Limpar seleção 
                                    </div>
                        
                                </div>
                            </div>
                            
                            <div class="col-md-6">
                                <h4>Super Destaques</h4>
                                
                                <div class="destaque-anuncio-info">
                                    
                                    <div> 
                                        <label > <input type="radio" name="scalesSuper" value="1"> Compre 01 destaque - R$100,00 </label>
                                    </div>
                                    
                                    <div> 
                                        <label > <input type="radio" name="scalesSuper" value="2" > Compre 03 destaques - R$250,00</label>
                                    </div>
                                    
                                    <div>
                                        <label > <input type="radio" name="scalesSuper" value="3"> Compre 06 destaques - R$500,00</label>
                                    </div>
                                    
                                    <div> 
                                        <label > <input type="radio" name="scalesSuper" value="4" > Compre 12 destaques - R$1.000,00</label>
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
                                <div class="pagamento-icon pagseguro-card pointer"> 
                                    <a href="#" id="pagar_com_pagseguro_button" target="_Blank">
                                        <img src="https://stc.pagseguro.uol.com.br/public/img/botoes/assinaturas/184x42-assinar-azul-assina.gif" alt="Pague com PagSeguro - É rápido, grátis e seguro!" width="209" height="48">
                                    </a>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                @endif
                
                
            </div>
        </div>
    </article>
@endsection
@section('scripts')
    <script type="text/javascript" src="{{ asset('js/imob.js') }}"></script>
    <script>
        function setPagSeguroUrl(url){
            let button = document.getElementById('pagar_com_pagseguro_button');
            button.href = '/pagseguro/checkout?id='+url;
        }
    </script>
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

.cards-planos label, .pacote-free  {
    display: block;
    width: 100%;
}
.cards-planos input:checked + div.card, 
.pacote-free input:checked + div.card-pacote {
    border: 2px solid red;
}
</style>
@endsection