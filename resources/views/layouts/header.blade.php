
    <header>
        <div class="container menu-nav">
            <nav class="navbar navbar-expand-lg navbar-light">
                <div class="logo-flx">
                    <a class="navbar-brand" href="#"><img src="{{url('img/logo.png')}}"> </a>
                </div>
                
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSite">
                    <span class="navbar-toggle-icon"></span>
                </button>
                
                <div class="collapse navbar-collapse menu-principal" id="navbarSite">
                    <ul class="navbar-nav">
                       <li class="nav-item {{ (request()->is('home')) ? 'active' : '' }}">
                            <a class="nav-link" href="/home">Home</a>
                        </li>
                        <li class="nav-item {{ (request()->is('search/rent')) ? 'active' : '' }}">
                            <a class="nav-link" href="/search/rent">Alugar</a>
                        </li>
                        <li class="nav-item {{ (request()->is('search/sell')) ? 'active' : '' }}">
                            <a class="nav-link" href="/search/sell">Comprar</a>
                        </li>
                        <li class="nav-item {{ (request()->is('search/news')) ? 'active' : '' }}">
                            <a class="nav-link" href="/search/news">Lançamentos</a>
                        </li>
                        <!--<li class="nav-item">-->
                        <!--    <a class="nav-link" href="/comprar">Comprar</a>-->
                        <!--</li>-->
                        <!--<li class="nav-item">-->
                        <!--    <a class="nav-link" href="/lancamentos">Lançamentos</a>-->
                        <!--</li>-->
                        
                        
                        @guest
                            <li class="nav-item {{ (request()->is('login')) ? 'active' : '' }}">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Entrar') }}</a>
                            </li>
                        @else
                            <li class="nav-item dropdown  {{ (request()->is('/imovel/adicionar')) || (request()->is('/imovel/listar')) ? 'active' : '' }}">
                                <a id="imoveis" class="nav-link dropdown-toggle" role="button" data-toggle="dropdown" 
                                aria-haspopup="true" aria-expanded="false" v-pre>
                                    Imóveis <span class="caret"></span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="imoveis">
                                    <a class="dropdown-item {{ (request()->is('/imovel/adicionar')) ? 'active' : '' }}" href="{{ url('/imovel/adicionar') }}" >
                                        Adicionar
                                    </a>
                                    <a class="dropdown-item {{ (request()->is('/imovel/listar')) ? 'active' : '' }}" href="{{ url('/imovel/listar') }}" >
                                        Listar
                                    </a>
                                </div>
                            </li>
                            
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                        document.getElementById('logout-form').submit();">
                                        Sair
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                        
                    </ul>
                </div>
            </nav>  
            <div class="nav-anuncio-gratis {{ (request()->is('adesao')) ? 'active' : '' }}">
                <a href="/adesao">Anuncie Grátis por 45 dias</a>
            </div> 
        </div>
    </header>


@if( Auth::user()->is_admin)
    <a href="{{ url('/admin') }}" class="btn btn-danger btn-admin"> Acessar Painel ADM </a>
    
@endif