<aside class="right-side">
    <?php
        //se não foi feita uma requisição de post carrega apenas o formulário
        if ($_SERVER['REQUEST_METHOD'] != 'POST'){
    ?>
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>
                    Adicionar Usuarios
                    <small>adicionar algo aqui mais tarde</small>
                </h1>
                <br/>
                <ol class="breadcrumb">
                    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                    <li class="active">Adicionar Usuários</li>
                </ol>
            </section>
            <!-- Main content -->                            
            <section class="content">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="box box-primary">
                            <!-- COMEÇO DO FORM -->
                            <div class="box-header">
                                <h3 class="box-title">Novo Usuário</h3>
                            </div><!-- /.box-header -->
                            <div class="box-body">
                                <form id="user_form" method="POST" role="form" class="half-form" action="index.php?page=Adicionar-Usuario">				
                                    <!-- text input --> 
<!--
                                    <div class="form-group control-group">
                                        <label class="control-label" for="username">Nome do Usuário</label>
                                        <div class="controls">
                                            <input type="text" class="form-control" id="username" name="username" placeholder="Usuário" />

                                        </div>
                                    </div>
-->
                                    <div class="form-group " id="emaildiv">
                                        <label class="control-label" for="email" id="emaillabel">E-mail </label>
                                             <input type="email" class="form-control" id="email" name="email" onblur="ajax_db_return({id: this.id, search_word: this.value, target_field: 'username', search_field: 'email', table: 'digitulus_user'});" placeholder="E-mail" required/>
                                    </div>
<!--
                                    <div class="form-group control-group">
                                        <label class="control-label" for="senha">Senha</label>
                                        <div class="controls">
                                             <input type="password" class="form-control" id="password" name="password"/>
                                        </div>
                                    </div>
-->
                                    <div class="form-group control-group">
                                        <label class="control-label" for="group_id">Tipo de Usuário</label>
                                        <div class="controls">
                                            <select class="form-control" id="group_id" name="group_id" required>
                                                <option value="">Selecione um tipo de usuário</option>
                                                <option value="1">Administrador</option>
                                                <option value="2">Gerente Website</option>
                                                <option value="3">Financeiro</option>
                                                <option value="4">Registrar</option>
                                                <option value="5">Aéreo</option>
                                                <option value="6">Gerente Vendas</option>
                                                <option value="7">Vendedor</option>
                                                <option value="8">Escola</option>
                                                <option value="9">Convidado</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group control-group">
                                        <div class="controls">
                                            <button class="btn btn-primary" type="submit" id="salvar">Salvar</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <!--FINAL DO FORM-->
                        </div>
                    </div>
                </div>
        <?php
            }
            //se foi enviada uma requisiçao de post
            else{
                //cria um objeto usuário com as informações preechidas
                $user= new User();
//                $user->username = $_POST['username'];
//                $user->password = md5($_POST['password']);
                $user->email = $_POST['email'];
                $user->validated = 0;
                //gera uma key
                $user->user_key = uniqid();
                $user->group_id = $_POST['group_id'];
                //salva o usuáiro
                $user->insert_user();
                //manda o email
                $to=$user->email;
                $subject="Confirm your registration at GoArtha Digitulus";
                $message = "<html>
                                <head>
                                </head>
                                <body>
                                <b>Click here to confirm and validate your registration at GoArtha Digitulus:</b> \n <a href='http://www.goartha.com/digitulus/registration.php?user_key=$user->user_key'>http://www.goartha.com/digitulus/registration.php?user_key=$user->user_key</a>
                                </body>
                            </html>";

                // Always set content-type when sending HTML email
                $headers = "MIME-Version: 1.0" . "\r\n";
                $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
                $headers .= 'From: info@goartha.com' . "\r\n";
                $headers .='Reply-To: info@goartha.com' . "\r\n";
                mail($to, $subject, $message, $headers);
                
                echo"
                    <div class='alert alert-success alert-dismissable' style='margin-top:2%'>
                        <i class='fa fa-check'></i>
                        <b>Sucesso!</b> Um email de confirmação foi enviado para o usuário.
                    </div>";
            }
        ?>
    </section><!-- /.content -->
    <script>
        function ajax_db_return(){
            //search_word= o que foi digitado no input
            //target_field= o campo que será retornado na busca no bd
            //search_field= o campo no bd em que o search_word será pesquisado
            //table= tabela que sera pesquisada
            //validate= bool para validar o campo apenas para aceitar os valores da lista
            //extra_field=campo da clausula extra
            //extra_clause=valor que será pesquisado na clausula extra
            var id=arguments[0]["id"],
            search_word=arguments[0]["search_word"],
            target_field=arguments[0]["target_field"],
            search_field=arguments[0]["search_field"],
            table=arguments[0]["table"],
            validate=arguments[0]["validate"],
            extra_clause=arguments[0]["extra_clause"],
            extra_field=arguments[0]["extra_field"];
            $.ajax({
                url:"ajax_db_return.php",
                dataType: "json",
                data: {
                    search_word: search_word,
                    target_field: target_field,
                    search_field: search_field,  
                    table: table,
                    extra_clause: extra_clause,
                    extra_field: extra_field
                },
                success: function(data){
                    if(data!=""){
                        $('#emaildiv').addClass("has-error");
                        $('#emaillabel').text($('#emaillabel').text().replace(/já cadastrado/g, ''));
                        $('#emaillabel').append("já cadastrado");
                        $("#salvar").hide();
                    }
                    else{
                        $('#emaildiv').removeClass("has-error");
                        $('#emaillabel').text($('#emaillabel').text().replace(/já cadastrado/g, ''));
                        $("#salvar").show();
                    }
                }
            });
        }
    </script>