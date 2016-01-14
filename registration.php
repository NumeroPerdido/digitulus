<!DOCTYPE html>
<?php
    if(isset($_GET["user_key"])){
        include_once "user.class.php";
        $user = new User();
        $user->load_user_key($_GET["user_key"]);
        //se o usuário já foi validado redireciona para o login
        if($user->validated==1){
            header("Location: http://www.goartha.com/digitulus/login.php");
        }
            
?>
<html class="bg-black">
    <head>
        <meta charset="UTF-8">
        <title>Digitulus | Registration</title>
        <link rel="icon" type="image/png" sizes="36x36" href="img/favicon.png">
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <!-- bootstrap 3.0.2 -->
        <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <!-- font Awesome -->
        <link href="css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <!-- Theme style -->
        <link href="css/Digitulus.css" rel="stylesheet" type="text/css" />

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->
    </head>
    <body class="login">
        <?php
                //se completou as cadastro
                if($_SERVER['REQUEST_METHOD'] == 'POST'){
                    include_once "user.class.php";
                    $user = new User();
                    $user->load_email($_POST['email']);
                    $user->username = $_POST['username'];
                    $user->password = md5($_POST['password']);
                    $user->validated = 1;
                    $user->update_user();
                    echo"<div class='alert alert-success alert-dismissable' style='margin-top:2%'>
                                                        <i class='fa fa-check'></i>
                                                        <b>Usuário Validado com sucesso!</b> <a href=''http://www.goartha.com/digitulus/login.php'>Clique Aqui</a> para efetuar o login
                                                    </div>";
                    echo"<div class='alert alert-success alert-dismissable' style='margin-top:2%'>
                                                        <i class='fa fa-check'></i>
                                                        <b>Successfully validated user!</b> <a href='http://www.goartha.com/digitulus/login.php'>Click Here</a> to login
                                                    </div>";
                }
                else{
        ?>
        <div class="form-box" id="login-box">
            <div class="header"><span class="login-title">
                <img class="icon" src="img/logo60x60.png">Digitulus</span>
                </br>
                Please complete your registration:
            </div>
            <form action="registration.php?user_key=<?php echo $user->user_key;?>" method="post">
                <div class="body bg-gray">
                    <div class="form-group">
                        <label>Email</label>
                        <input readonly type="text" name="email" class="form-control" value="<?php echo $user->email; ?>" placeholder="email"/>
                    </div>
                    <div class="form-group">
                        <label>Nome</label>
                        <input type="text" name="username" class="form-control" placeholder="username"/>
                    </div>
                    <div class="form-group">
                        <label>Senha</label>
                        <input type="password" name="password" class="form-control" placeholder="senha"/>
                    </div>
                    <?php
                        //pega o erro via get e exibe a mensagem de erro correspondente
                        if(isset($_GET["error"])){
                            switch ($_GET["error"]){
                                case "login":
                                    echo "
                                        <div class='form-group'>
                                            <p class='text-red'><i class='fa fa-ban'></i> Email ou senha inválidos</p>
                                        </div>
                                    ";
                                    break;
                            }
                        }
                    ?>
                </div>
                <div class="footer" style="background: #eaeaec;">                                                               
                    <button type="submit" class="btn bg-orange btn-block">Entrar</button>  
                    
<!--                    <p><a href="#">Esqueci a Senha</a></p>-->
                    
                    <!--<a href="register.html" class="text-center">Register a new membership</a>-->
                </div>
            </form>

            <!--<div class="margin text-center">
                <span>Sign in using social networks</span>
                <br/>
                <button class="btn bg-light-blue btn-circle"><i class="fa fa-facebook"></i></button>
                <button class="btn bg-aqua btn-circle"><i class="fa fa-twitter"></i></button>
                <button class="btn bg-red btn-circle"><i class="fa fa-google-plus"></i></button>

            </div>-->
        </div>


        <!-- jQuery 2.0.2 -->
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
        <!-- Bootstrap -->
        <script src="js/bootstrap.min.js" type="text/javascript"></script>        

    </body>
</html>
<?php
                }
    }
?>