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
                            <div class="row">
                                <div class="col-xs-4">
                                    <h4 class="box-title text-yellow">Informações do Curso</h4>
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
                                        <input type="text" class="form-control" id="course_name" name="course_name" placeholder="Curso" onfocus="active_autocomplete({id: this.id, target_field: 'course_name', search_field: 'course_name', table: 'digitulus_deal_course'});" />
                                    </div>
                                    <div class="form-group">
                                        <label>Aulas por Semana</label>
                                        <input type="text" class="form-control" id="lessons_per_week" name="lessons_per_week" placeholder="Aulas por Semana" data-inputmask-alias="integer" />
                                    </div>
                                    <div class="form-group">
                                        <label>Duração da Aula</label>
                                        <input type="text" class="form-control" id="lesson_duration" name="lesson_duration" placeholder="Duração da Aula" data-inputmask-alias="integer" />
                                    </div>
                                    <div class="form-group">
                                        <label>Data de Início <span style="color:#f76504;" id="label_start_date"></span></label>
                                        <input type="text" class="form-control" id="start_date" name="start_date" placeholder="Data de Início" />
                                    </div>
                                    <div class="form-group">
                                        <label>Duração do Curso</label>
                                        <input type="text" class="form-control" id="duration" name="duration" placeholder="Duração do Curso" data-inputmask-alias="integer" />
                                    </div>
                                    <div class="form-group">
                                        <label>Data de Término <span style="color:#f76504;" id="label_finish_date"></span></label>
                                        <input type="text" class="form-control" id="finish_date" name="finish_date" placeholder="Data de Término" />
                                    </div>
                                    <div class="form-group">
                                        <label>Nome da Moeda</label>
                                        <input type="text" class="form-control" id="currency_name" name="currency_name" onfocus="active_autocomplete({id: this.id, target_field: 'currency_name', search_field: 'currency_name', table: 'digitulus_currency', validate: 'true'});" placeholder="Nome da Moeda" />
                                    </div>
                                    <div class="form-group">
                                        <label>Taxa de Transferência Internacional</label>
                                        <input type="text" class="form-control" id="banking_fee_value" name="banking_fee_value" placeholder="Taxa de Transferência Internacional" data-inputmask-alias="money"/>
                                    </div>
                                    <div class="form-group">
                                        <label>Taxa de Matrícula</label>
                                        <input type="text" class="form-control" id="registration_fee_value" name="registration_fee_value" placeholder="Taxa de Matrícula" data-inputmask-alias="money" />
                                    </div>
                                    <div class="form-group">
                                        <label>Valor do Curso</label>
                                        <input type="text" class="form-control" id="course_value" name="course_value" placeholder="Valor do Curso" data-inputmask-alias="money" />
                                    </div>
                                    <div class="form-group">
                                        <label>Data de Geração do Orçamento</label>
                                        <input type="text" class="form-control" id="deal_date" name="deal_date" placeholder="Data de Geração do Orçamento" />
                                    </div>
                                    <div class="form-group">
                                        <label>Valor Total</label>
                                        <input type="text" class="form-control" id="opportunity_total_value" name="opportunity_total_value" placeholder="Valor Total" data-inputmask-alias="money" />
                                    </div>
                                    <div class="form-group">
                                        <label>Data Prevista para a Quitação <span style="color:#f76504;" id="label_opportunity_total_inflow_date"></span></label>
                                        <input type="text" class="form-control" id="opportunity_total_inflow_date" name="opportunity_total_inflow_date" placeholder="Data Prevista para a Quitação" />
                                    </div>
                                </div>
                                <div class="col-xs-4">
                                    <h4 class="box-title text-yellow">Informações da Acomodação</h4>
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
                                        <label>Data de Início da Acomodação <span style="color:#f76504;" id="label_accommodation_start_date"></span></label>
                                        <input type="text" class="form-control" id="accommodation_start_date" name="accommodation_start_date" placeholder="Data de Início da Acomodação" />
                                    </div>
                                    <div class="form-group">
                                        <label>Duração da Acomodação</label>
                                        <input type="text" class="form-control" id="accommodation_duration" name="accommodation_duration" placeholder="Duração da Acomodação" data-inputmask-alias="integer" />
                                    </div>
                                    <div class="form-group">
                                        <label>Data de Término da Acomodação <span style="color:#f76504;" id="label_accommodation_finish_date"></span></label>
                                        <input type="text" class="form-control" id="accommodation_finish_date" name="accommodation_finish_date" placeholder="Data de Término da Acomodação" />
                                    </div>
                                    <div class="form-group">
                                        <label>Taxa de Colocação em Acomodação</label>
                                        <input type="text" class="form-control" id="accommodation_fee_value" name="accommodation_fee_value" placeholder="Taxa de Colocação em Acomodação" data-inputmask-alias="money" />
                                    </div>
                                    <div class="form-group">
                                        <label>Valor da Acomodação</label>
                                        <input type="text" class="form-control" id="accommodation_value" name="accommodation_value" placeholder="Valor da Acomodação" data-inputmask-alias="money" />
                                    </div>
                                    <h4 class="box-title text-yellow">Informações Extras</h4>
                                    <div class="form-group">
                                        <label>Taxa de Material</label>
                                        <input type="text" class="form-control" id="material_fee_value" name="material_fee_value" placeholder="Taxa de Material" data-inputmask-alias="money" />
                                    </div>
                                    <div class="form-group">
                                        <label>Outros Valores</label>
                                        <input type="text" class="form-control" id="others_value" name="others_value" placeholder="Outros Valores" data-inputmask-alias="money" />
                                    </div>
                                    <div class="form-group">
                                        <label>Descrição Outros Valores</label>
                                        <input type="text" class="form-control" id="others_value_description" name="others_value_description" placeholder="Descrição Outros Valores" />
                                    </div>
                                    <div class="form-group">
                                        <label>Valor do Seguro Obrigatório</label>
                                        <input type="text" class="form-control" id="required_insurance_value" name="required_insurance_value" placeholder="Valor do Seguro Obrigatório" data-inputmask-alias="money" />
                                    </div>
                                    <div class="form-group">
                                        <label>Valor do Traslado</label>
                                        <input type="text" class="form-control" id="airport_transfer_value" name="airport_transfer_value" placeholder="Valor do Traslado" data-inputmask-alias="money" />
                                    </div>
                                    <div class="form-group">
                                        <label>Número de Noites Extra</label>
                                        <input type="text" class="form-control" id="extra_night" name="extra_night" placeholder="Noites Extra" data-inputmask-alias="integer" />
                                    </div>
                                    <div class="form-group">
                                        <label>Valor Noites Extra</label>
                                        <input type="text" class="form-control" id="extra_night_value" name="extra_night_value" placeholder="Valor Noites Extra" data-inputmask-alias="money" />
                                    </div>
                                    <h4 class="box-title">Sub-Total do Curso = <label class="text-green" id="subt_course"></label></h4>
                                    <h4 class="box-title">Sub-Total da Acomodação = <label class="text-green" id="subt_accommodation"></label></h4>
                                    <h4 class="box-title">Sub-Total da Extras = <label class="text-green" id="subt_extra"></label></h4>
                                    <h4 class="box-title">TOTAL = <label class="text-green" id="total"></label></h4>
                                </div>
                            </div>
							<div class="form-group">
									<button class="btn btn-primary" id="submit_form" type="submit">Salvar e Gerar Contrato</button>
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
    $( "#deal_date" ).datepicker($.datepicker.regional[ "pt-BR" ]);
    $( "#deal_date" ).datepicker("setDate", "+0d");
    $( "#opportunity_total_inflow_date" ).datepicker($.datepicker.regional[ "pt-BR" ]);
    
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
        currency_code=ajax_db_return({id: "currency_code", search_word: country_val, target_field: "default_budget_currency_code", search_field: "country_pt", table: "digitulus_country_list"});
        ajax_db_return({id: "currency_name", search_word: currency_code, target_field: "currency_name", search_field: "currency_code", table: "digitulus_currency"});
        ajax_db_return({id: "banking_fee_value", search_word: currency_code, target_field: "banking_fee_value", search_field: "currency_code", table: "digitulus_currency"});
        apply_mask();
    });
    
    //pega o banking_fee_value com base na currency code
    $("#currency_name").change(function() {
        var currency_name=$("#currency_name").val();
        var totalval;
        var result=ajax_db_return({id: "banking_fee_value", search_word: currency_name, target_field: "banking_fee_value", search_field: "currency_name", table: "digitulus_currency"});
        if(result!=null){
            apply_mask();
        }
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
    $("#duration,#start_date").change(function() {
        var duration;
        var date2;
        duration=$("#duration").val();
        date2 = $("#start_date").datepicker("getDate");
        if(date2!=null && duration!=null){
            date2.setDate(date2.getDate()+(7*duration-3));
            $("#finish_date").datepicker("setDate", date2);
            get_day_name("start_date");
            get_day_name("finish_date");
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
            get_day_name("accommodation_start_date");
            get_day_name("accommodation_finish_date");
        }
     });
    
    //calcula a data de quitação do pagamento usando o start_date e o country
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
            $("#opportunity_total_inflow_date").datepicker("setDate", date2);
            get_day_name("opportunity_total_inflow_date");
        }
     });

    //calcula valor total
    $("#duration,#country,#banking_fee_value,#registration_fee_value,#material_fee_value,#course_value,#others_value,#accommodation_fee_value,#accommodation_value,#accommodation_duration,#required_insurance_value,#airport_transfer_value,#extra_night_value,#extra_night").change(function(){
        var subt_course=Number($("#banking_fee_value").inputmask('unmaskedvalue'))+Number($("#registration_fee_value").inputmask('unmaskedvalue'))+(Number($("#course_value").inputmask('unmaskedvalue'))*Number($("#duration").inputmask('unmaskedvalue')))+Number($("#material_fee_value").inputmask('unmaskedvalue'))+Number($("#required_insurance_value").inputmask('unmaskedvalue'));
        var subt_accommodation=Number($("#accommodation_fee_value").inputmask('unmaskedvalue'))+(Number($("#accommodation_value").inputmask('unmaskedvalue'))*Number($("#accommodation_duration").inputmask('unmaskedvalue')))+(Number($("#extra_night_value").inputmask('unmaskedvalue'))*Number($("#extra_night").inputmask('unmaskedvalue')));
        var subt_extra=Number($("#airport_transfer_value").inputmask('unmaskedvalue'))+Number($("#others_value").inputmask('unmaskedvalue'));
        var totalval=subt_course+subt_accommodation+subt_extra;
        var currency_name=$("#currency_name").val();
        //simbolo da moeda
        var exhibition_symbol=ajax_db_return({id: "", search_word: currency_name, target_field: "exhibition_symbol", search_field: "currency_name", table: "digitulus_currency"});
        $("#subt_course").html(exhibition_symbol+subt_course);
        $("#subt_accommodation").html(exhibition_symbol+subt_accommodation);
        $("#subt_extra").html(exhibition_symbol+subt_extra);
        $("#total").html(exhibition_symbol+totalval);
        $("#opportunity_total_value").val(totalval);
    });

    function get_day_name(label){
        var date,day;
        var weekday = new Array();
        weekday[0] = "Domingo";
        weekday[1] = "Segunda-Feira";
        weekday[2] = "Terça-Feira";
        weekday[3] = "Quarta-Feira";
        weekday[4] = "Quinta-Feira";
        weekday[5] = "Sexta-Feira";
        weekday[6] = "Sábado";
        date = $("#"+label).datepicker("getDate");
        day=date.getUTCDay();
        $("#label_"+label).empty();
        $("#label_"+label).append(weekday[day]);
    }

function apply_mask(){
    //percore todos os inputs do formulário com id="form"
    $("form#deal_course_form :input").each(function(){
        //pega o valor do atributo data-inputmask-alias
        var alias = $(this).attr("data-inputmask-alias");
        //pega o valor do atributo id
        var id_input =  $(this).attr("id");

        var currency_name=$("#currency_name").val();
        if(currency_name==""){
            currency_name="Dólar Americano";
        }
        //simbolo da moeda
        var exhibition_symbol=ajax_db_return({id: "", search_word: currency_name, target_field: "exhibition_symbol", search_field: "currency_name", table: "digitulus_currency"});

        //aplica a máscara somente se o input tiver o atributo data-inputmask-alias e ele for diferente de vazio
        if(alias!=null && alias!=""){
            //casa seja uma mascara de nome, usa o exhibition_symbol da moeda selecionada como symbolo
            if(alias=="money"){
                $("#"+id_input).inputmask({ 
                    prefix: exhibition_symbol+" ",
                    groupSeparator: "",
                    alias: "numeric",
                    placeholder: "0",
                    autoGroup: false,
                    digits: 2,
                    digitsOptional: false,
                    clearMaskOnLostFocus: false,
                    removeMaskOnSubmit: true,
                });
            }
            else{
                $("#"+id_input).inputmask({alias:alias});
            }
        }
    });
}
apply_mask();
</script>