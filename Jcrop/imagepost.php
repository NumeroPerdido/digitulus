<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    for ($i=0;$i<$_POST["qtimg0"];$i++) {
        $targ_w = $_POST['w'.$i];
        $olabel = $_POST['original_label'.$i];
        $targ_h = $_POST['h'.$i];
        $jpeg_quality = 90;
        //pega o caminho da imagem temporaria a ser recortada
        $src = str_replace("Jcrop/","",$_POST["img_path".$i]);
        //pega as informações da imagem
        $imageinfo = getimagesize($src);
        //verifica qual o tipo de imagem
        switch($imageinfo['mime']){
            //se for pgn, cria a nova imagem a partir do png 
            case 'image/png':   
            $img_r = imagecreatefrompng($src);
            break;
            //se for jpeg, cria a nova imagem a partir do jpeg    
            case 'image/jpeg':  
            $img_r = imagecreatefromjpeg($src);
            break;
            //se for gif, cria a nova imagem a partir do gif
            case 'image/gif':
            $img_r = imagecreatefromgif($src);
            break;
        }
        $label=$_POST["label"];
        if (!file_exists("img/".$label)) {
            mkdir("img/".$label);
        }
        //pega o novo nome da imagem
        $img_name="img/".$label."/".$_POST["img_name".$i].".jpg";
        $dst_r = ImageCreateTrueColor($targ_w, $targ_h);
        //corta a imagem
        imagecopyresampled($dst_r,$img_r,0,0,$_POST['x'.$i],$_POST['y'.$i],
        $targ_w,$targ_h,$_POST['w'.$i],$_POST['h'.$i]);
        //salva a imagem
        imagejpeg($dst_r,$img_name,$jpeg_quality);
        //deleta a imagem temporária
        unlink($src);
    }
    //deleta a pasta label temporaria
    rmdir("temp/".$label);
    //http://localhost/digitulus/src/index.php?page=Renomear-Imagem&label=%20Atlantic%20Language%20Dublin%20Irlanda
	header("Location:../index.php?page=Renomear-Imagem&label=".$olabel);
}

?>