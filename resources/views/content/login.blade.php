
@extends('layouts.app')

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
                                        <form id="formLogin">
                                            <div class="inputs-login">
                                                <div class="login-cpf-cnpj">
                                                    <input type="text" name="" id="login_cpf_cnpj" placeholder="CPF/CNPJ"/>
                                                </div>
                                                <div class="login-password">
                                                    <input type="password" name="" id="login_password" placeholder="Senha"/>
                                                </div>
                                                <div class="btn-login">
                                                    <button id="login_btn_login">Entrar</button>
                                                </div>
                                            </div>
                                            <div class="forget-password">
                                                <a href="" class="login-forgot-password small">Esqueci minha senha</a>
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
                                            <button id="login_btn_register">Cadastre-se</button>
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