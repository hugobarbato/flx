
    <header>
        <div class="container menu-nav">
            <nav class="navbar navbar-expand-lg navbar-light">
                <div class="logo-flx">
                    <a class="navbar-brand" href="#">FLX</a>
                </div>
                
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSite">
                    <span class="navbar-toggle-icon"></span>
                </button>
                
                <div class="collapse navbar-collapse menu-principal" id="navbarSite">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="/">Home</a>
                        </li>
                        
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                        @else
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
                        <li class="nav-item">
                            <a class="nav-link" href="/cadastrar">Cadastrar</a>
                        </li>
                        @endguest
                        <li class="nav-item">
                            <a class="nav-link" href="/comprar">Comprar</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/lancamentos">Lançamentos</a>
                        </li>
                    </ul>
                </div>
            </nav> 
            <div class="nav-anuncio-gratis">
                <p>Anuncie Grátis por 45 dias</p>
            </div>
            

        </div>
        <div class="container">
            <hr>
        </div>
    </header>