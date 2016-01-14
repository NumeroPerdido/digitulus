<!--esse arquivo é responsável por salvar as informações enviadas via formulário, tanto no add produto como no editar produto-->
<?php
    
        
        include_once "location.class.php";
            $location= new Location();
            $location->latitude= $_POST["lat"];
            $location->longitude=$_POST["lng"];
?>
        
<?php
            //caso os dados tenham vindo da página Editar Produto, os dados do produto são atualizados a partir do sku
            if($_GET["page"]=="edit"){
                $location->update_location($product->sku=$_POST["sku"]);
                
                header('Location:index.php?page=Lista-de-Localizacoes&success=edit');
            }
        
    
    else{
        header('Location:index.php?page=erro');
    }
?>