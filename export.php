<?php
    //cria objeto DB
    $db= new DB();
    //recebe a coluna sku do bd com todos os skus
    $skus = $db->query("SELECT sku FROM digitulus_product LIMIT 25");
    //array pra armazenar todos os todos os produtos dentro do bd
    $products=[];
    for($i=0;$i<sizeof($skus);$i++){
        //cria um objeto produto pra cada posição do array
        $products[$i]=new Product();
        //carrega objeto produto com todos seus atributos apartir do sku
        $products[$i]->get_product($skus[$i]["sku"]);
    }        
?>  
<!-- Right side column. Contains the navbar and content of the page -->
            <aside class="right-side">                
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        Exportar Produtos
                        <small></small>
                    </h1>
                    <br/>
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li class="active"><?php echo str_replace("-"," ",$_GET["page"]); ?></li>
                    </ol>
                </section>
                
                <!-- Main content -->
                <form action="export_form.php" method="post">
                    
                    <section class="content">
                        <button type="submit" class="btn btn-primary">Exportar</button>
                        <br/>
                        <br/>
                        <div class="row">
                            <div class="col-xs-12">
                                <div class="box box-warning">
                                    <div class="box-header">
                                        <h3 class="box-title">Produtos</h3>                                    
                                    </div><!-- /.box-header -->
                                    <div class="box-body table-responsive">                   
                                        <table id="example1" class="table table-bordered table-striped">
                                            <thead>
                                                <tr>
                                                    <th><input type="checkbox"/></th>
                                                    <th>sku</th>
                                                    <th>Nome</th>
                                                    <th>Descrição</th>
                                                    <th>Tipo de acomodação</th>
                                                    <th>Duração acomodação</th>                                      
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                    for($i=0;$i<sizeof($skus);$i++){
                                                        echo "
                                                            <tr>
                                                                <td><input type='checkbox' name='check".$i."' value='".$products[$i]->sku."'/></td>
                                                                <td>".$products[$i]->sku."</td>
                                                                <td>".$products[$i]->name."</td>
                                                                <td>".$products[$i]->description."</td>
                                                                <td>".$products[$i]->accommodation_type."</td>
                                                                <td>".$products[$i]->accommodation_duration."</td>
                                                            </tr>
                                                        ";
                                                    }
                                                ?>
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <th><input type="checkbox"/></th>
                                                    <th>sku</th>
                                                    <th>Nome</th>
                                                    <th>Descrição</th>
                                                    <th>Tipo de acomodação</th>
                                                    <th>Duração acomodação</th> 
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div><!-- /.box-body -->
                                </div><!-- /.box -->
                            </div>
                        </div>
                    </section><!-- /.content -->
                </form>
            </aside><!-- /.right-side -->
    
        <!-- jQuery 2.0.2 -->
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
 
        <!-- page script -->
        <script type="text/javascript">
            $(function() {
                $("#example1").dataTable();
                $('#example2').dataTable({
                    "bPaginate": true,
                    "bLengthChange": false,
                    "bFilter": false,
                    "bSort": true,
                    "bInfo": true,
                    "bAutoWidth": false
                });
            });
        </script>
