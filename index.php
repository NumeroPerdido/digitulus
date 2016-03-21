<?php
    include_once "db.class.php";
    include_once "user.class.php";
    include_once "currency.class.php";
    include_once "product.class.php";
    include_once "budget.class.php";
	include_once "insurance.class.php";
	include_once "flight.class.php";
	include_once "duration.class.php";
	include_once "digitulus_settings.class.php";
	include_once "airline_list.class.php";
	include_once "airport_list.class.php";
	include_once "sidemenu.php";
    include_once "client.class.php";
	include_once "opportunity.class.php";
    include_once "activity.class.php";
    include_once "deal_course.class.php";

    session_start();
    //se o usuário não estiver logado volta pra página de login
    if(!isset($_SESSION["user"])){
        header('Location: login.php');
        exit;
    }
    //cria novo usuário
    $user=$_SESSION["user"];
    //pega os cambios do dia que foram criados 
    $currency=$_SESSION["currency"];
    
    //função que verifica se determinado page foi setado, caso tenha sido setado usa classe active no css do menu
    //recebe como parametro um array que será comparado com o $_GET["page"]
    function check_active($pages = array()){
        foreach($pages as $page){
            if(isset($_GET["page"]) AND $_GET["page"]==$page){ 
                return "active";
                break;
            }
        }
    }

?>
<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <!--Exibe o título da página usando o GET page, e substitui "-" por espaço, se for index exibe painel de controle -->
        <title><?php if(isset($_GET["page"])){ echo str_replace("-"," ",$_GET["page"]); }else{ echo "Painel de Controle";} ?> | Digitulus</title>
        <link rel="icon" type="image/png" sizes="36x36" href="img/favicon.png">
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <!-- bootstrap 3.0.2 -->
        <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <!-- font Awesome -->
        <link href="css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <!-- Ionicons -->
        <link href="css/ionicons.min.css" rel="stylesheet" type="text/css" />
        <!--colReorder busca individual no datatable -->
        <link href="css/datatables/dataTables.colReorder.css" rel="stylesheet" type="text/css" />
        <!-- ColVis esconde/mostra as colunas no datatabele -->
        <link href="css/datatables/buttons.dataTables.css" rel="stylesheet" type="text/css" />
        <!-- Morris chart -->
        <link href="css/morris/morris.css" rel="stylesheet" type="text/css" />
        <!-- jvectormap -->
        <link href="css/jvectormap/jquery-jvectormap-1.2.2.css" rel="stylesheet" type="text/css" />
        <!-- fullCalendar -->
        <link href="css/fullcalendar/fullcalendar.css" rel="stylesheet" type="text/css" />
        <!-- Daterange picker -->
        <link href="css/daterangepicker/daterangepicker-bs3.css" rel="stylesheet" type="text/css" />
        <!-- bootstrap wysihtml5 - text editor -->
        <link href="css/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css" rel="stylesheet" type="text/css" />
        <!-- Theme style -->
        <link href="css/Digitulus.css" rel="stylesheet" type="text/css" />
		<!-- Thema do plugin Jquery UI -->
		<link href="css/jquery-ui/jquery-ui.css" rel="stylesheet" type="text/css" />
        <link href="css/jquery-ui/jquery-ui.structure.css" rel="stylesheet" type="text/css" />
        <link href="css/jquery-ui/themes/Excite-Bike/jquery-ui.theme.css" rel="stylesheet" type="text/css" />
        
        <!-- iCheck for checkboxes and radio inputs -->
        <link href="css/iCheck/all.css" rel="stylesheet" type="text/css" />
		<!--jQuery Calculator -->
		<link href="css/jquery.calculator.css" rel="stylesheet" type="text/css" />
        <!--Jcrop -->
		<link href="css/Jcrop/demos.css" rel="stylesheet" type="text/css" />
		<link href="css/Jcrop/jquery.Jcrop.css" rel="stylesheet" type="text/css" />  
        
    </head>
    <body class="skin-black">
        <!-- header logo: style can be found in header.less -->
        <header class="header">
            
            <a href="index.php" class="logo">
                <img class="icon" id="logo" src="img/logo-menu.png" usemap="#WeasterosEgg" />        
                <map name="WeasterosEgg">
                    <area title="wEASTERosegg" shape="rect" coords="1,15,10,22" style="outline:none;" target="_self" onclick="easteregg()" />
                </map>
                Digitulus
            </a>
            <!-- Header Navbar: style can be found in header.less -->
            <nav class="navbar navbar-static-top" role="navigation">
                <!-- Sidebar toggle button-->
                <a href="#" class="navbar-btn sidebar-toggle" data-toggle="offcanvas" role="button">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </a>
                <div class="navbar-right">
                    <ul class="nav navbar-nav">
                        <!-- User Account: style can be found in dropdown.less -->
                        <li class="dropdown user user-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="glyphicon glyphicon-user"></i>
                                <span><?php echo $user->username; ?> <i class="caret"></i></span>
                            </a>
                            <ul class="dropdown-menu">
                                <!-- User image -->
                                <li class="user-header bg-light-blue">
                                    <img src="<?php echo $user->get_user_profile_img();?>" class="img-circle" alt="User Image" />
                                    <p>
                                        <?php echo $user->username." - ".$user->nameGroupId(); ?>
<!--                                        <small>Member since Nov. 1500</small>-->
                                    </p>
                                </li>
                                <!-- Menu Body -->
<!--
                                <li class="user-body">
                                    <div class="col-xs-4 text-center">
                                        <a href="#">Followers</a>
                                    </div>
                                    <div class="col-xs-4 text-center">
                                        <a href="#">Sales</a>
                                    </div>
                                    <div class="col-xs-4 text-center">
                                        <a href="#">Friends</a>
                                    </div>
                                </li>
-->
                                <!-- Menu Footer-->
                                <li class="user-footer">
<!--
                                    <div class="pull-left">
                                        <a href="#" class="btn btn-default btn-flat">Profile</a>
                                    </div>
-->
                                    <div class="pull-right">
                                        <a href="logout.php" class="btn btn-default btn-flat">Logout</a>
                                    </div>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <div class="wrapper row-offcanvas row-offcanvas-left">
            <!-- Left side column. contains the logo and sidebar -->
            <aside class="left-side sidebar-offcanvas">
                <!-- sidebar: style can be found in sidebar.less -->
                <section class="sidebar">
                    <!-- Sidebar user panel -->
                    <div class="user-panel">
                        <div class="pull-left image">
                            <img src="<?php echo $user->get_user_profile_img();?>" class="img-circle" alt="User Image" />
                        </div>
                        <div class="pull-left info">
                            <p><?php  echo $user->username; ?></p>
                            <small><a href="index.php?page=Editar-Usuario&user_id=<?php echo $user->user_id;?>">Editar</a></small>
                        </div>
                    </div>
                    <?php
                        //carrega o menu dependendo o tipo de usuário
                        //1-Administrador 2-Funcionario 3-Vendedor 4-Escola 5-Convidado
                        switch($user->group_id){
                            case 1:
                                menu_administrador();
                                break;
                             case 2:
                                menu_gerente_website();
                                break;
                             case 3:
                                menu_financeiro();
                                break;
                             case 4:
                                menu_registrar();
                                break;
                             case 5:
                                menu_aereo();
                                break;
                             case 6:
                                menu_gerente_vendas();
                                break;
                             case 7:
                                menu_vendedor();
                                break;
                            case 8:
                                menu_escola();
                                break;
                            case 9:
                                menu_convidado();
                                break;
                            default:
                                menu_convidado();
                        }
                    
                    ?>
                </section>
                <!-- /.sidebar -->
            </aside>
             <!-- jQuery 2.0.2 -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
        <!-- jQuery UI 1.10.3 -->
        <script src="js/plugins/jquery-ui/jquery-ui.js" type="text/javascript"></script>
        <!--Date picker localization pt-BR-->
        <script src="js/plugins/jquery-ui/datepicker-pt-BR.js" type="text/javascript"></script>
        <!--Jcrop-->
        <script src="js/plugins/Jcrop/jquery.Jcrop.js" type="text/javascript"></script>    
        <script src="js/plugins/Jcrop/jquery.color.js" type="text/javascript"></script>       
        <!--Input Mask 3.x-->
        <script src="js/plugins/input-mask/novo/inputmask.js" type="text/javascript"></script>
        <script src="js/plugins/input-mask/novo/jquery.inputmask.js" type="text/javascript"></script>
        <script src="js/plugins/input-mask/novo/dependencyLib.js" type="text/javascript"></script>
        <script src="js/plugins/input-mask/novo/inputmask.date.extensions.js" type="text/javascript"></script>
        <script src="js/plugins/input-mask/novo/inputmask.extensions.js" type="text/javascript"></script>
        <script src="js/plugins/input-mask/novo/inputmask.numeric.extensions.js" type="text/javascript"></script>
        <script src="js/plugins/input-mask/novo/inputmask.phone.extensions.js" type="text/javascript"></script>
        <script src="js/plugins/input-mask/novo/inputmask.regex.extensions.js" type="text/javascript"></script>
        <!-- daterangepicker -->
        <script src="js/plugins/daterangepicker/daterangepicker.js" type="text/javascript"></script>    
        <!-- Autocomplete Activation -->
        <script src="js/active_autocomplete.js" type="text/javascript"></script>
        <script src="js/validate_field.js" type="text/javascript"></script>
            <!-- INCLUSÃO DO CONTEÚDO-->
            <?php
                if(isset($_GET["page"])){
                    switch ($_GET["page"]){
        
                        case "Adicionar-Produto":
                            include "add_product.php";
                            break;
                        case "Lista-de-Produtos":
                            include "list_product.php";
                            break;
                        case "Importar-Produtos":
                            include "import.php";
                            break;
                        case "Exportar-Produtos":
                            include "export.php";
                            break;
						case "Adicionar-Usuario":
                            include "add_user.php";							
                            break;
						case "Editar-Usuario":
                            include "edit_user.php";
                            break;
						case "Lista-de-Usuarios":
                            include "list_user.php";
                            break;
                        case "Editar-Produto":
                            include "edit_product.php";
                            break;
						case "Editar-Seguro":
                            include "edit_insurance.php";
                            break;
						case "Lista-de-Seguros":
                            include "list_insurance.php";
                            break;
						case "Adicionar-Seguro":
                            include "add_insurance.php";
                            break;
						case "Converter-Codigo":
							include "convert_flight_code.php";
							break;
						case "Adicionar-Voo":
                            include "add_flight.php";
                            break;
						case "Lista-de-Voos":
                            include "list_flight.php";
                            break;
						case "Editar-Voo":
                            include "edit_flight.php";
                            break;
						case "Adicionar-Companhia-Aerea":
                            include "add_airline.php";
                            break;
						case "Lista-de-Companhias-Aereas":
                            include "list_airlines.php";
                            break;
						case "Editar-Companhia-Aerea":
                            include "edit_airline.php";
                            break;
						case "Adicionar-Aeroporto":
                            include "add_airport.php";
                            break;
						case "Lista-de-Aeroportos":
                            include "list_airports.php";
                            break;
						case "Editar-Aeroporto":
                            include "edit_airport.php";
                            break;
						case "Tabela-Cambio":
                            include "generate_table_currency.php";
                            break;
                        case "Adicionar-Cambio":
                            include "add_currency.php";
                            break;
						case "Lista-de-Cambios":
                            include "list_currency.php";
                            break;
                        case "Lista-de-Cambios-Administrador":
                            include "list_currency_administrator.php";
                            break;                            
						case "Editar-Cambio":
                            include "edit_currency.php";
                            break;
                        case "Adicionar-Imagem":
                            include "Jcrop/add_img.php";
                            break;
                        case "Renomear-Imagem":
                            include "Jcrop/rename_img.php";
                            break;
                        case "Thumbnail-Imagem":
                            include "Jcrop/thumbnail_img.php";
                            break;
                        case "Remover-Imagem":
                            include "Jcrop/delete_img.php";
                            break;
						case "Lista-de-Imagens":
                            include "list_image.php";
                            break;
                        case "Lista-de-Localizacoes":
                            include "list_location.php";
                            break;
                         case "Editar-Localizacao":
                            include "edit_location.php";
                            break;    
						case "Lista-de-Duracoes":
                            include "list_duration.php";
                            break;
						case "Editar-Duracao":
                            include "edit_duration.php";
                            break;
						case "Editar-Imagem":
                            include "edit_image.php";
                            break;
						case "Editar-Configuracoes":
                            include "edit_digitulus_settings.php";
                            break;
                        case "Add-Yield-Management-Promotion";
                            include "add_yield_promotion.php";
                            break;
                         case "Adicionar-Cliente";
                            include "add_client.php";
                            break;
                        case "Editar-Cliente";
                            include "edit_client.php";
                            break;
                        case "Lista-de-Clientes";
                            include "list_client.php";
                            break;
                        case "Lista-de-Atendimentos":
                            include "list_opportunity.php";
                            break;
                        case "Lista-de-Atendimentos-Completos":
                            include "list_complete_opportunity.php";
                            break;
                        case "Editar-Atendimento":
                            include "edit_opportunity.php";
                            break;
                        case "Concluir-Venda":
                            include "edit_COA.php";
                            break;
                        case "Adicionar-Cliente-com-Atendimento":
                            include "add_COA.php";
                            break;
                        case "Adicionar-Atendimento":
                            include "add_opportunity.php";
                            break;
                        case "Adicionar-Orcamento":
                            include "add_deal_course.php";
                            break;
                        case "Editar-Orçamento":
                            include "edit_deal_course.php";
                            break;
                        case "Adicionar-Familia":
                            include "add_family_relation.php";
                            break;
                        case "Lista-de-Familias":
                            include "list_family_relation.php";
                            break;
                        case "Editar-Familia":
                            include "edit_family_relation.php";
                            break;    
                        case "teste":
                            include "teste.php";
                            break;
                        case "Lista-de-Atendimentos-Vendidos":
                            include "list_sold_opportunity.php";
                            break;
                        case "Gerar-Email-Matricula":
                            include "generate_registration_email.php";
                            break;      
                        default:
                            include "404.php";
                            break;
                    }
                }
                else{
                    if($user->group_id!=8){
                        include "dashboard.php";
                    }
                    else{
                        include "add_yield_promotion.php";
                    }
                }
    
            ?>
            <!--Footer-->
            <div class="footer">
                <small style="margin-left:48%;">
                    Digitulus v2.3 
                </small>
                <br/>
                <small> Copyright ©<?php echo date("Y"); ?> <a href="http://www.goartha.com">GoArtha.com</a> All Rights Reserved</small>
            </div><!-- /Footer-->
        </div><!-- ./wrapper -->
        
        <!-- add new calendar event modal -->

       
        <!-- Bootstrap -->
        <script src="js/bootstrap.min.js" type="text/javascript"></script>
        
        <!-- Sparkline -->
        <script src="js/plugins/sparkline/jquery.sparkline.min.js" type="text/javascript"></script>
        <!-- jvectormap -->
        <script src="js/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js" type="text/javascript"></script>
        <script src="js/plugins/jvectormap/jquery-jvectormap-world-mill-en.js" type="text/javascript"></script>
        <!-- fullCalendar -->
        <script src="js/plugins/fullcalendar/fullcalendar.min.js" type="text/javascript"></script>
        <!-- jQuery Knob Chart -->
        <script src="js/plugins/jqueryKnob/jquery.knob.js" type="text/javascript"></script>
        <!-- Bootstrap WYSIHTML5 -->
        <script src="js/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js" type="text/javascript"></script>
        <!-- iCheck -->
        <script src="js/plugins/iCheck/icheck.min.js" type="text/javascript"></script>
        <!-- DATA TABLES SCRIPT -->
        <script src="js/plugins/datatables/jquery.dataTables.js" type="text/javascript"></script>
        <script src="js/plugins/datatables/dataTables.bootstrap.js" type="text/javascript"></script>
        <!--colReorder busca individual no datatable -->
        <script src="js/plugins/datatables/dataTables.colReorder.js" type="text/javascript"></script>
        <!--ColVis mostra/esconde colunas no datatable -->
        <script src="js/plugins/datatables/dataTables.buttons.js" type="text/javascript"></script>
        <script src="js/plugins/datatables/buttons.colVis.js" type="text/javascript"></script>
        <!-- Gerar Tabela de status Colorida -->
        <script src="js/color_status_table.js" type="text/javascript"></script>
        
		<script src="js/script_table.js"></script>	
		<!--jQuery Calculator -->
		<script type="text/javascript" src="js/jquery.plugin.js"></script> 
		<script type="text/javascript" src="js/jquery.calculator.js"></script>			
        <!-- AdminLTE App -->
        <script src="js/AdminLTE/app.js" type="text/javascript"></script>		
		<!-- Google Code -->	
		<script src="https://google-code-prettify.googlecode.com/svn/loader/run_prettify.js"></script>
        
    </body>
</html>