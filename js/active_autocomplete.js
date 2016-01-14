function active_autocomplete(){
        //search_word= o que foi digitado no input
        //target_field= o campo que será retornado na busca no bd
        //search_field= o campo no bd em que o search_word será pesquisado
        //table= tabela que sera pesquisada
        //validate= bool para validar o campo apenas para aceitar os valores da lista
        //extra_field=campo da clausula extra
        //extra_clause=valor que será pesquisado na clausula extra
        var id=arguments[0]["id"],
            target_field=arguments[0]["target_field"],
            search_field=arguments[0]["search_field"],
            table=arguments[0]["table"],
            validate=arguments[0]["validate"],
            extra_clause=arguments[0]["extra_clause"],
            extra_field=arguments[0]["extra_field"];
        $( "#"+id ).autocomplete({
            source: function( request, response ) {
                $.ajax({
                    url: "ajax_autocomplete.php",
                    dataType: "json",
                    data: {
                        search_word: request.term,
                        target_field: target_field,
                        search_field: search_field,  
                        table: table,
                        extra_clause: extra_clause,
                        extra_field: extra_field
                    },
                    success: function( data ) {
                        response( data );
                    }
                });
            },
            //change para aceitar apenas resultados da pesquisa
            change: function(event,ui){
                if(validate=="true"){
                    if (ui.item==null){
                        $("#"+id).val('');
                        $("#"+id).focus();
                    }
                }
            }
        })
}