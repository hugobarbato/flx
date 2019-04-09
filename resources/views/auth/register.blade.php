@extends('layouts.app')
@section('title','Cadastro')
@section('content')
<div class="container">
    <hr>
</div>
<article>
    
<div class="container">
    <div class="container-content">
    <div class="row container-register">
        <div class="col-md-12">
            
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <h4>Selecione Pessoa Física ou Jurídica:</h4>
                        <br>
                        <div class="form-group row">
                            
                            <div class="col-md-6">
                                <select id="ic_juridica" type="text" class="alter_name_input form-control{{ $errors->has('ic_juridica') ? ' is-invalid' : '' }}" 
                                    name="ic_juridica" required >
                                    <option value="0" {{ ( old('ic_juridica') ? '' : 'selected')  }}>Pessoa Física</option>
                                    <option value="1" {{ ( old('ic_juridica') == 1 ? 'selected' : '')  }}>Pessoa Jurídica</option>
                                </select>
                                

                                @if ($errors->has('ic_juridica'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('ic_juridica') }}</strong>
                                    </span>
                                @endif
                            </div>
                            
                        </div>
                        <br>
                        <h4>Cadastro de Pessoa <span id="span_tipo_pessoa">Física</span></h4>
                        <br>
                        <div class="form-group row">
                            <!--<label for="name" class="col-md-4 col-form-label text-md-right alter_name_label">Nome</label>-->

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
                                    name="name" Placeholder="Nome Completo" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                            
                            <div class="col-md-6">
                                <input id="cd_document" type="text" class="form-control{{ $errors->has('cd_document') ? ' is-invalid' : '' }}"
                                    name="cd_document" value="{{ old('cd_document') }}" Placeholder="CPF" required autofocus>

                                @if ($errors->has('cd_document'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('cd_document') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="form-group row">
    
                            <div class="col-md-6">
                                <input id="cd_cep" type="text" class="via_cep mask_cep form-control{{ $errors->has('cd_cep') ? ' is-invalid' : '' }}" 
                                name="cd_cep" value="{{ old('cd_cep') }}" required Placeholder="CEP" autofocus viacep="cep">

                                @if ($errors->has('cd_cep'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('cd_cep') }}</strong>
                                    </span>
                                @endif
                            </div>
                            
                            <div class="col-md-6">
                                <input id="nm_endereco" type="text" class="alter_doc_input form-control{{ $errors->has('nm_endereco') ? ' is-invalid' : '' }}" 
                                name="nm_endereco" value="{{ old('nm_endereco') }}" Placeholder="Endereço" required autofocus viacep="logradouro">

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
                                    name="nm_numero" value="{{ old('nm_numero') }}" viacep="numero" required Placeholder="Número" autofocus>

                                @if ($errors->has('nm_numero'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('nm_numero') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="col-md-6">
                                <input id="nm_complemento" type="text" class="alter_doc_input form-control{{ $errors->has('nm_complemento') ? ' is-invalid' : '' }}"
                                    name="nm_complemento" value="{{ old('nm_complemento') }}" viacep="complemento" Placeholder="Complemento" autofocus>

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
                                name="nm_bairro" value="{{ old('nm_bairro') }}" Placeholder='Bairro' viacep="bairro" required autofocus>

                                @if ($errors->has('nm_bairro'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('nm_bairro') }}</strong>
                                    </span>
                                @endif
                            </div>
                            
                            <div class="col-md-4 col-8">
                                <input id="nm_cidade" type="text" class="alter_doc_input form-control{{ $errors->has('nm_cidade') ? ' is-invalid' : '' }}" 
                                    name="nm_cidade" value="{{ old('nm_cidade') }}" viacep="localidade" Placeholder='Cidade'  required autofocus readonly="true" >

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



                        <div class="form-group row">

                            <div class="col-md-6">
                                <input id="nm_tratamento" type="text" class="alter_doc_input form-control{{ $errors->has('nm_tratamento') ? ' is-invalid' : '' }}" 
                                    name="nm_tratamento" value="{{ old('nm_tratamento') }}" Placeholder="Responsável" required autofocus>

                                @if ($errors->has('nm_tratamento'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('nm_tratamento') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="col-md-6">
                                <input id="nm_telefone" type="text" class="mask_phone form-control{{ $errors->has('nm_telefone') ? ' is-invalid' : '' }}" 
                                    name="nm_telefone" value="{{ old('nm_telefone') }}" Placeholder="Telefone" required autofocus>

                                @if ($errors->has('nm_telefone'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('nm_telefone') }}</strong>
                                    </span>
                                @endif
                            </div>
                            
                        </div>

                        <div class="form-group row">

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" 
                                    name="email" value="{{ old('email') }}" Placeholder="Email" required>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                            
                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" 
                                    Placeholder="Senha" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                            
                        </div>
                        
                        <div class="form-group row">

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" Placeholder="Confirmação de Senha" name="password_confirmation" required>
                            </div>
                            <div class="form-check col-md-6" style="line-height: 40px;">
                              <input id="aceit" type="checkbox" name="aceit" value="1" required>
                              <label class="form-check-label" for="aceit">
                               <b>Li e concordo</b> com os termos de uso
                              </label>
                            </div>
                        </div>
    
                        
                        <div class="form-group row">
                            <div class="col-12 ">
                                <button type="submit" id="cadastrarUsuario" class="btn-flx col-md-5 float-right" disabled>
                                    Cadastrar
                                </button>
                            </div>
                        </div>
                    </form>
               
        </div>
    </div>
</div>
</div>
</article>
@endsection

@section("scripts")
<script type="text/javascript" src="js/auth.js"> </script>
@endsection