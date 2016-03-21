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
                                                    <div class="console-important" id="default_factor_profit<?php echo $i; ?>"></div>
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
                                                                    <input type="text" class="form-control" name="sku<?php echo $i; ?>" id="sku<?php echo $i; ?>" value="<?php echo $product->sku;?>" readonly/>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label>Nome do Produto</label>
                                                                    <input type="text" class="form-control" name="name<?php echo $i; ?>" id="name<?php echo $i; ?>"  id="name<?php echo $i; ?>" placeholder="Nome" onfocus="this.form.school<?php echo $i; ?>.focus()" value="<?php echo $product->name;?>" readonly />
                                                                </div>
                                                                <div class="form-group">
                                                                    <label>Escola</label>
                                                                    <input type="text" class="form-control" name="school<?php echo $i; ?>" id="school<?php echo $i; ?>" onfocus="active_autocomplete({id: this.id, target_field: 'school', search_field: 'school', table: 'digitulus_product'});" onchange="load_all_functions_text(<?php echo json_encode($i); ?>);" value="<?php echo $product->school;?>" placeholder="Escola" required/>
                                                                </div>
                                                            <div class="form-group">
                                                                <label>País</label>
                                                                <input type="text" class="form-control" name="country<?php echo $i; ?>" id="country<?php echo $i; ?>" onfocus="active_autocomplete({id: this.id, target_field: 'country_pt', search_field: 'country_pt', table: 'digitulus_country_list', validate: 'true'});" onchange="load_all_functions_text(<?php echo json_encode($i); ?>);get_currency(<?php echo json_encode($i); ?>);load_all_functions_budget(<?php echo json_encode($i); ?>)" value="<?php echo $product->country;?>" placeholder="País" />
                                                                </div>
                                                                <div class="form-group">
                                                                    <label>Cidade</label>
                                                                    <input type="text" class="form-control" name="city<?php echo $i; ?>" id="city<?php echo $i; ?>" onchange="load_all_functions_text(<?php echo json_encode($i); ?>);" onfocus="active_autocomplete({id: this.id, target_field: 'city', search_field: 'city', table: 'digitulus_product', extra_clause: country<?php echo json_encode($i); ?>.value, extra_field: 'country' });" value="<?php echo $product->city;?>" placeholder="Cidade"/>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label>Bairro</label>
                                                                    <input type="text" class="form-control" name="neighbourhood<?php echo $i; ?>" id="neighbourhood<?php echo $i; ?>" onchange="load_all_functions_text(<?php echo json_encode($i); ?>);" onfocus="active_autocomplete({id: this.id, target_field: 'neighbourhood', search_field: 'neighbourhood', table: 'digitulus_product'});" value="<?php echo $product->neighbourhood;?>" placeholder="Bairro"/>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label>Idioma</label>
                                                                    <input type="text" class="form-control" name="language<?php echo $i; ?>" id="language<?php echo $i; ?>" onchange="load_all_functions_text(<?php echo json_encode($i); ?>);"  onfocus="active_autocomplete({id: this.id, target_field: 'language', search_field: 'language', table: 'digitulus_product', extra_clause: country<?php echo json_encode($i); ?>.value, extra_field: 'country' });" value="<?php echo $product->language;?>" placeholder="Idioma"/>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label>Rótulo da Imagem</label>
                                                                    <input type="text" class="form-control" name="image_label<?php echo $i; ?>" id="image_label<?php echo $i; ?>" value="<?php echo $product->image_label;?>" placeholder="Rótulo da Imagem" readonly/>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label>Vídeo</label>
                                                                    <input type="text" class="form-control" name="videoid<?php echo $i; ?>" id="videoid<?php echo $i; ?>" value="<?php echo $product->video;?>" placeholder="Vídeo"/>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label>Descrição do Produto</label>
                                                                    <textarea class="form-control" name="description<?php echo $i; ?>" id="description<?php echo $i; ?>" rows="3" value="<?php echo $product->description;?>" placeholder="Descrição"></textarea>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label>Feriados</label>
                                                                    <input type="text" class="form-control" name="holidays<?php echo $i; ?>" id="holidays<?php echo $i; ?>" value="<?php echo $product->holidays;?>" placeholder="Feriados"/>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label>Datas de Início</label>
                                                                    <input type="text" class="form-control" name="start_dates<?php echo $i; ?>" id="start_dates<?php echo $i; ?>" value="<?php echo $product->start_dates;?>" placeholder="Datas de Início"/>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label>Aulas por Semana</label>
                                                                    <input type="text" class="form-control" name="lessons_per_week<?php echo $i; ?>" id="lessons_per_week<?php echo $i; ?>" value="<?php echo $product->lessons_per_week;?>" onfocus="active_autocomplete({id: this.id, target_field: 'lessons_per_week', search_field: 'lessons_per_week', table: 'digitulus_product'});" placeholder="Aulas por Semana"/>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label>Duração das Aulas</label>
                                                                    <input type="text" class="form-control" name="lesson_duration<?php echo $i; ?>" id="lesson_duration<?php echo $i; ?>" value="<?php echo $product->lesson_duration;?>" onfocus="active_autocomplete({id: this.id, target_field: 'lesson_duration', search_field: 'lesson_duration', table: 'digitulus_product'});" placeholder="Duração das Aulas"/>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label>Tipo de Acomodação</label>
                                                                    <input type="text" class="form-control" name="accommodation_type<?php echo $i; ?>" id="accommodation_type<?php echo $i; ?>" value="<?php echo $product->accommodation_type;?>" onchange="load_all_functions_text(<?php echo json_encode($i); ?>);" onfocus="active_autocomplete({id: this.id, target_field: 'accommodation_type', search_field: 'accommodation_type', table: 'digitulus_product'});" placeholder="Tipo de Acomodação"/>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label>Tipo de Quarto</label>
                                                                    <input type="text" class="form-control" name="room<?php echo $i; ?>" id="room<?php echo $i; ?>" onchange="load_all_functions_text(<?php echo json_encode($i); ?>);" value="<?php echo $product->room;?>" onfocus="active_autocomplete({id: this.id, target_field: 'room', search_field: 'room', table: 'digitulus_product'});" placeholder="Tipo de Quarto"/>
                                                                </div>

                                                                <div class="form-group">
                                                                    <label>Refeições</label>
                                                                    <input type="text" class="form-control" name="meals<?php echo $i; ?>" id="meals<?php echo $i; ?>" onchange="load_all_functions_text(<?php echo json_encode($i); ?>);" value="<?php echo $product->meals;?>" onfocus="active_autocomplete({id: this.id, target_field: 'meals', search_field: 'meals', table: 'digitulus_product'});" placeholder="Refeições"/>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label>Meta Descrição</label>
                                                                    <textarea class="form-control" name="meta_description<?php echo $i; ?>" id="meta_description<?php echo $i; ?>" rows="3" value="<?php echo $product->meta_description;?>" placeholder="Meta Descrição"></textarea>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label>Novo</label>
                                                                    <select class="form-control" name="new<?php echo $i; ?>" id="new<?php echo $i; ?>">
                                                                        <option value="Yes" selected="selected">Yes</option>
                                                                        <option value="No">No</option>
                                                                    </select>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label>Status</label>
                                                                    <select class="form-control" name="status<?php echo $i; ?>" id="status<?php echo $i; ?>">
                                                                        <option value="Enable" selected="selected">Ativo</option>
                                                                        <option value="Disable">Inativo</option>
                                                                    </select>
                                                                </div>
                                                                 <div class="form-group">
                                                                    <label>Descrição Curta</label>
                                                                    <textarea class="form-control" name="short_description<?php echo $i; ?>" id="short_description<?php echo $i; ?>" value="<?php echo $product->short_description;?>" rows="3" placeholder="Descrição Curta"></textarea>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label>URL</label>
                                                                    <input type="text" class="form-control" name="url_key<?php echo $i; ?>" id="url_key<?php echo $i; ?>" value="<?php echo $product->url_key;?>" placeholder="URL" readonly/>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label>Visibilidade</label>
                                                                    <select class="form-control" name="visibility<?php echo $i; ?>" id="visibility<?php echo $i; ?>">
                                                                        <option value="Yes" selected="selected">Sim</option>
                                                                        <option value="No">Não</option>
                                                                    </select>
                                                                </div>
                                                        </div><!-- /."col-xs-3  -->
                                                        <!-- Segunda Parte do Formulário -->
                                                        <div class="col-xs-4">
                                                            <div class="form-group">
                                                                <label>Moeda</label>
                                                                <input type="text" class="form-control" name="exchange_rate<?php echo $i; ?>" id="exchange_rate<?php echo $i; ?>" onchange="load_all_functions_budget(<?php echo json_encode($i); ?>)" onfocus="active_autocomplete({id: this.id, target_field: 'currency_code', search_field: 'currency_code', table: 'digitulus_currency'});" value="<?php echo $budget->currency_code;?>" placeholder="Moeda"/>
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Duração do Curso</label>
                                                                <input type="text" class="form-control" name="course_duration<?php echo $i; ?>" id="course_duration<?php echo $i; ?>" onchange="load_all_functions_text(<?php echo json_encode($i); ?>);load_all_functions_budget(<?php echo json_encode($i); ?>);get_duration_value(<?php echo json_encode($i); ?>);duplicate_duration(<?php echo json_encode($i); ?>)" onfocus="active_autocomplete({id: this.id, target_field: 'standard_travel_duration_name', search_field: 'standard_travel_duration_name', table: 'digitulus_duration', validate: 'true'});" value="<?php echo $product->course_duration;?>" placeholder="Duração do Curso"/>
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Valor Bruto do Curso por Semana</label>
                                                                <input type="text" class="form-control" name="course_gross_per_week<?php echo $i; ?>" id="course_gross_per_week<?php echo $i; ?>" value="<?php echo $budget->course_gross_per_week;?>" onfocus="show_calc(this.id);" onchange="load_all_functions_budget(<?php echo json_encode($i); ?>);" data-inputmask-alias="money" placeholder="Valor Bruto do Curso por Semana"/>
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Valor Promocional do Curso por Semana</label>
                                                                <input type="text" class="form-control" name="course_promo_per_week<?php echo $i; ?>" id="course_promo_per_week<?php echo $i; ?>" value="<?php echo $budget->course_promo_per_week;?>" onfocus="show_calc(this.id);" onchange="load_all_functions_budget(<?php echo json_encode($i); ?>)" data-inputmask-alias="money" placeholder="Valor Promocional do Curso por Semana"/>
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Comissão sobre o Curso (%)</label>
                                                                <input type="text" class="form-control" name="course_commission<?php echo $i; ?>" id="course_commission<?php echo $i; ?>" value="<?php echo $budget->course_commission;?>" onchange="load_all_functions_budget(<?php echo json_encode($i); ?>)" data-inputmask-alias="percentage" placeholder="Comissão sobre o Curso (%)"/>
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Duração da Acomodação</label>
                                                                <input type="text" class="form-control" name="accommodation_duration<?php echo $i; ?>" id="accommodation_duration<?php echo $i; ?>" value="<?php echo $product->accommodation_duration;?>" onchange="load_all_functions_budget(<?php echo json_encode($i); ?>);get_accommodation_duration_value(<?php echo json_encode($i); ?>);" onfocus="active_autocomplete({id: this.id, target_field: 'standard_travel_duration_name', search_field: 'standard_travel_duration_name', table: 'digitulus_duration', validate: 'true'});" placeholder="Duração da Acomodação"/>
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Valor Bruto da Acomodação por Semana</label>
                                                                <input type="text" class="form-control" name="accommodation_per_week<?php echo $i; ?>" id="accommodation_per_week<?php echo $i; ?>" value="<?php echo $budget->course_commission;?>" onfocus="show_calc(this.id);" onchange="load_all_functions_budget(<?php echo json_encode($i); ?>)" data-inputmask-alias="money" placeholder="Valor Bruto da Acomodação por Semana"/>
                                                            </div>
                                                            <div class="form-group">
                                                                    <label>Desconto do Valor Bruto da Acomodação para o Valor Promocional</label>
                                                                    <input type="text" class="form-control" name="discount_accommodation<?php echo $i; ?>" id="discount_accommodation<?php echo $i; ?>" value="<?php echo $budget->discount_accommodation;?>" onfocus="show_calc(this.id);" onchange="load_all_functions_budget(<?php echo json_encode($i); ?>)" data-inputmask-alias="money" placeholder="Desconto do Valor Bruto da Acomodação para o Valor Promocional"/>
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Comissão sobre a Acomodação (%)</label>
                                                                <input type="text" class="form-control" name="accommodation_commission<?php echo $i; ?>" id="accommodation_commission<?php echo $i; ?>" value="<?php echo $budget->accommodation_commission;?>" onchange="load_all_functions_budget(<?php echo json_encode($i); ?>)" data-inputmask-alias="percentage" placeholder="Comissão sobre a Acomodação (%)"/>
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Taxa de Material</label>
                                                                <input type="text" class="form-control" name="material_fee_value<?php echo $i; ?>" id="material_fee_value<?php echo $i; ?>" value="<?php echo $budget->material_fee_value;?>" onfocus="show_calc(this.id);" onchange="load_all_functions_budget(<?php echo json_encode($i); ?>)" data-inputmask-alias="money" placeholder="Taxa de Material"/>
                                                            </div>
                                                            <div class="form-group">
                                                                    <label>Taxa de Matrícula</label>
                                                                    <input type="text" class="form-control" name="registration_fee_value<?php echo $i; ?>" id="registration_fee_value<?php echo $i; ?>" value="<?php echo $budget->registration_fee_value;?>" onchange="load_all_functions_budget(<?php echo json_encode($i); ?>)" data-inputmask-alias="money" placeholder="Taxa de Matrícula"/>
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Taxa de Colocação em Acomodação</label>
                                                                <input type="text" class="form-control" name="accommodation_fee_value<?php echo $i; ?>" id="accommodation_fee_value<?php echo $i; ?>" value="<?php echo $budget->accommodation_fee_value;?>" onchange="load_all_functions_budget(<?php echo json_encode($i); ?>)" data-inputmask-alias="money" placeholder="Taxa de Colocação em Acomodação"/>
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Taxa de Exames Obrigatórios</label>
                                                                <input type="text" class="form-control" name="exam_fee_value<?php echo $i; ?>" id="exam_fee_value<?php echo $i; ?>" value="<?php echo $budget->exam_fee_value;?>" onchange="load_all_functions_budget(<?php echo json_encode($i); ?>)" data-inputmask-alias="money" placeholder="Taxa de Exames Obrigatórios"/>
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Taxa de Serviços aos Estudantes</label>
                                                                <input type="text" class="form-control" name="student_service_fee_value<?php echo $i; ?>" id="student_service_fee_value<?php echo $i; ?>" value="<?php echo $budget->student_service_fee_value;?>" onfocus="show_calc(this.id);" onchange="load_all_functions_budget(<?php echo json_encode($i); ?>)" data-inputmask-alias="money" placeholder="Taxa de Serviços aos Estudantes"/>
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Taxa de Correio Expresso</label>
                                                                <input type="text" class="form-control" name="courier_fee_value<?php echo $i; ?>" id="courier_fee_value<?php echo $i; ?>" value="<?php echo $budget->courier_fee_value;?>" onchange="load_all_functions_budget(<?php echo json_encode($i); ?>)" data-inputmask-alias="money" placeholder="Taxa de Correio Expresso"/>
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Traslado de Chegada</label>
                                                                <input type="text" class="form-control" name="airport_transfer_value<?php echo $i; ?>" id="airport_transfer_value<?php echo $i; ?>" value="<?php echo $budget->airport_transfer_value;?>" onchange="load_all_functions_budget(<?php echo json_encode($i); ?>)" data-inputmask-alias="money" placeholder="Traslado de Chegada"/>
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Desconto no Valor Bruto das Taxas para Valor Líquido</label>
                                                                <input type="text" class="form-control" name="discount_fees_value<?php echo $i; ?>" id="discount_fees_value<?php echo $i; ?>" value="<?php echo $budget->discount_fees_value;?>" onfocus="show_calc(this.id);" onchange="load_all_functions_budget(<?php echo json_encode($i); ?>)" data-inputmask-alias="money" placeholder="Desconto no Valor Bruto das Taxas para Valor Líquido"/>
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Seguro Obrigatório</label>
                                                                <input type="text" class="form-control" name="required_insurance_value<?php echo $i; ?>" id="required_insurance_value<?php echo $i; ?>" value="<?php echo $budget->required_insurance_value;?>" onfocus="show_calc(this.id);" onchange="load_all_functions_budget(<?php echo json_encode($i); ?>)" data-inputmask-alias="money" placeholder="Seguro Obrigatório"/>
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Fator para o Cálculo do Lucro</label>
                                                                <input type="text" class="form-control" name="factor_profit<?php echo $i; ?>" id="factor_profit<?php echo $i; ?>" value="<?php echo $budget->factor_profit;?>" onchange="load_all_functions_budget(<?php echo json_encode($i); ?>)" data-inputmask-alias="integer" placeholder="Fator para o Cálculo do Lucro"/>
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Custo (R$)</label>
                                                                <input type="text" class="form-control" name="cost<?php echo $i; ?>" id="cost<?php echo $i; ?>" value="<?php echo $budget->cost;?>" onfocus="this.form.special_to_date<?php echo $i; ?>.focus()" data-inputmask-alias="BRL" placeholder="Custo (R$)" readonly />
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Preço (R$)</label>
                                                                <input type="text" class="form-control" name="price<?php echo $i; ?>" id="price<?php echo $i; ?>" value="<?php echo $budget->price;?>" onfocus="this.form.special_to_date<?php echo $i; ?>.focus()" data-inputmask-alias="BRL" placeholder="Preço (R$)" readonly />
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Preço Especial (R$)</label>
                                                                <input type="text" class="form-control" name="special_price<?php echo $i; ?>" id="special_price<?php echo $i; ?>" value="<?php echo $budget->special_price;?>" onfocus="this.form.special_to_date<?php echo $i; ?>.focus()" data-inputmask-alias="BRL" placeholder="Preço Especial (R$)" readonly />
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Data Final da Validade do Preço Especial</label>
                                                                <input type="text" class="form-control" name="special_to_date<?php echo $i; ?>" id="special_to_date<?php echo $i; ?>" value="<?php echo $budget->special_to_date;?>" placeholder="Data Final da Validade do Preço Especial"/>
                                                            </div>
                                                            
                                                                
                                                           <div class="form-group">
                                                                <label>Endereço</label>
                                                                <input type="text" size=60px  name="txtEndereco<?php echo $i; ?>" id="txtEndereco" placeholder="Endereço da Escola" class="geocomplete" class="form-control"/>
                                                               </div>
                                                               
                                                            <div class="form-group">
                                                                <label>Latitude</label>
                                                                <input type="text" class="form-control" name="latitude<?php echo $i; ?>" value="<?php echo $product->latitude;?>" id="txtLatitude" placeholder="Latitude"/>
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Longitude</label>
                                                                <input type="text" class="form-control" name="longitude<?php echo $i; ?>" value="<?php echo $budget->longitude;?>" id="txtLongitude" placeholder="Longitude"/>
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