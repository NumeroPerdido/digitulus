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
?>
<script src="../src/js/plugins/Jcrop/jquery.min.js"></script>
<script src="../src/js/plugins/Jcrop/jquery.Jcrop.js"></script>
<script src="../src/js/plugins/Jcrop/jquery.color.js"></script>
<!-- Right side column. Contains the navbar and content of the page -->
<aside class="right-side">                
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Remover imagem
            <small></small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active"><?php echo str_replace("-"," ",$_GET["page"]); ?></li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title"><?php echo $olabel; ?></h3>                                    
                    </div><!-- /.box-header -->
                    <?php
                        //Se uma requisição post ainda não foi enviada, mostra as imagens para serem deletadas. Caso contrario deleta as imagens
                        if ($_SERVER['REQUEST_METHOD'] != 'POST'){
                    ?>
                            <form method="POST" action="index.php?<?php echo "page=".$_GET["page"]."&label=".$olabel;?>">
                                <div class="img-form">
                                    <?php
                                        $dir="";
                                        //se ja existir imagens com esse label, elas são exibidas
                                        if (file_exists("Jcrop/img/".$label)) {
                                            $dir=scandir("Jcrop/img/".$label);
                                            //se a pasta não estiver vazia, mostra o conteúdo abaixo
                                            if(count($dir)>2){
                                                for($i=2;$i<count($dir);$i++){ 
                                                    echo "<img class='jcropgallery' src=Jcrop/img/".$label."/".$dir[$i]." /><label style='width:10%; margin-right:2%;'><input type='checkbox' id='$i' name='checkbox$i' value='$dir[$i]'>$dir[$i]</label>";
                                                }
                                                 echo"<input type='submit' class='btn btn-danger' value='Remover Imagens'>";
                                            }
                                        }
                                        //se a pasta não existir ou a pasta está vazia mostra essa mensagem
                                        if(count($dir)<=2 || $dir=""){
                                            echo "
                                                <div class='alert alert-warning alert-dismissable'>
                                                    <i class='fa fa-warning'></i>
                                                    <b>Sem Imagens!</b> O label $olabel ainda não possui imagens.
                                                </div>";
                                        }
                                    ?>
                                </div> <!--final img-form div--> 
                            </form>
                    <?php
                        }
                        //se uma requisição de post foi enviada, então deleta as imagens
                        else{
                            //conta quantos checkboxs marcados foram enviados via a post
                            $qt_check=count($_POST);
                            //caso nenhum checkbox marcado foi enviado, mostra esse menssagem
                            if($qt_check==0){
                                echo"<div class='alert alert-danger alert-dismissable'>
                                            <i class='fa fa-warning'></i>
                                            <b>Imagem não selecionada!</b> Nada foi deletado.
                                        </div>";
                            }
                            else{
                                //percorre todos os checkbox enviados
                                $db= new DB();
                                foreach($_POST as $checkbox){
                                    //busca no banco de dados todos os produtos com thumbnail = o nome da imagem que foi removida
                                    $sql= $db->query("SELECT sku FROM digitulus_product WHERE thumbnail = :tn",array("tn" => $checkbox));
                                    //cria um novo objeto produto
                                    $product= new Product();
                                    //percorre todos skus retornados pela query
                                    foreach($sql as $sku){
                                        //carrega o objeto produto a partir do sku
                                        $product->get_product($sku["sku"]);
                                        //remove thumbnail da imagem deletada do produto
                                        $product->thumbnail="";
                                        //atualiza o produto
                                        $product->update_product($sku["sku"]);
                                    }
                                    $label=label_format($_GET["label"]);
                                    //deleta a imagem
                                    unlink("Jcrop/img/$label/$checkbox");
                                }
                                echo"<div class='alert alert-success alert-dismissable'>
                                            <i class='fa fa-check'></i>
                                            <b>Imagens deletadas!</b> Thumbnails dos produtos também foram removidos.
                                        </div>";
                            }
                        }
                            
                    ?>
                </div><!-- /.box -->
            </div>
        </div>
    </section><!-- /.content -->
</aside><!-- /.right-side -->