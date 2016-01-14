<?php
// PDO connect *********
include_once "db.class.php";
$keyword = $_POST['keyword'];
$tabela = $_POST['tabela'];
$campo = $_POST['campo'];
$form = $_POST['form'];
$list = $_POST['list'];
$keyword = addslashes($keyword);
$db = new DB();
$sql = "SELECT DISTINCT $campo FROM $tabela WHERE $campo LIKE '%$keyword%' ORDER BY $campo ASC LIMIT 0, 10";


foreach ($db->query($sql) as $rs)
{
	// coloca em negrito o valor digitado
	$filter = str_replace($_POST['keyword'], '<b>'.$_POST['keyword'].'</b>', $rs[$campo]);
	// converte caracteres incorretos para caracteres de escape
    $value = addslashes($rs[$campo]);
    //chamando a função que seta o valor no campo
    echo '<li onclick="set_item_product(\'' .$value. "','"  .$form.  "','" . $list . '\')">'.$filter.'</li>';
}



?>

