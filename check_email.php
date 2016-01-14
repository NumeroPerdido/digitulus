<?php
    include_once "user.class.php";
	
	$user2 = new User();
	$sql=$user2->load_email($_POST["email"]);
	$key = "true";
	
	//Caso a busca retorne resultado, significa que o email já existe no banco.
	if($sql!=""){
        $key = "false";
    }
   
	echo $key;
    
?>