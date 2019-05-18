@extends('layouts.app')
@section('title','Cadastro')
@section('content')
    <div class="container">
        <hr>
    </div>
    <article>
        <div class="container">
            <div class="container-content">
                <h2>Lista de Imoveis cadastrados</h2>
                <h3>Você possui {{$imoveis->total()}} imovél(eis) cadastrando(s).</h3>
                <ul>
                    @foreach($imoveis as $imob)
                    <li>
                        {{$imob->nm_titulo}} -  <a href="{{url('/imovel/editar/'.$imob->cd_imovel) }}">EDITAR</a>
                    </li>
                    @endforeach
                </ul>

                {{ $imoveis->links() }}
            </div>
        </div>
    </article>
@endsection
@section('scripts')
<script type="text/javascript" src="{{ asset('js/imob.js') }}"></script>
@endsection