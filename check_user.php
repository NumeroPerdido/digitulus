<?php
    include_once "user.class.php";
	
	$user2 = new User();
	$sql=$user2->load_username($_POST["username"]);
	$key = "true";
	
	//Caso a busca retorne resultado, significa que o username já existe no banco.
	if($sql!=""){
        $key = "false";
    }
	echo $key;
    
?>