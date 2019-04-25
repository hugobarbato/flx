/*global $*/
$(document).ready(function(){
    function calcularm2(){
        var area = ( $("#vl_area_util").val() ? $("#vl_area_util").val() :  0 );
        var price = 0;
        if($("#vl_imovel").val()){
            price = ($("#vl_imovel").val()).replace(/\./g,'').replace(/,/g,'.');
        }
        console.info([price,area]);
        var result = Number((price/area));
        console.info(result);//
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
        console.info(this.files);
        if(this.files.length){
            for (var i = 0; i < this.files.length; i++) { //for multiple files          
                (function(file) {
                    console.info([i,file]);
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
});