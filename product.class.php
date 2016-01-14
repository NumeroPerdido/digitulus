<?php
   include_once "db.class.php";

    class Product{
        //todos atributos do objeto produto que são os mesmos do banco de dados
        var $sku;
        var $name;
        var $school;
        var $neighbourhood;
        var $city;
        var $country;
        var $course_duration;
        var $short_description;
        var $description;
        var $start_dates;
        var $holidays;
        var $accommodation_duration;
        var $accommodation_type;
        var $room;
        var $meals;
        var $registration_fee;
        var $material_fee;
        var $accommodation_fee;
        var $exam_fee;
        var $courier_fee;
        var $student_service_fee;
        var $banking_fees;
        var $airport_transfer;
        var $insurance;
        var $videoid;
        var $image_label;
        var $thumbnail;
        var $flight_conditions;
        var $flight_included;
        var $created_at;
        var $lessons_per_week;
        var $lesson_duration;
        var $meta_description;
        var $new;
        var $news_from_date;
        var $news_to_date;
        var $status;
        var $sale;
        var $visibility;
        var $requirements;
        var $whats_included;
        var $whats_not_included;
        var $url_key;
        var $language;
        var $status_digitulus;
        var $latitude;
        var $longitude;
    
        
        function __construct(){
            
        }
        function __destruct(){
        
        }
        
        //função pegas todas as informações do produto dentro do BD a partir do sku
        function get_product($sku){
            $db = new DB();
            $sql=$db->row("SELECT * FROM digitulus_product WHERE sku = :s", array("s" => $sku));
            $this->sku=$sql["sku"];
            $this->name=$sql["name"];
            $this->school=$sql["school"];
            $this->neighbourhood=$sql["neighbourhood"];
            $this->city=$sql["city"];
            $this->country=$sql["country"];
            $this->course_duration=$sql["course_duration"];
            $this->short_description=$sql["short_description"];
            $this->description=$sql["description"];
            $this->start_dates=$sql["start_dates"];
            $this->holidays=$sql["holidays"];
            $this->accommodation_duration=$sql["accommodation_duration"];
            $this->accommodation_type=$sql["accommodation_type"];
            $this->room=$sql["room"];
            $this->meals=$sql["meals"];
            $this->registration_fee=$sql["registration_fee"];
            $this->material_fee=$sql["material_fee"];
            $this->accommodation_fee=$sql["accommodation_fee"];
            $this->exam_fee=$sql["exam_fee"];
            $this->courier_fee=$sql["courier_fee"];
            $this->student_service_fee=$sql["student_service_fee"];
            $this->banking_fees=$sql["banking_fees"];
            $this->airport_transfer=$sql["airport_transfer"];
            $this->insurance=$sql["insurance"];
            $this->videoid=$sql["videoid"];
            $this->image_label=$sql["image_label"];
            $this->thumbnail=$sql["thumbnail"];
            $this->flight_conditions=$sql["flight_conditions"];
            $this->flight_included=$sql["flight_included"];
            $this->created_at=$sql["created_at"];
            $this->lessons_per_week=$sql["lessons_per_week"];
            $this->lesson_duration=$sql["lesson_duration"];
            $this->meta_description=$sql["meta_description"];
            $this->new=$sql["new"];
            $this->news_from_date=$sql["news_from_date"];
            $this->news_to_date=$sql["news_to_date"];
            $this->status=$sql["status"];
            $this->sale=$sql["sale"];
            $this->visibility=$sql["visibility"];
            $this->requirements=$sql["requirements"];
            $this->whats_included=$sql["whats_included"];
            $this->whats_not_included=$sql["whats_not_included"];
            $this->url_key=$sql["url_key"];
            $this->language=$sql["language"];
            $this->status_digitulus=$sql["status_digitulus"];
            $this->latitude=$sql["latitude"];
            $this->longitude=$sql["longitude"];
        }
        
        //função que carrega os atributos do produto a partir de um linha do csv
        function load_product($row){
            $this->sku=$row["sku"];
            $this->name=$row["name"];
            $this->accommodation_duration=$row["accommodation_duration"];
            $this->accommodation_fee=$row["accommodation_fee"];
            $this->accommodation_type=$row["accommodation_type"];
            $this->airport_transfer=$row["airport_transfer"];
            $this->banking_fees=$row["banking_fees"];
            $this->courier_fee=$row["courier_fee"];
            $this->course_duration=$row["course_duration"];
            $this->course_duration=$row["course_duration"];
            $this->created_at=date("d/m/Y");
            $this->description=$row["description"];
            $this->flight_conditions=$row["flight_conditions"];
            $this->flight_included=$row["flight_included"];
            $this->holidays=$row["holidays"];
            $this->insurance=$row["insurance"];
            $this->lessons_per_week=$row["lessons_per_week"];
            $this->lesson_duration=$row["lesson_duration"];
            $this->material_fee=$row["material_fee"];
            $this->meals=$row["meals"];
            $this->meta_description=$row["meta_description"];
            $this->new=$row["new"];
            $this->status=$row["status"];
            $this->registration_fee=$row["registration_fee"];
            $this->room=$row["room"];
            $this->sale=$row["sale"];
            $this->short_description=$row["short_description"];
            $this->start_dates=$row["start_dates"];
            $this->student_service_fee=$row["student_service_fee"];
            $this->url_key=$row["url_key"];
            $this->videoid=$row["videoid"];
            $this->visibility=$row["visibility"];
            $this->language=$row["language"];
            $this->image_label=$row["image_label"];
            $this->neighbourhood=$row["neighbourhood"];
            $this->thumbnail=$row["thumbnail"];
        }
        
        //insere todos os atributos do objeto na bd
        function insert_product(){
            //campos do banco de dados
            $fields ="sku,name,school,neighbourhood,city,country,course_duration,short_description,description,start_dates,holidays,accommodation_duration,accommodation_type,room,meals,registration_fee,material_fee,accommodation_fee,exam_fee,courier_fee,student_service_fee,banking_fees,airport_transfer,insurance,videoid,image_label,thumbnail,flight_conditions,flight_included,created_at,lessons_per_week,lesson_duration,meta_description,new,news_from_date,news_to_date,status,sale,visibility,requirements,whats_included,whats_not_included,url_key,language,status_digitulus,latitude,longitude";
            $db= new DB();
            $attributes= $this->getattributes();
            $sql="INSERT INTO digitulus_product(".$fields.") VALUES(".$attributes.")";
            $insert=$db->query($sql);
        }

        //deleta produto no banco de dados
        function delete_product($sku)
        {
            $db = new DB();
            $sql=$db->row("DELETE FROM digitulus_product WHERE sku = :s", array("s" => $sku));     
            return($sql);
        }

        // função que analisa o valor de sku, se for novo insere, se já existir, os valores serão inseridos
		function analisar()
		{
			$db= new DB();
			$sql=$db->row("SELECT * FROM digitulus_product WHERE sku ='" . $this->sku . "'");
			if (sizeof($sql) > 1)
				{
					$this->update_product($this->sku);
				}
				else 
				{
					$this->insert_product();
				}	
			
		}
		

        function update_product($skuo){
            
            $db= new DB();
            $update= $db->query("UPDATE digitulus_product SET sku = :sku, name = :name, school = :school, neighbourhood = :neighbourhood, city = :city, country = :country, course_duration = :course_duration, short_description = :short_description, description = :description, start_dates = :start_dates, holidays = :holidays, accommodation_duration = :accommodation_duration, accommodation_type = :accommodation_type, room = :room, meals = :meals, registration_fee = :registration_fee, material_fee = :material_fee, accommodation_fee = :accommodation_fee, exam_fee = :exam_fee, courier_fee = :courier_fee, student_service_fee = :student_service_fee, banking_fees = :banking_fees, airport_transfer = :airport_transfer, insurance = :insurance, videoid = :videoid, image_label = :image_label, thumbnail = :thumbnail, flight_conditions = :flight_conditions, flight_included = :flight_included, created_at = :created_at, lessons_per_week = :lessons_per_week, lesson_duration = :lesson_duration, meta_description = :meta_description, new = :new, news_from_date = :news_from_date, news_to_date = :news_to_date, status = :status, sale = :sale, visibility = :visibility, requirements = :requirements, whats_included = :whats_included, whats_not_included = :whats_not_included, url_key = :url_key, language = :language, status_digitulus = :status_digitulus, latitude = :latitude, longitude = :longitude WHERE sku = :s", array("sku"=>$this->sku,"name"=>$this->name,"school"=>$this->school,"neighbourhood"=>$this->neighbourhood,"city"=>$this->city,"country"=>$this->country,"course_duration"=>$this->course_duration,"short_description"=>$this->short_description,"description"=>$this->description,"start_dates"=>$this->start_dates,"holidays"=>$this->holidays,"accommodation_duration"=>$this->accommodation_duration,"accommodation_type"=>$this->accommodation_type,"room"=>$this->room,"meals"=>$this->meals,"registration_fee"=>$this->registration_fee,"material_fee"=>$this->material_fee,"accommodation_fee"=>$this->accommodation_fee,"exam_fee"=>$this->exam_fee,"courier_fee"=>$this->courier_fee,"student_service_fee"=>$this->student_service_fee,"banking_fees"=>$this->banking_fees,"airport_transfer"=>$this->airport_transfer,"insurance"=>$this->insurance,"videoid"=>$this->videoid,"image_label"=>$this->image_label,"thumbnail"=>$this->thumbnail,"flight_conditions"=>$this->flight_conditions,"flight_included"=>$this->flight_included,"created_at"=>$this->created_at,"lessons_per_week"=>$this->lessons_per_week,"lesson_duration"=>$this->lesson_duration,"meta_description"=>$this->meta_description,"new"=>$this->new,"news_from_date"=>$this->news_from_date,"news_to_date"=>$this->news_to_date,"status"=>$this->status,"sale"=>$this->sale,"visibility"=>$this->visibility,"requirements"=>$this->requirements,"whats_included"=>$this->whats_included,"whats_not_included"=>$this->whats_not_included,"url_key"=>$this->url_key,"language"=>$this->language,"status_digitulus"=>$this->status_digitulus,"latitude"=>$this->latitude,"longitude"=>$this->longitude,"s"=>$skuo));
            
        }
        //função que cria uma string com todas os atributos do objeto já formatado para incluir na query de insert. Exemplo formatação:"Londres","Inglaterra",
         
        function getattributes(){
            
            $attributes="\"".$this->sku."\"".",". "\"".$this->name."\"".",". "\"".$this->school."\"".",". "\"".$this->neighbourhood."\"".",". "\"".$this->city."\"".",". "\"".$this->country."\"".",". "\"".$this->course_duration."\"".",". "\"".$this->short_description."\"".",". "\"".$this->description."\"".",". "\"".$this->start_dates."\"".",". "\"".$this->holidays."\"".",". "\"".$this->accommodation_duration."\"".",". "\"".$this->accommodation_type."\"".",". "\"".$this->room."\"".",". "\"".$this->meals."\"".",". "\"".$this->registration_fee."\"".",". "\"".$this->material_fee."\"".",". "\"".$this->accommodation_fee."\"".",". "\"".$this->exam_fee."\"".",". "\"".$this->courier_fee."\"".",". "\"".$this->student_service_fee."\"".",". "\"".$this->banking_fees."\"".",". "\"".$this->airport_transfer."\"".",". "\"".$this->insurance."\"".",". "\"".$this->videoid."\"".",". "\"".$this->image_label."\"".",". "\"".$this->thumbnail."\"".",". "\"".$this->flight_conditions."\"".",". "\"".$this->flight_included."\"".",". "\"".$this->created_at."\"".",". "\"".$this->lessons_per_week."\"".",". "\"".$this->lesson_duration."\"".",". "\"".$this->meta_description."\"".",". "\"".$this->new."\"".",". "\"".$this->news_from_date."\"".",". "\"".$this->news_to_date."\"".",". "\"".$this->status."\"".",". "\"".$this->sale."\"".",". "\"".$this->visibility."\"".",". "\"".$this->requirements."\"".",". "\"".$this->whats_included."\"".",". "\"".$this->whats_not_included."\"".",". "\"".$this->url_key."\"".",". "\"".$this->language."\"".",". "\"".$this->status_digitulus."\"".",". "\"".$this->latitude."\"".",". "\"".$this->longitude."\"";
                                             
            return $attributes;
        }
        //função que gera um array com todos os atributos para exportação
        function export_product(){
            
            $attributes=array($this->sku , "" , "" , "" , "" , "" , "" , $this->accommodation_duration , $this->accommodation_fee , $this->accommodation_type , $this->airport_transfer , $this->banking_fees , "" , "" , "" , $this->course_duration , $this->courier_fee , $this->created_at , "" , "" , "" , "" , $this->description , "" , "" , $this->flight_conditions , $this->flight_included , "" , "" , "" , "" , $this->holidays , "" , "" , $this->insurance , "" , $this->lessons_per_week , $this->lesson_duration , "" , $this->material_fee , $this->meals , "" , $this->meta_description , "" , "" , "" , "" , "" , "" , $this->name , $this->new , "" , "" , "" , "" , "" , $this->registration_fee , "" , $this->requirements , $this->room , $this->sale , $this->short_description , "" , "" , "" , "" , "" , "" , $this->status , $this->student_service_fee , "" , "" , "" , "" , $this->url_key , "" , $this->videoid , $this->visibility , "" , "" , "" , "" , "" , "" , "" , "" , "" , "" , "" , "" , "" , "" , "" , "" , "" , "" , "" , "" , "" , "" , "" , "" , "" , "" , "" , "" , "" , "" , "" , "" , "" , "" , "" , "" , "" , "" , "" , "" , "" , "" , "" , "");
            
            return $attributes;
        }
        function get_last_sku(){
            $db= new DB();
            //pega todos os sku do produto
			$sql=$db->query("SELECT sku FROM digitulus_product");
            //criar um array só de números com os skus retornados
            for($i=0;$i<count($sql);$i++){
                if((int)$sql[$i]["sku"]!=0){
                    $sku[]=(int)$sql[$i]["sku"];
                }
            }
            //ordena o array em ordem crescente
            sort($sku);
            //retorna o sku na última posição do array
            return $sku[count($sku)-1];
        }
    }
?>