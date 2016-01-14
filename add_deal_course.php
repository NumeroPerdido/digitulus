<aside class="right-side">                
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
           Adicionar Orçamento
            <small></small>
        </h1>
        <br/>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Adicionar Orçamento</li>
        </ol>
    </section>
    <!-- Main content -->                            
    <section class="content">

        <div class="row">
            <div class="col-xs-12">
                <div class="box box-primary">
					<!-- COMEÇO DO FORM -->
                    <div class="box-header">
                        <h3 class="box-title">Adicionar Orçamento</h3>
                    </div><!-- /.box-header -->
                    <div class="box-body">
                        <form id="deal_course_form" method="POST" role="form" class="half-form" action="deal_course_information.php?page=add&opportunity_id=<?php echo $_GET['opportunity_id'];?>">
                            <div class="form-group">
                                <label>País</label>
                                <input type="text" class="form-control" id="country" name="country" placeholder="País" onfocus="active_autocomplete({id: this.id, target_field: 'country_pt', search_field: 'country_pt', table: 'digitulus_country_list', validate: 'true'});" />
                            </div>
                            <div class="form-group">
                                <label>Escola</label>
                                <input type="text" class="form-control" id="school" name="school" placeholder="Escola" onfocus="active_autocomplete({id: this.id, target_field: 'school', search_field: 'school', table: 'digitulus_deal_course'});"/>
                            </div>
                            <div class="form-group">
                                <label>Cidade</label>
                                <input type="text" class="form-control" id="city" name="city" placeholder="Cidade" onfocus="active_autocomplete({id: this.id, target_field: 'city', search_field: 'city', table: 'digitulus_deal_course'});"/>
                            </div>
                            <div class="form-group">
                                <label>Bairro</label>
                                <input type="text" class="form-control" id="neighbourhood" name="neighbourhood" placeholder="Bairro" onfocus="active_autocomplete({id: this.id, target_field: 'city', search_field: 'city', table: 'digitulus_deal_course'});" />
                            </div>
                            <div class="form-group">
                                <label>Curso</label>
                                <input type="text" class="form-control" id="course_name" name="course_name" placeholder="Curso" />
                            </div>
                            <div class="form-group">
                                <label>Aulas por Semana</label>
                                <input type="text" class="form-control" id="lessons_per_week" name="lessons_per_week" placeholder="Aulas por Semana" />
                            </div>
                            <div class="form-group">
                                <label>Duração da Aula</label>
                                <input type="text" class="form-control" id="lesson_duration" name="lesson_duration" placeholder="Duração da Aula" />
                            </div>
                            <div class="form-group">
                                <label>Data de Início</label>
                                <input type="text" class="form-control" id="start_date" name="start_date" placeholder="Data de Início" />
                            </div>
                            <div class="form-group">
                                <label>Duração do Curso</label>
                                <input type="text" class="form-control" id="duration" name="duration" placeholder="Duração do Curso" />
                            </div>
                            <div class="form-group">
                                <label>Data de Término</label>
                                <input type="text" class="form-control" id="finish_date" name="finish_date" placeholder="Data de Término" />
                            </div>
                            <div class="form-group">
                                <label>Código da Moeda</label>
                                <input type="text" class="form-control" id="currency_code" name="currency_code" placeholder="Código da Moeda" />
                            </div>
                            <div class="form-group">
                                <label>Taxa de Transferência Internacional</label>
                                <input type="text" class="form-control" id="banking_fee_value" name="banking_fee_value" placeholder="Taxa de Transferência Internacional" />
                            </div>
                            <div class="form-group">
                                <label>Taxa de Matrícula</label>
                                <input type="text" class="form-control" id="registration_fee_value" name="registration_fee_value" placeholder="Taxa de Matrícula" />
                            </div>
                            <div class="form-group">
                                <label>Valor do Curso</label>
                                <input type="text" class="form-control" id="course_value" name="course_value" placeholder="Valor do Curso" />
                            </div>
                            <div class="form-group">
                            <label>Taxa de Material</label>
                            <input type="text" class="form-control" id="material_fee_value" name="material_fee_value" placeholder="Taxa de Material" />
                            </div>
                            <div class="form-group">
                                <label>Outros Valores</label>
                                <input type="text" class="form-control" id="others_value" name="others_value" placeholder="Outros Valores" />
                            </div>
                            <div class="form-group">
                                <label>Tipo de Acomodação</label>
                                <input type="text" class="form-control" id="accommodation_type" name="accommodation_type" placeholder="Tipo de Acomodação" onfocus="active_autocomplete({id: this.id, target_field: 'accommodation_type', search_field: 'accommodation_type', table: 'digitulus_deal_course'});"/>
                            </div>
                            <div class="form-group">
                                <label>Quarto</label>
                                <input type="text" class="form-control" id="room" name="room" placeholder="Quarto" onfocus="active_autocomplete({id: this.id, target_field: 'room', search_field: 'room', table: 'digitulus_deal_course'});"/>
                            </div>
                            <div class="form-group">
                                <label>Refeições</label>
                                <input type="text" class="form-control" id="meals" name="meals" placeholder="Refeições" onfocus="active_autocomplete({id: this.id, target_field: 'meals', search_field: 'meals', table: 'digitulus_deal_course'});"/>
                            </div>
                            <div class="form-group">
                                <label>Data de Início da Acomodação</label>
                                <input type="text" class="form-control" id="accommodation_start_date" name="accommodation_start_date" placeholder="Data de Início da Acomodação" />
                            </div>
                            <div class="form-group">
                                <label>Duração da Acomodação</label>
                                <input type="text" class="form-control" id="accommodation_duration" name="accommodation_duration" placeholder="Duração da Acomodação" />
                            </div>
                            <div class="form-group">
                                <label>Data de Término da Acomodação</label>
                                <input type="text" class="form-control" id="accommodation_finish_date" name="accommodation_finish_date" placeholder="Data de Término da Acomodação" />
                            </div>
                            <div class="form-group">
                                <label>Taxa de Colocação em Acomodação</label>
                                <input type="text" class="form-control" id="accommodation_fee_value" name="accommodation_fee_value" placeholder="Taxa de Colocação em Acomodação" />
                            </div>
                            <div class="form-group">
                                <label>Valor da Acomodação</label>
                                <input type="text" class="form-control" id="accommodation_value" name="accommodation_value" placeholder="Valor da Acomodação" />
                            </div>
                            <div class="form-group">
                                <label>Valor do Seguro Obrigatório</label>
                                <input type="text" class="form-control" id="required_insurance_value" name="required_insurance_value" placeholder="Valor do Seguro Obrigatório" />
                            </div>
                            <div class="form-group">
                                <label>Valor do Traslado</label>
                                <input type="text" class="form-control" id="airport_transfer_value" name="airport_transfer_value" placeholder="Valor do Traslado" />
                            </div>
                            <div class="form-group">
                                <label>Noites Extra</label>
                                <input type="text" class="form-control" id="extra_nights" name="extra_nights" placeholder="Noites Extra" />
                            </div>
                            <div class="form-group">
                                <label>Data de Geração do Orçamento</label>
                                <input type="text" class="form-control" id="budget_date" name="budget_date" placeholder="Data de Geração do Orçamento" />
                            </div>
                            <div class="form-group">
                                <label>Valor Total</label>
                                <input type="text" class="form-control" id="total_value" name="total_value" placeholder="Valor Total" />
                            </div>
                            <div class="form-group">
                                <label>Data Prevista para a Quitação</label>
                                <input type="text" class="form-control" id="total_payment_date" name="total_payment_date" placeholder="Data Prevista para a Quitação" />
                            </div>
                
							<div class="form-group">
									<button class="btn btn-primary" id="submit_form" type="submit">Salvar</button>
                            </div>
                        </form>
                    </div>
					<!--FINAL DO FORM-->
                </div>				
            </div>
        </div>
    </section><!-- /.content -->
<script>
    //ativa o calandário
    $( "#start_date" ).datepicker($.datepicker.regional[ "pt-BR" ]);
    $( "#finish_date" ).datepicker($.datepicker.regional[ "pt-BR" ]);
    $( "#accommodation_start_date" ).datepicker($.datepicker.regional[ "pt-BR" ]);
    $( "#accommodation_finish_date" ).datepicker($.datepicker.regional[ "pt-BR" ]);
    $( "#budget_date" ).datepicker($.datepicker.regional[ "pt-BR" ]);
    $( "#budget_date" ).datepicker("setDate", "+0d");
    $( "#total_payment_date" ).datepicker($.datepicker.regional[ "pt-BR" ]);
    
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
        extra_field=arguments[0]["extra_field"],
        result;
        $.ajax({
            url:"ajax_db_return.php",
            dataType: "json",
            //faz com que a resposta do ajax seja sincrona
            async: false,
            data: {
                search_word: search_word,
                target_field: target_field,
                search_field: search_field,  
                table: table,
                extra_clause: extra_clause,
                extra_field: extra_field
            },
                success: function(data){
                    result=data[0]
                }
        });
        $('#'+id).val(result);
        return result;
    }
    
    //pega o currency code com base no país
    //pega o banking_fee_value com base na currency code
    $("#country").focusout(function() {
        var country_val=$("#country").val();
        var currency_code;
        ajax_db_return({id: "currency_code", search_word: country_val, target_field: "default_budget_currency_code", search_field: "country_pt", table: "digitulus_country_list"});
        currency_code=$("#currency_code").val();
        ajax_db_return({id: "banking_fee_value", search_word: currency_code, target_field: "banking_fee_value", search_field: "currency_code", table: "digitulus_currency"});
    });
    
    //pega o banking_fee_value com base na currency code
    $("#currency_code").change(function() {
        var currency_code=currency_code=$("#currency_code").val();
        ajax_db_return({id: "banking_fee_value", search_word: currency_code, target_field: "banking_fee_value", search_field: "currency_code", table: "digitulus_currency"});
    });
    
    //pega a taxa de matrícula com base no país e escola
    $("#country,#school").change(function() {
        var country,school;
        country=$("#country").val();
        school=$("#school").val();
        if(country!=null && school!=null){
            ajax_db_return({id: "registration_fee_value", search_word: country, target_field: "registration_fee_value", search_field: "country", extra_clause: school, extra_field: "school", table: "digitulus_deal_course"});   
        }
    });
    
    //calcula a data de término do curso
    $("#start_date,#duration").change(function() {
        var duration;
        var date2;
        duration=$("#duration").val();
        date2 = $("#start_date").datepicker("getDate");
        if(date2!=null && duration!=null){
            date2.setDate(date2.getDate()+(7*duration-3)); 
            $("#finish_date").datepicker("setDate", date2);
        }
     });

    //calcula da duração da acomodação
    $("#duration").change(function() {
        var duration=$("#duration").val();
        var acc_duration;
        if(duration!=""){
            switch(duration){
                case "1":
                    acc_duration=duration;
                    break;
                case "2":
                    acc_duration=duration;
                    break;
                case "3":
                    acc_duration=duration;
                    break;
                default:
                    acc_duration=4;
                    break;
            }
            $("#accommodation_duration").val(acc_duration);
        }
     });
    
    //calcula o data do término da acomodação
    $("#accommodation_start_date,#accommodation_duration").change(function() {
        var duration;
        var date2;
        duration=$("#accommodation_duration").val();
        date2 = $("#accommodation_start_date").datepicker("getDate");
        if(date2!=null && duration!=null){
            date2.setDate(date2.getDate()+(7*duration)); 
            $("#accommodation_finish_date").datepicker("setDate", date2);
        }
     });
    
    $("#start_date,#country").change(function() {
        var country;
        var date2;
        country=$("#country").val();
        date2 = $("#start_date").datepicker("getDate");
        if(date2!=null && country!=null){ 
            switch(country){
                case "Austrália":
                    date2.setDate(date2.getDate()-60);
                    break;
                case "Canadá":
                    date2.setDate(date2.getDate()-60);
                    break;
                default:
                    date2.setDate(date2.getDate()-45);
                    break;
            }
            $("#total_payment_date").datepicker("setDate", date2);
        }
     });
</script>