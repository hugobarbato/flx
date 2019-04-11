@extends('layouts.app')

@section('content')
<div class="container">
    <div class="container-content">
        <div class="container-redefinicao">
            <div class="row card-senha">
                <div class="col-md-8">
                    <div class="card container-email">
                        <div class="card-header cards-flx">Reset de senha</div>
    
                        <div class="card-body">
                            <form method="POST" action="{{ route('password.update') }}">
                                @csrf
                                <div class="container-form-redefinicao">
                                    <div class="inputs-reset-password">
                                        <input type="hidden" name="token" value="{{ $token }}">
                                    </div>
    
                                    <div class="inputs-reset-password">
                                        <input placeholder="E-Mail" id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ $email ?? old('email') }}" required autofocus>
                                        @if ($errors->has('email'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('email') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                            
                                     <div class="inputs-reset-password">
                                        <input placeholder="Senha" id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
                                        @if ($errors->has('password'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('password') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    
                                     <div class="inputs-reset-password">
                                        <input placeholder="Confirmação de Senha" id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                                     </div>
    
                                    <div class="btn-solicitar-senha">
                                        <button type="submit" class="btn-flx">
                                            Salvar
                                        </button>
                                    </div>
                                   
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
