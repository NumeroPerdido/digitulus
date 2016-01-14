<?php
include_once "../deal_course.class.php";
include_once "../opportunity.class.php";
include_once "../client.class.php";
include_once "../currency.class.php";
$deal_course= new Deal_course();
$opportunity= new Opportunity();
$client= new Client();
$currency= new Currency();
//carrega as informações do opportunity através do opportunity_id passado via get
$opportunity->get_opportunity($_GET['opportunity_id']);
//carrega as informações do deal course através do deal_course_id passado via get
$deal_course->get_deal_course($_GET['deal_course_id']);
//carrega as informações do client através do client_id passado via get
$client->get_client($opportunity->opportunity_client_id);
//carrega as informações da moeda
$currency->get_currency($deal_course->currency_code);

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
//include_once 'samples/Sample_Header.php';

// Template processor instance creation
echo date('H:i:s') , ' Creating new TemplateProcessor instance...' , EOL;
$templateProcessor = new \PhpOffice\PhpWord\TemplateProcessor('resources/Contrato.docx');

// Will clone everything between ${tag} and ${/tag}, the number of times. By default, 1.
$templateProcessor->cloneBlock('CLONEME', 3);

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
$templateProcessor->setValue('finish_date', date('d/m/Y', strtotime($deal_course->finish_date)));
$templateProcessor->setValue('currency_code', $deal_course->currency_code);
$templateProcessor->setValue('exhibition_symbol', $currency->exhibition_symbol);
$templateProcessor->setValue('currency_name', $currency->currency_name);
$templateProcessor->setValue('banking_fee_value', $deal_course->banking_fee_value);
$templateProcessor->setValue('registration_fee_value', $deal_course->registration_fee_value);
$templateProcessor->setValue('course_value', $deal_course->course_value);
$templateProcessor->setValue('material_fee_value', $deal_course->material_fee_value);
$templateProcessor->setValue('accommodation_type', $deal_course->accommodarion_type);
$templateProcessor->setValue('room', $deal_course->room);
$templateProcessor->setValue('meals', $deal_course->meals);
$templateProcessor->setValue('accommodation_start_date', date('d/m/Y', strtotime($deal_course->accommodation_start_date)));
$templateProcessor->setValue('accommodation_finish_date', date('d/m/Y', strtotime($deal_course->accommodation_finish_date)));
$templateProcessor->setValue('accommodation_duration', $deal_course->accommodation_duration);
$templateProcessor->setValue('accommodation_fee_value', $deal_course->accommodation_fee_value);
$templateProcessor->setValue('accommodation_value', $deal_course->accommodation_value);
$templateProcessor->setValue('extra_nights', $deal_course->extra_nights);
$templateProcessor->setValue('airport_transfer_value', $deal_course->airport_transfer_value);
$templateProcessor->setValue('others_value', $deal_course->others_value);
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
$sum_course=$deal_course->banking_fee_value+$deal_course->registration_fee_value+($deal_course->course_value*$deal_course->duration)+$deal_course->material_fee_value;
$templateProcessor->setValue('sum_course', $sum_course);
//soma dos valores da acomodação
$sum_accommodation=$deal_course->accommodation_fee_value+($deal_course->accommodation_value*$deal_course->accommodation_duration)+$deal_course->extra_nights;
$templateProcessor->setValue('sum_accommodation', $sum_accommodation);
//soma dos valores extras
$sum_extras=$deal_course->airport_transfer_value+$deal_course->others_value;
$templateProcessor->setValue('sum_extras', $sum_extras);

//soma de total
$sum_total=$sum_extras+$sum_course+$sum_accommodation;
$templateProcessor->setValue('sum_total', $sum_total);

//valor da entrada, 20%
$down_payment=$sum_total*0.2;
$templateProcessor->setValue('down_payment', $down_payment);

//resto a ser pago
$rest_payment=$sum_total-$down_payment;
$templateProcessor->setValue('rest_payment', $rest_payment);

//data final do pagamento
//caso o pais seja autrália ou canadá, a data final para o pagamento é a data de embarque + 60 dias
if($deal_course->country=="Austrália" || $deal_course->country=="Canadá"){
    $payment_final_date=date('d/m/Y', strtotime('+60 days', strtotime($deal_course->start_date)));
    $templateProcessor->setValue('payment_final_date', $payment_final_date);
}
//para o resto do mundo a data dinal para o pagamento é a data de embarque +45 dias
else{
    $payment_final_date=date('d/m/Y', strtotime('+45 days', strtotime($deal_course->start_date)));
    $templateProcessor->setValue('payment_final_date', $payment_final_date);
}

echo date('H:i:s'), ' Saving the result document...', EOL;
//salva o arquivo no servidor
$templateProcessor->saveAs('results/Contrato.odt');

echo getEndingNotes(array('ODText' => 'odt'));
//gera o download para o usuário
header("Location: results/Contrato.odt");
