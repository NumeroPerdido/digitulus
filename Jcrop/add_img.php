<?php
    //função para formatar o label removendo acentos, espaços e convertendo pra minúsculo
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
<!--
<script src="js/plugins/Jcrop/jquery.min.js"></script>
<script src="js/plugins/Jcrop/jquery.Jcrop.js"></script>
<script src="js/plugins/Jcrop/jquery.color.js"></script>
-->
<!-- Right side column. Contains the navbar and content of the page -->
<aside class="right-side">                
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Adicionar imagem
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
                        //caso as imagens não tenham sido enviadas ainda, carrega o formulário de envio
                        if(!isset($_FILES['images'])){
                    ?>
                            <div class="img-form">
                                <form method="post" enctype="multipart/form-data">
                                    <input type="file" name="images[]" accept="image/gif, image/jpeg, image/png" multiple required>
                                    <br/>
                                    <input type="submit" class='btn btn-primary' value="Enviar Imagens">
                                </form>
                            
                    <?php
                                $dir="";
                                //se ja existir imagens com esse label, elas são exibidas
                                if (file_exists("Jcrop/img/".$label)) {
                                    $dir=scandir("Jcrop/img/".$label);
                                    for($i=2;$i<count($dir);$i++){ 
                                        echo "<img class='jcropgallery' src=Jcrop/img/".$label."/".$dir[$i]." />";
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
                    <?php
                        }//final do if
                        //se as imagens foram enviadas via, carrega o bloco de código responsável pelo Jcrop
                        else{
                            //ESSA É A PRIMEIRA FASE SO PROCESSO ONDE O USUÁRIO IRÁ APENAS CORTAR AS IMAGENS
                            $images = $_FILES['images'];
                            //verifica quantas imagens foram enviadas
                            $qtimg = count($images["name"]);
                            //se não existir uma pasta com label como nome, essa pasta é criada em Jcrop/temp
                            if (!file_exists("Jcrop/temp/".$label)) {
                                mkdir("Jcrop/temp/".$label);
                            }
                    ?>
                            <form method="POST" action="Jcrop/imagepost.php" >    
                                <!-- Custom Tabs -->
                                <div class="nav-tabs-custom" id="crop">
                                    <ul class="nav nav-tabs">
                                        <?php
                                            //for para gerar o cabeçalho das tabs
                                            for ($i=0;$i<$qtimg;$i++) {
                                                //se for a primeira tab, usa a classe active
                                                if($i==0){
                                                    echo"<li id='htab_".$i."' class='active'><a href='#tab_".$i."' data-toggle='tab'>Tab ".$i."</a></li>";
                                                }
                                                else{
                                                     echo"<li id='htab_".$i."' ><a href='#tab_".$i."' data-toggle='tab'>Tab ".$i."</a></li>";
                                                }
                                            }
                                        ?>
                                    </ul>
                                    <div class="tab-content">    
                                        <?php
                                            //for que gera o conteúdo das tabs
                                            for ($i=0;$i<$qtimg;$i++) {
                                                //formata o nome do arquivo para remover espaço e acentos
                                                $nname=label_format($images["name"][$i]);
                                                //cria o caminho na pasta temporária com base no nome original
                                                $img_path="Jcrop/temp/".$label."/".basename($nname);
                                                //salva a imagem na pasta temporária
                                                move_uploaded_file($images["tmp_name"][$i], $img_path);
                                                //pega as todas as informações sobre a imagem
                                                $imginfo=getimagesize($img_path);
                                                //nova largura e nova altura são iguais a largura e altura da imagem sem edição
                                                $nwidth=$imginfo[0];
                                                $newheigth=$imginfo[1];
                                                //cria um img resource a partir da imagem que acabou de ser enviada 
                                                switch($imginfo['mime']){
                                                    //se for pgn, cria a nova imagem a partir do png 
                                                    case 'image/png':   
                                                    $img_src = imagecreatefrompng($img_path);
                                                    break;
                                                    //se for jpeg, cria a nova imagem a partir do jpeg    
                                                    case 'image/jpeg':  
                                                    $img_src = imagecreatefromjpeg($img_path);
                                                    break;
                                                    //se for gif, cria a nova imagem a partir do gif
                                                    case 'image/gif':
                                                    $img_src = imagecreatefromgif($img_path);
                                                    break;
                                                }
                                                //caso a largura seja a menor das dimensões, nova largura=600 e a altura é redimencionada proporcionamente, caso contrário nova altura=600 e a largura é redimencionada proporcionamente
                                                if($imginfo[0]<$imginfo[1]){
                                                    $nwidth=600;
                                                    $newheigth=($imginfo[1]/$imginfo[0])*600;
                                                }
                                                else{
                                                    $newheigth=600;
                                                    $nwidth=($imginfo[0]/$imginfo[1])*600;
                                                }
                                                //se as duas dimesões forem menor que 600, nova largura e altura =600
                                                if($imginfo[0]<600 && $imginfo[1]<600){
                                                    $nwidth=600;
                                                    $newheigth=600;
                                                }
                                                //cria um novo img resource com as novas dimensões
                                                $new_img = imagecreatetruecolor($nwidth,$newheigth);
                                                //redmenciona a imagem
                                                imagecopyresampled($new_img, $img_src, 0, 0, 0, 0, $nwidth, $newheigth, $imginfo[0], $imginfo[1]);
                                                //salva a imagem redimencionada
                                                imagejpeg($new_img,$img_path,90);
                                        ?>
                                                <!--Conteúdo da tab -->
                                                <!--se for a primeira tab, usa a classe active-->
                                                <div class="tab-pane <?php if($i==0) echo "active"; ?>" id="tab_<?php echo $i;?>">
                                                    <div class="img-form">
                                                    <!--Carrega a imagem temporária-->
                                                    <img src="<?php echo $img_path;  ?>" onmousemove="updatecrop(<?php echo json_encode($i); ?>);" id="imgcrop<?php echo $i;?>"/>
                                                    <!--
                                                        Elementos escondidos a serem enviados via post que contem os valores das posições x,y; a largura, altura, quantidade de imagens e o caminho temporário da imagem
                                                    -->
                                                    <input type="hidden" id="x<?php echo $i;?>" name="x<?php echo $i;?>" />
                                                    <input type="hidden" id="y<?php echo $i;?>" name="y<?php echo $i;?>" />
                                                    <input type="hidden" id="w<?php echo $i;?>" name="w<?php echo $i;?>" />
                                                    <input type="hidden" id="h<?php echo $i;?>" name="h<?php echo $i;?>" />
                                                    <input type="hidden" id="label" name="label" value="<?php echo label_format($_GET["label"]); ?>" />
                                                    <input type="hidden" id="qtimg<?php echo $i;?>" name="qtimg<?php echo $i;?>" value="<?php echo $qtimg;?>" />
                                                    <input type="hidden" id="img_path<?php echo $i;?>" name="img_path<?php echo $i;?>" value="<?php echo $img_path;?>" />
                                                    <input type="hidden" id="original_label<?php echo $i;?>" name="original_label<?php echo $i;?>" value="<?php echo $olabel;?>" />
                                                    <?php
                                                        //remove a extensão do nome da imagem
                                                        $nname=str_replace(".jpg","",$nname);
                                                        $nname=str_replace(".jpeg","",$nname);
                                                        $nname=str_replace(".gif","",$nname);
                                                        $nname=str_replace(".png","",$nname);
                                                    ?>
                                                    <input class="form-control" type="hidden" value="<?php echo $nname;?>" name="img_name<?php echo $i;?>" />
                                                    <?php
                                                        //se for a última imagem a ser cortada mostra o botão de salvar todas as imagens
                                                        if($i==$qtimg-1){
//                                                            echo "<input type='button' class='btn btn-primary' onclick='next_step(\"crop\",\"rename\")' value='Salvar Imagens' >";
                                                            echo "<input type='submit' class='btn btn-primary' value='Salvar Imagens' >";
                                                        }
                                                        //caso contrário mostra o botão de cortar, e ir para próxima tab
                                                        else{
                                                            echo "<input type='button' class='btn btn-warning' onclick='next_tab(".$i.")' value='Cortar' >";
                                                        }
                                                    ?>      
                                                    </div>
                                                </div>
                                        <?php
                                            }//final do for
                                        ?>
                                    </div><!-- /.tab-content -->
                                </div><!-- nav-tabs-custom -->
                            </form>
                        <?php
                            }//final do else
                        ?>
                </div><!-- /.box -->
            </div>
        </div>
    </section><!-- /.content -->
</aside><!-- /.right-side -->
<script type="text/javascript">
    var j;
    function updatecrop(i){
        var api;
        j=i;
        $('#imgcrop'+i).Jcrop({
            bgOpacity: 0.4,
            bgColor: 'black',
            onSelect: updateCoords,
            minSize		: [ 600, 600 ],
            maxSize		: [ 600, 600 ],
            allowResize	: false,
            addClass: 'jcrop-dark'
        },function(){
          api = this;
          api.setSelect([130,65,130+350,65+285]);
          api.setOptions({ bgFade: true });
          api.ui.selection.addClass('jcrop-selection');
        });
    }
    function updateCoords(c){
        //atualiza os valores da posições x,y e width height nos inputs hidden
        $('#x'+j).val(c.x);
        $('#y'+j).val(c.y);
        $('#w'+j).val(c.w);
        $('#h'+j).val(c.h);
        if(document.getElementById("x"+j).value!=130){
            next_tab(j);
        }
    };
    
    function next_tab(i){
        //next= número da tab atual+1
        var next=i+1;
            if(next<document.getElementById("qtimg0").value){
            //desativa o cabeçalho e o conteúdo da tab atual
            $("#htab_"+i).toggleClass("active");
            $("#tab_"+i).toggleClass("active");

            //ativa o cabeçalho e o conteúdo da próxima tab
            $("#htab_"+next).toggleClass("active");
            $("#tab_"+next).toggleClass("active");
        }
    }
    function teste(){
        alert("antedeguemon");
    }
</script>