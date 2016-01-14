<?php
    //verifica se algum sku foi passado via get
    if(isset($_GET["sku"]) || isset($_GET["skus"])){
        //verifica se foram passados múltiplos skus
        if(isset($_GET["skus"])){
            //transforma os skus enviados via get em um vetor
            $skus=explode(",",$_GET["skus"]);
            //qtproducts=tamanho do vetor= quantidade de skus
            $qtproducts=count($skus);
        }
        //caso tenha sido passado apenas 1 sku:
        else{
            $skus[]=$_GET["sku"];
            $qtproducts=1;
        }
    
?>
 <script type="text/javascript" src="js/mapa.js"></script>  
      <script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?sensor=false"></script>
		<script src="http://maps.googleapis.com/maps/api/js?sensor=false&amp;libraries=places"></script>
		<script src="js/jquery.geocomplete.js"></script>
        <script src="js/jquery.geocomplete.min.js"></script>
        <aside class="right-side">                
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>
                    Editar Produto
                    <small></small>
                </h1>
                <br/>

                <ol class="breadcrumb">
                    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                    <!--<li><a href="#">Examples</a></li>-->
                    <li class="active">Editar Produto(s)</li>
                </ol>
            </section>



            <!--Cria variaveis globais em JS com as rows do db-->
            
            <button class="btn btn-primary" onclick="submitform()">Salvar Edição</button>
            <!-- Main content -->                            
            <section class="content">

                <!-- Custom Tabs -->
                <div class="nav-tabs-custom">
                    <ul class="nav nav-tabs">
                        <?php
                            //gera n numero de tabs com n=$qtproducts
                            for($i=1;$i<=$qtproducts;$i++){
                                //Se for a primeira tab, ativa o cabeçalho inserindo o class active
                                if($i==1){
                                    echo"<li class='active'><a href='#tab_".$i."' data-toggle='tab' onclick='duplicate(".json_encode($i).")'>Produto  ".$i."</a></li>";
                                }
                                else{
                                    echo"<li><a href='#tab_".$i."' data-toggle='tab' onclick='duplicate(".json_encode($i).")'>Produto  ".$i."</a></li>";
                                }

                            }//final do for
                        ?>
                    </ul>
                    <!--Cria os formulários das tabs-->
                    <form name="form" role="form" class="half-form" method="POST" action="location_information.php?page=edit">
                        <div class="tab-content">
                            <?php
                                //gera n numero de tabs com n=$qtproducts
                                for($i=1;$i<=$qtproducts;$i++){
                                    //carrega o produto a ser editado a partir do sku
                                    $product= new Product();
                                    $product->get_product($skus[$i-1]);
                                    $budget= new Budget();
                                    $budget->get_budget($skus[$i-1]);
                            ?>
                                    <!--Se for a primeira aba, ativa o conteúdo dela inserindo class active-->
                                    <div class="tab-pane <?php if($i==1) echo "active"; ?>"  id="tab_<?php echo $i; ?>">
                                        <div class="box-header">
                                            <h3 class="box-title">Editar Localização </h3>
                                        </div><!-- /.box-header -->
                                        <!--Console que exibe as variáveis temporárias dos orçamento -->
                                        <!-- fim console-->
                                        <div class="row">
                                            <div class="col-xs-4">
                                                    <div class="form-group">
                                                        <input type="hidden" class="form-control" name="qtproducts" id="qtproducts" value = "<?php echo $qtproducts; ?>"/>															
                                                        <label>Sku</label>
                                                        <input type="text" class="form-control" name="sku" id="sku?>" value="<?php echo $product->sku; ?> " placeholder="Sku"readonly/>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Nome do Produto</label>
                                                        <input type="text" class="form-control" name="name<?php echo $i; ?>" id="name<?php echo $i; ?>"  id="name<?php echo $i; ?>" value="<?php echo $product->name; ?>" placeholder="Nome" readonly />
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Escola</label>
                                                        <input type="text" class="form-control" name="school<?php echo $i; ?>" id="school<?php echo $i; ?>" value="<?php echo $product->school; ?>" placeholder="Escola" readonly/>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Cidade</label>
                                                        <input type="text" class="form-control"  name="city<?php echo $i; ?>" id="city<?php echo $i; ?>" value="<?php echo $product->city; ?>" placeholder="Cidade" readonly/>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Bairro</label>
                                                        <input type="text" class="form-control" name="neighbourhood<?php echo $i; ?>" id="neighbourhood<?php echo $i; ?>" value="<?php echo $product->neighbourhood; ?> " placeholder="Bairro"readonly/>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Idioma</label>
                                                        <input type="text" class="form-control"  name="language<?php echo $i; ?>" id="language<?php echo $i; ?>"value="<?php echo $product->language; ?>" placeholder="Idioma" readonly/>
                                                    </div>
                                                <div class="form-group">
                                                    <label>Endereço</label>
                                                    <input type="text" class="form-control" name="Geocomplete" id="geocomplete"  placeholder="Endereço"  />
                                                </div>
                                                   <div id="map" class="map" contextmenu=""style="width:100%; height:100px;border:1px solid #000;float:right;" onfocus="this.form.Latitude.focus()" >
                                                                  
                                                                </div>
                                                <div class="form-group">
                                                    <label>Latitude</label>
                                                    <input type="text" class="form-control" name="lat" id="lat" value="<?php echo $product->latitude; ?>" placeholder="Latitude"   />
                                                </div>
                                                   <div class="form-group">
                                                    <label>Longitde</label>
                                                    <input type="text" class="form-control" name="lng" id="lng" value="<?php echo $product->longitude; ?>" placeholder="Longitude"  />
                                                </div>
            
                                                
                                            </div>
                                            <!-- Final segunda parte formulário -->
                                            <!-- /.col-xs-4  -->
                                        </div><!-- /.row  -->
                                    </div><!-- /.tab-pane  -->
                            <?php
                                }//final do for
                            ?>
                        </div><!-- /.tab-content -->
                    </form>   
                    
                </div><!-- nav-tabs-custom -->
            </section><!-- /.content -->
        </aside>
        <!--JavaScript com as muções de manipulação de texto e calculo do orçamento-->    
        <script type="text/javascript" src="js/product-form.js"></script>
<?php
    }//final do primeiro if
    //caso não tenha sido enviado nenhum sku via get mostrar mensagem de erro
    else{
        echo"<aside class='right-side'>
            <br/>
            <br/>
                <div class='alert alert-danger alert-dismissable'>
                    <i class='fa fa-ban'></i>
                    <b>Erro!</b> Nenhum SKU selecionado
                </div>
            </aside>";
    }
?>
<script type="text/javascript">
    //função para carregar as informações do console assim que a página carregar
     $(function(){
        $("#geocomplete").geocomplete({
          map: "#map",
          details: "form",
          types: ["geocode", "establishment"],
        });

        
      });
     function submitform(){    
      document.form.submit();
    }
</script>