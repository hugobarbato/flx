@extends('layouts.app')

@section('content')
<div class="container">
    <div class="container-content">
        <div class="container-redefinicao">
            <div class="row card-senha">
                <div class="col-md-8">
                    <div class="card container-email">
                        <div class="card-header">Redefinição de senha</div>
        
                        <div class="card-body">
                            @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            @endif
        
                            <form method="POST" action="{{ route('password.email') }}">
                                @csrf
        
                                <div class="form-group row">
                                    <!--<label for="email" class="col-md-4 col-form-label text-md-right"> E-Mail </label>-->
        
                                    <div class="col-md-6">
                                        <input id="email" type="email" placeholder = "Digite seu email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>
        
                                        @if ($errors->has('email'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('email') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
        
                                <div class="form-group row mb-0">
                                    <div class="col-md-6 offset-md-4">
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