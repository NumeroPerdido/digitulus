<?php
	include_once "user.class.php";
	$user= new User();
	
	

    if (isset($_GET["page"])){
        
        $operation = $_GET["page"];

        if ($operation == "add"){
            $user->user_id = $_GET["user_id"];
            $user->username = $_POST['username'];
            $user->password = md5($_POST['password']);
            $user->email = $_POST['email'];
            $user->validated = 0;
            $user->group_id = $_POST['group_id'];
            $user->insert_user();
            header('Location:index.php?page=Lista-de-Usuarios&success=add');
        }
        elseif ($operation =="edit"){
            //carrega as informações do usuário com base no ID
            $user->get_user($_GET["user_id"]);
            $user->username = $_POST['username'];
            //se a imagem foi enviada faz o tratamento dela
            if($_FILES['profile']['tmp_name']){
                //pega as dimensões da imagem enviada
                list($width_orig, $height_orig) = getimagesize($_FILES['profile']['tmp_name']);
                //cria a imagem que será salva
                $image_p = imagecreatetruecolor(250, 250);
                //pega as informações da imagem
                $imageinfo = getimagesize($_FILES['profile']['tmp_name']);
                //verifica qual o tipo de imagem
                switch($imageinfo['mime']){
                    //se for pgn, cria a nova imagem a partir do png 
                    case 'image/png':   
                    $image = imagecreatefrompng($_FILES['profile']['tmp_name']);
                    break;
                    //se for jpeg, cria a nova imagem a partir do jpeg    
                    case 'image/jpeg':  
                    $image = imagecreatefromjpeg($_FILES['profile']['tmp_name']);
                    break;
                    //se for gif, cria a nova imagem a partir do gif
                    case 'image/gif':
                    $image = imagecreatefromgif($_FILES['profile']['tmp_name']);
                    break;
                }
                //redimensiona a imagem para 250x250
                imagecopyresampled($image_p, $image, 0, 0, 0, 0, 250, 250, $width_orig, $height_orig);
                //salva a imagem
                imagejpeg($image_p, 'img/profile/'.$_GET["user_id"].'.jpg', 100);
                //libera a memória
                imagedestroy($image_p);
                imagedestroy($image);
            }
            //se o grupo foi alterado, atualiza o novo grupo do usuário
            if(isset($_POST['group_id'])){
               $user->group_id = $_POST['group_id']; 
            }
            //se a senha foi alterada, atualiza a nova senha
            if($_POST['password']!=""){
                $user->password = md5($_POST['password']);
            }
            $user->update_user();
            //Se o usuário alterada é o mesmo que está logado, então é feito o logout
            session_start();
            if($_GET["user_id"]==$_SESSION["user"]->user_id){
                header('Location:logout.php');
            }
            //caso contrário, edita normalmente e retorna para a lista de usuários
            else{
                header('Location:index.php?page=Lista-de-Usuarios&success=edit');
            }
        }
        elseif ($operation =="delete"){

               $user->user_id = $_GET["user_id"];
               $user->delete_user($user->user_id);
               header('Location:index.php?page=Lista-de-Usuarios&success=delete'); 

        } 

        else{
            echo "<script language=\"JavaScript\">;
                alert(\"Operação inválida\");
                document.location.href = 'index.php?page=Lista-de-Usuarios';
                </script>";
        }
    }

    
	