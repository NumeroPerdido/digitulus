<?php
    //função para formatar o label
    function label_format($str) {
        // assume $str esteja em UTF-8
        $from = "áàãâéêíóôõúüçÁÀÃÂÉÊÍÓÔÕÚÜÇ";
        $to = "aaaaeeiooouucAAAAEEIOOOUUC";
        $keys = array();
        $values = array();
        preg_match_all('/./u', $from, $keys);
        preg_match_all('/./u', $to, $values);
        $mapping = array_combine($keys[0], $values[0]);
        //remove os acentos
        $newstr=strtr($str, $mapping);
        //deixa tudo minúsculo
        $newstr=strtolower($newstr);
        //remove os espaços
        $newstr=str_replace(" ","-",$newstr);
        //remove aspas simples
        $newstr=str_replace("'","",$newstr);
        return $newstr;
    }
    //label original
    $olabel=$_GET["label"];
    //lable formatado
    $label=label_format($olabel);

    $db = new DB();
    //pega o sku e o thumbnail de todos os produtos que possuiem esse label
    $sql=$db->query("SELECT sku,thumbnail FROM digitulus_product WHERE image_label = :label", array("label" => $olabel));
?>
<script src="../src/js/plugins/Jcrop/jquery.min.js"></script>
<script src="../src/js/plugins/Jcrop/jquery.Jcrop.js"></script>
<script src="../src/js/plugins/Jcrop/jquery.color.js"></script>
<!-- Right side column. Contains the navbar and content of the page -->
<aside class="right-side">                
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Thumbnail imagem
            <small></small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active"><?php echo str_replace("-"," ",$_GET["page"]); ?></li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row" >
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title"><?php echo $olabel; ?></h3>                                    
                    </div><!-- /.box-header -->
                    <form method="POST" action="index.php?<?php echo "page=".$_GET["page"]."&label=".$_GET["label"];?>">
                        <div class="img-form">
                            <?php
                                //se uma requisição de post foi enviada, salva no BD os novos thumbnails
                                if ($_SERVER['REQUEST_METHOD'] == 'POST'){
                                    $product= new Product();
                                    foreach($sql as $array_product){
                                        $product->get_product($array_product["sku"]);
                                        $product->thumbnail=$_POST[$array_product["sku"]];
                                        $product->update_product($array_product["sku"]);
                                    }
                                    //mensagem de sucesso
                                    echo "<div class='alert alert-success alert-dismissable'>
                                            <i class='fa fa-check'></i>
                                            <b>Sucesso!</b> Thumbnails salvos com sucesso.
                                        </div>";
                                }
                                //caso contrario exibe os thumbanais para serem editados
                                else{                            
                                        $dir="";
                                        //verifica se a pasta com aquele labe existe
                                        if (file_exists("Jcrop/img/".$label)) {
                                            //se existir, pega todas as imagens que existem lá e exibe junto com o nome para ser editado
                                            $dir=scandir("Jcrop/img/".$label);
                                            //se a pasta não estiver vazia, mostra o conteúdo abaixo
                                            if(count($dir)>2){
                                                echo"<input type='submit' class='btn btn-primary' value='Definir Thumbnail'>";
                                                echo"<table class='table'>
                                                        <tr>
                                                            <th style='width:80px'>Imagem</th>
                                                    ";
                                                //cria um tablehead para cada produto que tenha essa label, exibindo o sku
                                                foreach($sql as $product){
                                                    echo"   <th style='width:80px'>".$product["sku"]."</th>";
                                                }
                                                echo"   </tr>";

                                                //as primeiras duas posições do $dir são sempre ./ e ../
                                                for($i=2;$i<count($dir);$i++){
                                                    $name=$dir[$i];
                                                    //remove a extensão do nome da imagem
                                                    $name=str_replace(".jpg","",$name);
                                                    echo"<tr>
                                                            <td><img alt='".$i."' style='width:300px;' src=Jcrop/img/".$label."/".$dir[$i]." /></td>
                                                         ";
                                                    //cria um td para cada produto que tenha essa label, radio button com value=nome da imagem desse linha
                                                    foreach($sql as $product){
                                                        $checked="";
                                                        //se o thumbnail desse for igual ao nome da imagem dessa linha, o radio button será checado
                                                        if($dir[$i]==$product["thumbnail"]){
                                                            $checked="checked";
                                                        }
                                                        echo"<td><input class='flat-red' type='radio' name='".$product["sku"]."' value='".$dir[$i]."' $checked required/></td>";
                                                    }
                                                    echo"   </tr>";
                                                }                            
                                                    echo"</table>";
                                            }
                                        }
                                        //se a pasta não existir ou a pasta está vazia mostra essa mensagem
                                        if(count($dir)<=2 || $dir=""){
                                            echo "
                                                <div class='alert alert-warning alert-dismissable'>
                                                    <i class='fa fa-warning'></i>
                                                    <b>Sem Imagens!</b> O label $olabel ainda não possui imagens, você pode adicionar imagens <a href='index.php?page=Adicionar-Imagem&label=$olabel'>Clicando Aqui</a>.
                                                </div>";
                                        }
                                }
                            ?>
                        </div>
                    </form>
                </div><!-- /.box -->
            </div>
        </div>
    </section><!-- /.content -->
</aside><!-- /.right-side -->