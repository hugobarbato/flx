  /*global $*/  
  
  $( document ).ready(function() {
     $('.mask_date').mask('00/00/0000');
    $('.mask_time').mask('00:00:00');
    $('.mask_date_time').mask('00/00/0000 00:00:00');
    $('.mask_cep').mask('00000-000');
    $('.mask_phone').mask("(99) 9999-99999");
    $('.mask_phone_with_ddd').mask('(00) 0000-0000');
    $('.mask_rg').mask('00.000.000-A');
    $('.mask_cpf').mask('000.000.000-00');
    $('.mask_cnpj').mask('00.000.000/0000-00');
    $('.mask_money').mask('000.000.000.000.000,00', {reverse: true});
    $('.mask_money2').mask("#.##0,00", {reverse: true});
  	$('.mask_cpfcnpj').mask('000.000.000-000', {
  		onKeyPress : function(cpfcnpj, e, field, options) {
  			var masks = ['000.000.000-00', '00.000.000/0000-00'];
  			console.info(cpfcnpj.length)
  			var mask = (cpfcnpj.length > 13) ? masks[1] : masks[0];
  			$('.mask_cpfcnpj').mask(mask, options);
  		}
  	});
  });
 