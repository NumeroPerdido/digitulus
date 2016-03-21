<?php
   include_once "db.class.php";
    class Client{
        var $client_id;
		var $client_surname;
		var $client_name;
		var $client_phone;
		var $client_mobile;
		var $client_email;
		var $client_how_to_reach_us;
		var $client_date_of_birth;
		var $client_address;
		var $client_neighbourhood;
		var $client_city;
		var $client_state;
		var $client_cep;
		var $client_gender;
		var $client_civil_status;		
		var $client_profession;
		var $client_passport;
		var $client_passport_expire_date;
		var $client_cpf;
		var $client_rg;
		var $client_other_information;		
		var $client_contact_name;
		var $client_contact_relation;
		var $client_contact_phone;
		var $client_contact_email;
		var $client_future_opportunities;
        
        function __construct(){

        }
		//função pegas todas as informações do cliente dentro do BD a partir do client_id
		function get_client($client_id)
		{
			$db = new DB();
            $sql=$db->row("SELECT * FROM digitulus_client WHERE client_id = :i", array("i" => $client_id));
			$this->client_id = $sql['client_id'];
			$this->client_surname = $sql['client_surname'];
			$this->client_name = $sql['client_name'];
			$this->client_phone = $sql['client_phone'];
			$this->client_mobile = $sql['client_mobile'];
			$this->client_email = $sql['client_email'];
			$this->client_how_to_reach_us = $sql['client_how_to_reach_us'];
			$this->client_date_of_birth = $sql['client_date_of_birth'];
			$this->client_address = $sql['client_address'];
			$this->client_neighbourhood = $sql['client_neighbourhood'];
			$this->client_city = $sql['client_city'];
			$this->client_state = $sql['client_state'];
			$this->client_cep = $sql['client_cep'];
			$this->client_gender = $sql['client_gender'];
			$this->client_civil_status = $sql['client_civil_status'];
			$this->client_profession = $sql['client_profession'];
			$this->client_passport = $sql['client_passport'];
			$this->client_passport_expire_date = $sql['client_passport_expire_date'];
			$this->client_cpf = $sql['client_cpf'];
			$this->client_rg = $sql['client_rg'];
			$this->client_other_information = $sql['client_other_information'];
			$this->client_contact_name = $sql['client_contact_name'];
			$this->client_contact_relation = $sql['client_contact_relation'];
			$this->client_contact_phone = $sql['client_contact_phone'];
			$this->client_contact_email = $sql['client_contact_email'];
			$this->client_future_opportunities = $sql['client_future_opportunities'];
            return($sql);
		}
		//deleta cliente no banco de dados
		function delete_client($client_id)
		{
			$db = new DB();
            $sql=$db->row("DELETE FROM digitulus_client WHERE client_id = :i", array("i" => $client_id));
            return($sql);
		}
		//atualiza o cliente no banco de dados
		function update_client()
		{
			
			$db = new DB();
            $sql=$db->query("UPDATE digitulus_client SET client_surname = :client_surname, client_name = :client_name, client_phone = :client_phone, client_mobile = :client_mobile, client_email = :client_email, client_how_to_reach_us = :client_how_to_reach_us, client_date_of_birth = :client_date_of_birth, client_address = :client_address, client_neighbourhood = :client_neighbourhood, client_city = :client_city, client_state = :client_state, client_cep = :client_cep, client_gender = :client_gender, client_civil_status = :client_civil_status, client_profession = :client_profession, client_passport = :client_passport, client_passport_expire_date = :client_passport_expire_date, client_cpf = :client_cpf, client_rg = :client_rg, client_other_information = :client_other_information, client_contact_name = :client_contact_name, client_contact_relation = :client_contact_relation, client_contact_phone = :client_contact_phone, client_contact_email = :client_contact_email, client_future_opportunities = :client_future_opportunities WHERE client_id = :client_id", array("client_id"=>$this->client_id, "client_surname"=>$this->client_surname, "client_name"=>$this->client_name, "client_phone"=>$this->client_phone, "client_mobile"=>$this->client_mobile, "client_email"=>$this->client_email, "client_how_to_reach_us"=>$this->client_how_to_reach_us, "client_date_of_birth"=>$this->client_date_of_birth, "client_address"=>$this->client_address, "client_neighbourhood"=>$this->client_neighbourhood, "client_city"=>$this->client_city, "client_state"=>$this->client_state, "client_cep"=>$this->client_cep, "client_gender"=>$this->client_gender, "client_civil_status"=>$this->client_civil_status, "client_profession"=>$this->client_profession, "client_passport"=>$this->client_passport, "client_passport_expire_date"=>$this->client_passport_expire_date, "client_cpf"=>$this->client_cpf, "client_rg"=>$this->client_rg, "client_other_information"=>$this->client_other_information, "client_contact_name"=>$this->client_contact_name, "client_contact_relation"=>$this->client_contact_relation, "client_contact_phone"=>$this->client_contact_phone, "client_contact_email"=>$this->client_contact_email, "client_future_opportunities"=>$this->client_future_opportunities));
		}		
		//insere o cliente no banco de dados
        function insert_client(){
            $fields ="client_surname, client_name, client_phone, client_mobile, client_email, client_how_to_reach_us, client_date_of_birth, client_address, client_neighbourhood, client_city, client_state, client_cep, client_gender, client_civil_status, client_profession, client_passport, client_passport_expire_date, client_cpf, client_rg, client_other_information, client_contact_name, client_contact_relation, client_contact_phone, client_contact_email, client_future_opportunities";
            $db= new DB();
            $insert=$db->query("INSERT INTO digitulus_client(".$fields.") VALUES(:client_surname, :client_name, :client_phone, :client_mobile, :client_email, :client_how_to_reach_us, :client_date_of_birth, :client_address, :client_neighbourhood, :client_city, :client_state, :client_cep, :client_gender, :client_civil_status, :client_profession, :client_passport, :client_passport_expire_date, :client_cpf, :client_rg, :client_other_information, :client_contact_name, :client_contact_relation, :client_contact_phone, :client_contact_email, :client_future_opportunities)", array("client_surname"=>$this->client_surname, "client_name"=>$this->client_name, "client_phone"=>$this->client_phone, "client_mobile"=>$this->client_mobile, "client_email"=>$this->client_email, "client_how_to_reach_us"=>$this->client_how_to_reach_us, "client_date_of_birth"=>$this->client_date_of_birth, "client_address"=>$this->client_address, "client_neighbourhood"=>$this->client_neighbourhood, "client_city"=>$this->client_city, "client_state"=>$this->client_state, "client_cep"=>$this->client_cep, "client_gender"=>$this->client_gender, "client_civil_status"=>$this->client_civil_status, "client_profession"=>$this->client_profession, "client_passport"=>$this->client_passport, "client_passport_expire_date"=>$this->client_passport_expire_date, "client_cpf"=>$this->client_cpf, "client_rg"=>$this->client_rg, "client_other_information"=>$this->client_other_information, "client_contact_name"=>$this->client_contact_name, "client_contact_relation"=>$this->client_contact_relation, "client_contact_phone"=>$this->client_contact_phone, "client_contact_email"=>$this->client_contact_email, "client_future_opportunities"=>$this->client_future_opportunities));
            //pega o último id inserido
            $last_id=$db->query("SELECT LAST_INSERT_ID()");
            $this->client_id=$last_id[0]["LAST_INSERT_ID()"];
            //retorna o último id inserido
            return $last_id;
        }

        //gera a relação familiar do client
        function insert_family_relation($father_id, $mother_id){
        	$fields="child_id, father_id, mother_id";
        	$db=new DB();
        	//Verifica se a relação existe, se existir apenas atualiza, se não existir cria a relação
        	$check=$db->query("SELECT * FROM digitulus_family_relation WHERE child_id = :id", array("id" => $this->client_id));
        	// if($check[0]["family_relation_id"]!=""){
        	// 	if($father_id==""){
        	// 		$father_id=$check[0]["father_id"];
        	// 	}
        	// 	if($mother_id==""){
        	// 		$mother_id=$check[0]["mother_id"];
        	// 	}
        	// 	$db->query("UPDATE digitulus_family_relation SET child_id= :child_id, father_id= :father_id, mother_id= :mother_id WHERE family_relation_id= :family_relation_id", array("child_id"=>$this->client_id, "father_id"=>$father_id, "mother_id"=>$mother_id, "family_relation_id"=>$check[0]["family_relation_id"]));
        	// }
        	// else{
        	// 	$db->query("INSERT INTO digitulus_family_relation(".$fields.") VALUES(:child_id, :father_id, :mother_id)", array("child_id"=>$this->client_id, "father_id"=>$father_id, "mother_id"=>$mother_id));
        	// }
        	$db->query("INSERT INTO digitulus_family_relation(".$fields.") VALUES(:child_id, :father_id, :mother_id)", array("child_id"=>$this->client_id, "father_id"=>$father_id, "mother_id"=>$mother_id));
        }

        function get_father_id(){
        	$db=new DB();
        	$sql=$db->query("SELECT father_id FROM digitulus_family_relation WHERE child_id= :id",array("id"=> $this->client_id));
        	if($sql==null){
        		return 0;
        	}
        	else{
        		return $sql[0]["father_id"];
        	}
        }
        function get_mother_id(){
        	$db=new DB();
        	$sql=$db->query("SELECT mother_id FROM digitulus_family_relation WHERE child_id= :id",array("id"=> $this->client_id));
        	if($sql==null){
        		return 0;
        	}
        	else{
        		return $sql[0]["mother_id"];
        	}
        }

        //zera as informações do cliente
        function reset_client(){
			unset($this->client_id);
			unset($this->client_surname);
			unset($this->client_name);
			unset($this->client_phone);
			unset($this->client_mobile);
			unset($this->client_email);
			unset($this->client_how_to_reach_us);
			unset($this->client_date_of_birth);
			unset($this->client_address);
			unset($this->client_neighbourhood);
			unset($this->client_city);
			unset($this->client_state);
			unset($this->client_cep);
			unset($this->client_gender);
			unset($this->client_civil_status);		
			unset($this->client_profession);
			unset($this->client_passport);
			unset($this->client_passport_expire_date);
			unset($this->client_cpf);
			unset($this->client_rg);
			unset($this->client_other_information);		
			unset($this->client_contact_name);
			unset($this->client_contact_relation);
			unset($this->client_contact_phone);
			unset($this->client_contact_email);
			unset($this->client_future_opportunities);
        }
    }
?>