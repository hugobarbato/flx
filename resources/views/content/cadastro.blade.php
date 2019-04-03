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
                            <a class="nav-link" href="http://projeto-flx-juciaralima.c9users.io">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="http://projeto-flx-juciaralima.c9users.io/login">Login</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="http://projeto-flx-juciaralima.c9users.io/alugar">Alugar</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="http://projeto-flx-juciaralima.c9users.io/comprar">Comprar</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="http://projeto-flx-juciaralima.c9users.io/lancamentos">Lançamentos</a>
                        </li>
                        
                    </ul>
                    
                </div>
               
            </nav> 
            <div class="nav-anuncio-gratis">
                <p>Anuncie Grátis por 45 dias</p>
            </div>
        </div>
    </header>
    


    <article>
        <div class="container">
            <div class="container-content">
                <form id="container-anuncio">
                    
                    <div class="bloco-anunciar">
                        <div class="row">
                            <div class="col-md-12">
                                <h4>Anunciar como</h4>
                            </div>
                            <div class="col-md-3">
                                <select name="" id="cadastro_anunciar_como">
                                    <option value="">Venda</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    
                    <div class="bloco-cadastro-imovel">
                        <div class="row">
                            <div class="col-md-12">
                                <h4>Cadastro de imóvel</h4>
                            </div>
                        </div>
                            
                        <div class="row">
                            <div class="col-md-3">
                                <select name="" id="cadastro_anunciar_como">
                                    <option value="">Venda</option>
                                    <option value="">Alugar</option>
                                    <option value="">Lançamento</option>
                                    <option value="">Comercial</option>
                                </select>
                            </div>
                            
                            <div class="col-md-3">
                                 <select name="" id="cadastro_tipo_imovel">
                                    <option value="">Residencial</option>
                                    <option value="">Comercial</option>
                                    <option value="">Outros</option>
                                </select>
                            </div>
                            
                            <div class="col-md-3">
                                 <select name="" id="">
                                    <option value="">Venda</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    
                    <div class="bloco-titulo-cadastro">
                        <div class="row">
                            <div class="col-md-12">
                                <h4>titulo do anúncio</h4>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                               <input type="text" name="" id="cadastro_titulo_cadastro">
                            </div>
                        </div>
                    </div>
                    
                    <div class="bloco-endereco">
                        <div class="row">
                            <div class="col-md-12">
                                <h4>Endereço</h4>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                               <input type="text" id="cadastro_imovel_cep" name="" placeholder="CEP">
                            </div>
                            
                            <div class="col-md-6">
                               <input type="text" id="cadastro_imovel_endereco" name="" placeholder="Endereco">
                            </div>
                            
                            <div class="col-md-2">
                               <input type="text" id="cadastro_imovel_numero" name="" placeholder="nº">
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-2">
                               <input type="text" id="cadastro_imovel_complemento" name="" placeholder="Complemento">
                            </div>
                            
                            <div class="col-md-2">
                               <input type="text" id="cadastro_imovel_bairro" name="" placeholder="Bairro">
                            </div>
                            
                            <div class="col-md-6">
                               <input type="text" id="cadastro_imovel_cidade" name="" placeholder="Cidade">
                            </div>
                            <div class="col-md-2">
                               <input type="text" id="cadastro_imovel_uf" name="" placeholder="UF">
                            </div>
                        </div>
                        
                    </div>
                    
                    <div class="dados-imovel">
                        <div class="row">
                            <div class="col-md-12">
                                <h4>Dados do imóvel</h4>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-6">
                                <select id="cadastro_dados_imovel_quartos" name="">
                                    <option disabled selected>Quartos</option>
                                    <option value="">1</option>
                                </select>
                            </div>
                            
                            <div class="col-md-6">
                                <select id="cadastro_dados_imovel_suites" name="">
                                    <option disabled selected>Suítes</option>
                                    <option value="">1</option>
                                </select>
                            </div>
                        </div>
                        
                        <div class="form-row">
                            <div class="col-md-6">
                                <select name="" id="cadastro_dados_imovel_banheiro">
                                    <option disabled selected>Banheiros</option>
                                    <option value="">1</option>
                                </select>
                            </div>
                            
                            <div class="col-md-6">
                                <select name="" id="cadastro_dados_imovel_vagas">
                                    <option disabled selected>Vagas</option>
                                    <option value="">1</option>
                                </select>
                            </div>
                        </div>
                        
                        <div class="form-row">
                            <div class="col-md-6">
                                <select name="" id="cadastro_dados_imovel_deposito">
                                    <option disabled selected>Depósito</option>
                                    <option value="1">Sim</option>
                                    <option value="2">Não</option>
                                </select>
                            </div>
                            
                            <div class="col-md-6">
                                <label for="">Previsão de Entrega</label>
                                <input type="date" name="" id="cadastro_dados_dt_entrega">
                            </div>
                        </div>
                        
                        <div class="form-row">
                            <div class="col-md-6">
                                <label for="">Area util</label>
                                <input type="text" id="cadastro_dados_area_util">
                            </div>
                            
                            <div class="col-md-6">
                                <label for="">Area total</label>
                                <input type="text" name="" id="cadastro_dados_area_total">
                            </div>
                        </div>
                        
                    </div>
                    <div class="status-imovel">
                        <div class="form-row">
                           <label for="customRange2">Range exemplo</label>
                            <input type="range" class="custom-range" min="0" max="5" id="customRange2">
                        </div>
                    </div>
                    
                    <div class="status-imovel">
                        <div class="form-row">
                           <div class="col-md-12">
                               <h4>Descrição do imovel</h4>
                           </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <textarea rows="4" cols="50" id="cadastro_descricao_imovel">
                                    </textarea>
                            </div>
                        </div>
                    </div>
                    
                     <div class="valor-imovel">
                        <div class="form-row">
                           <div class="col-md-12">
                               <h4>Valor do imovel</h4>
                           </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-2">
                                        <div>
                                          <input type="checkbox" id="scales" name="scales" checked>
                                          <label for="scales">Scales</label>
                                        </div>
                                        
                                        <div>
                                          <input type="checkbox" id="horns" name="horns">
                                          <label for="horns">Horns</label>
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-10">
                                        <div class="row">
                                            <div class="col-md-3">
                                                <label for="">Valor</label>
                                                <input type="text" name="" id="cadastro_vl_imovel" placeholder="Valor">
                                            </div>
                                            
                                            <div class="col-md-3">
                                                <label for="">Valor do condomínio</label>
                                                <input type="text" name="" id="cadastro_vl_imovel_condominio" placeholder="Valor condominio">
                                            </div>
                                            
                                            <div class="col-md-3">
                                                <label for="">Valor Mensal</label>
                                                <input type="text" name="" id="cadastro_vl_imovel_mensal" placeholder="Valor mensal">
                                            </div>
                                            
                                            <div class="col-md-3">
                                                <label for="">Valor em m² total</label>
                                                <input type="text" name="" id="cadastro_vl_imovel_m2" placeholder="Valor m²">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="area-comuns">
                        <div class="row">
                            <div class="col-md-12">
                                <h4>Areas Comuns</h4>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-2">
                                <div>
                                  <input type="checkbox" id="scales" name="scales" checked>
                                  <label for="scales">Scales</label>
                                </div>
                                
                                <div>
                                  <input type="checkbox" id="horns" name="horns">
                                  <label for="horns">Horns</label>
                                </div>
                                
                                <div>
                                  <input type="checkbox" id="horns" name="horns">
                                  <label for="horns">Horns</label>
                                </div>
                            </div>
                            
                            <div class="col-md-2">
                                <div>
                                  <input type="checkbox" id="scales" name="scales" checked>
                                  <label for="scales">Scales</label>
                                </div>
                                
                                <div>
                                  <input type="checkbox" id="horns" name="horns">
                                  <label for="horns">Horns</label>
                                </div>
                                
                                <div>
                                  <input type="checkbox" id="horns" name="horns">
                                  <label for="horns">Horns</label>
                                </div>
                            </div>
                            
                            <div class="col-md-2">
                                <div>
                                  <input type="checkbox" id="scales" name="scales" checked>
                                  <label for="scales">Scales</label>
                                </div>
                                
                                <div>
                                  <input type="checkbox" id="horns" name="horns">
                                  <label for="horns">Horns</label>
                                </div>
                                
                                <div>
                                  <input type="checkbox" id="horns" name="horns">
                                  <label for="horns">Horns</label>
                                </div>
                            </div>
                            
                            <div class="col-md-2">
                                <div>
                                  <input type="checkbox" id="scales" name="scales" checked>
                                  <label for="scales">Scales</label>
                                </div>
                                
                                <div>
                                  <input type="checkbox" id="horns" name="horns">
                                  <label for="horns">Horns</label>
                                </div>
                                
                                <div>
                                  <input type="checkbox" id="horns" name="horns">
                                  <label for="horns">Horns</label>
                                </div>
                            </div>
                            
                            <div class="col-md-2">
                                <div>
                                  <input type="checkbox" id="scales" name="scales" checked>
                                  <label for="scales">Scales</label>
                                </div>
                                
                                <div>
                                  <input type="checkbox" id="horns" name="horns">
                                  <label for="horns">Horns</label>
                                </div>
                                
                                <div>
                                  <input type="checkbox" id="horns" name="horns">
                                  <label for="horns">Horns</label>
                                </div>
                            </div>
                            
                            <div class="col-md-2">
                                <div>
                                  <input type="checkbox" id="scales" name="scales" checked>
                                  <label for="scales">Scales</label>
                                </div>
                                
                                <div>
                                  <input type="checkbox" id="horns" name="horns">
                                  <label for="horns">Horns</label>
                                </div>
                                
                                <div>
                                  <input type="checkbox" id="horns" name="horns">
                                  <label for="horns">Horns</label>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                    
                    
                    <div class="area-privativa">
                        <div class="row">
                            <div class="col-md-12">
                                <h4>Areas Privativas</h4>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-2">
                                <div>
                                  <input type="checkbox" id="scales" name="scales" checked>
                                  <label for="scales">Scales</label>
                                </div>
                                
                                <div>
                                  <input type="checkbox" id="horns" name="horns">
                                  <label for="horns">Horns</label>
                                </div>
                                
                                <div>
                                  <input type="checkbox" id="horns" name="horns">
                                  <label for="horns">Horns</label>
                                </div>
                            </div>
                            
                            <div class="col-md-2">
                                <div>
                                  <input type="checkbox" id="scales" name="scales" checked>
                                  <label for="scales">Scales</label>
                                </div>
                                
                                <div>
                                  <input type="checkbox" id="horns" name="horns">
                                  <label for="horns">Horns</label>
                                </div>
                                
                                <div>
                                  <input type="checkbox" id="horns" name="horns">
                                  <label for="horns">Horns</label>
                                </div>
                            </div>
                            
                            <div class="col-md-2">
                                <div>
                                  <input type="checkbox" id="scales" name="scales" checked>
                                  <label for="scales">Scales</label>
                                </div>
                                
                                <div>
                                  <input type="checkbox" id="horns" name="horns">
                                  <label for="horns">Horns</label>
                                </div>
                                
                                <div>
                                  <input type="checkbox" id="horns" name="horns">
                                  <label for="horns">Horns</label>
                                </div>
                            </div>
                            
                            <div class="col-md-2">
                                <div>
                                  <input type="checkbox" id="scales" name="scales" checked>
                                  <label for="scales">Scales</label>
                                </div>
                                
                                <div>
                                  <input type="checkbox" id="horns" name="horns">
                                  <label for="horns">Horns</label>
                                </div>
                                
                                <div>
                                  <input type="checkbox" id="horns" name="horns">
                                  <label for="horns">Horns</label>
                                </div>
                            </div>
                            
                            <div class="col-md-2">
                                <div>
                                  <input type="checkbox" id="scales" name="scales" checked>
                                  <label for="scales">Scales</label>
                                </div>
                                
                                <div>
                                  <input type="checkbox" id="horns" name="horns">
                                  <label for="horns">Horns</label>
                                </div>
                                
                                <div>
                                  <input type="checkbox" id="horns" name="horns">
                                  <label for="horns">Horns</label>
                                </div>
                            </div>
                            
                            <div class="col-md-2">
                                <div>
                                  <input type="checkbox" id="scales" name="scales" checked>
                                  <label for="scales">Scales</label>
                                </div>
                                
                                <div>
                                  <input type="checkbox" id="horns" name="horns">
                                  <label for="horns">Horns</label>
                                </div>
                                
                                <div>
                                  <input type="checkbox" id="horns" name="horns">
                                  <label for="horns">Horns</label>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                    
                    <div class="fotos-imovel"> 
                        <div class="row">
                            <div class="col-md-12">
                                <h4>Fotos do Imovel</h4>
                            </div>
                        </div>
                        <div class="row">
                            <div>
                                <button type="button" class="btn btn-success">Cancelar envio</button>
                                <button type="button" class="btn btn-primary">Enviar</button>
                                <button type="button" class="btn btn-warning">Cancelar envio</button>
                                <button type="button" class="btn btn-danger">Apagar todos</button>
                            </div>
                        </div>
                    
                    </div>
                    
                    <div class="fotos-imovel"> 
                        <div class="row">
                            <div class="col-md-12">
                                <h4>Logo do Anunciante</h4>
                            </div>
                        </div>
                        <div class="row">
                            <div>
                                <input type="file" name=""/>
                            </div>
                        </div>
                    
                    </div>
                    
                    <div class="fotos-imovel"> 
                        <div class="row">
                            <div class="col-md-12">
                                <h4>Video do imovel</h4>
                            </div>
                        </div>
                        <div class="row">
                            <div>
                                <input type="text" name="" placeholder="link do youtube"/>
                            </div>
                        </div>
                    
                    </div>
                    
                    
                   
                    
                </form>
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