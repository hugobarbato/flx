
    <header>
        <div class="container menu-nav">
            <nav class="navbar navbar-expand-lg navbar-light w-100">
                <div class="logo-flx">
                    <a class="navbar-brand" href="{{url('')}}"><img src="{{url('img/logo.png')}}"> </a>
                </div>
                
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSite">
                    <span class="navbar-toggle-icon"></span>
                </button>
                
                <div class="collapse navbar-collapse menu-principal" id="navbarSite">
                    <ul class="navbar-nav">
                       <li class="nav-item {{ (request()->is('home')) ? 'active' : '' }}">
                            <a class="nav-link" href="{{url('/home')}}">Home</a>
                        </li>
                        <li class="nav-item {{ (request()->is('search/rent')) ? 'active' : '' }}">
                            <a class="nav-link" href="{{url('/search/rent')}}">Alugar</a>
                        </li>
                        <li class="nav-item {{ (request()->is('search/sell')) ? 'active' : '' }}">
                            <a class="nav-link" href="{{url('/search/sell')}}">Comprar</a>
                        </li>
                        <li class="nav-item {{ (request()->is('search/news')) ? 'active' : '' }}">
                            <a class="nav-link" href="{{url('/search/news')}}">Lançamentos</a>
                        </li>
                        <!--<li class="nav-item">-->
                        <!--    <a class="nav-link" href="/comprar">Comprar</a>-->
                        <!--</li>-->
                        <!--<li class="nav-item">-->
                        <!--    <a class="nav-link" href="/lancamentos">Lançamentos</a>-->
                        <!--</li>-->
                        
                        
                        
                        
                    </ul>
                </div>
                    @guest
                        <div class="menu-principal mx-3" >
                            <ul class="navbar-nav">
                                <li class="nav-item {{ (request()->is('login')) ? 'active' : '' }}">
                                    <a class="nav-link" href="{{ route('login') }}"> 
                                        <i class="fas fa-sign-in-alt"></i>
                                        {{ __('Entrar') }}
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="float-right nav-anuncio-gratis {{ (request()->is('adesao')) ? 'active' : '' }}">
                            <a href="{{url('/adesao')}}">Anuncie Grátis por 45 dias</a>
                        </div> 
                    @else
                        <div class="menu-principal" >
                            <ul class="navbar-nav">
                                <li class="nav-item dropdown md-only {{ (request()->is('/imovel/adicionar')) || (request()->is('/imovel/listar')) ? 'active' : '' }}">
                                    <a id="imoveis" class="nav-link dropdown-toggle" role="button" data-toggle="dropdown" 
                                    aria-haspopup="true" aria-expanded="false" v-pre>
                                        <i class="fa fa-home" aria-hidden="true"></i> Imóveis <span class="caret"></span>
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
                                        <i class="fa fa-user-circle" aria-hidden="true"></i> {{ Auth::user()->name }} <span class="caret"></span>
                                    </a>

                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="{{ route('planos') }}">
                                           Meus Planos
                                        </a>

                                        <a class="dropdown-item sm-only {{ (request()->is('/imovel/adicionar')) ? 'active' : '' }}" href="{{ url('/imovel/adicionar') }}" >
                                            Adicionar Imóveis 
                                        </a>
                                        <a class="dropdown-item sm-only {{ (request()->is('/imovel/listar')) ? 'active' : '' }}" href="{{ url('/imovel/listar') }}" >
                                            Listar Imóveis  
                                        </a>
                                        
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
                            </ul>
                        </div>
                        
                    @endguest
            </nav>  
        </div>
    </header>
 
@if( Auth::user() && Auth::user()->is_admin)
    <a href="{{ url('/admin') }}" class="btn btn-danger btn-admin"> Acessar Painel ADM </a>
    
@endif 