<?php
    //verifica se o user_id está setado
	if(isset($_GET["user_id"])){
        //O usuário só pederar editar as informações dele, ou editar as informações de qualquer usuário se ele for Administrador
        if($_SESSION["user"]->user_id==$_GET["user_id"] || $_SESSION["user"]->group_id==1){
            $user=new user();
            $sql=$user->get_user($_GET["user_id"]);
            //se a query retorna algo diferente de vazio, o usuário existe e o código continua sendo executado
            if($sql!=""){
?>


<aside class="right-side">                
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Editar Usuario
            <small>adicionar algo aqui mais tarde</small>
        </h1>
        <br/>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Editar Usuario</li>
        </ol>
    </section>
    <!-- Main content -->                            
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-primary">
				    <!-- COMEÇO DO FORM -->
                    <div class="box-header">
                        <h3 class="box-title">Editando Usuarios</h3>
                    </div><!-- /.box-header -->
                    <div class="box-body">
<!--                        Envia o form para edição no banco de dados caso o usuário tenha trocado as próprias informações, a sessão dele será trocada e ele terá que fazer o login novamente-->
                        <form role="form" id="edit_form" class="add_user" enctype="multipart/form-data" method="POST" action="user_information.php?user_id=<?php echo $user->user_id; ?>&page=edit">						
						<!-- text input --> 
                            <div class="form-group">
                                <label>Nome do Usuario</label>
                                <input type="text" class="form-control" value="<?php echo $user->username; ?>" id="username" name="username" placeholder="Nome do Usuario" required/>
							</div>
                            <div class="form-group">
                                <label class="control-label" for="email">E-mail</label>
                                <input type="text" class="form-control" value="<?php echo $user->email; ?>" id="email" name="email" placeholder="E-mail" readonly/>
                            </div>
							<div class="form-group" id="divpass">
                                <label class="control-label" for="senha" id='labelpass'>Senha </label><small> (minimo 6 caracteres)</small>
								<input type="password" class="form-control" pattern=".{6,}" id="password" name="password" onchange="verify_pass();"  />
                            </div>
                            <div class="form-group" id="divrepass">
                                <label class="control-label" for="senha" id="labelrepass">Repita a Senha </label><small> (minimo 6 caracteres)</small>
								<input type="password" class="form-control" pattern=".{6,}" id="repassword" name="repassword" onchange="verify_pass();" disabled  />
                            </div>
                            <div class="form-group">
                                <img src="<?php echo $user->get_user_profile_img();?>" style="max-width:10%;max-heigth:10%;" alt="User Image" />
                                <label class="control-label" for="email">Imagem de Perfil</label>
                                    <input type="file" name="profile" accept="image/jpeg, image/png, image/gif">
                            </div>
                            
                            <?php
                                //Mostra essa opção de edição apenas se o usuário for um Administrador
                                if ($_SESSION["user"]->group_id==1){ 
                            ?>
                                    <div class="form-group">
                                        <label class="control-label" for="group_id">Tipo de Usuário</label>
                                        <select class="form-control" id="group_id" name="group_id" required>
                                                        <option value="1" <?php if($user->group_id==1){ echo "selected"; } ?> >Administrador</option>
                                                        <option value="2" <?php if($user->group_id==2){ echo "selected"; } ?> >Gerente Website</option>
                                                        <option value="3" <?php if($user->group_id==3){ echo "selected"; } ?> >Financeiro</option>
                                                        <option value="4" <?php if($user->group_id==4){ echo "selected"; } ?> >Registrar</option>
                                                        <option value="5" <?php if($user->group_id==5){ echo "selected"; } ?> >Aéreo</option>
                                                        <option value="6" <?php if($user->group_id==6){ echo "selected"; } ?> >Gerente Vendas</option>
                                                        <option value="7" <?php if($user->group_id==7){ echo "selected"; } ?> >Vendedor</option>
                                                        <option value="8" <?php if($user->group_id==8){ echo "selected"; } ?> >Escola</option>
                                                        <option value="9" <?php if($user->group_id==9){ echo "selected"; } ?> >Convidado</option>
                                        </select>

                                    </div>
                            <?php 
                                } 
                            ?>
                            	
							<button class="btn btn-primary" type="submit">Enviar</button>
                        </form>
                    </div>
					<!--FINAL DO FORM-->
                </div>
            </div>
        </div>
    </section><!-- /.content -->
<?php
                }//fim do if que verifica o retorno da query
                else{
                    echo '<aside class="right-side">Esse Usuário não existe';
                }
            }//fim do if que verifica as permissões do usuário
            else{
                echo '<aside class="right-side">Você nao tem Permissão para editar esse usuário';
            }
    }//fim do if isset user_id
    else{
        echo '<aside class="right-side">ID do usuário não foi setado ou enviado';
    }    
?>
<script>
    function verify_pass(){
        if($("#password").val()!=""){
            //ativa o campo repassword
            $("#repassword").prop("disabled", false);
            //seta pra required os campos password e repassword
            $("#password").prop("required", true);
            $("#repassword").prop("required", true);
        }
        else{
             //desativa o campo repassword
            $("#repassword").prop("disabled", true);
            //remove required os campos password e repassword
            $("#password").prop("required", false);
            $("#repassword").prop("required", false);
        }
        if($("#password").val()!=$("#repassword").val()){
            $('#divpass').addClass("has-error");
            $('#divrepass').addClass("has-error");
            $('#labelpass').text($('#labelpass').text().replace(/ - Senhas Diferentes/g, ''));
            $('#labelrepass').text($('#labelrepass').text().replace(/ - Senhas Diferentes/g, ''));
            $('#labelpass').append(" - Senhas Diferentes");
            $('#labelrepass').append(" - Senhas Diferentes");
        }
        else{
            $('#divpass').removeClass("has-error");
            $('#divrepass').removeClass("has-error");
            $('#labelpass').text($('#labelpass').text().replace(/ - Senhas Diferentes/g, ''));
            $('#labelrepass').text($('#labelrepass').text().replace(/ - Senhas Diferentes/g, ''));
        }
    }
</script>