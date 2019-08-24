<div class="container-fluid banner-principal">
        <div class="container search">
            <div class="row">
              <div class="col-12">
                <h1 class="title-search-home">Encontre seu imóvel!</h1>
              </div>
            </div>
                
            <div class="search-banner-principal">
                <div class="container area-busca">
                   <div class="container-busca">
                       <div class="class-1">
                           <div class="row">
                               <div class="col-md-12">
                                    <div class="row">    
                                        <div class="col-md-5">
                                            <div class="titulo-busca">
                                                <p>O que vocÊ deseja</p>
                                            </div>
                                            <div class="select-busca">
                                                 <button>Comprar</button>
                                                 <button>alugar</button>
                                                 <button>lançamentos</button>
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-2">
                                            <div class="titulo-busca">
                                                <p>tipo de imovel</p>
                                            </div>
                                             <div class="select-busca">
                                                 <select class="select-imovel" name="" id="">
                                                    @php
                                                        $res = "";
                                                        $com = "";
                                                        $etc = "";
                                                        foreach($tipo_imovel as $tipo){
                                                            
                                                            switch($tipo->cd_categoria_imovel){
                                                                case "1":
                                                                    $res .= '<option value="'.$tipo->cd_tipo_imovel.'" >'.$tipo->nm_tipo_imovel.'</option>';
                                                                    break;
                                                                case "2":
                                                                    $com .= '<option value="'.$tipo->cd_tipo_imovel.'" >'.$tipo->nm_tipo_imovel.'</option>';
                                                                    break;
                                                                case "3":
                                                                    $etc .= '<option value="'.$tipo->cd_tipo_imovel.'" >'.$tipo->nm_tipo_imovel.'</option>';
                                                                    break;
                                                            }
                                                            
                                                        }
                                                    @endphp
                                                    
                                            
                                                    <optgroup label="Residencial" value="1">
                                                        {!! $res !!}
                                                    </optgroup>
                                                    <optgroup label="Comercial" value="2">
                                                        {!! $com !!}
                                                    </optgroup>
                                                    <optgroup label="Outros" value="3">
                                                        {!! $etc !!}
                                                    </optgroup> 
                                                 </select>
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-5">
                                            <div class="titulo-busca">
                                              <p>Onde</p>
                                            </div>
                                          
                                          <input type="text" name=""/>
                                        </div>
                                    </div>
                                </div>
                           </div>
                       </div>
                       <div class="class-2">
                           <div class="row">
                                        <div class="col-sm-12">
                                            <div class="select-busca">
                                                <select class="select-infos-imovel" name="" id="">
                                                    <option value="">Faixa de Preco</option>
                                                    <option value="">casa</option>
                                                </select>
                                            </div>
                                        
                                            <div class="select-busca">
                                                 <select class="select-infos-imovel" name="" id="">
                                                     <option value="">Quartos</option>
                                                     <option value="">casa</option>
                                                 </select>
                                            </div>
                                            
                                            <div class="select-busca">
                                                 <select class="select-infos-imovel" name="" id="">
                                                     <option value="">Banheiros</option>
                                                     <option value="">casa</option>
                                                 </select>
                                            </div>
                                        
                                            <div class="select-busca">
                                                 <select class="select-infos-imovel" name="" id="">
                                                     <option value="">vagas</option>
                                                     <option value="">casa</option>
                                                 </select>
                                            </div>
                                        
                                            <div class="select-busca">
                                                 <select class="select-infos-imovel" name="" id="">
                                                     <option value="">metragem</option>
                                                     <option value="">casa</option>
                                                 </select>
                                            </div>
                                        
                                            <div class="select-busca">
                                                 <select class="select-infos-imovel" name="" id="">
                                                     <option value="">codigo do imovel</option>
                                                     <option value="">casa</option>
                                                 </select>
                                            </div>
                                        </div>
                                    </div>
                       </div>
                   </div>
                   
                   <div class="class-3">
                       <button class="btn-search">Buscar</button>
                   </div>
                </div>
            </div>
        </div>
    </div>