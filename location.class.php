<?php
   include_once "db.class.php";

    class Location{
        //todos atributos do objeto produto que são os mesmos do banco de dados
        
        
        var $latitude;
        var $longitude;
    
        
        function __construct(){
            
        }
        function __destruct(){
        
        }
        
        //função pegas todas as informações do produto dentro do BD a partir do sku
        function get_location($sku){
            $db = new DB();
            $sql=$db->row("SELECT * FROM digitulus_product WHERE sku = :s", array("s" => $sku));
          
            $this->latitude=$sql["latitude"];
            $this->longitude=$sql["longitude"];
        }
        
        //função que carrega os atributos do produto a partir de um linha do csv
        function load_location($row){

            $this->latitude=$row["latitude"];
            $this->longitude=$row["longitude"];
        }
        
        //insere todos os atributos do objeto na bd
        function insert_location(){
            //campos do banco de dados
            $fields ="latitude,longitude";
            $db= new DB();
            $attributes= $this->getattributes();
            $sql="INSERT INTO digitulus_product(".$fields.") VALUES(".$attributes.")";
            $insert=$db->query($sql);
        }

      
         function update_location($skuo){
            
            $db= new DB();
            $update= $db->query("UPDATE digitulus_product SET latitude = :latitude, longitude = :longitude WHERE sku = :s", array("latitude"=>$this->latitude,"longitude"=>$this->longitude,"s"=>$skuo));
            
        }
        function getattributes(){
            
            $attributes="\"".$this->latitude."\"".",". "\"".$this->longitude."\"";
                                             
            return $attributes;
        }
      
    }
?>