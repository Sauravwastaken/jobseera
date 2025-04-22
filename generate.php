<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
require 'vendor/autoload.php'; // No change needed if still in root

use Dompdf\Dompdf;
use Dompdf\Options;

$options = new Options();
$options->set('isHtml5ParserEnabled', true);
$options->set('isRemoteEnabled', true);
$options->setChroot(__DIR__); // Remains valid if fonts are inside project
$options->set('defaultFont', 'EBGaramond');

$dompdf = new Dompdf($options);

// Capture HTML output
ob_start();
include_once(__DIR__ . '/templates/template1.php');

$html = ob_get_clean();
// echo $html;
// exit;

$filename = preg_replace('/[^A-Za-z0-9_\-]/', '_', $fullName) ?: 'document';

$dompdf->loadHtml($html);

// Paper size and orientation
$dompdf->setPaper('A4', 'portrait');

$dompdf->render();
$dompdf->stream($filename . ".pdf", ["Attachment" => false]);