$(document).ready(function(){
    $("#vl_area_total, #vl_area_util, #vl_imovel").change(function(){
        console.info([
            $("#vl_area_total").val(),
            $("#vl_area_util").val(),
            $("#vl_imovel").val()
        ]);
        
        var area = ( $("#vl_area_total").val() ? $("#vl_area_total").val() : $("#vl_area_util").val() ? $("#vl_area_util").val() : 0 );
        var price = (( $("#vl_imovel").val() ? $("#vl_imovel").val() : 0 ) );
        
        
        $("#vl_m2").val(Number((price/area)).toLocaleString('pt-BR', { style: 'currency', currency: 'BRL' }));
    });;
});