/*global $*/
$(document).ready(function(){
    
    function calcularm2(){
        var area = ( $("#vl_area_util").val() ? $("#vl_area_util").val() :  0 );
        var price = 0;
        if($("#vl_imovel").val()){
            price = ($("#vl_imovel").val()).replace(/\./g,'').replace(/,/g,'.');
        }
        var result = Number((price/area));
        if(result){
            $("#vl_m2").val(result.toLocaleString('pt-BR', { style: 'currency', currency: 'BRL' }));
        }else{
            $("#vl_m2").val('R$ 0,00');
        }
    }

    $("#vl_area_util").change(calcularm2);
    $("#vl_imovel").change(calcularm2);
    calcularm2();

    $("#btn_pics").click(function(){
        $('#pics_imovel').click();
    });

    $("#pics_imovel").change(function(event){
        if(this.files.length){
            for (var i = 0; i < this.files.length; i++) { //for multiple files          
                (function(file) {
                    var reader = new FileReader();
                    $("#preview_list").html("");
                    reader.onload = function (e) {
                        var img = $('<img/>').attr('src', e.target.result)
                        $(img).attr('width', "200");
                        $("#preview_list").append(img);
                    }
                    reader.readAsDataURL(file);
                })(this.files[i]);
            }
            
            $("#pics_list").fadeIn();
        }else{
            $("#pics_list").hide();
        }
    });

    var cd_tipo_imovel_ativo = $("#cd_tipo_imovel :selected").parent().attr('value');
    $("#cd_tipo_imovel").change(function(){
        var new_tipo_imovel = $("#cd_tipo_imovel :selected").parent().attr('value');
        if(new_tipo_imovel != cd_tipo_imovel_ativo){
            buscar_areas_tipo(new_tipo_imovel);
        }
    });

    function buscar_areas_tipo(tipo){
        $(".area-privativa, .area-comuns").show();
        $("#AreasPrivativasChecks, #AreasComunsChecks").html('<i class="fa fa-spinner fa-pulse fa-2x fa-fw"></i> Carregando áreas.');
        $.get('/areas/obter_html/'+tipo).done(function(data){
            if(data && 'privativas' in data && 'comuns' in data){
                cd_tipo_imovel_ativo = tipo;
                $("#AreasPrivativasChecks").html(data['privativas']);
                $("#AreasComunsChecks").html(data['comuns']);
                check_areas_selecionadas();
            }else{
            console.info('Algo deu errado na request!!!');
            }
        });
    }
    
    function check_areas_selecionadas(){
        var privativas = $("#ds_areas_privativas").val();
        privativas = privativas.split(';');
        privativas.forEach(el=>{
            $("#ap"+el).prop('checked',true);
        })
        var comuns = $("#ds_areas_comuns").val();
        comuns = comuns.split(';');
        comuns.forEach(el=>{
            $("#ac"+el).prop('checked',true);
        })
    }
    
    $("#cd_tipo_anunciante").change(function(){
        if(this.value == "4"){
            $(".IncorporadoraFields").show();
            $(".logo-anunciante").text("anunciante");
            $(".video-anunciante").text("anunciante");
        }
        else if(this.value == "5"){
            $("#bloco_cadastro_imovel").hide();
            $(".dados-imovel").hide();
            $(".InputsValores").hide();
            $(".hotelFields").show();
            $(".principais-comodidades").show();
            $(".logo-anunciante").text("hotel");
            $(".video-anunciante").text("hotel");
        }
        else{
            $("#bloco_cadastro_imovel").show();
            $(".dados-imovel").show();
            $(".InputsValores").show();
            $(".IncorporadoraFields").hide();
            $(".hotelFields").hide();
            $(".principais-comodidades").hide();
        }
    });

    $("input[name='ic_valor_mensagem']").change(function(){
        if(!this.value){
            $(".InputsValores").hide();

        }else{
            $(".InputsValores").show();

        }
    });

    $("#ic_status").change(function(){
        if(this.value == '4'){
            $("#dt_previsao_entrega").val('');
            $("#dt_previsao_entrega").prop('disabled',true);
        }else{
            $("#dt_previsao_entrega").prop('disabled',false);
        }
    });

});
