
<?php 
    $client= new Client();
    
    if(isset($_GET["client_id"])){
        $client->get_client($_GET["client_id"]);
    }
?>
  <script type="text/javascript" >

/*Referencia:
	
	ESTA OK MANIPULANDO POR UMA BASE DE DADOS SUPER ATUALIZADA 
	API cep correios: http://avisobrasil.com.br/correio-control/api-de-consulta-de-cep/
	JSON: http://www.json.org/
	
	*/

    $(document).ready(function(){
                //Preenche os campos na a&#231;&#227;o "Blur" (mudar de campo)
                $("#client_cep").blur(function(){
               
             
        		consulta = $("#client_cep").val()
                consulta = consulta.replace("-","");
                consulta = consulta.replace(".","");
                var url = "http://cep.correiocontrol.com.br/" + consulta + ".json";
                
                $.ajax({
                     url: url,
                     type:'GET',
                     dataType: 'json',
                     success: function(json){
                      $("#client_address").val(json.logradouro)
                      $("#client_neighbourhood").val(json.bairro)
                      $("#client_city").val(json.localidade)
                      //$("#client_state").val(json.uf)   
                      var uf = json.uf;
                      var estado;
                      switch(uf)
                        {
                            case 'AC':
                                estado = "Acre";
                            break;    
                            case 'AL':
                                estado = "Alagoas";
                            break;    
                            case 'AP':
                                estado = "Amapá";
                            break;     
                            case 'AM':
                                estado = "Amazonas";
                            break;
                            case 'BA':
                                estado = "Bahia";
                            break;
                            case 'CE':
                                estado = "Ceará";
                            break;
                            case 'DF':
                                estado = "Distrito Federal";
                            break;    
                            case 'ES':
                                estado = "Espírito Santo";
                            break;    
                            case 'GO':
                                estado = "Goiás";
                            break; 
                            case 'MA':
                                estado = "Maranhão";
                            break; 
                             case 'MT':
                                estado = "Mato Grosso";
                            break; 
                            case 'MS':
                                estado = "Mato Grosso do Sul";
                            break; 
                            case 'MG':
                                estado = "Minas Gerais";
                            break;
                            case 'PA':
                                estado = "Pará";
                            break;
                            case 'PB':
                                estado = "Paraíba";
                            break;
                            case 'PR':
                                estado = "Paraná";
                            break;   
                            case 'PE':
                                estado = "Pernambuco";
                            break;  
                            case 'PI':
                                estado = "Piauí";
                            break;      
                            case 'RJ':
                                estado = "Rio de Janeiro";
                            break;     
                            case 'RN':
                                estado = "Rio Grande do Norte";
                            break;    
                            case 'RS':
                                estado = "Rio Grande do Sul";
                            break;  
                            case 'RO':
                                estado = "Rondônia";
                            break;
                            case 'RR':
                                estado = "Roraima";
                            break;  
                            case 'SC':
                                estado = "Santa Catarina";
                            break;
                            case 'SP':
                                estado = "São Paulo";
                            break; 
                            case 'SE':
                                estado = "Sergipe";
                            break; 
                            case 'TO':
                                estado = "Tocantins";
                            break; 
                            default:
                                estado="";
                                
                             }
                      
                      $("#client_state").val(estado);
                      						},
                		});//ajax
                
                });//função blur
        });

</script>
<aside class="right-side">                
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
           Editar Clientes
            <small></small>
        </h1>
        <br/>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Editar Clientes</li>
        </ol>
    </section>
    <!-- Main content -->                            
    <section class="content">

        <div class="row">
            <div class="col-xs-12">
                <div class="box box-primary">
					<!-- COMEÇO DO FORM -->
                    <div class="box-header">
                        <h3 class="box-title">Editando Cliente <?php echo $client->client_name." ".$client->client_surname; ?></h3>
                    </div><!-- /.box-header -->
                    <div class="box-body">
                        <form id="client_form" method="POST" role="form" class="half-form" action="client_information.php?page=edit&client_id=<?php echo $_GET["client_id"];?>">
                        	<label class="control-label"><h4>Dados do Cliente</h4></label>
                            <div class="form-group">
								<label class="control-label">Nome</label>								 
									<input type="text" class="form-control" id="client_name" value="<?php echo $client->client_name;?>" name="client_name" placeholder="Nome do Cliente"  />
                            </div>
							<div class="form-group">
								<label class="control-label">Sobrenome</label>								 
									 <input type="text" class="form-control" id="client_surname" value="<?php echo $client->client_surname;?>" name="client_surname" placeholder="Sobrenome do Cliente"   />
                            </div>
							<div class="form-group">
								<label class="control-label">Telefone</label>
									<input type="text" class="form-control" id="client_phone" value="<?php echo $client->client_phone;?>" name="client_phone" placeholder="Telefone do Cliente" data-inputmask="'mask': '(99)9999-9999'" />
                            </div>
                            <div class="form-group">
                                <label class="control-label">Celular</label> 
                                    <input type="text" class="form-control" id="client_mobile"  name="client_mobile" placeholder="Celular do Cliente" value="<?php echo $client->client_mobile; ?>" data-inputmask="'mask': '(99)99999-9999'"/>
                            </div>                            
							<div class="form-group">
								<label class="control-label">E-mail</label>
									<input type="text" class="form-control" id="client_email" value="<?php echo $client->client_email;?>" name="client_email" placeholder="E-mail do Cliente" data-inputmask="'alias': 'email'"  />
                            </div>
							<div class="form-group">
								<label class="control-label">Como chegou até o Artha</label>
									<input type="text" class="form-control" id="client_how_to_reach_us" value="<?php echo $client->client_how_to_reach_us;?>" name="client_how_to_reach_us" placeholder="Como chegou até o Artha" onfocus="active_autocomplete({id: this.id, target_field: 'client_how_to_reach_us', search_field: 'client_how_to_reach_us', table: 'digitulus_client'});" />
                            </div>
                            <div class="form-group">
                                <label class="control-label">Data de Nascimento</label>
                                    <input type="text" class="form-control" id="client_date_of_birth" value="<?php echo $client->client_date_of_birth;?>" name="client_date_of_birth" placeholder="Data de Nascimento"/>
                            </div>
                            <div class="form-group">
                                <label class="control-label">CEP</label>                                    
                                    <input type="text" class="form-control" id="client_cep" name="client_cep" placeholder="CEP" value="<?php echo $client->client_cep; ?>" data-inputmask="'mask': '99999-999'"/>
                            </div>  
                            <div class="form-group">
                                <label class="control-label">Endereço</label>                                     
                                    <input type="text" class="form-control" id="client_address" value="<?php echo $client->client_address;?>" name="client_address" placeholder="Endereço"   />
                            </div>
                            <div class="form-group">
                                <label class="control-label">Bairro</label>                                
                                     <input type="text" class="form-control" id="client_neighbourhood" value="<?php echo $client->client_neighbourhood;?>" name="client_neighbourhood" placeholder="Bairro"  />
                            </div>
                            <div class="form-group">
                                <label class="control-label">Cidade</label>                                    
                                    <input type="text" class="form-control" id="client_city" value="<?php echo $client->client_city;?>" name="client_city" placeholder="Cidade" onfocus="active_autocomplete({id: this.id, target_field: 'client_city', search_field: 'client_city', table: 'digitulus_client'});"  />
                            </div>
                            <div class="form-group">
                                <label class="control-label">Estado</label>                                  
                                    <select class="form-control" id="client_state" name="client_state" placeholder="Estado">
                                        <option value="<?php echo $client->client_state;?>"><?php echo $client->client_state;?></option>
                                        <option value="Acre">Acre</option>
                                        <option value="Alagoas">Alagoas</option>
                                        <option value="Amapá">Amapá</option>
                                        <option value="Amazonas">Amazonas</option>
                                        <option value="Bahia">Bahia</option>
                                        <option value="Ceará">Ceará</option>
                                        <option value="Distrito Federal">Distrito Federal</option>
                                        <option value="Espírito Santo">Espírito Santo</option>
                                        <option value="Goiás">Goiás</option>
                                        <option value="Maranhão">Maranhão</option>
                                        <option value="Mato Grosso">Mato Grosso</option>
                                        <option value="Mato Grosso do Sul">Mato Grosso do Sul</option>
                                        <option value="Minas Gerais">Minas Gerais</option>
                                        <option value="Pará">Pará</option>
                                        <option value="Paraíba">Paraíba</option>
                                        <option value="Paraná">Paraná</option>
                                        <option value="Pernambuco">Pernambuco</option>
                                        <option value="Piauí">Piauí</option>
                                        <option value="Rio de Janeiro">Rio de Janeiro</option>
                                        <option value="Rio Grande do Norte">Rio Grande do Norte</option>
                                        <option value="Rio Grande do Sul">Rio Grande do Sul</option>
                                        <option value="Rondônia">Rondônia</option>
                                        <option value="Roraima">Roraima</option>
                                        <option value="Santa Catarina">Santa Catarina</option>
                                        <option value="São Paulo">São Paulo</option>
                                        <option value="Sergipe">Sergipe</option>
                                        <option value="Tocantins">Tocantins</option>
                                    </select>
                            </div>     
                            <div class="form-group">
                                <label class="control-label">Sexo</label>  
                                    <select class="form-control" id="client_gender" name="client_gender" placeholder="Sexo">
                                        <option value="<?php echo $client->client_gender;?>"><?php echo $client->client_gender;?></option>
                                        <option value="Feminino">Feminino</option>
                                        <option value="Masculino">Masculino</option>
                                    </select>
                            </div>
                            <div class="form-group">
                                <label class="control-label">Estado Civil</label> 
                                    <select class="form-control" id="client_civil_status" name="client_civil_status" placeholder="Estado Civil">
                                        Solteiro Casado Em União Estável Divorciado Separado Viúvo
                                        <option value="<?php echo $client->client_civil_status;?>"><?php echo $client->client_civil_status;?></option>
                                        <option value="Solteiro">Solteiro</option>
                                        <option value="Casado">Casado</option>
                                        <option value="Em União Estável">Em União Estável</option>
                                        <option value="Divorciado">Divorciado</option>
                                        <option value="Separado">Separado</option>
                                        <option value="Viúvo">Viúvo</option>
                                    </select>
                            </div>                            
                            <div class="form-group">
                                <label class="control-label">Profissão</label>   
                                    <input type="text" class="form-control" id="client_profession" name="client_profession" placeholder="Profissão" value="<?php echo $client->client_profession; ?>" onfocus="active_autocomplete({id: this.id, target_field: 'client_profession', search_field: 'client_profession', table: 'digitulus_client'});" />
                            </div>  
                            <div class="form-group">
                                <label class="control-label">Passaporte</label>    
                                    <input type="text" class="form-control" id="client_passport" value="<?php echo $client->client_passport;?>" name="client_passport" placeholder="Passaporte" data-inputmask="'mask': 'AA999999'"  />
                            </div>
                            <div class="form-group">
                                <label class="control-label">Data de validade do passaporte</label>
                                    <input type="text" class="form-control" id="client_passport_expire_date" value="<?php echo $client->client_passport_expire_date;?>" name="client_passport_expire_date" placeholder="Data de validade do passaporte"   />
                            </div>
                            <div class="form-group" id="cpf_div">
                                <label class="control-label" id="cpf_label">CPF</label>
                                    <input type="text" class="form-control" id="client_cpf" value="<?php echo $client->client_cpf;?>" name="client_cpf" placeholder="CPF" onblur="TestaCPF();" data-inputmask="'mask':'999.999.999-99'"  />
                            </div>
                            <div class="form-group">
                                <label class="control-label">RG</label>
                                    <input type="text" class="form-control" id="client_rg" value="<?php echo $client->client_rg;?>" name="client_rg" placeholder="RG" />
                            </div>
                            <div class="form-group">
                                <label class="control-label">Outras informações</label>
                                    <input type="text" class="form-control" id="client_other_information" name="client_other_information" placeholder="Outras informações" value="<?php echo $client->client_other_information; ?>"  />
                            </div>                             
                            <div class="form-group">
                                <label class="control-label">Nome da pessoa de contato</label>
                                    <input type="text" class="form-control" id="client_contact_name" value="<?php echo $client->client_contact_name;?>" name="client_contact_name" placeholder="Nome da pessoa de contato"  />
                            </div>
                            <div class="form-group">
                                <label class="control-label">Relação com a pessoa de contato</label>
                                    <input type="text" class="form-control" id="client_contact_relation" value="<?php echo $client->client_contact_relation;?>" name="client_contact_relation" placeholder="Relação com a pessoa de contato"  />
                            </div>
                            <div class="form-group">
                                <label class="control-label">Telefone da pessoa de contato</label>
                                    <input type="text" class="form-control" id="client_contact_phone" value="<?php echo $client->client_contact_phone;?>" name="client_contact_phone" placeholder="Telefone da pessoa de contato" />
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
    $( "#client_date_of_birth" ).datepicker($.datepicker.regional[ "pt-BR" ]);
    $( "#client_passport_expire_date" ).datepicker($.datepicker.regional[ "pt-BR" ]);
    
    $(document).ready (function () {
		$("form#client_form :input").each(function(){
			var alias = $(this).attr("data-inputmask-alias");
			var id_input =  $(this).attr("id");
			$("#"+id_input).inputmask({ alias: alias});
		});
	});
//        $("#client_phone").inputmask("Regex", {
////            ^\([1-9]{2}\) [2-9][0-9]{3,4}\-[0-9]{4}$
//        regex: "^\([1-9]{2}\) [2-9][0-9]{3,4}\-[0-9]{4}$",
//    });
    
    
function TestaCPF() {
    var Soma;
    var Resto;
    var strCPF;
    var resp=true;
    strCPF = $("#client_cpf").inputmask('unmaskedvalue');
    Soma = 0;
	if (strCPF == "00000000000" || strCPF == "" ){
        resp=false;
    }
    
	for (i=1; i<=9; i++) Soma = Soma + parseInt(strCPF.substring(i-1, i)) * (11 - i);
	Resto = (Soma * 10) % 11;
	
    if ((Resto == 10) || (Resto == 11))  Resto = 0;
    if (Resto != parseInt(strCPF.substring(9, 10)) ){
        resp=false;
    }
	
	Soma = 0;
    for (i = 1; i <= 10; i++) Soma = Soma + parseInt(strCPF.substring(i-1, i)) * (12 - i);
    Resto = (Soma * 10) % 11;
	
    if ((Resto == 10) || (Resto == 11))  Resto = 0;
    if (Resto != parseInt(strCPF.substring(10, 11) ) ){
       resp=false;
    }
    if(resp==false){
        $('#cpf_div').addClass("has-error");
        $('#cpf_label').text($('#cpf_label').text().replace(/ Inválido/g, ''));
        $('#cpf_label').append(" Inválido");
    }
    else{
        $('#cpf_div').removeClass("has-error");
        $('#cpf_label').text($('#cpf_label').text().replace(/ Inválido/g, ''));
    }
}



</script>