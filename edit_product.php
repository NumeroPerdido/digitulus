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
        <aside class="right-side">                
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>
                    Editar Produto(s)
                    <small></small>
                </h1>
                <br/>

                <ol class="breadcrumb">
                    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                    <!--<li><a href="#">Examples</a></li>-->
                    <li class="active">Editar Produto(s)</li>
                </ol>
            </section>


            <?php

                $db= new DB();
                //pega todas as linhas da tabela duration
                $duration=$db->query("SELECT * FROM digitulus_duration");
                //pega todas as linhas da tabela currency
                $currencyrow=$db->query("SELECT * FROM digitulus_currency");
                //pega todas as linhas da tabela insurance
                $insurancerow=$db->query("SELECT * FROM digitulus_insurance");
                //pega todas as linhas da tabela settings
                $settingsrow=$db->query("SELECT * FROM digitulus_settings");
                //pega todas as linhas da tabela country_default
                $country_default=$db->query("SELECT * FROM digitulus_country_default");
                //pega todas as linhas da tabela flight
                $flight=$db->query("SELECT * FROM digitulus_flight");
                ?>

            <!--Cria variaveis globais em JS com as rows do db-->
            <script>
               var currencyrow = <?php echo json_encode($currencyrow); ?>;
               var insurancerow = <?php echo json_encode($insurancerow); ?>;
               var settingsrow = <?php echo json_encode($settingsrow); ?>;
            </script>
            <button class="btn btn-primary" onclick="submitform()">Salvar Edições</button>
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
                    <form name="form" role="form" class="half-form" method="POST" action="product_information.php?page=edit">
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
                                            <h3 class="box-title">Editar Produto <?php echo $skus[$i-1]; ?></h3>
                                        </div><!-- /.box-header -->
                                        <!--Console que exibe as variáveis temporárias dos orçamento -->
                                        <div class="console">
                                            <label>console display variáveis temporárias:</label>
                                            <div class="row">
                                                <!-- lado esquerdo-->
                                                <div class="col-xs-3">
                                                    <div class="console-font" id="course_gross<?php echo $i; ?>"></div>
                                                    <div class="console-font" id="course_promo<?php echo $i; ?>"></div>
                                                    <div class="console-font" id="course_net<?php echo $i; ?>"></div>
                                                    <div class="console-font" id="accommodation_gross<?php echo $i; ?>"></div>
                                                    <div class="console-font" id="accommodation_promo<?php echo $i; ?>"></div>
                                                    <div class="console-font" id="accommodation_net<?php echo $i; ?>"></div>
                                                    <div class="console-font" id="exchange_rate_value<?php echo $i; ?>"></div>
                                                    <div class="console-font" id="banking_fee_value<?php echo $i; ?>"></div>
                                                    <div class="console-font" id="wire_fee_value<?php echo $i; ?>"></div>
                                                    <div class="console-font" id="iof_rate<?php echo $i; ?>"></div>
                                                    <div class="console-font" id="phi<?php echo $i; ?>"></div>
                                                    <div class="console-font" id="internet_transfer_fee<?php echo $i; ?>"></div>
                                                    <div class="console-font" id="dollar_value<?php echo $i; ?>"></div>
                                                    <div class="console-font" id="iata_value<?php echo $i; ?>"></div>
                                                    <div class="console-font" id="total_gross_fees<?php echo $i; ?>"></div>
                                                    <div class="console-font" id="total_net_fees<?php echo $i; ?>"></div>
                                                    <div class="console-font" id="total_gross_before_taxes_real<?php echo $i; ?>"></div>
                                                    <div class="console-font" id="total_promo_before_taxes_real<?php echo $i; ?>"></div>
                                                    <div class="console-font" id="total_net_before_taxes<?php echo $i; ?>"></div>
                                                    <div class="console-font" id="total_net_before_taxes_real<?php echo $i; ?>"></div>
                                                </div>
                                                <!-- lado direito-->
                                                <div class="col-xs-4">
                                                    <div class="console-font" id="us_canada_extra_insurance_net_value<?php echo $i; ?>"></div>
                                                    <div class="console-font" id="world_extra_insurance_net_value<?php echo $i; ?>"></div>
                                                    <div class="console-font" id="extra_insurance_gross_value<?php echo $i; ?>"></div>
                                                    <div class="console-font" id="ireland_insurance_value<?php echo $i; ?>"></div>
                                                    <div class="console-font" id="oshc_insurance_value<?php echo $i; ?>"></div>
                                                    <div class="console-font" id="required_insurance_real<?php echo $i; ?>"></div>
                                                    <div class="console-font" id="total_insurance_net<?php echo $i; ?>"></div>
                                                    <div class="console-font" id="total_insurance_gross<?php echo $i; ?>"></div>
                                                    <div class="console-font" id="total_net_before_insurance_real<?php echo $i; ?>"></div>
                                                    <div class="console-font" id="total_net_before_airfare_real<?php echo $i; ?>"></div>
                                                    <div class="console-font" id="normal_profit<?php echo $i; ?>"></div>
                                                    <div class="console-font" id="comparing_factor_profit<?php echo $i; ?>"></div>
                                                    <div class="console-font" id="default_profit<?php echo $i; ?>"></div>
                                                    <div class="console-font" id="default_factor_profit<?php echo $i; ?>"></div>
                                                    <div class="console-font" id="real_profit<?php echo $i; ?>"></div>
                                                    <div class="console-font" id="flight_gross<?php echo $i; ?>"></div>
                                                    <div class="console-font" id="flight_gross_real<?php echo $i; ?>"></div>
                                                    <div class="console-font" id="flight_net<?php echo $i; ?>"></div>
                                                    <div class="console-font" id="total_net_profit_airfare<?php echo $i; ?>"></div>
                                                    <div class="console-font" id="total_gross_real<?php echo $i; ?>"></div>
                                                    <div class="console-font" id="total_promo_real<?php echo $i; ?>"></div>
                                                    <div class="console-important" id="cost_c<?php echo $i; ?>"></div>
                                                    <div class="console-important" id="price_c<?php echo $i; ?>"></div>
                                                    <div class="console-important" id="special_price_c<?php echo $i; ?>"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- fim console-->
                                        <div class="row">
                                            <div class="col-xs-4">
                                                    <div class="form-group">
                                                        <input type="hidden" class="form-control" name="qtproducts" id="qtproducts" value = "<?php echo $qtproducts; ?>"/>															
                                                        <label>Sku</label>
                                                        <input type="text" class="form-control" name="sku<?php echo $i; ?>" id="sku<?php echo $i; ?>" value="<?php echo $product->sku; ?>" placeholder="Sku"/>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Nome do Produto</label>
                                                        <input type="text" class="form-control" name="name<?php echo $i; ?>" id="name<?php echo $i; ?>"  id="name<?php echo $i; ?>" value="<?php echo $product->name; ?>" placeholder="Nome" readonly />
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Escola</label>
                                                        <input type="text" class="form-control" name="school<?php echo $i; ?>" id="school<?php echo $i; ?>" onchange="load_all_functions_text(<?php echo json_encode($i); ?>);"value="<?php echo $product->school; ?>" placeholder="Escola"/>
                                                    </div>
                                                <div class="form-group">
                                                        <label>País</label>
                                                        <select class="form-control" onchange="load_all_functions_text(<?php echo json_encode($i); ?>);get_currency(<?php echo json_encode($i); ?>);load_all_functions_budget(<?php echo json_encode($i); ?>)" name="country<?php echo $i; ?>" id="country<?php echo $i; ?>">
                                                            <option value=""></option>
                                                            <?php
                                                                //mostra todas os países que estão no BD em forma de dropdown
                                                                foreach($country_default as $array){
                                                                    $countryrow=implode(",",$array);
                                                                    if($array["country"]==$product->country){
                                                                        echo "
                                                                        <option value='".$countryrow."' selected='selected'>".$array["country"]."</option>
                                                                    ";
                                                                    }
                                                                    echo "
                                                                        <option value='".$countryrow."'>".$array["country"]."</option>
                                                                    ";
                                                                    }   
                                                            ?>
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Cidade</label>
                                                        <input type="text" class="form-control" onchange="load_all_functions_text(<?php echo json_encode($i); ?>);" name="city<?php echo $i; ?>" id="city<?php echo $i; ?>" value="<?php echo $product->city; ?>" placeholder="Cidade"/>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Bairro</label>
                                                        <input type="text" class="form-control" onchange="load_all_functions_text(<?php echo json_encode($i); ?>);" name="neighbourhood<?php echo $i; ?>" id="neighbourhood<?php echo $i; ?>" value="<?php echo $product->neighbourhood; ?>" placeholder="Bairro"/>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Idioma</label>
                                                        <input type="text" class="form-control" onchange="load_all_functions_text(<?php echo json_encode($i); ?>);" name="language<?php echo $i; ?>" id="language<?php echo $i; ?>"value="<?php echo $product->language; ?>" placeholder="Idioma"/>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Duração do Curso</label>
                                                        <select class="form-control" name="course_duration<?php echo $i; ?>" id="course_duration<?php echo $i; ?>" onchange="load_all_functions_text(<?php echo json_encode($i); ?>);load_all_functions_budget(<?php echo json_encode($i); ?>)">
                                                            <option value=" , "></option>
                                                            <?php
                                                                  //mostra todas as durações de curso que estão no BD em forma de dropdown
                                                                foreach($duration as $array){
                                                                    $durationrow=implode(",",$array);
                                                                    //seleciona a opção 4 semanas como padrão
                                                                    if($array["standard_travel_duration"]==4){
                                                                        $selected="selected=selected";
                                                                    }
                                                                    elseif($array["standard_travel_duration"]==$budget->course_duration_value){
                                                                        $selected="selected=selected";
                                                                    }
                                                                    else{
                                                                        $selected="";
                                                                    }
                                                                        echo "
                                                                        <option value='".$durationrow."' ".$selected." >".$array["standard_travel_duration"]." Semana(s)</option>
                                                                        ";
                                                                    }   
                                                            ?>
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Duração da Acomodação</label>
                                                        <select class="form-control" name="accommodation_duration<?php echo $i; ?>" id="accommodation_duration<?php echo $i; ?>" onchange="load_all_functions_budget(<?php echo json_encode($i); ?>)">
                                                            <option value=""></option>
                                                            <?php
                                                                //mostra todas as durações de curso que estão no BD em forma de dropdown
                                                                foreach($duration as $array){
                                                                    $durationrow=implode(",",$array);
                                                                    if($array["standard_travel_duration"]==4){
                                                                        $selected="selected=selected";
                                                                    }
                                                                    elseif($array["standard_travel_duration"]==$budget->accommodation_duration_value){
                                                                        $selected="selected=selected";
                                                                    }
                                                                    else{
                                                                        $selected="";
                                                                    }
                                                                        echo "
                                                                        <option value='".$durationrow."' ".$selected." >".$array["standard_travel_duration"]." Semana(s)</option>
                                                                        ";
                                                                    }   

                                                            ?>
                                                        </select>
                                                    </div>

                                                    <div class="form-group">
                                                        <label>Tipo de Acomodação</label>
                                                        <input type="text" class="form-control" name="accommodation_type<?php echo $i; ?>" id="accommodation_type<?php echo $i; ?>" onchange="load_all_functions_text(<?php echo json_encode($i); ?>);"value="<?php echo $product->accommodation_type; ?>" placeholder="Tipo de Acomodação"/>
                                                    </div>

                                                    <div class="form-group">
                                                        <label>Descrição do Produto</label>
                                                        <textarea class="form-control" name="description<?php echo $i; ?>" id="description<?php echo $i; ?>" rows="3"value="<?php echo $product->description; ?>" placeholder="Descrição"></textarea>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Parte Aérea Inclusa</label>
                                                        <select class="form-control" name="flight_included<?php echo $i; ?>" id="flight_included<?php echo $i; ?>">
                                                            <option value="Yes">Sim</option>
                                                            <option value="No" selected="selected">Não</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Condições da Passagem Aérea</label>
                                                        <textarea class="form-control" name="flight_conditions<?php echo $i; ?>" id="flight_conditions<?php echo $i; ?>" rows="3"value="<?php echo $product->flight_conditions; ?>" placeholder="Condições da Passagem Aérea"></textarea>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Feriados</label>
                                                        <input type="text" class="form-control" name="holidays<?php echo $i; ?>" id="holidays<?php echo $i; ?>"value="<?php echo $product->holidays; ?>" placeholder="Feriados"/>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Aulas por Semana</label>
                                                        <input type="text" class="form-control" name="lessons_per_week<?php echo $i; ?>" id="lessons_per_week<?php echo $i; ?>"value="<?php echo $product->lessons_per_week; ?>" placeholder="Aulas por Semana"/>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Duração das Aulas</label>
                                                        <input type="text" class="form-control" name="lesson_duration<?php echo $i; ?>" id="lesson_duration<?php echo $i; ?>"value="<?php echo $product->lesson_duration; ?>" placeholder="Duração das Aulas"/>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Refeições</label>
                                                        <input type="text" class="form-control" name="meals<?php echo $i; ?>" id="meals<?php echo $i; ?>" onchange="load_all_functions_text(<?php echo json_encode($i); ?>);"value="<?php echo $product->meals; ?>" placeholder="Refeições"/>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Meta Descrição</label>
                                                        <textarea class="form-control" name="meta_description<?php echo $i; ?>" id="meta_description<?php echo $i; ?>" rows="3"value="<?php echo $product->meta_description; ?>" placeholder="Meta Descrição"></textarea>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Novo</label>
                                                        <select class="form-control" name="new<?php echo $i; ?>" id="new<?php echo $i; ?>">
                                                            <option value="Yes" selected="selected">Yes</option>
                                                            <option value="No">No</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Datas de Validade</label>
                                                        <div class="input-group">
                                                            <div class="input-group-addon">
                                                                <i class="fa fa-calendar"></i>
                                                            </div>
                                                            <input type="text" class="form-control pull-right" name="date<?php echo $i; ?>" id="date<?php echo $i; ?>"/>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Status</label>
                                                        <select class="form-control" name="status<?php echo $i; ?>" id="status<?php echo $i; ?>">
                                                            <option value="Enable" selected="selected">Ativo</option>
                                                            <option value="Disable">Inativo</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Requisitos</label>
                                                        <input type="text" class="form-control" name="requirements<?php echo $i; ?>" id="requirements<?php echo $i; ?>"value="<?php echo $product->requirements; ?>" placeholder="Requisitos"/>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Tipo de Quarto</label>
                                                        <input type="text" class="form-control" name="room<?php echo $i; ?>" id="room<?php echo $i; ?>" onchange="load_all_functions_text(<?php echo json_encode($i); ?>);"value="<?php echo $product->room; ?>" placeholder="Tipo de Quarto"/>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Promoção</label>
                                                        <select class="form-control" name="sale<?php echo $i; ?>" id="sale<?php echo $i; ?>">
                                                            <option value="Yes">Sim</option>
                                                            <option value="No" selected="selected">Não</option>
                                                        </select>
                                                    </div>
                                                     <div class="form-group">
                                                        <label>Descrição Curta</label>
                                                        <textarea class="form-control" name="short_description<?php echo $i; ?>" id="short_description<?php echo $i; ?>" rows="3"value="<?php echo $product->short_description; ?>" placeholder="Descrição Curta"></textarea>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Datas de Início</label>
                                                        <input type="text" class="form-control" name="start_dates<?php echo $i; ?>" id="start_dates<?php echo $i; ?>"value="<?php echo $product->start_dates; ?>" placeholder="Datas de Início"/>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>URL</label>
                                                        <input type="text" class="form-control" name="url_key<?php echo $i; ?>" id="url_key<?php echo $i; ?>"value="<?php echo $product->url_key; ?>" placeholder="URL" readonly/>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Vídeo</label>
                                                        <input type="text" class="form-control" name="videoid<?php echo $i; ?>" id="videoid<?php echo $i; ?>"value="<?php echo $product->videoid; ?>" placeholder="Vídeo"/>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Visibilidade</label>
                                                        <select class="form-control" name="visibility<?php echo $i; ?>" id="visibility<?php echo $i; ?>">
                                                            <option value="Yes" selected="selected">Sim</option>
                                                            <option value="No">Não</option>
                                                        </select>
                                                    </div>
                                                     <div class="form-group">
                                                        <label>O que está incluso</label>
                                                        <input type="text" class="form-control" id="whats_included<?php echo $i; ?>"value="<?php echo $product->whats_included; ?>" placeholder="O que está incluso"/>
                                                    </div>
                                                     <div class="form-group">
                                                        <label>O que não está incluso</label>
                                                        <input type="text" class="form-control" name="whats_not_included<?php echo $i; ?>" id="whats_not_included<?php echo $i; ?>"value="<?php echo $product->whats_not_included; ?>" placeholder="O que não está incluso"/>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Label da Imagem</label>
                                                        <input type="text" class="form-control" name="image_label<?php echo $i; ?>" id="image_label<?php echo $i; ?>"value="<?php echo $product->image_label; ?>" placeholder="Label da Imagem" readonly/>
                                                    </div>
                                            </div><!-- /."col-xs-3  -->
                                            <!-- Segunda Parte do Formulário -->
                                            <div class="col-xs-4">
                                                <div class="form-group">
                                                    <label>Moeda</label>
                                                    <input type="text" class="form-control" name="exchange_rate<?php echo $i; ?>" id="exchange_rate<?php echo $i; ?>" onchange=""value="" placeholder="Moeda"/>
                                                    <input type="hidden" class="form-control" name="currency_code<?php echo $i; ?>" id="currency_code<?php echo $i; ?>" value="<?php echo $budget->currency_code; ?>" />
                                                </div>
                                                <div class="form-group">
                                                    <label>Valor Bruto do Curso por Semana</label>
                                                    <input type="text" class="form-control" name="course_gross_per_week<?php echo $i; ?>" id="course_gross_per_week<?php echo $i; ?>" value="<?php echo $budget->course_gross_per_week; ?>" onchange="load_all_functions_budget(<?php echo json_encode($i); ?>)"value="" placeholder="Valor Bruto do Curso por Semana"/>
                                                </div>
                                                <div class="form-group">
                                                    <label>Valor Promocional do Curso por Semana</label>
                                                    <input type="text" class="form-control" name="course_promo_per_week<?php echo $i; ?>" id="course_promo_per_week<?php echo $i; ?>" value="<?php echo $budget->course_promo_per_week; ?>" onfocus="show_calc(<?php echo json_encode($i); ?>);" onchange="load_all_functions_budget(<?php echo json_encode($i); ?>)"value="" placeholder="Valor Promocional do Curso por Semana"/>
                                                </div>
                                                <div class="form-group">
                                                    <label>Comissão sobre o Curso (%)</label>
                                                    <input type="text" class="form-control" name="course_commission<?php echo $i; ?>" id="course_commission<?php echo $i; ?>" value="<?php echo $budget->course_commission; ?>" onchange="load_all_functions_budget(<?php echo json_encode($i); ?>)"value="" placeholder="Comissão sobre o Curso (%)"/>
                                                </div>
                                                <div class="form-group">
                                                    <label>Valor Bruto da Acomodação por Semana</label>
                                                    <input type="text" class="form-control" name="accommodation_per_week<?php echo $i; ?>" id="accommodation_per_week<?php echo $i; ?>" value="<?php echo $budget->accommodation_per_week; ?>" onchange="load_all_functions_budget(<?php echo json_encode($i); ?>)"value="" placeholder="Valor Bruto da Acomodação por Semana"/>
                                                </div>
                                                <div class="form-group">
                                                    <label>Desconto do Valor Bruto da Acomodação para o Valor Promocional</label>
                                                    <input type="text" class="form-control" name="discount_accommodation<?php echo $i; ?>" id="discount_accommodation<?php echo $i; ?>" value="<?php echo $budget->discount_accommodation; ?>" onchange="load_all_functions_budget(<?php echo json_encode($i); ?>)"value="" placeholder="Desconto do Valor Bruto da Acomodação para o Valor Promocional"/>
                                                </div>
                                                <div class="form-group">
                                                    <label>Comissão sobre a Acomodação (%)</label>
                                                    <input type="text" class="form-control" name="accommodation_commission<?php echo $i; ?>" id="accommodation_commission<?php echo $i; ?>" value="<?php echo $budget->accommodation_commission; ?>" onchange="load_all_functions_budget(<?php echo json_encode($i); ?>)"value="" placeholder="Comissão sobre a Acomodação (%)"/>
                                                </div>
                                                <div class="form-group">
                                                    <label>Taxa de Material</label>
                                                    <input type="text" class="form-control" name="material_fee_value<?php echo $i; ?>" id="material_fee_value<?php echo $i; ?>" value="<?php echo $budget->material_fee_value; ?>" onchange="load_all_functions_budget(<?php echo json_encode($i); ?>)"value="" placeholder="Taxa de Material"/>
                                                </div>
                                                <div class="form-group">
                                                    <label>Taxa de Matrícula</label>
                                                    <input type="text" class="form-control" name="registration_fee_value<?php echo $i; ?>" id="registration_fee_value<?php echo $i; ?>" value="<?php echo $budget->registration_fee_value; ?>" onchange="load_all_functions_budget(<?php echo json_encode($i); ?>)"value="" placeholder="Taxa de Matrícula"/>
                                                </div>
                                                <div class="form-group">
                                                    <label>Taxa de Colocação em Acomodação</label>
                                                    <input type="text" class="form-control" name="accommodation_fee_value<?php echo $i; ?>" id="accommodation_fee_value<?php echo $i; ?>" value="<?php echo $budget->accommodation_fee_value; ?>" onchange="load_all_functions_budget(<?php echo json_encode($i); ?>)"value="" placeholder="Taxa de Colocação em Acomodação"/>
                                                </div>
                                                <div class="form-group">
                                                    <label>Taxa de Exames Obrigatórios</label>
                                                    <input type="text" class="form-control" name="exam_fee_value<?php echo $i; ?>" id="exam_fee_value<?php echo $i; ?>" value="<?php echo $budget->exam_fee_value; ?>" onchange="cload_all_functions_budget(<?php echo json_encode($i); ?>)"value="" placeholder="Taxa de Exames Obrigatórios"/>
                                                </div>
                                                <div class="form-group">
                                                    <label>Taxa de Serviços aos Estudantes</label>
                                                    <input type="text" class="form-control" name="student_service_fee_value<?php echo $i; ?>" id="student_service_fee_value<?php echo $i; ?>" value="<?php echo $budget->student_service_fee_value; ?>" onchange="load_all_functions_budget(<?php echo json_encode($i); ?>)"value="" placeholder="Taxa de Serviços aos Estudantes"/>
                                                </div>
                                                <div class="form-group">
                                                    <label>Taxa de Correio Expresso</label>
                                                    <input type="text" class="form-control" name="courier_fee_value<?php echo $i; ?>" id="courier_fee_value<?php echo $i; ?>" value="<?php echo $budget->courier_fee_value; ?>" onchange="load_all_functions_budget(<?php echo json_encode($i); ?>)"value="" placeholder="Taxa de Correio Expresso"/>
                                                </div>
                                                <div class="form-group">
                                                    <label>Traslado de Chegada</label>
                                                    <input type="text" class="form-control" name="airport_transfer_value<?php echo $i; ?>" id="airport_transfer_value<?php echo $i; ?>" value="<?php echo $budget->airport_transfer_value; ?>" onchange="load_all_functions_budget(<?php echo json_encode($i); ?>)"value="" placeholder="Traslado de Chegada"/>
                                                </div>
                                                <div class="form-group">
                                                    <label>Desconto no Valor Bruto das Taxas para Valor Líquido</label>
                                                    <input type="text" class="form-control" name="discount_fees_value<?php echo $i; ?>" id="discount_fees_value<?php echo $i; ?>" value="<?php echo $budget->discount_fees_value; ?>" onchange="load_all_functions_budget(<?php echo json_encode($i); ?>)"value="" placeholder="Desconto no Valor Bruto das Taxas para Valor Líquido"/>
                                                </div>
                                                <div class="form-group">
                                                    <label>Seguro Obrigatório</label>
                                                    <input type="text" class="form-control" name="required_insurance_value<?php echo $i; ?>" id="required_insurance_value<?php echo $i; ?>" value="<?php echo $budget->required_insurance_value; ?>" onchange="load_all_functions_budget(<?php echo json_encode($i); ?>)" value="" placeholder=""/>
                                                </div>
                                                <div class="form-group">
                                                    <label>Fator para o Cálculo do Lucro</label>
                                                    <input type="text" class="form-control" name="factor_profit<?php echo $i; ?>" id="factor_profit<?php echo $i; ?>" value="<?php echo $budget->factor_profit; ?>" onchange="load_all_functions_budget(<?php echo json_encode($i); ?>)"value="" placeholder="Fator para o Cálculo do Lucro"/>
                                                </div>
                                                <div class="form-group">
                                                        <label>Código Iata do Aeroporto de Chegada</label>
                                                        <select class="form-control" name="iata_arrival_at<?php echo $i; ?>" id="iata_arrival_at<?php echo $i; ?>" value="<?php echo $budget->iata_arrival_at; ?>" onchange="load_all_functions_budget(<?php echo json_encode($i); ?>)">
                                                            <option value=" & "></option>
                                                            <?php
                                                                  //mostra todas as durações de curso que estão no BD em forma de dropdown
                                                                foreach($flight as $array){
                                                                    //transforma o vetor php em string para enviar via javascript
                                                                    $flightrow=implode("&",$array);
                                                                        echo "
                                                                        <option value='".$flightrow."' >".$array["iata_arrival_at"]."</option>
                                                                        ";
                                                                    }   
                                                            ?>
                                                        </select>
                                                </div>
                                                <div class="form-group">
                                                    <label>Cost</label>
                                                    <input type="text" class="form-control" name="cost<?php echo $i; ?>" id="cost<?php echo $i; ?>" value="<?php echo $budget->cost; ?>" placeholder="Custo" readonly />
                                                </div>
                                                <div class="form-group">
                                                    <label>Price</label>
                                                    <input type="text" class="form-control" name="price<?php echo $i; ?>" value="<?php echo $budget->price; ?>" id="price<?php echo $i; ?>" placeholder="Preço" readonly />
                                                </div>
                                                <div class="form-group">
                                                    <label>Special Price</label>
                                                    <input type="text" class="form-control" name="special_price<?php echo $i; ?>" id="special_price<?php echo $i; ?>" value="<?php echo $budget->special_price; ?>" placeholder="Preço Especial" readonly />
                                                </div>
                                                <div class="form-group">
                                                    <label>Validade Preço Especial</label>
                                                    <input type="text" class="form-control" name="special_to_date<?php echo $i; ?>" id="special_to_date<?php echo $i; ?>" onload="alerta();" value="<?php echo $budget->special_to_date; ?>" placeholder="Validade Preço Especial"/>
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
    function load_console(){
        var i;
        var qtproducts= document.getElementById("qtproducts").value;
        for(i=1;i<=qtproducts;i++){
            load_all_functions_text(i);
            get_currency(i);
            load_all_functions_budget(i);
        }
    }
    //envia o formulário
    function submitform(){    
      document.form.submit();
    }
    //achama a função que carrega as informações do console
    load_console();
    
</script>