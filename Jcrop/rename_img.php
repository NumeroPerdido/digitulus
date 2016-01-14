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
            Renomear imagem
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
                    <form method="POST" action="index.php?<?php echo "page=".$_GET["page"]."&label=".$olabel;?>">
                        <div class="img-form">
                            <?php
                                $dir="";
                                //verifica se a pasta com aquele labe existe
                                if (file_exists("Jcrop/img/".$label)) {
                                    //se existir, pega todas as imagens que existem lá e exibe junto com o nome para ser editado
                                    $dir=scandir("Jcrop/img/".$label);
                                    //se a pasta não estiver vazia, mostra o conteúdo abaixo
                                    if(count($dir)>2){
                                        //as primeiras duas posições do $dir são sempre ./ e ../
                                        for($i=2;$i<count($dir);$i++){
                                            $name=$dir[$i];
                                            //remove a extensão e o label do nome da imagem
                                            $name=str_replace("-".$label,"",$name);
                                            $name=str_replace(".jpg","",$name);
                                            echo "<img alt='".$i."' class='jcropgallery' src=Jcrop/img/".$label."/".$dir[$i]." />";
                                            echo"<input class='img-name' id='new_name".$i."' name='new_name".$i."' value='".$name."'>";
                                        }
                                        echo"<input type='submit' class='btn btn-primary' value='Renomear Imagens'>";
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
                            ?>
                        </div>
                    </form>
                    <?php
                        //se uma requisição de post foi enviada, então renomaia as imagens
                        if ($_SERVER['REQUEST_METHOD'] == 'POST'){
                            $label=label_format($_GET["label"]);
                            //pega todas as imagens que existem lá e exibe junto com o nome para ser editado
                            $dir=scandir("Jcrop/img/".$label);
                            //as primeiras duas posições do $dir são sempre ./ e ../
                            for($i=2;$i<count($dir);$i++){
                                $old_name="Jcrop/img/".$label."/".$dir[$i];
                                $new_name=label_format($_POST["new_name".$i]);
                                $new_name="Jcrop/img/".$label."/".$new_name."-".$label.".jpg";
                                rename($old_name,$new_name);
                            }
                            //redireciona para página de thumbnail
                            echo "<script>location.href = 'index.php?page=Thumbnail-Imagem&label=".$_GET["label"]."';</script>";
                        }
                            
                    ?>
                </div><!-- /.box -->
            </div>
        </div>
    </section><!-- /.content -->
</aside><!-- /.right-side -->