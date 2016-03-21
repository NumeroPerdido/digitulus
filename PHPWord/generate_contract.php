<?php
include_once "../deal_course.class.php";
include_once "../opportunity.class.php";
include_once "../client.class.php";
include_once "../currency.class.php";
include_once "../user.class.php";
$deal_course= new Deal_course();
$opportunity= new Opportunity();
$client= new Client();
$currency= new Currency();
$user= new User();
//carrega as informações do opportunity através do opportunity_id passado via get
$opportunity->get_opportunity($_GET['opportunity_id']);
//carrega as informações do deal course através do deal_course_id passado via get
$deal_course->get_deal_course($_GET['deal_course_id']);
//carrega as informações do client através do client_id passado via get
$client->get_client($opportunity->opportunity_client_id);
//carrega as informações da moeda
$currency->get_currency_by_name($deal_course->currency_name);

require_once 'src/PhpWord/Autoloader.php';

date_default_timezone_set('America/Sao_Paulo');

/**
 * Header file
 */
use PhpOffice\PhpWord\Autoloader;
use PhpOffice\PhpWord\Settings;

error_reporting(E_ALL);
define('CLI', (PHP_SAPI == 'cli') ? true : false);
define('EOL', CLI ? PHP_EOL : '<br />');
define('SCRIPT_FILENAME', basename($_SERVER['SCRIPT_FILENAME'], '.php'));
define('IS_INDEX', SCRIPT_FILENAME == 'index');

Autoloader::register();
Settings::loadConfig();

// Set writers
$writers = array('Word2007' => 'docx', 'ODText' => 'odt', 'RTF' => 'rtf', 'HTML' => 'html', 'PDF' => 'pdf');

// Set PDF renderer
if (null === Settings::getPdfRendererPath()) {
    $writers['PDF'] = null;
}

// Return to the caller script when runs by CLI
if (CLI) {
    return;
}

// Set titles and names
$pageHeading = str_replace('_', ' ', SCRIPT_FILENAME);
$pageTitle = IS_INDEX ? 'Welcome to ' : "{$pageHeading} - ";
$pageTitle .= 'PHPWord';
$pageHeading = IS_INDEX ? '' : "<h1>{$pageHeading}</h1>";

// Populate samples
$files = '';
if ($handle = opendir('.')) {
    while (false !== ($file = readdir($handle))) {
        if (preg_match('/^Sample_\d+_/', $file)) {
            $name = str_replace('_', ' ', preg_replace('/(Sample_|\.php)/', '', $file));
            $files .= "<li><a href='{$file}'>{$name}</a></li>";
        }
    }
    closedir($handle);
}

/**
 * Write documents
 *
 * @param \PhpOffice\PhpWord\PhpWord $phpWord
 * @param string $filename
 * @param array $writers
 *
 * @return string
 */
function write($phpWord, $filename, $writers)
{
    $result = '';

    // Write documents
    foreach ($writers as $format => $extension) {
        $result .= date('H:i:s') . " Write to {$format} format";
        if (null !== $extension) {
            $targetFile = "results/{$filename}.{$extension}";
            $phpWord->save($targetFile, $format);
        } else {
            $result .= ' ... NOT DONE!';
        }
        $result .= EOL;
    }

    $result .= getEndingNotes($writers);

    return $result;
}

/**
 * Get ending notes
 *
 * @param array $writers
 *
 * @return string
 */
function getEndingNotes($writers)
{
    $result = '';

    // Do not show execution time for index
    if (!IS_INDEX) {
        $result .= date('H:i:s') . " Done writing file(s)" . EOL;
        $result .= date('H:i:s') . " Peak memory usage: " . (memory_get_peak_usage(true) / 1024 / 1024) . " MB" . EOL;
    }

    // Return
    if (CLI) {
        $result .= 'The results are stored in the "results" subdirectory.' . EOL;
    } else {
        if (!IS_INDEX) {
            $types = array_values($writers);
            $result .= '<p>&nbsp;</p>';
            $result .= '<p>Results: ';
            foreach ($types as $type) {
                if (!is_null($type)) {
                    $resultFile = 'results/' . SCRIPT_FILENAME . '.' . $type;
                    if (file_exists($resultFile)) {
                        $result .= "<a href='{$resultFile}' class='btn btn-primary'>{$type}</a> ";
                    }
                }
            }
            $result .= '</p>';
        }
    }

    return $result;
}
?>

<?php

//retorna o dia da semana
function get_week_day($date) {
    $days=array("Domingo", "Segunda-Feira", "Terça-Feira", "Quarta-Feira", "Quinta-Feira", "Sexta-Feira", "Sábado");
    $day= date('w', strtotime($date));
    return $days[$day];
}
//include_once 'samples/Sample_Header.php';

// Template processor instance creation
echo date('H:i:s') , ' Creating new TemplateProcessor instance...' , EOL;
$templateProcessor = new \PhpOffice\PhpWord\TemplateProcessor('resources/Contrato.docx');

// Will clone everything between ${tag} and ${/tag}, the number of times. By default, 1.
// $templateProcessor->cloneBlock('CLONEME', 3);

// Everything between ${tag} and ${/tag}, will be deleted/erased.
$templateProcessor->deleteBlock('DELETEME');
$templateProcessor->setValue('client_name', $client->client_name);
$templateProcessor->setValue('client_surname', $client->client_surname);
$templateProcessor->setValue('client_date_of_birth', date('d/m/Y', strtotime($client->client_date_of_birth)));
$templateProcessor->setValue('client_cep', $client->client_cep);
$templateProcessor->setValue('client_address', $client->client_address);
$templateProcessor->setValue('client_neighbourhood', $client->client_neighbourhood);
$templateProcessor->setValue('client_city', $client->client_city);
$templateProcessor->setValue('client_email', $client->client_email);
$templateProcessor->setValue('client_rg', $client->client_rg);
$templateProcessor->setValue('client_cpf', $client->client_cpf);
$templateProcessor->setValue('client_state', $client->client_state);
$templateProcessor->setValue('client_phone', $client->client_phone);
$templateProcessor->setValue('client_mobile', $client->client_mobile);
$templateProcessor->setValue('city', $deal_course->city);
$templateProcessor->setValue('country', $deal_course->country);
$templateProcessor->setValue('school', $deal_course->school);
$templateProcessor->setValue('course_name', $deal_course->course_name);
$templateProcessor->setValue('lessons_per_week', $deal_course->lessons_per_week);
$templateProcessor->setValue('lesson_duration', $deal_course->lesson_duration);
$templateProcessor->setValue('duration', $deal_course->duration);
$templateProcessor->setValue('start_date', date('d/m/Y', strtotime($deal_course->start_date)));
$templateProcessor->setValue('start_date_day',get_week_day($deal_course->start_date));
$templateProcessor->setValue('finish_date', date('d/m/Y', strtotime($deal_course->finish_date)));
$templateProcessor->setValue('finish_date_day', get_week_day($deal_course->finish_date));
$templateProcessor->setValue('exhibition_symbol', $currency->exhibition_symbol);
$templateProcessor->setValue('currency_name', $currency->currency_name." (".$currency->currency_code.")");
$templateProcessor->setValue('banking_fee_value', number_format($deal_course->banking_fee_value,2,",","."));
$templateProcessor->setValue('registration_fee_value', number_format($deal_course->registration_fee_value,2,",","."));
$templateProcessor->setValue('course_value', number_format($deal_course->course_value,2,",","."));
$templateProcessor->setValue('material_fee_value', number_format($deal_course->material_fee_value,2,",","."));
$templateProcessor->setValue('accommodation_type', $deal_course->accommodation_type);
$templateProcessor->setValue('room', $deal_course->room);
$templateProcessor->setValue('meals', $deal_course->meals);
$templateProcessor->setValue('accommodation_start_date', date('d/m/Y', strtotime($deal_course->accommodation_start_date)));
$templateProcessor->setValue('accommodation_start_date_day', get_week_day($deal_course->accommodation_start_date));
$templateProcessor->setValue('accommodation_finish_date', date('d/m/Y', strtotime($deal_course->accommodation_finish_date)));
$templateProcessor->setValue('accommodation_finish_date_day', get_week_day($deal_course->accommodation_finish_date));
$templateProcessor->setValue('accommodation_duration', $deal_course->accommodation_duration);
$templateProcessor->setValue('accommodation_fee_value', number_format($deal_course->accommodation_fee_value,2,",","."));
$templateProcessor->setValue('accommodation_value', number_format($deal_course->accommodation_value,2,",","."));
$templateProcessor->setValue('airport_transfer_value', number_format($deal_course->airport_transfer_value,2,",","."));
$templateProcessor->setValue('others_value', number_format($deal_course->others_value,2,",","."));
$templateProcessor->setValue('others_value_description', $deal_course->others_value_description);
$templateProcessor->setValue('opportunity_total_inflow_date_day', get_week_day($opportunity->opportunity_total_inflow_date));
$templateProcessor->setValue('opportunity_total_inflow_date', date('d/m/Y', strtotime($opportunity->opportunity_total_inflow_date)));
$templateProcessor->setValue('opportunity_deal_date', date('d/m/Y', strtotime($opportunity->opportunity_deal_date)));
$templateProcessor->setValue('opportunity_deal_date_day', get_week_day($opportunity->opportunity_deal_date));
//verifica se existe traslado e outras taxas
if($deal_course->airport_transfer_value>0){
    $templateProcessor->setValue('airport_transfer', 'Sim');
}
else{
    $templateProcessor->setValue('airport_transfer', 'Não');
}
if($deal_course->others_value>0){
    $templateProcessor->setValue('others', 'Sim');
}
else{
    $templateProcessor->setValue('others', 'Não');
}


//soma dos valores do curso
$sum_course=$deal_course->banking_fee_value+$deal_course->registration_fee_value+($deal_course->course_value*$deal_course->duration)+$deal_course->material_fee_value+$deal_course->required_insurance_value;
$templateProcessor->setValue('sum_course', number_format($sum_course,2,",","."));
//soma dos valores da acomodação
$sum_accommodation=$deal_course->accommodation_fee_value+($deal_course->accommodation_value*$deal_course->accommodation_duration)+($deal_course->extra_night_value*$deal_course->extra_night);
$templateProcessor->setValue('sum_accommodation', number_format($sum_accommodation,2,",","."));
//soma dos valores extras
$sum_extras=$deal_course->airport_transfer_value+$deal_course->others_value;
$templateProcessor->setValue('sum_extras', number_format($sum_extras,2,",","."));

//soma de total
$sum_total=$sum_extras+$sum_course+$sum_accommodation;
$templateProcessor->setValue('sum_total', number_format($sum_total,2,",","."));

//valor da entrada, 20%
$down_payment=$sum_total*0.2;
$templateProcessor->setValue('down_payment', number_format($down_payment,2,",","."));

//resto a ser pago
$rest_payment=$sum_total-$down_payment;
$templateProcessor->setValue('rest_payment', number_format($rest_payment,2,",","."));

//Exibe o seguro obrigatorio  se o valor for maior que zero
if($deal_course->required_insurance_value!=0){
    $templateProcessor->setValue('required_insurance_text', "Valor do Seguro Obrigatório:");
    $templateProcessor->setValue('required_insurance_value', number_format($deal_course->required_insurance_value,2,",","."));
}
else{
    $templateProcessor->setValue('required_insurance_text', "");
    $templateProcessor->setValue('required_insurance_value', "");
}
//Exibe a quantidade e o valor de noites extras se o vaflor por noite foi diferente de zero
if($deal_course->extra_night_value!=0){
    $templateProcessor->setValue('extra_night_text', "Número de Noites Extras:");
    $templateProcessor->setValue('extra_night', $deal_course->extra_night);
    $templateProcessor->setValue('extra_night_value_text', "Noites Extras:");
    $templateProcessor->setValue('extra_night_value', number_format($deal_course->extra_night_value,2,",","."));
}
else{
    $templateProcessor->setValue('extra_night_text', "");
    $templateProcessor->setValue('extra_night', "");
    $templateProcessor->setValue('extra_night_value_text', "");
    $templateProcessor->setValue('extra_night_value', "");
}

$user->get_user($deal_course->deal_course_user_id);
$templateProcessor->setValue('username', $user->username);

echo date('H:i:s'), ' Saving the result document...', EOL;

$name_file="Contrato-".$client->client_name."-".$client->client_surname."-".date("d-m-Y");

//salva o arquivo no servidor
$templateProcessor->saveAs('results/'.$name_file.'.odt');

echo getEndingNotes(array('ODText' => 'odt'));
//gera o download para o usuário
header("Location: results/".$name_file.".odt");
