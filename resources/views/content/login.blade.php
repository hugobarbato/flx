
@extends('layouts.app')
@section('title','Acesso')
@section('content')
    <article>
        <div class="container">
            <div class="container-content">
                <div class="container-login">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="area-login">
                                <div class="left-block">
                                    
                                    <div class="title-login">
                                        <h4>Já tenho Cadastro</h4>
                                    </div>
                                    
                                    <div class="form">
                                        <form id="formLogin" method="POST" action="{{ route('login') }}">
                                            @csrf
                                            <div class="inputs-login">
                                                <div class="login-cpf-cnpj">
                                                    <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email"
                                                        value="{{ old('email') }}" required autofocus  placeholder="E-mail">

                                                    @if ($errors->has('email'))
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $errors->first('email') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                                <div class="login-password">
                                                    
                                                    <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" 
                                                        name="password" required placeholder="Senha">
                    
                                                    @if ($errors->has('password'))
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $errors->first('password') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                                <div class="">
                                                    <div class="">
                                                        <div class="form-check">
                                                            <label class="form-check-label" for="remember">
                                                                <input class="form-check-input" type="checkbox" name="remember" style="width: unset;"
                                                                    id="remember" {{ old('remember') ? 'checked' : '' }}>
                        
                                                                Mantenha-me contectado.
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="btn-login">
                                                    <button id="login_btn_login">Entrar</button>
                                                </div>
                                            </div>
                                            <div class="forget-password">
                                                <a href="{{ route('password.request') }}" class="login-forgot-password small" >Esqueci minha senha</a>
                                            </div>
                                        </form>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                                
                        <div class="col-md-6">
                            <div class="area-login">
                                <div class="right-block">
                                    <div class="title-login">
                                        <h4>Quero me cadastrar</h4>
                                    </div>
                                    <div class="login-register">
                                        <p>Caso ainda não tenha cadastro em nosso site, por favor, utilize o botão abaixo para ser redirecionado para nossa página de cadastro</p>
                                        <div class="btn-register">
                                            <a id="login_btn_register" href="{{ route('register') }}" >Cadastre-se</a>
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