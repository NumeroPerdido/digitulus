<?php

    include_once "db.class.php";
    $db = new DB();
    //search_word= o que foi digitado no input
    //target_field= o campo que será retornado na busca no bd
    //search_field= o campo no bd em que o search_word será pesquisado
    //table= tabela que sera pesquisada
    //validate= bool para validar o campo apenas para aceitar os valores da lista
    //extra_field=campo da clausula extra
    //extra_clause=valor que será pesquisado na clausula extra
    $search_word=addslashes($_GET["search_word"]);
    $table=addslashes($_GET["table"]);
    $search_field=addslashes($_GET["search_field"]);
    $target_field=addslashes($_GET["target_field"]);
    //apendice da query
    $append="";
    //se essas variáveis forem setadas, serão adicionadas a query
    if(isset($_GET["extra_field"]) && isset($_GET["extra_clause"]) &&   $_GET["extra_clause"]!="" ){
        $extra_field=addslashes($_GET["extra_field"]);
        $extra_clause=addslashes($_GET["extra_clause"]);
        $append=" AND ".$extra_field." = '".$extra_clause."'";
    }

    $sql = "SELECT DISTINCT $target_field FROM $table WHERE $search_field like '%$search_word%' ".$append;
    $result=$db->query($sql);

    $ajax=array();

    $targets=explode(",",$target_field);

    //transforma o objeto BD em array
    foreach($result as $rs){
        $combine_targets="";
        foreach($targets as $tgs){
            if(count($targets)>1){
                $combine_targets.=$rs[$tgs]."|";
            }
            else{
                $combine_targets.=$rs[$tgs];
            }
        }
        $ajax[]=$combine_targets;
    }
    //retorna o ajax para o auto complete
    echo json_encode($ajax);
	//bug 
?>