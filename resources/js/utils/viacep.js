/* global $ nao_envia_token */
$(".via_cep").change(function (){
   var cep = this.value.replace(/\D/g,'');
   var inputs = $('input[viacep]');
   var select = $('select[viacep]');
   if(cep.length == 8){
       nao_envia_token = true;
       // //viacep.com.br/ws
       $("[viacep=logradouro]").val("Carregando...");
       $.get('/viacep/'+cep).done(function ( data) {
          $.each(inputs, function(id, el){
              switch($(el).attr('viacep')){
                    case 'localidade':
                        $(el).val(data.localidade);
                      break;
                    case 'bairro':
                        $(el).val(data.bairro);
                      break; 
                    case 'logradouro':
                        $(el).val(data.logradouro);
                      break; 
                    // case 'complemento':
                    //     $(el).val(data.complemento);
                      break;
              }
          });
          console.info('teste '+data.uf);
          console.info(select[0]);
          $(select[0]).val(data.uf);
       });
       nao_envia_token = false;
   }
});
var $via_cep = {
    getALL: function (identify){
        var elements =  $('#'+identify+' input[viacep], #'+identify+' select[viacep], #'+identify+' .via_cep');
        var results = [];
        $.each(elements, function(id,el){
            results[$(el).attr('viacep')] = $(el).val();
        });
        return results;
    }
}