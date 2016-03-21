<aside class="right-side">                
    <!-- Content Header (Page header) -->
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
    <section class="content-header">
        <h1>
           Adicionar Cliente Clientes
            <small></small>
        </h1>
        <br/>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Adicionar cliente</li>
        </ol>
    </section>
    <!-- Main content -->                            
    <section class="content">

        <div class="row">
            <div class="col-xs-12">
                <div class="box box-primary">
                    <!-- COMEÇO DO FORM -->
                    <div class="box-header">
                        <h3 class="box-title">Adicionar Cliente</h3>
                    </div><!-- /.box-header -->
                    <div class="box-body">
                        <form id="client_form" method="POST" role="form" class="half-form" action="client_information.php?page=add">
                            <div class="row">
                                <div class="col-xs-4">
                                    <label class="control-label" for="control-label"><h4>Dados do Cliente</h4></label>
                                    <div class="form-group">
                                        <label class="control-label"><h3 class="text-red"><b>Buscar Cliente</b></h3><label onclick="clean_form('client');" class="btn btn-warning btn-sm" data-widget='collapse' data-toggle="tooltip" title="Limpar Informações do Cliente"><i class="fa fa-eraser"></i>Limpar Dados do Cliente</label></label>
                                            <input type="text" class="form-control" id="client_search" name="client_search" onfocus="active_autocomplete({id: this.id, target_field: 'client_id,client_name,client_surname,client_phone,client_mobile,client_email', search_field: 'client_name', table: 'digitulus_client', validate: 'true'});" placeholder="Buscar Cliente" />
                                    </div>
                                    <div class="form-group" hidden="hidden">
                                        <label class="control-label">Id do Cliente</label>
                                            <input type="text" class="form-control" id="client_id" name="client_id" placeholder="Id do Cliente" />
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">Nome</label>                                
                                            <input type="text" class="form-control" id="client_name" name="client_name" placeholder="Nome do Cliente" required  />
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">Sobrenome</label>                               
                                             <input type="text" class="form-control" id="client_surname" name="client_surname" placeholder="Sobrenome do Cliente" required   />
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">Telefone</label>
                                            <input type="text" class="form-control" id="client_phone" name="client_phone" placeholder="Telefone do Cliente" data-inputmask="'mask': '(99)9999-9999'" />
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">Celular</label> 
                                            <input type="text" class="form-control" id="client_mobile"  name="client_mobile" placeholder="Celular do Cliente"  data-inputmask="'mask': '(99)99999-9999'"/>
                                    </div>                            
                                    <div class="form-group">
                                        <label class="control-label">E-mail</label>
                                            <input type="text" class="form-control" id="client_email" name="client_email" placeholder="E-mail do Cliente" data-inputmask="'alias': 'email'"  />
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">Como chegou até o Artha</label>
                                            <input type="text" class="form-control" id="client_how_to_reach_us" name="client_how_to_reach_us" placeholder="Como chegou até o Artha" onfocus="active_autocomplete({id: this.id, target_field: 'client_how_to_reach_us', search_field: 'client_how_to_reach_us', table: 'digitulus_client'});" />
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">Data de Nascimento</label>
                                            <input type="text" class="form-control" id="client_date_of_birth"  name="client_date_of_birth" placeholder="Data de Nascimento"/>
                                    </div>
                                      <div class="form-group">
                                        <label class="control-label">CEP</label>                                    
                                            <input type="text" class="form-control" id="client_cep" name="client_cep" placeholder="CEP" data-inputmask="'mask': '99999-999'"/>
                                    </div>  
                                    <div class="form-group">
                                        <label class="control-label">Endereço</label>                                     
                                            <input type="text" class="form-control" id="client_address" name="client_address" placeholder="Endereço"   />
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">Bairro</label>                                
                                             <input type="text" class="form-control" id="client_neighbourhood" name="client_neighbourhood" placeholder="Bairro"  />
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">Cidade</label>                                    
                                            <input type="text" class="form-control" id="client_city" name="client_city" placeholder="Cidade" onfocus="active_autocomplete({id: this.id, target_field: 'client_city', search_field: 'client_city', table: 'digitulus_client'});"  />
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">Estado</label>                                  
                                            <select class="form-control" id="client_state" name="client_state" placeholder="Estado">
                                                <option value="Minas Gerais">Minas Gerais</option>
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
                                                <option value=""></option>
                                                <option value="Feminino">Feminino</option>
                                                <option value="Masculino">Masculino</option>
                                            </select>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">Estado Civil</label> 
                                            <select class="form-control" id="client_civil_status" name="client_civil_status" placeholder="Estado Civil">
                                                Solteiro Casado Em União Estável Divorciado Separado Viúvo
                                                <option value=""></option>
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
                                            <input type="text" class="form-control" id="client_profession" name="client_profession" placeholder="Profissão" onfocus="active_autocomplete({id: this.id, target_field: 'client_profession', search_field: 'client_profession', table: 'digitulus_client'});" />
                                    </div>  
                                    <div class="form-group">
                                        <label class="control-label">Passaporte</label>    
                                            <input type="text" class="form-control" id="client_passport" name="client_passport" placeholder="Passaporte" data-inputmask="'mask': 'AA999999'"  />
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">Data de validade do passaporte</label>
                                            <input type="text" class="form-control" id="client_passport_expire_date" name="client_passport_expire_date" placeholder="Data de validade do passaporte"   />
                                    </div>
                                    <div class="form-group" id="cpf_div">
                                        <label class="control-label" id="cpf_label">CPF</label>
                                            <input type="text" class="form-control" id="client_cpf" name="client_cpf" placeholder="CPF" onblur="TestaCPF();" data-inputmask="'mask':'999.999.999-99'" />
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">RG</label>
                                            <input type="text" class="form-control" id="client_rg" name="client_rg" placeholder="RG"  />
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">Outras informações</label>
                                            <textarea type="text" class="form-control" id="client_other_information" name="client_other_information" placeholder="Outras informações"  ></textarea>
                                    </div>                             
                                    <div class="form-group">
                                        <label class="control-label">Nome da pessoa de contato</label>
                                            <input type="text" class="form-control" id="client_contact_name"  name="client_contact_name" placeholder="Nome da pessoa de contato"  />
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">Relação com a pessoa de contato</label>
                                            <input type="text" class="form-control" id="client_contact_relation" name="client_contact_relation" placeholder="Relação com a pessoa de contato"  />
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">Telefone da pessoa de contato</label>
                                            <input type="text" class="form-control" id="client_contact_phone" name="client_contact_phone" placeholder="Telefone da pessoa de contato" />
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">Email da pessoa de contato</label>
                                            <input type="text" class="form-control" id="client_contact_email" name="client_contact_email" placeholder="Email da pessoa de contato" />
                                    </div>
                                    <div class="form-group">
                                            <button class="btn btn-primary" id="submit_form" type="submit">Salvar</button>
                                    </div>
                                </div>
                                <div class="col-xs-3">
                                    <!-- Box Com as Infomações do Pai  -->
                                    <div class="box box-warning collapsed-box" id="client-info">
                                        <div class="box-header">
                                            <!-- tools box -->
                                            <div class="pull-right box-tools">
                                                <!--Botão de minimizar div-->
                                                <label class="btn btn-warning btn-sm" data-widget='collapse' data-toggle="tooltip" title="Mostrar/Esconder"><i class="fa fa-eye"></i>Mostrar/Esconder</label>
                                                <label onclick="clean_form('father');" class="btn btn-warning btn-sm" data-widget='collapse' data-toggle="tooltip" title="Limpar Informações do Pai"><i class="fa fa-eraser"></i>Limpar Dados</label>
                                            </div><!-- /. tools -->
                                            <i class="fa fa-fw fa-user"></i>

                                            <h3 class="box-title">Informações do Pai</h3>
                                        </div><!-- /.box-header -->
                                        <div class="box-body no-padding" style="display: none;">
                                            <div class="pad">
                                                <div class="form-group">
                                                    <label class="control-label"><h3 class="text-red"><b>Buscar Pai</b></h3></label>
                                                        <input type="text" class="form-control" id="father_search" name="father_search" onfocus="active_autocomplete({id: this.id, target_field: 'client_id,client_name,client_surname,client_phone,client_mobile,client_email', search_field: 'client_name', table: 'digitulus_client', validate: 'true'});" placeholder="Buscar Pai" />
                                                </div>
                                                <div class="form-group" hidden="hidden">
                                                    <label class="control-label">Id do Pai</label>
                                                        <input type="text" class="form-control" id="father_id" name="father_id" placeholder="Id do Pai" />
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label">Nome do Pai</label>
                                                        <input type="text" class="form-control" id="father_name" name="father_name" placeholder="Nome do Pai" />
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label">Sobrenome</label>                               
                                                         <input type="text" class="form-control" id="father_surname" name="father_surname" placeholder="Sobrenome do Pai"   />
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label">Telefone</label>
                                                        <input type="text" class="form-control" id="father_phone" name="father_phone" placeholder="Telefone do Pai" data-inputmask="'mask': '(99)9999-9999'" />
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label">Celular</label>
                                                        <input type="text" class="form-control" id="father_mobile"  name="father_mobile" placeholder="Celular do Pai"  data-inputmask="'mask': '(99)99999-9999'"/>
                                                </div>                            
                                                <div class="form-group">
                                                    <label class="control-label">E-mail</label>
                                                        <input type="text" class="form-control" id="father_email" name="father_email" placeholder="E-mail do Pai" data-inputmask="'alias': 'email'"  />
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label">Como chegou até o Artha</label>
                                                        <input type="text" class="form-control" id="father_how_to_reach_us" name="father_how_to_reach_us" placeholder="Como chegou até o Artha" onfocus="active_autocomplete({id: this.id, target_field: 'father_how_to_reach_us', search_field: 'father_how_to_reach_us', table: 'digitulus_father'});" />
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label">Data de Nascimento</label>
                                                        <input type="text" class="form-control" id="father_date_of_birth"  name="father_date_of_birth" placeholder="Data de Nascimento"/>
                                                </div>
                                                  <div class="form-group">
                                                    <label class="control-label">CEP</label>                                    
                                                        <input type="text" class="form-control" id="father_cep" name="father_cep" placeholder="CEP" data-inputmask="'mask': '99999-999'"/>
                                                </div>  
                                                <div class="form-group">
                                                    <label class="control-label">Endereço</label>                                     
                                                        <input type="text" class="form-control" id="father_address" name="father_address" placeholder="Endereço"   />
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label">Bairro</label>                                
                                                         <input type="text" class="form-control" id="father_neighbourhood" name="father_neighbourhood" placeholder="Bairro"  />
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label">Cidade</label>                                    
                                                        <input type="text" class="form-control" id="father_city" name="father_city" placeholder="Cidade" onfocus="active_autocomplete({id: this.id, target_field: 'father_city', search_field: 'father_city', table: 'digitulus_father'});"  />
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label">Estado</label>                                  
                                                        <select class="form-control" id="father_state" name="father_state" placeholder="Estado">
                                                            <option value="Minas Gerais">Minas Gerais</option>
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
                                                        <select class="form-control" id="father_gender" name="father_gender" placeholder="Sexo">
                                                            <option value=""></option>
                                                            <option value="Feminino">Feminino</option>
                                                            <option value="Masculino">Masculino</option>
                                                        </select>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label">Estado Civil</label> 
                                                        <select class="form-control" id="father_civil_status" name="father_civil_status" placeholder="Estado Civil">
                                                            Solteiro Casado Em União Estável Divorciado Separado Viúvo
                                                            <option value=""></option>
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
                                                        <input type="text" class="form-control" id="father_profession" name="father_profession" placeholder="Profissão" onfocus="active_autocomplete({id: this.id, target_field: 'father_profession', search_field: 'father_profession', table: 'digitulus_father'});" />
                                                </div>  
                                                <div class="form-group">
                                                    <label class="control-label">Passaporte</label>    
                                                        <input type="text" class="form-control" id="father_passport" name="father_passport" placeholder="Passaporte" data-inputmask="'mask': 'AA999999'"  />
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label">Data de validade do passaporte</label>
                                                        <input type="text" class="form-control" id="father_passport_expire_date" name="father_passport_expire_date" placeholder="Data de validade do passaporte"   />
                                                </div>
                                                <div class="form-group" id="cpf_div">
                                                    <label class="control-label" id="cpf_label">CPF</label>
                                                        <input type="text" class="form-control" id="father_cpf" name="father_cpf" placeholder="CPF" onblur="TestaCPF();" data-inputmask="'mask':'999.999.999-99'" />
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label">RG</label>
                                                        <input type="text" class="form-control" id="father_rg" name="father_rg" placeholder="RG"  />
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label">Outras informações</label>
                                                        <textarea type="text" class="form-control" id="father_other_information" name="father_other_information" placeholder="Outras informações"  ></textarea>
                                                </div>                             
                                                <div class="form-group">
                                                    <label class="control-label">Nome da pessoa de contato</label>
                                                        <input type="text" class="form-control" id="father_contact_name"  name="father_contact_name" placeholder="Nome da pessoa de contato"  />
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label">Relação com a pessoa de contato</label>
                                                        <input type="text" class="form-control" id="father_contact_relation" name="father_contact_relation" placeholder="Relação com a pessoa de contato"  />
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label">Telefone da pessoa de contato</label>
                                                        <input type="text" class="form-control" id="father_contact_phone" name="father_contact_phone" placeholder="Telefone da pessoa de contato" />
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label">Email da pessoa de contato</label>
                                                        <input type="text" class="form-control" id="father_contact_email" name="father_contact_email" placeholder="Email da pessoa de contato" />
                                                </div>
                                            </div><!-- /.pad -->
                                        </div><!-- /.box-body -->
                                        <div class="box-footer" style="display: none;">
                                            <div class="row">
                                            </div><!-- /.row -->
                                        </div><!-- /.box-footer -->
                                    </div><!-- /.box -->
                                </div>
                                <div class="col-xs-3">
                                    <!-- Box Com as Infomações da Mãe  -->
                                    <div class="box box-warning collapsed-box" id="client-info">
                                        <div class="box-header">
                                            <!-- tools box -->
                                            <div class="pull-right box-tools">
                                                <!--Botão de minimizar div-->
                                                <label class="btn btn-warning btn-sm" data-widget='collapse' data-toggle="tooltip" title="Mostrar/Esconder"><i class="fa fa-eye"></i>Mostrar/Esconder</label>
                                                <label onclick="clean_form('mother');" class="btn btn-warning btn-sm" data-widget='collapse' data-toggle="tooltip" title="Limpar Informações da Mãe"><i class="fa fa-eraser"></i>Limpar Dados</label>
                                            </div><!-- /. tools -->
                                            <i class="fa fa-fw fa-user"></i>

                                            <h3 class="box-title">Informações da Mãe</h3>
                                        </div><!-- /.box-header -->
                                        <div class="box-body no-padding" style="display: none;">
                                            <div class="pad">
                                                <div class="form-group">
                                                    <label class="control-label"><h3 class="text-red"><b>Buscar Mãe</b></h3></label>
                                                        <input type="text" class="form-control" id="mother_search" name="mother_search" onfocus="active_autocomplete({id: this.id, target_field: 'client_id,client_name,client_surname,client_phone,client_mobile,client_email', search_field: 'client_name', table: 'digitulus_client', validate: 'true'});" placeholder="Buscar Mãe" />
                                                </div>
                                                <div class="form-group" hidden="hidden">
                                                    <label class="control-label">Id da Mãe</label>
                                                        <input type="text" class="form-control" id="mother_id" name="mother_id" placeholder="Id da Mãe" />
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label">Nome da Mãe</label>
                                                        <input type="text" class="form-control" id="mother_name" name="mother_name" placeholder="Nome da Mãe" />
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label">Sobrenome</label>                               
                                                         <input type="text" class="form-control" id="mother_surname" name="mother_surname" placeholder="Sobrenome da Mãe"   />
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label">Telefone</label>
                                                        <input type="text" class="form-control" id="mother_phone" name="mother_phone" placeholder="Telefone doaMãe" data-inputmask="'mask': '(99)9999-9999'" />
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label">Celular</label>
                                                        <input type="text" class="form-control" id="mother_mobile"  name="mother_mobile" placeholder="Celular da Mãe"  data-inputmask="'mask': '(99)99999-9999'"/>
                                                </div>                            
                                                <div class="form-group">
                                                    <label class="control-label">E-mail</label>
                                                        <input type="text" class="form-control" id="mother_email" name="mother_email" placeholder="E-mail da Mãe" data-inputmask="'alias': 'email'"  />
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label">Como chegou até o Artha</label>
                                                        <input type="text" class="form-control" id="mother_how_to_reach_us" name="mother_how_to_reach_us" placeholder="Como chegou até o Artha" onfocus="active_autocomplete({id: this.id, target_field: 'mother_how_to_reach_us', search_field: 'mother_how_to_reach_us', table: 'digitulus_mother'});" />
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label">Data de Nascimento</label>
                                                        <input type="text" class="form-control" id="mother_date_of_birth"  name="mother_date_of_birth" placeholder="Data de Nascimento"/>
                                                </div>
                                                  <div class="form-group">
                                                    <label class="control-label">CEP</label>                                    
                                                        <input type="text" class="form-control" id="mother_cep" name="mother_cep" placeholder="CEP" data-inputmask="'mask': '99999-999'"/>
                                                </div>  
                                                <div class="form-group">
                                                    <label class="control-label">Endereço</label>                                     
                                                        <input type="text" class="form-control" id="mother_address" name="mother_address" placeholder="Endereço"   />
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label">Bairro</label>                                
                                                         <input type="text" class="form-control" id="mother_neighbourhood" name="mother_neighbourhood" placeholder="Bairro"  />
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label">Cidade</label>                                    
                                                        <input type="text" class="form-control" id="mother_city" name="mother_city" placeholder="Cidade" onfocus="active_autocomplete({id: this.id, target_field: 'mother_city', search_field: 'mother_city', table: 'digitulus_mother'});"  />
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label">Estado</label>                                  
                                                        <select class="form-control" id="mother_state" name="mother_state" placeholder="Estado">
                                                            <option value="Minas Gerais">Minas Gerais</option>
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
                                                        <select class="form-control" id="mother_gender" name="mother_gender" placeholder="Sexo">
                                                            <option value=""></option>
                                                            <option value="Feminino">Feminino</option>
                                                            <option value="Masculino">Masculino</option>
                                                        </select>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label">Estado Civil</label> 
                                                        <select class="form-control" id="mother_civil_status" name="mother_civil_status" placeholder="Estado Civil">
                                                            Solteiro Casado Em União Estável Divorciado Separado Viúvo
                                                            <option value=""></option>
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
                                                        <input type="text" class="form-control" id="mother_profession" name="mother_profession" placeholder="Profissão" onfocus="active_autocomplete({id: this.id, target_field: 'mother_profession', search_field: 'mother_profession', table: 'digitulus_mother'});" />
                                                </div>  
                                                <div class="form-group">
                                                    <label class="control-label">Passaporte</label>    
                                                        <input type="text" class="form-control" id="mother_passport" name="mother_passport" placeholder="Passaporte" data-inputmask="'mask': 'AA999999'"  />
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label">Data de validade do passaporte</label>
                                                        <input type="text" class="form-control" id="mother_passport_expire_date" name="mother_passport_expire_date" placeholder="Data de validade do passaporte"   />
                                                </div>
                                                <div class="form-group" id="cpf_div">
                                                    <label class="control-label" id="cpf_label">CPF</label>
                                                        <input type="text" class="form-control" id="mother_cpf" name="mother_cpf" placeholder="CPF" onblur="TestaCPF();" data-inputmask="'mask':'999.999.999-99'" />
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label">RG</label>
                                                        <input type="text" class="form-control" id="mother_rg" name="mother_rg" placeholder="RG"  />
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label">Outras informações</label>
                                                        <textarea type="text" class="form-control" id="mother_other_information" name="mother_other_information" placeholder="Outras informações"  ></textarea>
                                                </div>                             
                                                <div class="form-group">
                                                    <label class="control-label">Nome da pessoa de contato</label>
                                                        <input type="text" class="form-control" id="mother_contact_name"  name="mother_contact_name" placeholder="Nome da pessoa de contato"  />
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label">Relação com a pessoa de contato</label>
                                                        <input type="text" class="form-control" id="mother_contact_relation" name="mother_contact_relation" placeholder="Relação com a pessoa de contato"  />
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label">Telefone da pessoa de contato</label>
                                                        <input type="text" class="form-control" id="mother_contact_phone" name="mother_contact_phone" placeholder="Telefone da pessoa de contato" />
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label">Email da pessoa de contato</label>
                                                        <input type="text" class="form-control" id="mother_contact_email" name="mother_contact_email" placeholder="Email da pessoa de contato" />
                                                </div>
                                            </div><!-- /.pad -->
                                        </div><!-- /.box-body -->
                                        <div class="box-footer" style="display: none;">
                                            <div class="row">
                                            </div><!-- /.row -->
                                        </div><!-- /.box-footer -->
                                    </div><!-- /.box -->
                                </div>
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

//Busca do Pai, carrega no formulario todas as infromações recuperadas do pai 
$("#father_search").change(function() {
    var father_search=$("#father_search").val();
    father_search=father_search.split("|");
    father_id=father_search[0];
    var father=ajax_db_return({search_word: father_id, target_field: "*", search_field: "client_id", table: "digitulus_client"});
    
    $("#father_id").val(father["client_id"]);
    $("#father_name").val(father["client_name"]);
    $("#father_surname").val(father["client_surname"]);
    $("#father_phone").val(father["client_phone"]);
    $("#father_mobile").val(father["client_mobile"]);
    $("#father_email").val(father["client_email"]);
    $("#father_client_how_to_reach_us").val(father["client_how_to_reach_us"]);
    $("#father_date_of_birth").val(father["client_date_of_birth"]);
    $("#father_cep").val(father["client_cep"]);
    $("#father_address").val(father["client_address"]);
    $("#father_neighbourhood").val(father["client_neighbourhood"]);
    $("#father_city").val(father["client_city"]);
    $("#father_state").val(father["client_state"]);
    $("#father_gender").val(father["client_gender"]);
    $("#father_civil_status").val(father["client_civil_status"]);
    $("#father_profession").val(father["client_profession"]);
    $("#father_passport").val(father["client_passport"]);
    $("#father_cpf").val(father["client_cpf"]);
    $("#father_rg").val(father["client_rg"]);
    $("#father_passport_expire_date").val(father["client_passport_expire_date"]);
    $("#father_other_information").val(father["client_other_information"]);
    $("#father_contact_name").val(father["client_contact_name"]);
    $("#client_contact_relation").val(father["client_contact_relation"]);
    $("#father_contact_phone").val(father["client_contact_phone"]);
    $("#father_contact_email").val(father["client_contact_email"]);

});

//Busca da Mãe, carrega no formulario todas as infromações recuperadas da mãe
$("#mother_search").change(function() {
    var mother_search=$("#mother_search").val();
    mother_search=mother_search.split("|");
    mother_id=mother_search[0];
    var mother=ajax_db_return({search_word: mother_id, target_field: "*", search_field: "client_id", table: "digitulus_client"});
    
    $("#mother_id").val(mother["client_id"]);
    $("#mother_name").val(mother["client_name"]);
    $("#mother_surname").val(mother["client_surname"]);
    $("#mother_phone").val(mother["client_phone"]);
    $("#mother_mobile").val(mother["client_mobile"]);
    $("#mother_email").val(mother["client_email"]);
    $("#mother_client_how_to_reach_us").val(mother["client_how_to_reach_us"]);
    $("#mother_date_of_birth").val(mother["client_date_of_birth"]);
    $("#mother_cep").val(mother["client_cep"]);
    $("#mother_address").val(mother["client_address"]);
    $("#mother_neighbourhood").val(mother["client_neighbourhood"]);
    $("#mother_city").val(mother["client_city"]);
    $("#mother_state").val(mother["client_state"]);
    $("#mother_gender").val(mother["client_gender"]);
    $("#mother_civil_status").val(mother["client_civil_status"]);
    $("#mother_profession").val(mother["client_profession"]);
    $("#mother_passport").val(mother["client_passport"]);
    $("#mother_cpf").val(mother["client_cpf"]);
    $("#mother_rg").val(mother["client_rg"]);
    $("#mother_passport_expire_date").val(mother["client_passport_expire_date"]);
    $("#mother_other_information").val(mother["client_other_information"]);
    $("#mother_contact_name").val(mother["client_contact_name"]);
    $("#client_contact_relation").val(mother["client_contact_relation"]);
    $("#mother_contact_phone").val(mother["client_contact_phone"]);
    $("#mother_contact_email").val(mother["client_contact_email"]);

});

//Busca do Cliente, carrega no formulario todas as infromações recuperadas do cliente 
$("#client_search").change(function() {
    var client_search=$("#client_search").val();
    client_search=client_search.split("|");
    client_id=client_search[0];
    var client=ajax_db_return({search_word: client_id, target_field: "*", search_field: "client_id", table: "digitulus_client"});
    
    $("#client_id").val(client["client_id"]);
    $("#client_name").val(client["client_name"]);
    $("#client_surname").val(client["client_surname"]);
    $("#client_phone").val(client["client_phone"]);
    $("#client_mobile").val(client["client_mobile"]);
    $("#client_email").val(client["client_email"]);
    $("#client_client_how_to_reach_us").val(client["client_how_to_reach_us"]);
    $("#client_date_of_birth").val(client["client_date_of_birth"]);
    $("#client_cep").val(client["client_cep"]);
    $("#client_address").val(client["client_address"]);
    $("#client_neighbourhood").val(client["client_neighbourhood"]);
    $("#client_city").val(client["client_city"]);
    $("#client_state").val(client["client_state"]);
    $("#client_gender").val(client["client_gender"]);
    $("#client_civil_status").val(client["client_civil_status"]);
    $("#client_profession").val(client["client_profession"]);
    $("#client_passport").val(client["client_passport"]);
    $("#client_cpf").val(client["client_cpf"]);
    $("#client_rg").val(client["client_rg"]);
    $("#client_passport_expire_date").val(client["client_passport_expire_date"]);
    $("#client_other_information").val(client["client_other_information"]);
    $("#client_contact_name").val(client["client_contact_name"]);
    $("#client_contact_relation").val(client["client_contact_relation"]);
    $("#client_contact_phone").val(client["client_contact_phone"]);
    $("#client_contact_email").val(client["client_contact_email"]);

});

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
    function clean_form(form){
        $("#"+form+"_search").val("");
        $("#"+form+"_id").val("");
        $("#"+form+"_name").val("");
        $("#"+form+"_surname").val("");
        $("#"+form+"_phone").val("");
        $("#"+form+"_mobile").val("");
        $("#"+form+"_email").val("");
        $("#"+form+"_"+form+"_how_to_reach_us").val("");
        $("#"+form+"_date_of_birth").val("");
        $("#"+form+"_cep").val("");
        $("#"+form+"_address").val("");
        $("#"+form+"_neighbourhood").val("");
        $("#"+form+"_city").val("");
        $("#"+form+"_state").val("");
        $("#"+form+"_gender").val("");
        $("#"+form+"_civil_status").val("");
        $("#"+form+"_profession").val("");
        $("#"+form+"_passport").val("");
        $("#"+form+"_cpf").val("");
        $("#"+form+"_rg").val("");
        $("#"+form+"_passport_expire_date").val("");
        $("#"+form+"_other_information").val("");
        $("#"+form+"_contact_name").val("");
        $("#"+form+"_contact_relation").val("");
        $("#"+form+"_contact_phone").val("");
        $("#"+form+"_contact_email").val("");
    }
</script>