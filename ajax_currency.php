<?php
	require_once "currency.class.php";
	$currency = new Currency();	
	$novoConteudo = $_POST['novoConteudo'];
	$id = $_POST['id'];
	$simbolo = $_POST['simbolo'];
	$currency->update_table($id, $novoConteudo, $simbolo);

?>