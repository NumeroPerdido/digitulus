<?php
    include_once "db.class.php";
    include_once "user.class.php";
    include_once "exchange.php";

    $db = new DB();
    $email=$_POST["email"];
    $pass=md5($_POST["password"]);
    //cria objeto mysql para fazer conexão com o banco de dados  
    $user =new User();
    //pega informação do usuário a partir do email e senha
    $sql=$user->loaduser($email,$pass);
    //se a query não retornar nada o usuário é redirecionado para a página de login com erro email ou senha inválidos
    if($sql==""){
        header('Location: login.php?error=login');
    }
    else{
        session_start();
        //carrega a sessão usuário com objeto usuário
        $_SESSION["user"]=$user;
        //pega os valores do do câmbio convertido para o real
        $_SESSION["currency"]=0;
        //conta a quantidade de produtos e salva numa sessão
        $temp=$db->query("SELECT COUNT(sku) FROM digitulus_product");
        $_SESSION["qtproducts"]=$temp[0]["COUNT(sku)"];
        $temp=$db->query("SELECT COUNT(user_id) FROM digitulus_user");
        $_SESSION["qtuser"]=$temp[0]["COUNT(user_id)"];
        header('Location: index.php');
    }
?>