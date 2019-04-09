
/*global $*/
window.onload = function(){
        
    $("#cd_document").mask('000.000.000-00');
    $("#ic_juridica").change(function(){
        if(this.value == "1"){
            $("#span_tipo_pessoa").html("Jurídica");
            $("#name").attr('Placeholder',"Razão Social");
            $("#cd_document").attr('Placeholder',"CNPJ"); 
            $('#cd_document').mask('00.000.000/0000-00');
        }else{
            $("#span_tipo_pessoa").html("Fisíca");
            $("#name").attr('Placeholder',"Nome");
            $("#cd_document").attr('Placeholder',"CPF");
            $("#cd_document").mask('000.000.000-00');
        }
    });
    $("#aceit").change(function(){
        console.info($("#aceit:checked"))
        if($("#aceit:checked").length){
            $("#cadastrarUsuario").prop('disabled',false);
        }else{
             $("#cadastrarUsuario").prop('disabled',true);
        }
    });
    
}