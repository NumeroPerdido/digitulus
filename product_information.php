<!--esse arquivo é responsável por salvar as informações enviadas via formulário, tanto no add produto como no editar produto-->
<?php
    if (isset($_POST["qtproducts"])){
        include_once "budget.class.php";
        include_once "product.class.php";
        for($i=1;$i<=$_POST["qtproducts"];$i++){
            $product= new Product();
            $budget= new Budget();
            $product->sku=$_POST["sku".$i];
            $product->name=$_POST["name".$i];
            $product->school=$_POST["school".$i];
            $country=explode(",",$_POST["country".$i]);
            $product->country=$country[0];
            $product->city=$_POST["city".$i];
            $product->neighbourhood=$_POST["neighbourhood".$i];
            $product->image_label=$_POST["image_label".$i];
            $accommodation_duration=explode(",",$_POST["accommodation_duration".$i]);
            $course_duration=explode(",",$_POST["course_duration".$i]);
            //salva duração da acomodação em formato texto
            if($accommodation_duration>1){
                $product->accommodation_duration=$accommodation_duration[0]." semanas";
            }
            else{
                $product->accommodation_duration=$accommodation_duration[0]." semana";
            }
            //salva a duração do curso em formato texto
            if($course_duration>1){
                $product->course_duration=$course_duration[0]." semanas";
            }
            else{
                $product->course_duration=$course_duration[0]." semana";
            }
            $product->accommodation_type=$_POST["accommodation_type".$i];
            $product->description=$_POST["description".$i];;
            $product->flight_conditions=$_POST["flight_conditions".$i];
            $product->holidays=$_POST["holidays".$i];
            //salva o texto insurance, dependendo do país e se o seguro obrigatório fo >0
            if($_POST["required_insurance_value".$i]>0){
                switch($product->country){   
                    case "Austrália":
                        $product->insurance="Cobertura Médica ILIMITADA + Seguro OSHC";
                        break;
                    case "Irlanda":
                        $product->insurance="Cobertura Médica ILIMITADA + Seguro Governamental Obrigatório";
                        break;
                    default:
                        $product->insurance="Cobertura Médica ILIMITADA + Seguro da Escola";
                        break;
                }
            }
            else{
                $product->insurance="Cobertura Médica ILIMITADA";
            }
            $product->lessons_per_week=$_POST["lessons_per_week".$i];
            $product->lesson_duration=$_POST["lesson_duration".$i];
            $product->meals=$_POST["meals".$i];
            $product->meta_description=$_POST["meta_description".$i];
            $product->new=$_POST["new".$i];
            $product->status=$_POST["status".$i];
            $product->requirements=$_POST["requirements".$i];
            $product->room=$_POST["room".$i];
            $product->sale=$_POST["sale".$i];
            $product->short_description=$_POST["short_description".$i];
            $product->start_dates=$_POST["start_dates".$i];
            $product->url_key=$_POST["url_key".$i];
            $product->videoid=$_POST["videoid".$i];
            $product->visibility=$_POST["visibility".$i];
            $product->language=$_POST["language".$i];
  
            $budget->sku_budget = $_POST["sku".$i];
            $budget->currency_code = $_POST["currency_code".$i];
            $budget->course_duration_value = $course_duration[0];
            $budget->course_gross_per_week = $_POST["course_gross_per_week".$i];
            $budget->course_promo_per_week = $_POST["course_promo_per_week".$i];
            $budget->course_commission = $_POST["course_commission".$i];
            $budget->accommodation_duration_value = $accommodation_duration[0];
            $budget->accommodation_per_week = $_POST["accommodation_per_week".$i];
            $budget->discount_accommodation = $_POST["discount_accommodation".$i];
            $budget->accommodation_commission = $_POST["accommodation_commission".$i];
            $budget->material_fee_value = $_POST["material_fee_value".$i];
            $budget->registration_fee_value = $_POST["registration_fee_value".$i];
            $budget->accommodation_fee_value = $_POST["accommodation_fee_value".$i];
            $budget->exam_fee_value = $_POST["exam_fee_value".$i];
            $budget->student_service_fee_value = $_POST["student_service_fee_value".$i];
            $budget->courier_fee_value = $_POST["courier_fee_value".$i];
            $budget->airport_transfer_value = $_POST["airport_transfer_value".$i];
            $budget->discount_fees_value = $_POST["discount_fees_value".$i];
            $budget->required_insurance_value = $_POST["required_insurance_value".$i];
            $budget->factor_profit = $_POST["factor_profit".$i];
            $budget->iata_arrival_at = $_POST["iata_arrival_at".$i];
            $budget->price = $_POST["price".$i];
            $budget->special_price = $_POST["special_price".$i];
            $budget->cost = $_POST["cost".$i];
            $budget->special_to_date = $_POST["special_to_date".$i];
            
            //caso os dados tenham vindo da página Adicionar Produto, um novo produto é inserido no banco de dados
            if($_GET["page"]=="add"){
                $product->insert_product();
                $budget->insert_budget();
                header('Location:index.php?page=Lista-de-Produtos&success=add');
            }
            //caso os dados tenham vindo da página Editar Produto, os dados do produto são atualizados a partir do sku
            if($_GET["page"]=="edit"){
                $product->update_product($product->sku);
                $budget->update_budget();
                header('Location:index.php?page=Lista-de-Produtos&success=edit');
            }
        }
    }
    else{
        header('Location:index.php?page=erro');
    }
?>