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
                        <div class="form-row">
                            <div class="col-md-12">
                                <h4>Anunciar como</h4>
                            </div>
                            <div class="col-md-3">
                                <select name="cadastro_anunciar_como" id="cadastro_anunciar_como" class="form-control">
                                    <option value="">Venda</option>
                                </select>
                            </div>
                        </div>
                    </div>
                <div class="cadastro-geral">   
                    <div class="bloco-cadastro-imovel">
                        <div class="form-row">
                            <div class="col-md-12">
                                <h4>Cadastro de imóvel</h4>
                            </div>
                        </div>
                            
                        <div class="form-row">
                            <div class="col-md-4">
                                <select name="cadastro_anunciar_como" id="cadastro_anunciar_como" class="form-control">
                                    <option value="1">Venda</option>
                                    <option value="2">Alugar</option>
                                    <option value="3">Lançamento</option>
                                    <option value="4">Comercial</option>
                                </select>
                            </div>
                            
                            <div class="col-md-4">
                                 <select name="cadastro_tipo_imovel" id="cadastro_tipo_imovel" class="form-control">
                                    <option value="1">Residencial</option>
                                    <option value="2">Comercial</option>
                                    <option value="3">Outros</option>
                                </select>
                            </div>
                            
                            <div class="col-md-4">
                                 <select name="" id="" class="form-control">
                                    <option value="">Venda</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    
                    <div class="bloco-titulo-cadastro">
                        <div class="form-row">
                            <div class="col-md-12">
                                <h4>titulo do anúncio</h4>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-12">
                               <input type="text" name="cadastro_titulo_cadastro" id="cadastro_titulo_cadastro" class="form-control">
                            </div>
                        </div>
                    </div>
                    
                    <div class="bloco-endereco">
                        <div class="form-row">
                            <div class="col-md-12">
                                <h4>Endereço</h4>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-4">
                               <input type="text" name="cadastro_imovel_cep" id="cadastro_imovel_cep"  placeholder="CEP" class="form-control">
                            </div>
                            
                            <div class="col-md-6">
                               <input type="text" name="cadastro_imovel_endereco" id="cadastro_imovel_endereco"  placeholder="Endereco" class="form-control">
                            </div>
                            
                            <div class="col-md-2">
                               <input type="text" name="cadastro_imovel_numero" id="cadastro_imovel_numero" placeholder="nº" class="form-control">
                            </div>
                        </div>
                        
                        <div class="form-row">
                            <div class="col-md-2">
                               <input type="text" name="cadastro_imovel_complemento" id="cadastro_imovel_complemento" placeholder="Complemento" class="form-control">
                            </div>
                            
                            <div class="col-md-2">
                               <input type="text" name="cadastro_imovel_bairro" id="cadastro_imovel_bairro" placeholder="Bairro" class="form-control">
                            </div>
                            
                            <div class="col-md-6">
                               <input type="text" name="cadastro_imovel_cidade" id="cadastro_imovel_cidade" placeholder="Cidade" class="form-control">
                            </div>
                            <div class="col-md-2">
                               <input type="text" name="cadastro_imovel_uf" id="cadastro_imovel_uf" placeholder="UF" class="form-control">
                            </div>
                        </div>
                        
                    </div>
                    
                    <div class="dados-imovel">
                        <div class="form-row">
                            <div class="col-md-12">
                                <h4>Dados do imóvel</h4>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-6">
                                <select name="cadastro_dados_imovel_quartos"  id="cadastro_dados_imovel_quartos" class="form-control">
                                    <option disabled selected>Quartos</option>
                                    <option value="">1</option>
                                </select>
                            </div>
                            
                            <div class="col-md-6">
                                <select name="cadastro_dados_imovel_suites" id="cadastro_dados_imovel_suites" class="form-control">
                                    <option disabled selected>Suítes</option>
                                    <option value="">1</option>
                                </select>
                            </div>
                        </div>
                        
                        <div class="form-row">
                            <div class="col-md-6">
                                <select name="cadastro_dados_imovel_banheiro" id="cadastro_dados_imovel_banheiro" class="form-control">
                                    <option disabled selected>Banheiros</option>
                                    <option value="">1</option>
                                </select>
                            </div>
                            
                            <div class="col-md-6">
                                <select name="cadastro_dados_imovel_vagas" id="cadastro_dados_imovel_vagas" class="form-control">
                                    <option disabled selected>Vagas</option>
                                    <option value="">1</option>
                                </select>
                            </div>
                        </div>
                        
                        <div class="form-row">
                            <div class="col-md-6">
                                <select name="cadastro_dados_imovel_deposito" id="cadastro_dados_imovel_deposito" class="form-control">
                                    <option disabled selected>Depósito</option>
                                    <option value="1">Sim</option>
                                    <option value="2">Não</option>
                                </select>
                            </div>
                            
                            <div class="col-md-6">
                                <input type="date" name="cadastro_dados_dt_entrega" id="cadastro_dados_dt_entrega" placeholder="Previsão de Entrega" class="form-control">
                            </div>
                        </div>
                        
                        <div class="form-row">
                            <div class="col-md-6">
                                <input type="text" name="cadastro_dados_area_util" id="cadastro_dados_area_util" placeholder="Area util" class="form-control">
                            </div>
                            
                            <div class="col-md-6">
                                <input type="text" name="cadastro_dados_area_total" id="cadastro_dados_area_total" placeholder="Area total" class="form-control">
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
                        <div class="form-row">
                            <div class="col-md-12">
                                <textarea rows="4" cols="50" name="cadastro_descricao_imovel" id="cadastro_descricao_imovel" class="form-control">
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
                        <div class="form-row">
                            <div class="col-md-12">
                                <div class="form-row">
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
                                        <div class="form-row">
                                            <div class="col-md-3">
                                                <label for="">Valor</label>
                                                <input type="text" name="" id="cadastro_vl_imovel" placeholder="Valor" class="form-control">
                                            </div>
                                            
                                            <div class="col-md-3">
                                                <label for="">Valor do condomínio</label>
                                                <input type="text" name="" id="cadastro_vl_imovel_condominio" placeholder="Valor condominio" class="form-control">
                                            </div>
                                            
                                            <div class="col-md-3">
                                                <label for="">Valor Mensal</label>
                                                <input type="text" name="" id="cadastro_vl_imovel_mensal" placeholder="Valor mensal" class="form-control">
                                            </div>
                                            
                                            <div class="col-md-3">
                                                <label for="">Valor em m² total</label>
                                                <input type="text" name="" id="cadastro_vl_imovel_m2" placeholder="Valor m²" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="area-comuns">
                        <div class="form-row">
                            <div class="col-md-12">
                                <h4>Areas Comuns</h4>
                            </div>
                        </div>
                        
                        <div class="form-row">
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
                        <div class="form-row">
                            <div class="col-md-12">
                                <h4>Areas Privativas</h4>
                            </div>
                        </div>
                        
                        <div class="form-row">
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
                        <div class="form-row">
                            <div class="col-md-12">
                                <h4>Fotos do Imovel</h4>
                            </div>
                        </div>
                        <div class="form-row">
                            <div>
                                <button type="button" class="btn btn-success">Cancelar envio</button>
                                <button type="button" class="btn btn-primary">Enviar</button>
                                <button type="button" class="btn btn-warning">Cancelar envio</button>
                                <button type="button" class="btn btn-danger">Apagar todos</button>
                            </div>
                        </div>
                    
                    </div>
                    
                    <div class="fotos-imovel"> 
                        <div class="form-row">
                            <div class="col-md-12">
                                <h4>Logo do Anunciante</h4>
                            </div>
                        </div>
                        <div class="form-row">
                            <div>
                                <input type="file" name=""/>
                            </div>
                        </div>
                    
                    </div>
                    
                    <div class="fotos-imovel"> 
                        <div class="form-row">
                            <div class="col-md-12">
                                <h4>Video do imovel</h4>
                            </div>
                        </div>
                        <div class="form-row">
                            <div>
                                <input type="text" name="" placeholder="link do youtube" class="form-control">
                            </div>
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
                <div class="form-row">
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