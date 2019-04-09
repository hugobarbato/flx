@extends('layouts.app')

@section('content')
<div class="container">
    <div class="container-content">
        <div class="container-redefinicao">
            <div class="row card-senha">
                <div class="col-md-8">
                    <div class="card container-email">
                        <div class="card-header cards-flx">Redefinição de senha</div>
        
                        <div class="card-body">
                            @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            @endif
        
                            <form method="POST" action="{{ route('password.email') }}">
                                @csrf
                                <div class="container-form-redefinicao">
                                    
                                
                                    <div class="inputs-reset-password">
                                        
                                        <input id="email" type="email" placeholder = "Digite seu email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>
        
                                        @if ($errors->has('email'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('email') }}</strong>
                                            </span>
                                        @endif
                                        
                                       
                                       
                                    </div>
                                    
                                    <div class="btn-solicitar-senha">
                                         <button type="submit" class="btn-flx">
                                            Solicitar Link
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
