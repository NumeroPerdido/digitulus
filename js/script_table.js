$(function () {
    $(".editable").dblclick(function () {
        var conteudoOriginal = $(this).text();
		var id_e_iterador = this.id;	
        $(this).addClass("celulaEmEdicao");
				
		var array = id_e_iterador.split("-");
		var id = array[0];
		var iterador = array[1];
		var simbolo = $("#exhibition_symbol-"+iterador).text();
		if(id == "edit" || id=="delete" || id=="checkbox" || id=="exhibition_symbol" || id=="currency_name" || id=="currency_code"){
					//alert("Não é possível editar este dado no banco de dados!");
		}
		else
		{
			$(this).html("<input type='text' value='" + conteudoOriginal + "' />");			
			$(this).children().first().focus();
			$(this).children().first().keypress(function (e) {
				if (e.which == 13) {
					var novoConteudo = $(this).val();
					$(this).parent().text(novoConteudo);
					$(this).parent().removeClass("celulaEmEdicao");	
						$.ajax({
							  method: 'post',
							  url: 'ajax_exchange.php',
							  async: false,
							  data: {novoConteudo: novoConteudo, id: id, simbolo: simbolo},
							  success: function(data) {
								alert(data);								
							  }
						});
					document.location.href = 'index.php?page=Lista-de-Cambios';
				}
			});
		}
		
	$(this).children().first().blur(function(){
		$(this).parent().text(conteudoOriginal);
		$(this).parent().removeClass("celulaEmEdicao");
	});
    });
});