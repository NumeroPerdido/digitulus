<?php
    include_once "csv_functions.php";

	
    //caminho onde guardo todos os csvs
    $uploaddir = 'csv/';
    $filename = basename($_FILES['file']['name']);
    $uploadfile = $uploaddir . basename($_FILES['file']['name']);
    
    //verifica se o arquivo é um csv 
    if(strpos($filename,".csv")==FALSE){
        header('Location: index.php?page=Importar-Produtos&msg=file');
    }
	
    //verifica se o arquivo foi enviado corretamente
    if (move_uploaded_file($_FILES['file']['tmp_name'], $uploadfile)) {
        echo "enviado com sucesso <br/>";
    } else {
        echo "erro no upload";
    }

	
    //abre o arquivo para leitura
    $file = fopen($uploadfile, 'r');
	while (!feof($file) ) {
		$csv[] =fgetcsv ($file,100000, ";");
	}
	fclose($file);

    //quantidade de pordutos de acordo com o número de linhas (tirando a primeira linha que são só os nomes dos campos)
    $qtproducts=count($csv)-2;
    //função dentreo do csv_functions.php que creia um objeto produto para cada linha do csv para depois inser no banco de dados
    //passa como parametro a arquivo csv carregado
    
    importcsv($csv);
		
    //deleta o csv depois de ler
    unlink($uploadfile);
    //retorna pra página de import depois de ler
    header('Location: index.php?page=Importar-Produtos&msg=success&qtp='.$qtproducts);
    
?>