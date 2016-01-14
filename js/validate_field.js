    function validate(){
        //search_word= o que foi digitado no input
        //target_field= o campo que será retornado na busca no bd
        //search_field= o campo no bd em que o search_word será pesquisado
        //table= tabela que sera pesquisada
        //validate= bool para validar o campo apenas para aceitar os valores da lista
        //extra_field=campo da clausula extra
        //extra_clause=valor que será pesquisado na clausula extra
        //page = pagina da edição
        // text = texto para confirmação
        
    var result="",term,
            id=arguments[0]["id"],
            target_field=arguments[0]["target_field"],
            search_field=arguments[0]["search_field"],
            table=arguments[0]["table"],
            validate=arguments[0]["validate"],
            extra_clause=arguments[0]["extra_clause"],
            extra_field=arguments[0]["extra_field"],
            page = arguments[0]["page"]+$("#"+id).val(),
            text = arguments[0]["text"]+" " +$("#"+id).val()+ " ?";
            if ($("#"+id).val() != "")
            {
                $.ajax({
                    url: "ajax_validate.php",
                    Type: 'POST',
                    data: {
                        search_word: $("#"+id).val(),
                        target_field: target_field,
                        search_field: search_field,  
                        table: table,
                        extra_clause: extra_clause,
                        extra_field: extra_field
                    }, 
                    success:function(data){
				    if (data >0)
                    {
                      
                        if (confirm (text))
                        {
                           window.location.href = page;
                        }
                        else
                        {
                           
                            $("#"+id).val('');
                        }
                    }
                }
            
                });
            }
            
            }