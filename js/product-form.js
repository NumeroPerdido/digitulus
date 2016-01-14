
//**************************************************
//***************FUNÇÕES DE TEXTO*******************
//**************************************************
//função que copia os valores de todos os campos da primeira tab e passa para as outras tabs
function duplicate(i) {
    //ids dos campos do formulário
    var fields=["school","country","city","neighbourhood","language","image_label","videoid","description","holidays","start_dates","lessons_per_week","lesson_duration","accommodation_type","room","meals","status","visibility","exchange_rate","course_commission","accommodation_per_week","discount_accommodation","accommodation_commission","material_fee_value","accommodation_fee_value","exam_fee_value","student_service_fee_value","courier_fee_value","airport_transfer_value","discount_fees_value"],
        j,
        field_value,
        original_value;
    for(j=0;j<fields.length;j++){
        //recebe o campo que será alterado, se estiver vazio recebe o valor do campo na tab1
        field_value= document.getElementById(fields[j]+i).value;
        if(!field_value){
            //valor do campo na tab1
//            original_value = document.getElementById(fields[j]+1).value;
            original_value = $("#"+fields[j]+1).inputmask('unmaskedvalue');
            //campo j da tab i
            document.getElementById(fields[j]+i).value = original_value;
        }
    }
}
//função que gera nome a partir dos campos language, city, school e course duration
function create_name(i){
    var name;
    var duration;
    var neighbourhood="";
    //se o informou o neighbourhood, adiciona ele ao nome
    if(document.getElementById("neighbourhood"+i).value!=""){
        neighbourhood=" - "+document.getElementById("neighbourhood"+i).value;
    }
    duration=get_duration_name(i);
    name="Estudar "+document.getElementById("language"+i).value+" em "+document.getElementById("city"+i).value+" - "+document.getElementById("school"+i).value+neighbourhood+" - "+duration;
    document.getElementById("name"+i).value = name;
}
//função que gera url a partir dos campos language, city, school e course duration
function create_url(i){
    var url,duration;
    var neighbourhood="";
    //se o informou o neighbourhood, adiciona ele a url 
    if(document.getElementById("neighbourhood"+i).value!=""){
        neighbourhood="-"+document.getElementById("neighbourhood"+i).value;
    }
    duration=get_duration_name(i);
    url="curso-"+document.getElementById("language"+i).value+"-"+document.getElementById("city"+i).value+"-"+document.getElementById("school"+i).value+neighbourhood+"-"+duration;
    url=format_url(url);
    document.getElementById("url_key"+i).value = url;
}
//função que gera o short description
function create_short_description(i){
    var short_description,duration,language,school,city,country,accommodation_duration,accommodation_type,room,meals,airport_transfer_value,traslado,material,registration,required_insurance_value;
    duration=get_duration_name(i);
    language=document.getElementById("language"+i).value;
    school=document.getElementById("school"+i).value;
    city=document.getElementById("city"+i).value;
    country=get_country_name(i);
    if(accommo_duration["accommodation_duration_value"]==1){
        accommodation_duration=accommo_duration["accommodation_duration_value"]+" semana";
    }
    else{
        accommodation_duration=accommo_duration["accommodation_duration_value"]+" semanas";
    }
    accommodation_type=document.getElementById("accommodation_type"+i).value;
    room=document.getElementById("room"+i).value;
    meals=document.getElementById("meals"+i).value;
    //verifica se tem taxa de aeroporto
    airport_transfer_value=document.getElementById("airport_transfer_value"+i).value;
    if(airport_transfer_value>0){
        traslado="traslado + ";    
    }
    else{
        traslado="";
    }
    //verifica se tem taxa de material
    if(document.getElementById("material_fee_value"+i).value>0){
        material="+ material";    
    }
    else{
        material="";
    }
    //verifica se tem taxa de registro
    if(document.getElementById("registration_fee_value"+i).value>0){
        registration="+ taxa ";    
    }
    else{
        registration="";
    }
    //verifica se tem seguro obrigatório
    if(document.getElementById("required_insurance_value"+i).value>0){
        required_insurance_value="+ Seguro Gov. Obrigatório ";    
    }
    else{
        required_insurance_value="";
    }
    var neighbourhood="";
    //se o informou o neighbourhood, adiciona ele ao shortdescription
    if(document.getElementById("neighbourhood"+i).value!=""){
        neighbourhood=" - "+document.getElementById("neighbourhood"+i).value;
    }
    //Exemplo:Compre 1 Mês de curso de inglês na escola Wimbledon School of English, Londres, Inglaterra + 4 semanas de estadia em Casa de Família, quarto Individual + sem refeição + Cobertura Médica ILIMITADA + impostos + taxa + material
    short_description="Compre "+duration+" de curso de "+language+" na escola "+school+neighbourhood+", "+city+", "+country+" + "+accommodation_duration+" de estadia em "+accommodation_type+", quarto "+room+" + "+meals+" + Cobertura Médica ILIMITADA "+required_insurance_value+"+ "+traslado+"impostos "+registration+material;
    //joga o short description no campo
    document.getElementById("short_description"+i).value=short_description;
}

//função que gera o meta description
function create_meta_description(i){
    var meta_description,duration,language,school,city,country,accommodation_type;
    duration=get_duration_name(i);
    language=document.getElementById("language"+i).value;
    school=document.getElementById("school"+i).value;
    city=document.getElementById("city"+i).value;
    country=get_country_name(i);
    accommodation_type=document.getElementById("accommodation_type"+i).value;
    var neighbourhood="";
    //se o informou o neighbourhood, adiciona ele ao metadescription
    if(document.getElementById("neighbourhood"+i).value!=""){
        neighbourhood=" - "+document.getElementById("neighbourhood"+i).value;
    }
    //Exemplo: Compre 3 Meses de curso de inglês na escola Talk, San Francisco, Estados Unidos em Residência Estudantil
    meta_description="Compre "+duration+" de curso de "+language+" na escola "+school+neighbourhood+", "+city+", "+country+" em "+accommodation_type;
    //joga o meta description no campo
    document.getElementById("meta_description"+i).value=meta_description;
}

//função que gera o Image label
function create_image_label(i){
    var image_label;
    var neighbourhood="";
    var country=get_country_name(i);
    //se o informou o neighbourhood, adiciona ele ao label
    if(document.getElementById("neighbourhood"+i).value!=""){
        neighbourhood=" "+document.getElementById("neighbourhood"+i).value;
    }
    //Exemplo:Zoni Language Jackson Heights Nova York Estados Unidos
    image_label=document.getElementById("school"+i).value+neighbourhood+" "+document.getElementById("city"+i).value+" "+country;
    //joga o novo label gerado no campo
    document.getElementById("image_label"+i).value = image_label;
    //se os campos principais que constituem o label foram preenchidos então serão carregados os campos video, descriptions, holidays e datas de inicio com base no label
    if(document.getElementById("school"+i).value!="" && document.getElementById("city"+i).value!="" && country!=""){
        ajax_db_return({id: "videoid"+i, search_word: image_label, target_field: "videoid", search_field: "image_label", table: "digitulus_product"});
        ajax_db_return({id: "description"+i, search_word: image_label, target_field: "description", search_field: "image_label", table: "digitulus_product"});
        ajax_db_return({id: "holidays"+i, search_word: image_label, target_field: "holidays", search_field: "image_label", table: "digitulus_product"});
        ajax_db_return({id: "start_dates"+i, search_word: image_label, target_field: "start_dates", search_field: "image_label", table: "digitulus_product"});
    }
}

//pega o texto da duração no select
function get_duration_name(i){
//    var duration,duration_input;
//    var country_name=get_country_name(i);
//    duration_input=document.getElementById("course_duration"+i).value;
//    if(duration_input!=""){
//        duration=ajax_db_return({search_word: duration_input, target_field: "*", search_field: "standard_travel_duration_name", table: "digitulus_duration"});
//        switch(country_name){
//            //se país for australia retorna australia_travel_duration_name    
//            case "Austrália":
//                return duration["australia_travel_duration_name"];
//                break;
//            //se país for irlanda retorna irland_travel_duration_name
//            case "Irlanda":
//                return duration["ireland_travel_duration_name"];
//                break;
//            // se nao for nenhum dos dois retorna standard_travel_duration_name
//            default:
//                return duration["standard_travel_duration_name"];
//                break;
//        }
//    }
//    else{
//        return "";
//    }
    return document.getElementById("course_duration"+i).value;
}
//pega o valor da duração em semanas no select
function get_duration_value(i){
    var duration,duration_input;
    duration_input=get_duration_name(i);
    duration=ajax_db_return({search_word: duration_input, target_field: "standard_travel_duration", search_field: "standard_travel_duration_name", table: "digitulus_duration"});
    course_duration["standard_travel_duration"]=duration;
}

function get_duration_insurance_value(i){
    var duration_insurance,duration;
    var country_name=get_country_name(i);
    duration=document.getElementById("course_duration"+i).value;
    if(duration!=""){
        duration_insurance=ajax_db_return({search_word: duration, target_field: "*", search_field: "standard_travel_duration_name", table: "digitulus_duration"});;
        switch(country_name){
            //se país for australia retorna australia_travel_duration    
            case "Austrália":
                return duration_insurance["australia_travel_duration"];
                break;
            // pro resto do mundo retorna standard_travel_duration
            default:
                return duration_insurance["standard_travel_duration"];
                break;
        }
    }
    else{
        return "";
    }
}
//joga o valor do course duration no accommodation duration, caso o course duration seja menor de 4 semanas.
//se for maior que 4 semanas jogará sempre 4 semanas
function duplicate_duration(i){
    var duration_course, accommodation_duration;
    duration_course=get_duration_name(i);
    switch(duration_course){
        case "1 Semana":
            accommodation_duration=duration_course;
            break;
        case "2 Semanas":
            accommodation_duration=duration_course;
            break;
        case "3 Semanas":
            accommodation_duration=duration_course;
            break;
        default:
            accommodation_duration="4 Semanas";
            break;
    }
    document.getElementById("accommodation_duration"+i).value=accommodation_duration;
    get_accommodation_duration_value(i);
}

//pega o valor da duração da acomodação em semanas no select
function get_accommodation_duration_value(i){
    var accommodation_duration,duration_input;
    duration_input=document.getElementById("accommodation_duration"+i).value;
    accommodation_duration=ajax_db_return({search_word: duration_input, target_field: "standard_travel_duration", search_field: "standard_travel_duration_name", table: "digitulus_duration"});
    accommo_duration["accommodation_duration_value"]=accommodation_duration;
}
//pega no nome do país
function get_country_name(i){
  return document.getElementById("country"+i).value;
}
function get_default_budget_currency_code(i){
    var j,country_name,default_budget_currency_code;
    country_name=get_country_name(i);
    
    default_budget_currency_code=ajax_db_return({search_word: country_name, target_field: "default_budget_currency_code", search_field: "country_pt", table: "digitulus_country_list"});
    
    if(default_budget_currency_code==undefined){
        default_budget_currency_code="";
    }
    return default_budget_currency_code;
}
//formata a url
function format_url(url){
    url=url.toLowerCase();
    url=removerAcentos(url);
    url=url.replace(/ e /g,"-");
    url=url.replace(/ de /g,"-");
    url=url.replace(/ do /g,"-");
    url=url.replace(/ da /g,"-");
    url=url.replace(/ of /g,"-");
    url=url.replace(/ and /g,"-");
    url=url.replace(/'/g,"");
    url=url.replace(/ /g,"-");
    return url;
}
//remove acentos
function removerAcentos( newStringComAcento ) {
    var string = newStringComAcento;
    var mapaAcentosHex 	= {
        a : /[\xE0-\xE6]/g,
        A : /[\xC0-\xC6]/g,
        e : /[\xE8-\xEB]/g,
        E : /[\xC8-\xCB]/g,
        i : /[\xEC-\xEF]/g,
        I : /[\xCC-\xCF]/g,
        o : /[\xF2-\xF6]/g,
        O : /[\xD2-\xD6]/g,
        u : /[\xF9-\xFC]/g,
        U : /[\xD9-\xDC]/g,
        c : /\xE7/g,
        C : /\xC7/g,
        n : /\xF1/g,
        N : /\xD1/g,
    };

    for ( var letra in mapaAcentosHex ) {
        var expressaoRegular = mapaAcentosHex[letra];
        string = string.replace( expressaoRegular, letra );
    }

    return string;
}



//**************************************************
//***************VARIÁVEIS GLOBAIS******************
//**************************************************    
//variável moeda global
var currency={currency_code:"",exchange_value:0,banking_fee_value:0,dollar_value:0,iata_value:0,currency_name:"",exhibition_symbol:""};
//variável seguro global
var insurance={insurance_duration:0,us_canada_extra_insurance_net_value:0,world_extra_insurance_net_value:0,extra_insurance_gross_value:0,ireland_insurance_value:0,oshc_insurance_value:0};
//variavel gobal settings
var settings={wire_fee_value:0,iof_rate:0,phi:0,internet_transfer_fee:0};
var flight={flight_gross:0,flight_gross_real:0,flight_net:0,flight_text:""};
var course_duration={standard_travel_duration:0};
var accommo_duration={accommodation_duration_value:0};

//**************************************************
//***************FUNÇÕES DO ORÇAMENTO***************
//**************************************************

//course_gross = course_duration_value * course_gross_per_week
function calculate_course_gross(i){
    var duration_value,
        course_gross_per_week,
        course_gross;
    course_gross=duration_value * course_gross_per_week;
    duration_value=course_duration["standard_travel_duration"];
    course_gross_per_week=Number($("#course_gross_per_week"+i).inputmask('unmaskedvalue'));
    course_gross=duration_value * course_gross_per_week;
    //atualiza o valor que está no console
    document.getElementById("course_gross"+i).innerHTML="Valor Bruto Total do Curso: "+course_gross;
    if(course_gross==""){
        return 0;
    }
    else{
        return course_gross;
    }
}

//course_promo = course_duration_value * course_promo_per_week
function calculate_course_promo(i){
    var duration_value,
        course_promo_per_week,
        course_promo;
    duration_value=course_duration["standard_travel_duration"];
    course_promo_per_week=Number($("#course_promo_per_week"+i).inputmask('unmaskedvalue'));
    course_promo= duration_value * course_promo_per_week;
    //atualiza o valor que está no console
    document.getElementById("course_promo"+i).innerHTML="Valor Promocional Total do Curso: "+course_promo;
    if(course_promo==""){
        return 0;
    }
    else{
        return course_promo;
    }
}

//Course Net =  course_promo_per_week - ([course_commission/100] * course_promo_per_week)
function calculate_course_net(i){
	var course_commission=Number($("#course_commission"+i).inputmask('unmaskedvalue'));
    var course_net=calculate_course_promo(i)-((course_commission /100)* calculate_course_promo(i));
    //atualiza o valor que está no console
    document.getElementById("course_net"+i).innerHTML="Valor Líquido Total do Curso: "+course_net;
    if(course_net==""){
        return 0;
    }
    else{
        return course_net;
    }
}

//accommodation_gross = accommodation_duration_value * accommodation_per_week
function calculate_accommodation_gross(i){
	var accommodation_per_week=Number($("#accommodation_per_week"+i).inputmask('unmaskedvalue'));
    var accommodation_gross=  accommo_duration["accommodation_duration_value"] * accommodation_per_week;
    //atualiza o valor que está no console
    document.getElementById("accommodation_gross"+i).innerHTML="Valor Bruto Total da Acomodação: "+accommodation_gross;
    if(accommodation_gross==""){
        return 0;
    }
    else{
        return accommodation_gross;
    }
}

//accommodation_promo=accommodation_gross – discount_accommodation
function calculate_accommodation_promo(i){
	var discount_accommodation=Number($("#discount_accommodation"+i).inputmask('unmaskedvalue'));
    var accommodation_promo= calculate_accommodation_gross(i) - discount_accommodation;
    //atualiza o valor que está no console
    document.getElementById("accommodation_promo"+i).innerHTML="Valor Promocional Total da Acomodação: "+accommodation_promo;
    if(accommodation_promo==""){
        return 0;
    }
    else{
        return accommodation_promo;
    }
}

//accommodation_net = accommodation_promo - ([accommodation_commission/100] * accommodation_promo)
function calculate_accommodation_net(i){
    var acc_promo= calculate_accommodation_promo(i);
	var accommodation_commission=Number($("#accommodation_commission"+i).inputmask('unmaskedvalue'));
    var accommodation_net = acc_promo-((accommodation_commission /100) * acc_promo);
    //atualiza o valor que está no console
    document.getElementById("accommodation_net"+i).innerHTML="Valor Líquido Total da Acomodação: "+accommodation_net;
    if(accommodation_net==""){
        return 0;
    }
    else{
        return accommodation_net;
    }
}

//total_gross_fees = material_fee_value + registration_fee_value + accommodation_fee_value + exam_fee_value + student_service_fee_value + courier_fee_value + banking_fee_value + airport_transfer_value
function calculate_total_gross_fees(i){
	var material_fee_value=Number($("#material_fee_value"+i).inputmask('unmaskedvalue'));
	var registration_fee_value=Number($("#registration_fee_value"+i).inputmask('unmaskedvalue'));
    var accommodation_fee_value=Number($("#accommodation_fee_value"+i).inputmask('unmaskedvalue'));
	var exam_fee_value=Number($("#exam_fee_value"+i).inputmask('unmaskedvalue'));
    var student_service_fee_value=Number($("#student_service_fee_value"+i).inputmask('unmaskedvalue'));
	var courier_fee_value=Number($("#courier_fee_value"+i).inputmask('unmaskedvalue'));
    var banking_fee_value=currency["banking_fee_value"];
	var airport_transfer_value=Number($("#airport_transfer_value"+i).inputmask('unmaskedvalue'));
    var total_gross_fees = material_fee_value+registration_fee_value+accommodation_fee_value+exam_fee_value+student_service_fee_value+courier_fee_value+banking_fee_value+airport_transfer_value;
    //atualiza o valor que está no console
    document.getElementById("total_gross_fees"+i).innerHTML="Valor Bruto Total das Taxas: "+total_gross_fees;
    if(total_gross_fees==""){
        return 0;
    }
    else{
        return total_gross_fees;
    }
}

//total_net_fees =total_gross_fees – banking_fee_value – discount_fees_value
function calculate_total_net_fees(i){
	var discount_fees_value=Number($("#discount_fees_value"+i).inputmask('unmaskedvalue'));
    var total_net_fees = calculate_total_gross_fees(i) - currency["banking_fee_value"] - discount_fees_value;
    //atualiza o valor que está no console
    document.getElementById("total_net_fees"+i).innerHTML="Valor Líquido Total das Taxas: "+total_net_fees;
    if(total_net_fees==""){
        return 0;
    }
    else{
        return total_net_fees;
    }
}

//total_gross_before_taxes_real = (course_gross + accommodation_gross + total_gross_fees)*exchange_rate_value
function calculate_total_gross_before_taxes_real(i){
    var exchange_rate_value= currency["exchange_value"];
    var course_gross=calculate_course_gross(i);
    var accommodation_gross=calculate_accommodation_gross(i);
    var gross_fees=calculate_total_gross_fees(i)
    var total_gross_before_taxes_real= (course_gross + accommodation_gross + gross_fees)*exchange_rate_value;
    //atualiza o valor que está no console
    document.getElementById("total_gross_before_taxes_real"+i).innerHTML="Valor Bruto Total Antes de Impostos (R$): "+total_gross_before_taxes_real;
    if(total_gross_before_taxes_real==""){
        return 0;
    }
    else{
        return total_gross_before_taxes_real;
    }
}

//total_promo_before_taxes_real = (course_promo + accommodation_promo + total_net_fees)*exchange_rate_value
function calculate_total_promo_before_taxes_real(i){
    var exchange_rate_value= currency["exchange_value"];
    var total_promo_before_taxes_real= (calculate_course_promo(i)+ calculate_accommodation_net(i) + calculate_total_net_fees(i))*exchange_rate_value;
    //atualiza o valor que está no console
    document.getElementById("total_promo_before_taxes_real"+i).innerHTML="Valor Promocional Total Antes de Impostos (R$): "+total_promo_before_taxes_real;
    if(total_promo_before_taxes_real==""){
        return 0;
    }
    else{
        return total_promo_before_taxes_real;
    }
}

//total_net_before_taxes = (course_net + accommodation_net + total_net_fees)
function calculate_total_net_before_taxes(i){
    var total_net_before_taxes= calculate_course_net(i) + calculate_accommodation_net(i) + calculate_total_net_fees(i);
    //atualiza o valor que está no console
    document.getElementById("total_net_before_taxes"+i).innerHTML="Valor Líquido Total Antes de Impostos: "+total_net_before_taxes;
    if(total_net_before_taxes==""){
        return 0;
    }
    else{
        return total_net_before_taxes;
    }
}

//total_net_before_taxes_real = total_net_before_taxes*exchange_rate_value
function calculate_total_net_before_taxes_real(i){
    var exchange_rate_value= currency["exchange_value"];
    var total_net_before_taxes_real = calculate_total_net_before_taxes(i) * exchange_rate_value;
    //atualiza o valor que está no console
    document.getElementById("total_net_before_taxes_real"+i).innerHTML="Valor Líquido Total Antes de Impostos (R$): "+total_net_before_taxes_real;
    if(total_net_before_taxes_real==""){
        return 0;
    }
    else{
        return total_net_before_taxes_real;
    }
}

//total_net_before_insurance_real = total_net_before_taxes_real +  wire_fee_value_real + iof_real
function calculate_total_net_before_insurance_real(i){
    var total_net_before_insurance_real,wire_fee_value_real,iof_real;
    //wire_fee_value * dollar_exchange_rate, buscar em settings wire_fee_value 
    wire_fee_value_real=settings["wire_fee_value"]*currency["dollar_value"];
    // iof_real = iof_rate*(total_net_before_taxes_real+total_insurance_net_real)
    iof_real=(settings["iof_rate"]/100)*(calculate_total_net_before_taxes_real(i)+get_total_insurance_net(i));
    total_net_before_insurance_real=calculate_total_net_before_taxes_real(i) + wire_fee_value_real + iof_real;
    //atualiza o valor que está no console
    document.getElementById("total_net_before_insurance_real"+i).innerHTML="Valor Líquido Total Antes do Seguro (R$): "+total_net_before_insurance_real;
    if(total_net_before_insurance_real==""){
        return 0;
    }
    else{
        return total_net_before_insurance_real;
    }
}

//total_net_before_airfare_real = total_net_before_insurance_real +total_insurance_net_real
function calculate_total_net_before_airfare_real(i){
    var total_net_before_airfare_real;
    total_net_before_airfare_real=calculate_total_net_before_insurance_real(i)+get_total_insurance_net(i);
    document.getElementById("total_net_before_airfare_real"+i).innerHTML="Valor Líquido Total Antes da Parte Aérea (R$): "+total_net_before_airfare_real;
    if(total_net_before_airfare_real==""){
        return 0;
    }
    else{
        return total_net_before_airfare_real;
    }
}

//normal_profit = total_promo_before_taxes_real – total_net_before_insurance_real
function calculate_normal_profit(i){
    var normal_profit;
    normal_profit=calculate_total_promo_before_taxes_real(i) - calculate_total_net_before_insurance_real(i);
    document.getElementById("normal_profit"+i).innerHTML="Lucro Normal (R$): "+normal_profit;
    if(normal_profit==""){
        return 0;
    }
    else{
        return normal_profit;
    }

}

//comparing_factor_profit = normal_profit/phi
function calculate_comparing_factor_profit(i){
    var comparing_factor_profit;
    comparing_factor_profit= calculate_normal_profit(i)/settings["phi"];
    comparing_factor_profit=Math.floor(comparing_factor_profit);
    document.getElementById("comparing_factor_profit"+i).innerHTML="Fator de Comparação para Cálculo do Lucro: "+comparing_factor_profit;
    if(comparing_factor_profit==""){
        return 0;
    }
    else{
        return comparing_factor_profit;
    }

}

//default_profit=SE(comparing_factor_profit>=course_duration_value;comparing_factor_profit*phi);SE(comparing_factor_profit<course_duration_value;course_duration_value*phi);
function calculate_default_profit(i){
    var default_profit,comparing_factor_profit,duration_value;
    duration_value=course_duration["standard_travel_duration"];
    comparing_factor_profit=calculate_comparing_factor_profit(i);
    if(comparing_factor_profit>=duration_value){
        default_profit=comparing_factor_profit*settings["phi"];        
    }
    else{
        default_profit=duration_value*settings["phi"];
    }
    document.getElementById("default_profit"+i).innerHTML="Lucro Padrão (R$): "+default_profit;
    if(default_profit==""){
        return 0;
    }
    else{
        return default_profit;
    }
}

//default_factor_profit = default_profit/phi
function calculate_default_factor_profit(i){
    var default_factor_profit;
    default_factor_profit=calculate_default_profit(i)/settings["phi"];
    document.getElementById("default_profit"+i).innerHTML="Valor Padrão Calculado para o Fator de Lucro: "+default_factor_profit;
    document.getElementById("factor_profit"+i).value=default_factor_profit;
    if(default_factor_profit==""){
        return 0;
    }
    else{
        return default_factor_profit;
    }
}

//real_profit = factor_porfit * phi
function calculate_real_profit(i){
    var real_profit,default_factor_profit;
	var factor_profit=Number($("#factor_profit"+i).inputmask('unmaskedvalue'));
    default_factor_profit=factor_profit;
    if(default_factor_profit==""){
        default_factor_profit=calculate_default_factor_profit(i);
    }
    real_profit=default_factor_profit*settings["phi"];
    document.getElementById("real_profit"+i).innerHTML="Lucro Real (R$): "+real_profit;
    if(real_profit==""){
        return 0;
    }
    else{
        return real_profit;
    }
}

//pega o código, taxa de banco e valor da moeda com base no país, também o dólar e o dólar iata
function get_currency(i){
    var j,default_budget_currency_code;
    var currency_rows;
    //pega o default_budget_currency_code
    default_budget_currency_code=get_default_budget_currency_code(i);
    //exibe a código da moeda no campo Moeda
    document.getElementById("exchange_rate"+i).value=default_budget_currency_code;
    //se o default_budget_currency_code foi setado, recupera todas as informações do bd da quela moeda a partir do código
    if(default_budget_currency_code!=""){
        currency_rows=ajax_db_return({search_word: default_budget_currency_code, target_field: "*", search_field: "currency_code", table: "digitulus_currency"});   
        currency["banking_fee_value"]=currency_rows["banking_fee_value"];
        currency["exchange_value"]=currency_rows["exchange_value"];
        currency["currency_code"]=currency_rows["currency_code"];
        currency["currency_name"]=currency_rows["currency_name"];
        currency["exhibition_symbol"]=currency_rows["exhibition_symbol"];
        
        //pega o valor do dolar americano
        currency["dollar_value"]=ajax_db_return({search_word: "USD", target_field: "exchange_value", search_field: "currency_code", table: "digitulus_currency"});
        //pega o valor do dolar iata
        currency["iata_value"]=ajax_db_return({search_word: "IAT", target_field: "exchange_value", search_field: "currency_code", table: "digitulus_currency"});
        //atualiza o valor que está no console
        document.getElementById("banking_fee_value"+i).innerHTML="Taxa de Transferência Internacional: "+currency["banking_fee_value"];
        //atualiza o valor que está no console
        document.getElementById("exchange_rate_value"+i).innerHTML="Taxa de Câmbio da Moeda "+currency["currency_name"]+": "+currency["exchange_value"];
        document.getElementById("dollar_value"+i).innerHTML="Taxa de Câmbio do Dólar: "+currency["dollar_value"];
        document.getElementById("iata_value"+i).innerHTML="Taxa de Câmbio do Dólar IATA: "+currency["iata_value"];
        //aplica a máscara nos campos
        apply_mask();
    }
}

//atualiza as informações do câmbio caso o usuário digite um currency_code que não seja o default_budget_currency_code
function update_exchange(i){
    var j,currency_code;
    var currency_rows;
    //pega o currency_code digitado
    currency_code=document.getElementById("exchange_rate"+i).value;
    if(currency_code!=""){
        currency_rows=ajax_db_return({search_word: currency_code, target_field: "*", search_field: "currency_code", table: "digitulus_currency"});   
        currency["banking_fee_value"]=currency_rows["banking_fee_value"];
        currency["exchange_value"]=currency_rows["exchange_value"];
        currency["currency_code"]=currency_rows["currency_code"];
        currency["currency_name"]=currency_rows["currency_name"];
        currency["exhibition_symbol"]=currency_rows["exhibition_symbol"];
        //pega o valor do dolar americano
        currency["dollar_value"]=ajax_db_return({search_word: "USD", target_field: "exchange_value", search_field: "currency_code", table: "digitulus_currency"});
        //pega o valor do dolar iata
        currency["iata_value"]=ajax_db_return({search_word: "IAT", target_field: "exchange_value", search_field: "currency_code", table: "digitulus_currency"});
        //atualiza o valor que está no console
        document.getElementById("banking_fee_value"+i).innerHTML="Taxa de Transferência Internacional: "+currency["banking_fee_value"];
        //atualiza o valor que está no console
        document.getElementById("exchange_rate_value"+i).innerHTML="Taxa de Câmbio da Moeda "+currency["currency_name"]+": "+currency["exchange_value"];
        document.getElementById("dollar_value"+i).innerHTML="Taxa de Câmbio do Dólar: "+currency["dollar_value"];
        document.getElementById("iata_value"+i).innerHTML="Taxa de Câmbio do Dólar IATA: "+currency["iata_value"];
        //aplica a máscara nos campos
        apply_mask();
    }
}

function get_required_insurance(i){
    var duration_value,j,country_name;
    var insurance_rows;
    //pega o número de semanas do seguro
    duration_value=get_duration_insurance_value(i);
    //encontra os valores do câmbio e da taxa de banco com base nó código da moeda
    if(duration_value!=0){
        insurance_rows=ajax_db_return({search_word: duration_value, target_field: "*", search_field: "insurance_duration", table: "digitulus_insurance"});
        insurance["insurance_duration"]=insurance_rows["insurance_duration"];
        insurance["us_canada_extra_insurance_net_value"]=insurance_rows["us_canada_extra_insurance_net_value"];
        insurance["world_extra_insurance_net_value"]=insurance_rows["world_extra_insurance_net_value"];
        insurance["extra_insurance_gross_value"]=insurance_rows["extra_insurance_gross_value"];
        insurance["oshc_insurance_value"]=insurance_rows["oshc_insurance_value"];
        insurance["ireland_insurance_value"]=insurance_rows["ireland_insurance_value"];
    }
    //atualiza o valor que está no console
    document.getElementById("us_canada_extra_insurance_net_value"+i).innerHTML="Valor Líquido do Seguro Extra para Canadá e Estados Unidos: "+insurance["us_canada_extra_insurance_net_value"];

    document.getElementById("world_extra_insurance_net_value"+i).innerHTML="Valor Líquido do Seguro Extra para o Resto do Mundo: "+insurance["world_extra_insurance_net_value"];

    document.getElementById("extra_insurance_gross_value"+i).innerHTML="Valor Bruto do Seguro Extra: "+insurance["extra_insurance_gross_value"];

    document.getElementById("oshc_insurance_value"+i).innerHTML="Valor do Seguro Obrigatório OSHC: "+insurance["oshc_insurance_value"];

    document.getElementById("ireland_insurance_value"+i).innerHTML="Valor do Seguro Obrigatório para a Irlanda: "+insurance["ireland_insurance_value"];

    //pega o nome do país
    country_name=get_country_name(i);
    //retorna o seguro obrigatório de acordo com o país
    switch(country_name){
        case "Austrália":
            document.getElementById("required_insurance_value"+i).value=insurance["oshc_insurance_value"];
//            return insurance["oshc_insurance_value"]*currency["exchange_value"];
            break;
        case "Irlanda":
            document.getElementById("required_insurance_value"+i).value=insurance["ireland_insurance_value"];
//            return insurance["ireland_insurance_value"]*currency["exchange_value"];
            break;
        default:
            document.getElementById("required_insurance_value"+i).value=0;
//            return 0;
            break;
    }
    //atualiza o valor do seguro obrigatório em REAL no console
	var required_insurance_value=Number($("#required_insurance_value"+i).inputmask('unmaskedvalue'));
    document.getElementById("required_insurance_real"+i).innerHTML="Valor do Seguro Obrigatório (R$): "+Number($("#required_insurance_value"+i).inputmask('unmaskedvalue'))*currency["exchange_value"];

}


//pega o valor do insurance net
function get_total_insurance_net(i){
    var total_insurance_net,country_name,duration_value;
    //pega o nome do país
    country_name=get_country_name(i);

    switch(country_name){
        case "Estados Unidos":
            total_insurance_net=insurance["us_canada_extra_insurance_net_value"]*currency["dollar_value"];
            break;
        case "Canadá":
            total_insurance_net=insurance["us_canada_extra_insurance_net_value"]*currency["dollar_value"];
            break;
        default:
            total_insurance_net=insurance["world_extra_insurance_net_value"]*currency["dollar_value"];
            break;
    }
	var required_insurance_value=Number($("#required_insurance_value"+i).inputmask('unmaskedvalue'));
    total_insurance_net=total_insurance_net+(required_insurance_value*currency["exchange_value"]);
    document.getElementById("total_insurance_net"+i).innerHTML="Valor Líquido Total do Seguro (R$): "+total_insurance_net;
    if(total_insurance_net==""){
        return 0;
    }
    else{
        return total_insurance_net;
    }
}

//pega o valor do insurance
function get_total_insurance_gross(i){
    var total_insurance_gross;
    //total_insurance_gross= (extra_insurance_gross_value*dolar)+seguro obrigatório
	var required_insurance_value=Number($("#required_insurance_value"+i).inputmask('unmaskedvalue'));
    total_insurance_gross=(insurance["extra_insurance_gross_value"]*currency["dollar_value"])+(required_insurance_value*currency["exchange_value"]);
    document.getElementById("total_insurance_gross"+i).innerHTML="Valor Bruto Total do Seguro (R$): "+total_insurance_gross;
    return total_insurance_gross;
}
//função pega os valores da tabela settings
function get_settings(i){
    var settings_rows;
    settings_rows=ajax_db_return({search_word: "", target_field: "*", search_field: "", table: "digitulus_settings"});
    settings["wire_fee_value"]=settings_rows["wire_fee_value"];
    settings["iof_rate"]=settings_rows["iof_rate"];
    settings["phi"]=settings_rows["phi"];
    settings["internet_transfer_fee"]=settings_rows["internet_transfer_fee"];
    //atualiza o valor no console
    document.getElementById("wire_fee_value"+i).innerHTML="Valor da Taxa de Transferência do Banco (US$): "+settings["wire_fee_value"];
    document.getElementById("iof_rate"+i).innerHTML="Valor da Taxa do IOF (%): "+settings["iof_rate"];
    document.getElementById("phi"+i).innerHTML="Valor do Lucro Padrão por Semana (φ) (R$): "+settings["phi"];
    document.getElementById("internet_transfer_fee"+i).innerHTML="Valor da Taxa de Intermediação do Sistema de Pagamentos (%): "+settings["internet_transfer_fee"];
}

//total_net_profit_airfare=1,0525*(total_net_before_airfare_real+real_profit+flight_gross_real), obs.: 1,0525 é 100/(100-internet_transfer_fee)
function calculate_total_net_profit_airfare(i){
    var total_net_profit_airfare;
    total_net_profit_airfare=(100/(100-settings["internet_transfer_fee"]))*(calculate_total_net_before_airfare_real(i)+calculate_real_profit(i)+flight["flight_gross_real"]);

    //atualiza o valor do console
    document.getElementById("total_net_profit_airfare"+i).innerHTML="Valor Total Líquido + Lucro + Valor da Parte Aérea: "+total_net_profit_airfare;
    if(total_net_profit_airfare==""){
        return 0;
    }
    else{
        return total_net_profit_airfare;
    }
}
//total_gross_real=total_gross_before_taxes_real+total_insurance_gross_real+flight_gross_real
function calculate_total_gross_real(i){
    var total_gross_real;
    total_gross_real=calculate_total_gross_before_taxes_real(i)+get_total_insurance_gross(i)+flight["flight_gross_real"];
    //atualiza o valor do console
    document.getElementById("total_gross_real"+i).innerHTML="Valor Bruto Total (R$): "+total_gross_real;
    if(total_gross_real==""){
        return 0;
    }
    else{
        return total_gross_real;
    }
}

//total_promo_real=total_promo_before_taxes_real+total_insurance_gross_real+flight_gross_real
function calculate_total_promo_real(i){
    var total_promo_real;
    total_promo_real=calculate_total_promo_before_taxes_real(i)+get_total_insurance_gross(i)+flight["flight_gross_real"];
    //atualiza o valor do console
    document.getElementById("total_promo_real"+i).innerHTML="Valor Promocional Total (R$): "+total_promo_real;
    if(total_promo_real==""){
        return 0;
    }
    else{
        return total_promo_real;
    }
}

//cost=1,0525*(total_net_before_airfare_real+flight_net)
function calculate_cost(i){
    var cost;
    cost=(100/(100-settings["internet_transfer_fee"]))*(calculate_total_net_before_airfare_real(i)+flight["flight_net"]);
    //atualiza o valor do console
    document.getElementById("cost_c"+i).innerHTML="Custo (R$): "+cost;
    document.getElementById("cost"+i).value=cost;
    if(cost==""){
        return 0;
    }
    else{
        return cost;
    }
}
//price=price=total_gross_real
function calculate_price(i){
    var price;
    price=calculate_total_gross_real(i);
    document.getElementById("price_c"+i).innerHTML="Preço (R$): "+price;
    document.getElementById("price"+i).value=price;
    if(price==""){
        return 0;
    }
    else{
        return price;
    }
}

//special_price=total_net_profit_airfare
function calculate_special_price(i){
    var special_price;
    special_price= calculate_total_net_profit_airfare(i);
    document.getElementById("special_price_c"+i).innerHTML="Preço Especial (R$): "+special_price;
    document.getElementById("special_price"+i).value=special_price;
    if(special_price==""){
        return 0;
    }
    else{
        return special_price;
    }
}
function apply_mask(){
    //percore todos os inputs do formulário com id="form"
    $("form#form :input").each(function(){
        //pega o valor do atributo data-inputmask-alias
        var alias = $(this).attr("data-inputmask-alias");
        //pega o valor do atributo id
        var id_input =  $(this).attr("id");
        //aplica a máscara somente se o input tiver o atributo data-inputmask-alias e ele for diferente de vazio
        if(alias!=null && alias!=""){
            //casa seja uma mascara de nome, usa o exhibition_symbol da moeda selecionada como symbolo
            if(alias=="money"){
                $("#"+id_input).inputmask({ 
                    prefix: currency["exhibition_symbol"]+" ",
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

function show_calc(id){
    $.calculator.setDefaults({showOn: 'button', buttonImageOnly: true, buttonImage: 'img/calculator.png'});
	$('#'+id).calculator({showOn: 'button'});
}

function load_all_functions_text(i){
    create_name(i);
    create_meta_description(i);
    create_short_description(i);
    create_url(i);
    create_image_label(i);
}


function load_all_functions_budget(i){
    get_settings(i);
    get_required_insurance(i);
    get_total_insurance_net(i);
    get_total_insurance_gross(i);
    calculate_course_gross(i);
    calculate_course_promo(i);
    calculate_course_net(i);
    calculate_accommodation_gross(i);
    calculate_accommodation_promo(i);
    calculate_accommodation_net(i);
    calculate_total_gross_fees(i);
    calculate_total_net_fees(i);
    calculate_total_gross_before_taxes_real(i);
    calculate_total_promo_before_taxes_real(i);
    calculate_total_net_before_taxes(i);
    calculate_total_net_before_taxes_real(i);
    calculate_total_net_before_insurance_real(i);
    calculate_total_net_before_airfare_real(i);
    calculate_normal_profit(i);
    calculate_comparing_factor_profit(i);
    calculate_default_profit(i);
    calculate_default_factor_profit(i); 
    calculate_real_profit(i);
    calculate_total_net_profit_airfare(i);
    calculate_total_gross_real(i);
    calculate_total_promo_real(i);
    calculate_cost(i);
    calculate_price(i);
    calculate_special_price(i);
    create_short_description(i);
    create_meta_description(i);
    create_image_label(i);
    update_exchange(i);
}