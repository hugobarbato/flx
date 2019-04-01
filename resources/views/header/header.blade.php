<!doctype html>
<html lang="pt-br">
  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/style.css">

    <title>Flx</title>
    
  </head>
  <body>
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
                            <a class="nav-link" href="{{ url('/') }}">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/login') }}">Login</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/alugar') }}">Alugar</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/comprar') }}">Comprar</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/lancamentos') }}">Lançamentos</a>
                        </li>
                        
                    </ul>
                    
                </div>
               
            </nav> 
            <div class="nav-anuncio-gratis">
                <p>Anuncie Grátis por 45 dias</p>
            </div>
        </div>
        
    </header>
    
    <div class="container banner-principal">
       
        <div class="container-fluid search">
                <div class="row">
                  <div class="col-12">
                    <h1>Encontre seu imóvel</h1>
                  </div>
                </div>
                
                <div class="search-banner-principal">

                   <div class="container">
                      <form>
                          <div class="row">
                            <div class="col-sm">
                                <div class="titulo-busca">
                                    <p>O que vocÊ deseja</p>
                                </div>
                                <div class="select-busca">
                                     <button>Comprar</button>
                                     <button>alugar</button>
                                     <button>lançamentos</button>
                                </div>
                            </div>
                            <div class="col-sm">
                                <div class="titulo-busca">
                                    <p>tipo de imovel</p>
                                </div>
                                 <div class="select-busca">
                                     <select name="" id="">
                                         <option value="">apartamento</option>
                                         <option value="">casa</option>
                                     </select>
                                </div>
                            </div>
                            <div class="col-sm">
                              One of three columns
                            </div>
                          </div>
                      </form>
                    </div>
               
                </div>
        </div>
     
    </div>


    <article>
        <div class="container">
            <div class="destaques-vendas">
                <div class="row">
                    <div class="col-md-12 destaques-home">
                        <h2>Destaques para venda</h2>
                    </div>
                </div>
                
                <div class="cards-vendas">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="card">
                                <img class="card-img-top" src="img/img-teste.jpg"></img>
                                <div class="card-body">
                                    <h4 class="card-title">apartamento/venda</h4>
                                    <h6 class="card-subtitle mb-2 text-muted">Jabaquara</h6>
                                    <!--<p class="card-text">Conteudo do card</p>-->
                                </div>
                                <div class="card-body">    
                                    <a href="#" class="card-link">icone</a>
                                    <a href="#" class="card-link">icone</a>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-md-3">
                            <div class="card">
                                <img class="card-img-top" src="img/img-teste.jpg"></img>
                                <div class="card-body">
                                    <h4 class="card-title">apartamento/venda</h4>
                                    <h6 class="card-subtitle mb-2 text-muted">Jabaquara</h6>
                                    <!--<p class="card-text">Conteudo do card</p>-->
                                </div>
                                <div class="card-body">    
                                    <a href="#" class="card-link">icone</a>
                                    <a href="#" class="card-link">icone</a>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-md-3">
                            <div class="card">
                                <img class="card-img-top" src="img/img-teste.jpg"></img>
                                <div class="card-body">
                                    <h4 class="card-title">apartamento/venda</h4>
                                    <h6 class="card-subtitle mb-2 text-muted">Jabaquara</h6>
                                    <!--<p class="card-text">Conteudo do card</p>-->
                                </div>
                                <div class="card-body">    
                                    <a href="#" class="card-link">icone</a>
                                    <a href="#" class="card-link">icone</a>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-md-3 ">
                            <div class="card">
                                <img class="card-img-top" src="img/img-teste.jpg"></img>
                                <div class="card-body">
                                    <h4 class="card-title">apartamento/venda</h4>
                                    <h6 class="card-subtitle mb-2 text-muted">Jabaquara</h6>
                                    <!--<p class="card-text">Conteudo do card</p>-->
                                </div>
                                <div class="card-body">    
                                    <a href="#" class="card-link">icone</a>
                                    <a href="#" class="card-link">icone</a>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
            
            <div class="destaques-locacao">
                <div class="row">
                  <div class="col-md-12 destaques-home">
                    <h2>Destaques para locação</h2>
                  </div>
                </div>
                
                <div class="cards-locacao">
                    <div class="row">
                        
                        <div class="col-md-3 ">
                            <div class="card">
                                <img class="card-img-top" src="img/books.jpg"></img>
                                <div class="card-body">
                                    <h4 class="card-title">apartamento/locação</h4>
                                    <h6 class="card-subtitle mb-2 text-muted">Jabaquara</h6>
                                    <!--<p class="card-text">Conteudo do card</p>-->
                                </div>
                                <div class="card-body">    
                                    <a href="#" class="card-link">icone</a>
                                    <a href="#" class="card-link">icone</a>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-md-3">
                            <div class="card">
                                <img class="card-img-top" src="img/books.jpg"></img>
                                <div class="card-body">
                                    <h4 class="card-title">apartamento/locação</h4>
                                    <h6 class="card-subtitle mb-2 text-muted">Jabaquara</h6>
                                    <!--<p class="card-text">Conteudo do card</p>-->
                                </div>
                                <div class="card-body">    
                                    <a href="#" class="card-link">icone</a>
                                    <a href="#" class="card-link">icone</a>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-md-3">
                            <div class="card">
                                <img class="card-img-top" src="img/books.jpg"></img>
                                <div class="card-body">
                                    <h4 class="card-title">apartamento/locação</h4>
                                    <h6 class="card-subtitle mb-2 text-muted">Jabaquara</h6>
                                    <!--<p class="card-text">Conteudo do card</p>-->
                                </div>
                                <div class="card-body">    
                                    <a href="#" class="card-link">icone</a>
                                    <a href="#" class="card-link">icone</a>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-md-3 ">
                            <div class="card">
                                <img class="card-img-top" src="img/books.jpg"></img>
                                <div class="card-body">
                                    <h4 class="card-title">apartamento/locação</h4>
                                    <h6 class="card-subtitle mb-2 text-muted">Jabaquara</h6>
                                    <!--<p class="card-text">Conteudo do card</p>-->
                                </div>
                                <div class="card-body">    
                                    <a href="#" class="card-link">icone</a>
                                    <a href="#" class="card-link">icone</a>
                                </div>
                            </div>
                        </div>
                        
                    
                    </div>
                </div>
                
            </div>
            
            <div class="lancamentos-destaques">
                <div class="row">
                  <div class="col-md-12 destaques-home">
                    <h2>Lançamentos em destaque</h2>
                  </div>
                </div>
                
                <div class="cards-lancamentos">
                    <div class="row">
                        <div class="col-md-3 ">
                            <div class="card">
                                <img class="card-img-top" src="img/welcome.jpg"></img>
                                <div class="card-body">
                                    <h4 class="card-title">lançamentos</h4>
                                    <h6 class="card-subtitle mb-2 text-muted">Jabaquara</h6>
                                    <!--<p class="card-text">Conteudo do card</p>-->
                                </div>
                                <div class="card-body">    
                                    <a href="#" class="card-link">icone</a>
                                    <a href="#" class="card-link">icone</a>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-md-3">
                            <div class="card">
                                <img class="card-img-top" src="img/welcome.jpg"></img>
                                <div class="card-body">
                                    <h4 class="card-title">lançamentos</h4>
                                    <h6 class="card-subtitle mb-2 text-muted">Jabaquara</h6>
                                    <!--<p class="card-text">Conteudo do card</p>-->
                                </div>
                                <div class="card-body">    
                                    <a href="#" class="card-link">icone</a>
                                    <a href="#" class="card-link">icone</a>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-md-3">
                            <div class="card">
                                <img class="card-img-top" src="img/welcome.jpg"></img>
                                <div class="card-body">
                                    <h4 class="card-title">lançamentos</h4>
                                    <h6 class="card-subtitle mb-2 text-muted">Jabaquara</h6>
                                    <!--<p class="card-text">Conteudo do card</p>-->
                                </div>
                                <div class="card-body">    
                                    <a href="#" class="card-link">icone</a>
                                    <a href="#" class="card-link">icone</a>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-md-3 ">
                            <div class="card">
                                <img class="card-img-top" src="img/welcome.jpg"></img>
                                <div class="card-body">
                                    <h4 class="card-title">lançamentos</h4>
                                    <h6 class="card-subtitle mb-2 text-muted">Jabaquara</h6>
                                    <!--<p class="card-text">Conteudo do card</p>-->
                                </div>
                                <div class="card-body">    
                                    <a href="#" class="card-link">icone</a>
                                    <a href="#" class="card-link">icone</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
    </article>
    <footer>
        <div class="container-fluid  menu-footer">
            <div class="container">
                <div class="row">
                    <div class="col-md-3 ">
                        <p>Anuncie seu imovel</p>
                        <ul>
                            <li>Proprietários</li>
                            <li>Corretores</li>
                            <li>Imobiliárias</li>
                            <li>Hotel</li>
                            <li>Hotel - Venda</li>
                        </ul>
                    </div>
                    
                    <div class="col-md-3 ">
                        
                        <p>Contato</p>
                        <ul>
                            <li>contato@flximoveis.com.br</li>
                            <li>Whatsapp: (11)99999-9999</li>
                            <li>Telefone: (11)99999-9999</li>
                        </ul>
                    </div>
                    
                    <div class="col-md-3 ">
                        
                        <p>Institucional</p>
                        <ul>
                            <li>Quem Somos</li>
                            <li>Segurança da informação</li>
                            <li>Termo de uso</li>
                        </ul>
                    </div>
                    
                    <div class="col-md-3 ">
                        
                        <div class="nav-anuncio-gratis">
                            <p>Anuncie Grátis por 45 dias</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>