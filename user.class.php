<?php
   include_once "db.class.php";
    class User{
        var $user_id;
        var $username;
        var $password;
        var $email;
        var $validated;
        var $group_id;
        var $last_active;
        var $user_key;
        //construtor da classe
        function __construct(){		
				
        }
		//função que retorna o tipo de funcionário de acordo com a numeração
		function nameGroupId(){
			$db = new DB();
			$sql=$db->row("SELECT name FROM digitulus_user_group WHERE group_id = :group_id ", array("group_id" => $this->group_id));
            return $sql["name"];
		}	
        //função apara carregar as funções do usário a partir do email e senha
        function loaduser($email,$pass){
            $db = new DB();
            $sql=$db->row("SELECT * FROM digitulus_user WHERE email = :e AND password = :p", array("e" => $email, "p" => $pass));
            $this->user_id=$sql["user_id"];
            $this->username=$sql["username"];
            $this->password=$sql["password"];
            $this->email=$sql["email"];
            $this->validated=$sql["validated"];
            $this->group_id=$sql["group_id"];
            $this->last_active=$sql["last_active"];
            $this->user_key=$sql["user_key"];
            return($sql);
        }

       //função apara carregar as funções do usário a partir do email 
		function load_email($email){
            $db = new DB();
            $sql=$db->row("SELECT * FROM digitulus_user WHERE email = :e ", array("e" => $email));
            $this->user_id=$sql["user_id"];
            $this->username=$sql["username"];
            $this->password=$sql["password"];
            $this->email=$sql["email"];
            $this->validated=$sql["validated"];
            $this->group_id=$sql["group_id"];
            $this->last_active=$sql["last_active"];
            $this->user_key=$sql["user_key"];
            return($sql);
        }
		
       //função apara carregar as funções do usário a partir do username
		function load_username($username){
            $db = new DB();
            $sql=$db->row("SELECT * FROM digitulus_user WHERE username = :u ", array("u" => $username));
            $this->user_id=$sql["user_id"];
            $this->username=$sql["username"];
            $this->password=$sql["password"];
            $this->email=$sql["email"];
            $this->validated=$sql["validated"];
            $this->group_id=$sql["group_id"];
            $this->user_key=$sql["user_key"];
            return($sql);
        }
        //função apara carregar as funções do usário a partir do username
		function load_user_key($k){
            $db = new DB();
            $sql=$db->row("SELECT * FROM digitulus_user WHERE user_key = :k ", array("k" => $k));
            $this->user_id=$sql["user_id"];
            $this->username=$sql["username"];
            $this->password=$sql["password"];
            $this->email=$sql["email"];
            $this->validated=$sql["validated"];
            $this->group_id=$sql["group_id"];
            $this->user_key=$sql["user_key"];
            return($sql);
        }
		//função apara carregar as funções do usário a partir do id do usuário
		function get_user($user_id)
		{
			$db = new DB();
            $sql=$db->row("SELECT * FROM digitulus_user WHERE user_id = :u", array("u" => $user_id));
			$this->user_id = $sql['user_id'];
			$this->username = $sql['username'];
			$this->password = $sql['password'];
			$this->email = $sql['email'];
			$this->validated = $sql['validated'];
			$this->group_id = $sql['group_id'];
			$this->user_key = $sql['user_key'];
            return($sql);
		}
		//atualiza o usuário no banco de dados
		function update_user()
		{
			$db = new DB();
            $sql=$db->query("UPDATE digitulus_user SET username = :username, password = :password, email = :email, validated = :validated, group_id = :group_id , user_key = :user_key WHERE user_id = :user_id", array("user_id"=>$this->user_id, "username"=>$this->username,"password"=>$this->password,"email"=>$this->email,"validated"=>$this->validated,"group_id"=>$this->group_id,"user_key"=>$this->user_key));
		}			
		//deleta o usuário no banco de dados
		function delete_user($username){
            $db = new DB();
            $sql=$db->row("DELETE FROM digitulus_user WHERE email = :e ", array("e" => $email));
            return($sql);
        }
		
		//insere novo usuário no banco de dados		
        function insert_user(){
            $fields ="`user_id`, `username`, `password`, `email`, `validated`, `group_id`, `last_active`, `user_key`";
            $db= new DB();
            $insert=$db->query("INSERT INTO digitulus_user(".$fields.") VALUES(:user_id,:username,:password,:email,:validated,:group_id,:last_active,:user_key)", array("user_id"=>"NULL","username"=>$this->username,"password"=>$this->password,"email"=>$this->email,"validated"=>$this->validated,"group_id"=>$this->group_id,"last_active"=>$this->last_active,"user_key"=>$this->user_key));
        }
        //função que retorna o caminho da imagem de perfil do usuário
        function get_user_profile_img(){
            if(file_exists("img/profile/".$this->user_id.".jpg")){
                return "img/profile/".$this->user_id.".jpg";
            }
            elseif(file_exists("img/profile/".$this->user_id.".png")){
                return "img/profile/".$this->user_id.".png";
            }
            elseif(file_exists("img/profile/".$this->user_id.".jpeg")){
                return "img/profile/".$this->user_id.".jpeg";
            }
            else{
                return "img/profile/default.png";
            }
        }
    }
?>