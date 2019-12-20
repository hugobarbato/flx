@extends('layouts.app')
@section('title','CheckOut PagSeguro')
@section('content')

<!-- c74561683734852837592@sandbox.pagseguro.com.br -->
<!-- bNW3EEf5D26RpK3e -->

    <article>
        <div class="container">
            <div class="container-content">
                <h1>Finalizando Assinatura</h1>
                <p>
                    Confira abaixo as informações para realização da assinatura do plano pelo PagSeguro.
                </p>
                <form action="#" id="checkoutForm" method="POST" >
                    <input type='hidden' id='pagseguro_cliente_hash' name="pagseguro_cliente_hash"/>
                    <input type='hidden' id='pagseguro_cartao_bandeira' name="pagseguro_cartao_bandeira" />
                    <input type='hidden' id='pagseguro_cartao_token' name="pagseguro_cartao_token" />
                    <legend>Informações Pessoais</legend>
                    <div class="form-group row">

                        <div class="col-md-6">
                            <label for="nm_tratamento">Nome conforme impresso no cartão de crédito </label>
                            <input id="nm_tratamento" type="text" class="alter_doc_input form-control{{ $errors->has('nm_tratamento') ? ' is-invalid' : '' }}" 
                                name="nm_tratamento" value="{{ $user->name }}" Placeholder="Responsável" required autofocus>

                            @if ($errors->has('nm_tratamento'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('nm_tratamento') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="col-md-6">
                            <label for="dt_nasc">Data de Nascimento do Dono do Cartão</label>
                            <input id="dt_nasc" type="text" class=" mask_date form-control{{ $errors->has('dt_nasc') ? ' is-invalid' : '' }}" value="09/05/1998" Placeholder="DD/MM/YYYY" name="dt_nasc" required autofocus>
                            @if ($errors->has('dt_nasc'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('dt_nasc') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="col-md-6">
                            <label for="nm_tratamento">CPF do Dono do Cartão</label>
                            <input id="cd_document" type="text" class="form-control{{ $errors->has('cd_document') ? ' is-invalid' : '' }}" 
                                name="cd_document" value="{{ $user->cd_document  }}" Placeholder="CPF" required autofocus>

                            @if ($errors->has('cd_document'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('cd_document') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="col-md-6">
                            <label for="nm_tratamento">Telefone do Dono do Cartão</label>
                            <input id="nm_telefone" type="text" class="mask_phone form-control{{ $errors->has('nm_telefone') ? ' is-invalid' : '' }}" 
                                name="nm_telefone" value="{{ $user->nm_telefone  }}" Placeholder="Telefone" required autofocus>

                            @if ($errors->has('nm_telefone'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('nm_telefone') }}</strong>
                                </span>
                            @endif
                        </div>
                        
                    </div>
                    <legend>Endereço de Cobrança</legend>
                    <div class="form-group row">
        
                        <div class="col-md-6">
                            <input id="cd_cep" type="text" class="via_cep mask_cep form-control{{ $errors->has('cd_cep') ? ' is-invalid' : '' }}" 
                            name="cd_cep" value="{{$user->cd_cep }}" required Placeholder="CEP" autofocus viacep="cep">

                            @if ($errors->has('cd_cep'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('cd_cep') }}</strong>
                                </span>
                            @endif
                        </div>
                        
                        <div class="col-md-6">
                            <input id="nm_endereco" type="text" class="alter_doc_input form-control{{ $errors->has('nm_endereco') ? ' is-invalid' : '' }}" 
                            name="nm_endereco" value="{{$user->nm_endereco }}" Placeholder="Endereço" required autofocus viacep="logradouro">

                            @if ($errors->has('nm_endereco'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('nm_endereco') }}</strong>
                                </span>
                            @endif
                        </div>
                        
                    </div>
                    <div class="form-group row">
                        <div class="col-md-6">
                            <input id="nm_numero" type="text" class="alter_doc_input form-control{{ $errors->has('nm_numero') ? ' is-invalid' : '' }}"
                                name="nm_numero" value="{{ $user->nm_numero }}" viacep="numero" required Placeholder="Número" autofocus>

                            @if ($errors->has('nm_numero'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('nm_numero') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="col-md-6">
                            <input id="nm_complemento" type="text" class="alter_doc_input form-control{{ $errors->has('nm_complemento') ? ' is-invalid' : '' }}"
                                name="nm_complemento" value="{{ $user->nm_complemento  }}" viacep="complemento" Placeholder="Complemento" autofocus>

                            @if ($errors->has('nm_complemento'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('nm_complemento') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>


                    <div class="form-group row">

                        <div class="col-md-6">
                            <input id="nm_bairro" type="text" class="alter_doc_input form-control{{ $errors->has('nm_bairro') ? ' is-invalid' : '' }}" 
                            name="nm_bairro" value="{{ $user->nm_bairro   }}" Placeholder='Bairro' viacep="bairro" required autofocus>

                            @if ($errors->has('nm_bairro'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('nm_bairro') }}</strong>
                                </span>
                            @endif
                        </div>
                        
                        <div class="col-md-4 col-8">
                            <input id="nm_cidade" type="text" class="alter_doc_input form-control{{ $errors->has('nm_cidade') ? ' is-invalid' : '' }}" 
                                name="nm_cidade" value="{{  $user->nm_cidade }}" viacep="localidade" Placeholder='Cidade'  required autofocus readonly="true" >

                            @if ($errors->has('nm_cidade'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('nm_cidade') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="col-md-2 col-4">
                            <select id="cd_uf" name="cd_uf" class=" form-control{{ $errors->has('cd_uf') ? ' is-invalid' : '' }}" readonly="true" viacep="uf" required>
                                <option selected value disabled > UF </option>
                                <option value="AC">AC </option>
                                <option value="AL">AL </option>    
                                <option value="AP">AP </option>    
                                <option value="AM">AM </option>    
                                <option value="BA">BA </option>  
                                <option value="CE">CE </option> 
                                <option value="DF">DF </option> 
                                <option value="ES">ES  </option>                                   
                                <option value="GO">GO </option>
                                <option value="MA">MA </option>
                                <option value="MT">MT  </option>
                                <option value="MS">MS </option>    
                                <option value="MG">MG </option>    
                                <option value="PA">PA </option>    
                                <option value="PB">PB </option>  
                                <option value="PR">PR </option> 
                                <option value="PE">PE </option> 
                                <option value="PI">PI  </option>                                   
                                <option value="RJ">RJ </option>
                                <option value="RN">RN</option>
                                <option value="RS">RS</option> 
                                <option value="RO">RO </option> 
                                <option value="RR">RR  </option>                                   
                                <option value="SC">SC</option>
                                <option value="SP">SP</option>
                                <option value="SE">SE</option>
                                <option value="TO">TO</option>
                            </select>
                            @if ($errors->has('cd_uf'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('cd_uf') }}</strong>
                                </span>
                            @endif
                        </div>
                        
                    </div>




                    <legend>Informações do plano contrato</legend>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="plain">Plano</label>
                                <select name="plain" id="plain" class="form-control" onchange="displayValorPlano()">
                                    <option value="" disabled selected>Selecione o plano desejado.</option>
                                    @foreach($pacotes as $plano)
                                    <option value="{{$plano->cd_pagseguro}}" pacote="{{$plano->vl_pacote}}"
                                        @if($plano->cd_pagseguro == $inputs['id']) selected @endif
                                        >{{$plano->nm_titulo}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="valor_pacote">Valor do Plano</label>
                                <input type="text" class="form-control" name="valor_pacote" id="valor_pacote" value="" disabled="true" readonly='true'>
                            </div>
                        </div>
                    </div>
                    <legend>Informações do Cartão de Crédito</legend>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="pagseguro_cartao_numero">Número do Cartão*</label>
                                <input type="text" class="form-control" id="pagseguro_cartao_numero" value="4111111111111111"/>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="pagseguro_cartao_cvv">CVV do Cartão*</label>
                                <input type="text" class="form-control" id="pagseguro_cartao_cvv" value="123"/>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="pagseguro_cartao_mes">Mês e Ano de Expiração do Cartão*</label>
                                <div class="row">
                                    <div class="col-6">
                                        <input type="text" class="form-control" id="pagseguro_cartao_mes" value="12"/>
                                    </div>
                                    <div class="col-6">
                                        <input type="text" class="form-control" id="pagseguro_cartao_ano" value="2030"/>
                                    </div>
                                </div>
                            </div>
                        </div> 
                        <div class="col-12">
                            <small class="small-alert"> Por uma questão de segurança as informações do seu cartão não seram salvas em nossa plataforma, realizaremos as transações por meio do checkout transparente do pagseguro. </small>
                        </div>
                    </div>
                    <div class="row mb-5 mt-2">
                        <div class="align-items-center col-md-12 d-flex justify-content-between">
                            <button id="finalizarcompra" type="submit" style="display:none"></button>
                            <button id="botao_comprar" type="button" onclick="PagSeguroBuscaHashCliente()" class="btn btn-primary btn-lg">Confirmar Compra</button>
                            <span>
                                Compra processada pelo
                                <img src="/images/pagseguro.png" alt="PagSeguro" height="100">
                            </span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 col-md-offset-6">
                            <div id="result_init"></div>
                        </div>
                    </div>
                </form>
            
            </div>
        </div>
    </article>
@endsection
@section('scripts')
{!!$js['principal']!!}
<script type='text/javascript'>
function getMethodsPayment(valor){
    PagSeguroDirectPayment.getPaymentMethods({
        amount: valor,
        success: function(response) {
           console.info(response)
        },
        error: function(response) {
           console.info(response)
        },
        complete: function(response) {
           console.info(response)
        }
    });
}

function PagSeguroBuscaHashCliente() {
    $("#result_init").html("<ul><li>Iniciando tratamento com pagseguro aguarde....</li></ul>");
    PagSeguroDirectPayment.onSenderHashReady(function(response){
        if(response.status == 'error') {
            $("#result_init ul").append("<li> Falha na realização da compra... </li>");
            alert(response.message);
            return false;
        }
        $('#pagseguro_cliente_hash').val(response.senderHash); //Hash estará disponível nesta variável.
        console.log('Hash Cliente: ' + $('#pagseguro_cliente_hash').val());
        $("#result_init ul").append("<li>Seu código de cliente no pagseguro é:"+response.senderHash+" </li>");

        PagSeguroBuscaBandeira();   //Através do pagseguro_cartao_numero do cartão busca a bandeira
    });		
}
function PagSeguroBuscaToken() {
    PagSeguroDirectPayment.createCardToken({
        cardNumber: $('#pagseguro_cartao_numero').val(),
        brand: $('#pagseguro_cartao_bandeira').val(),
        cvv: $('#pagseguro_cartao_cvv').val(),
        expirationMonth: $('#pagseguro_cartao_mes').val(),
        expirationYear: $('#pagseguro_cartao_ano').val(),
        success: function(response) { 
            console.log('Token: ' + response.card.token);
            $('#pagseguro_cartao_token').val(response.card.token);
            $("#result_init ul").append("<li>O token do seu cartão é:"+response.card.token+" </li>");
            $("#result_init ul").append("<li> Finalizando a compra .... </li>");
            $('#finalizarcompra').click();
        },
        error: function(response) { 
            console.log(response); 
            $("#result_init ul").append("<li> Falha na realização da compra... </li>");
            if(response.error){
                for (var key in response.errors) {
                    // skip loop if the property is from prototype
                    if (!response.errors.hasOwnProperty(key)) continue;

                    var obj = response.errors[key];
                    alert(key+' - '+translateErro(obj));
                }
            }
        },
    });
}
function PagSeguroBuscaBandeira() {
    PagSeguroDirectPayment.getBrand({cardBin: $('#pagseguro_cartao_numero').val(),
        success: function(response) { 
            console.log('Bandeira: ' + response.brand.name);
            $('#pagseguro_cartao_bandeira').val(response.brand.name);
            $("#result_init ul").append("<li>A bandeira do seu cartão é:"+response.brand.name+" </li>");
            PagSeguroBuscaToken();      //Através dos 4 campos acima gera o Token do cartão 
        },
        error: function(response) { 
            $("#result_init ul").append("<li> Falha na realização da compra... </li>");
            if(response.error){
                for (var key in response.errors) {
                    // skip loop if the property is from prototype
                    if (!response.errors.hasOwnProperty(key)) continue;

                    var obj = response.errors[key];
                    alert(key+' - '+translateErro(obj));
                }
            }
            console.log(response); 
        },
    });
}
function translateErro(msg){
    switch (msg) {
        case 'invalid creditcard brand':
        case "invalid creditcard data":
        default:
                return 'Cartão inválido!'
    }
}
    function displayValorPlano(){
        var plain_id = $('#plain').val();
        console.info(plain_id)
        var valor = $("option[value='"+plain_id+"']").attr('pacote');
        valor_pacote.value = Number(valor).toLocaleString('pt-BR',{style:'currency',currency:"BRL"});
        getMethodsPayment(valor);

    }
    displayValorPlano();
    $(document).ready(function(){
        $('#cd_uf').val('{{ $user->cd_uf }}') ;

        $('#checkoutForm').on('submit',(e)=>{
            if(pagseguro_cartao_token.value && pagseguro_cliente_hash.value){
                return true;
            }else{
                return false;
                e.preventDefault();
            }
        })
    });
</script>
@endsection
@section('styles')
<style>
.small-alert{
    text-align: right;
    font-size: 9px;
    display: inherit;
}

</style>
@endsection