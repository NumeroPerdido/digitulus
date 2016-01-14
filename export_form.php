<?php
    include_once "product.class.php";
    include_once "csv_functions.php";
    $products=[];
    $j=0;
    //verifica quais checkboxs foram marcados
    for($i=0;$i<25;$i++){
        $check="check".$i;
        if(isset($_POST[$check])){
            //cria objeto produto
            $product_aux=new Product();
            //carrega os atributos apartir do sku
            $product_aux->get_product($_POST[$check]);
            //coloca os atributos com a formatação para o csv dentro de um array
            $products[$j]= $product_aux->export_product();
            $j++;
        } 
    }
    //gera o csv para download
    exportcsv($products);
?>