<?php
	include_once "currency.class.php";
	$brazil_tz = new DateTimeZone("America/Sao_Paulo");
	$brazil_dt = new DateTime("now", $brazil_tz);
	$currency= new Currency();
	
      if (isset($_GET["page"]))
        {
        
            $operation = $_GET["page"];
           
            if ($operation == "add")
            {
                $currency->exhibition_symbol = $_POST['exhibition_symbol'];
		        $currency->currency_code = $_POST['currency_code'];		
		        $currency->currency_name = $_POST['currency_name'];
		        $currency->currency_factor = $_POST['currency_factor'];		
		        $currency->exchange_value = floatval($_POST['exchange_value']);
		        $currency->banking_fee_value = floatval($_POST['banking_fee_value']);
                $currency->last_updated = $brazil_dt->format('Y-m-d H:i:s');
                $currency->insert_currency();
                header('Location:index.php?page=Lista-de-Cambios-Administrador&success=add');
            }
            elseif ($operation =="edit")
            {
               $currency->exhibition_symbol = $_POST['exhibition_symbol'];
		       $currency->currency_code = $_POST['currency_code'];		
               $currency->currency_name = $_POST['currency_name'];
		       $currency->currency_factor = $_POST['currency_factor'];		
		       $currency->exchange_value = floatval($_POST['exchange_value']);
		       $currency->banking_fee_value = floatval($_POST['banking_fee_value']);
		       $currency->last_updated = $brazil_dt->format('Y-m-d H:i:s');
               $currency->currency_code = $_GET['currency_code'];
		       $currency->update_currency();
                header('Location:index.php?page=Lista-de-Cambios-Administrador&success=edit');
            }
            elseif ($operation =="delete") 
            {
                $currency->currency_code = $_GET['currency_code'];
		        $currency->delete_currency($currency->currency_code);
                header('Location:index.php?page=Lista-de-Cambios-Administrador&success=delete'); 

            } 

            else
            {
                echo "<script language=\"JavaScript\">;
					alert(\"Operação inválida\");
					document.location.href = 'index.php?page=Lista-de-Cambios-Administrador';
					</script>";
            }
    }






	




?>
