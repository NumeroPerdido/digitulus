<?php
include_once "currency.class.php";
    //cria objeto DB
    $db= new DB();
    //recebe a coluna currency_code do bd com todos os currency_codes
    $currency_codes = $db->query("SELECT currency_code FROM digitulus_currency LIMIT 25");
    //array pra armazenar todos os todos os cambios dentro do bd
    $currencys=[];
    for($i=0;$i<sizeof($currency_codes);$i++){
        //cria um objeto currency pra cada posição do array
        $currencys[$i]= new Currency();
        //carrega objeto currency com todos seus atributos a partir do currency_code
        $currencys[$i]->get_currency($currency_codes[$i]["currency_code"]);
    }        
?>  
<!-- Right side column. Contains the navbar and content of the page -->
            <aside class="right-side">                
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        Lista de valores de câmbios
                        <small></small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li class="active"><?php echo str_replace("-"," ",$_GET["page"]); ?></li>
                    </ol>
                </section>
                   <?php
                    if(isset($_GET["success"])){
                        if($_GET["success"]=="add"){
                            echo "
                                    <div class='alert alert-success alert-dismissable'>
                                        <i class='fa fa-check'></i>
                                        <b>Sucesso!</b> Adicionado com Sucesso.
                                    </div>";
                        }
                        if($_GET["success"]=="edit"){
                            echo "
                                    <div class='alert alert-success alert-dismissable'>
                                        <i class='fa fa-check'></i>
                                        <b>Sucesso!</b> Atualizado com Sucesso.
                                    </div>";
                        }
                         if($_GET["success"]=="delete"){
                            echo "
                                    <div class='alert alert-success alert-dismissable'>
                                        <i class='fa fa-check'></i>
                                        <b>Sucesso!</b> Deletado com Sucesso.
                                    </div>";
                        }
                    }
                ?>
                <!-- Main content -->
                <section class="content">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="box">
                                <div class="box-header">
                                    <h3 class="box-title">Câmbios</h3>                                    
                                </div><!-- /.box-header -->
                                <div class="box-body table-responsive">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
												<th>Símbolo</th>
												<th>Moeda</th>
                                                <th>Código</th>
												<th>Fator de correção</th>												
                                                <th>Taxa de câmbio</th>
                                                <th>Taxa administrativa</th>
												<th>Última Atualização</th>
                                                <th>Editar</th>   
												<th>Remover</th>  												
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                for($i=0;$i<sizeof($currencys);$i++){
													echo "
                                                        <tr>													
                                                            <td id='exhibition_symbol-".$i."'>".$currencys[$i]->exhibition_symbol."</td>
                                                            <td id='currency_name-".$i."'>".$currencys[$i]->currency_name."</td>
                                                            <td id='currency_code-".$i."'>".$currencys[$i]->currency_code."</td>
															<td class='editable' id='currency_factor-".$i."'>".$currencys[$i]->currency_factor."</td>
                                                            <td class='editable' id='exchange_value-".$i."'>".$currencys[$i]->exchange_value."</td>
                                                            <td class='editable' id='banking_fee_value-".$i."'>".$currencys[$i]->banking_fee_value."</td>
															<td id='last_updated-".$i."'>".$currencys[$i]->last_updated."</td>
                                                            <td id='edit-".$i."'><a href='index.php?page=Editar-Cambio&currency_code=".$currencys[$i]->currency_code."'>Editar</a></td>
															<td id='delete-".$i."'><a href='currency_information.php?currency_code=".$currencys[$i]->currency_code."&page=delete' onclick ='return confirm(\"Deseja excluir o Vôo?\");'>Remover</a></td>
                                                        </tr>
                                                    ";
                                                }
                                            ?>
                                        </tbody>
                                        <tfoot>
                                            <tr>
												<th>Símbolo</th>
												<th>Moeda</th>
                                                <th>Código</th>
												<th>Fator de correção</th>	
                                                <th>Taxa de câmbio</th>
                                                <th>Taxa administrativa</th>
												<th>Última Atualização</th>
                                                <th>Editar</th> 
												<th>Remover</th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div><!-- /.box-body -->
                            </div><!-- /.box -->
                        </div>
                    </div>
                </section><!-- /.content -->
            </aside><!-- /.right-side -->
        <!-- jQuery 2.0.2 -->
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
        <!-- page script -->
		<!--<script>
			document.getElementById('exhibition_symbol.1').addEventListener('click', function(){
				  alert(this.value);
				});		
		</script> -->
        <script type="text/javascript">
            $(function() {
                $("#example1").dataTable();
                $('#example2').dataTable({
                    "bPaginate": true,
                    "bLengthChange": false,
                    "bFilter": false,
                    "bSort": false,
                    "bInfo": false,
                    "bAutoWidth": false
                });
            });
			
        </script>
		
