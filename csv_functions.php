<?php
    
    include_once "product.class.php";
	include_once "budget.class.php";
    //função que cria objetos produtos apartir de linhas 
	

    function importcsv($csv){
        
        
        $product= new Product();
		$budget = new Budget();
       
        //cria um produto com cada linha do cvs
        for($i=1;$i<=sizeof($csv)-2;$i++)
		{
 
            //atribui os produtos da linha para
           
			$product->sku=$csv[$i][0];
			$product->name=$csv[$i][1];
			$product->school=$csv[$i][2];
			$product->neighbourhood=$csv[$i][3];
			$product->city=$csv[$i][4];
			$product->country=$csv[$i][5];
			$product->course_duration=$csv[$i][6];
			$product->short_description=$csv[$i][7];
			$product->description=$csv[$i][8];
			$product->start_dates=$csv[$i][9];
			$product->holidays=$csv[$i][10];
			$product->accommodation_duration=$csv[$i][11];
			$product->accommodation_type=$csv[$i][12];
			$product->room=$csv[$i][13];
			$product->meals=$csv[$i][14];
			$product->registration_fee=$csv[$i][15];
			$product->material_fee=$csv[$i][16];
			$product->accommodation_fee=$csv[$i][17];
			$product->exam_fee=$csv[$i][18];
			$product->courier_fee=$csv[$i][19];
			$product->student_service_fee=$csv[$i][20];
			$product->banking_fees=$csv[$i][21];
			$product->airport_transfer=$csv[$i][22];
			$product->insurance=$csv[$i][23];
			$product->videoid=$csv[$i][24];
			$product->image_label=$csv[$i][25];
			$product->thumbnail=$csv[$i][26];
			$product->flight_conditions=$csv[$i][27];
			$product->flight_included=$csv[$i][28];
			$product->created_at=$csv[$i][29];
			$product->lessons_per_week=$csv[$i][30];
			$product->lesson_duration=$csv[$i][31];
			$product->meta_description=$csv[$i][32];
			$product->new=$csv[$i][33];
			$product->news_from_date=$csv[$i][34];
			$product->news_to_date=$csv[$i][35];
			$product->status=$csv[$i][36];
			$product->sale=$csv[$i][37];
			$product->visibility=$csv[$i][38];
			$product->requirements=$csv[$i][39];
			$product->whats_included=$csv[$i][40];
			$product->whats_not_included=$csv[$i][41];
			$product->url_key=$csv[$i][42];
			$product->language=$csv[$i][43];
			$product->status_digitulus=$csv[$i][44];
			$product->latitude=$csv[$i][45];
			$product->longitude=$csv[$i][46];
			//setando valores de budget
			$budget->sku_budget=$csv[$i][0];
			$budget->currency_code=$csv[$i][47];
			$budget->course_duration_value=$csv[$i][48];
			$budget->course_gross_per_week=$csv[$i][49];
			$budget->course_promo_per_week=$csv[$i][50];
			$budget->course_commission=$csv[$i][51];
			$budget->accommodation_duration_value=$csv[$i][52];
			$budget->accommodation_per_week=$csv[$i][53];
			$budget->discount_accommodation=$csv[$i][54];
			$budget->accommodation_commission=$csv[$i][55];
			$budget->material_fee_value=$csv[$i][56];
			$budget->registration_fee_value=$csv[$i][57];
			$budget->accommodation_fee_value=$csv[$i][58];
			$budget->exam_fee_value=$csv[$i][59];
			$budget->student_service_fee_value=$csv[$i][60];
			$budget->courier_fee_value=$csv[$i][61];
			$budget->airport_transfer_value=$csv[$i][62];
			$budget->discount_fees_value=$csv[$i][63];
			$budget->required_insurance_value=$csv[$i][64];
			$budget->default_factor_profit=$csv[$i][65];
			$budget->factor_profit=$csv[$i][66];
			$budget->iata_arrival_at=$csv[$i][67];
			$budget->price=$csv[$i][68];
			$budget->special_price=$csv[$i][69];
			$budget->cost=$csv[$i][70];
			$budget->special_from_date=$csv[$i][71];
            $budget->special_to_date=$csv[$i][72];
				
		
			//chamada pra função que salva o produto no bd analisando se o produto já existe
            $product->analisar();
			$budget->analisar();
			
		}
        
    }
    
    //função para exportação dos produtos
    function exportcsv($products){
        //seta a data para o horário brasileiro
        date_default_timezone_set('America/Sao_Paulo');
        //do do csv que será gerado
        $name="Import_".date("d-m-Y_H-i-s").".csv";
        header('Content-Type: application/excel');
        //header para criação do arquivo 
        header('Content-Disposition: attachment; filename="'.$name."\"");
        //abre pra leitura
        $file = fopen('php://output', 'w');
        //cabeçalho do csv usando o modelo do csv de impot do magento
        $header =array("sku","_store","_attribute_set","_type","_category","_root_category","_product_websites","accommodation_duration","accommodation_fee","accommodation_type","airport_transfer","banking_fees","color","cost","country_of_manufacture","course_duration","courier_fee","created_at","custom_design","custom_design_from","custom_design_to","custom_layout_update","description","duration","enable_googlecheckout","flight_conditions","flight_included","flight_included_text","gallery","gift_message_available","has_options","holidays","image","image_label","insurance","is_imported","lessons_per_week","lesson_duration","manufacturer","material_fee","meals","media_gallery","meta_description","meta_keyword","meta_title","minimal_price","msrp","msrp_display_actual_price_type","msrp_enabled","name","new","news_from_date","news_to_date","options_container","page_layout","price","registration_fee","required_options","requirements","room","sale","short_description","small_image","small_image_label","special_from_date","special_price","special_to_date","start_dates","status","student_service_fee","tax_class_id","thumbnail","thumbnail_label","updated_at","url_key","url_path","videoid","visibility","weight","whats_not_included","qty","min_qty","use_config_min_qty","is_qty_decimal","backorders","use_config_backorders","min_sale_qty","use_config_min_sale_qty","max_sale_qty","use_config_max_sale_qty","is_in_stock","notify_stock_qty","use_config_notify_stock_qty","manage_stock","use_config_manage_stock","stock_status_changed_auto","use_config_qty_increments","qty_increments","use_config_enable_qty_inc","enable_qty_increments","is_decimal_divided","_links_related_sku","_links_related_position","_links_crosssell_sku","_links_crosssell_position","_links_upsell_sku","_links_upsell_position","_associated_sku","_associated_default_qty","_associated_position","_tier_price_website","_tier_price_customer_group","_tier_price_qty","_tier_price_price","_group_price_website","_group_price_customer_group","_group_price_price","_media_attribute_id","_media_image","_media_lable","_media_position","_media_is_disabled");
        fputcsv($file, $header);
        for($i=0;$i<sizeof($products);$i++){
            fputcsv($file, $products[$i]);
        }
        fclose($file);
    }

?>