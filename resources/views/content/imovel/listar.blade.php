@extends('layouts.app')
@section('title','Cadastro')
@section('content')
    <article>
        <div class="container">
            <div class="container-content">
                <h2>Lista de Imoveis cadastrados</h2>
                
                <ul>
                    @foreach($imoveis as $imob)
                    <li>
                        {{$imob->nm_titulo}} -  <a href="/imovel/editar/{{$imob->cd_imovel}}">EDITAR</a>
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </article>
@endsection
@section('scripts')
<script type="text/javascript" src="{{ asset('js/imob.js') }}"></script>
@endsection