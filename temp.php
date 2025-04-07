<?php
require 'vendor/autoload.php';

use Dompdf\Dompdf;
use Dompdf\Options;

$options = new Options();
$options->set('isRemoteEnabled', true);
$options->setChroot(__DIR__);
$options->set('defaultFont', 'EBGaramond');

$dompdf = new Dompdf($options);
$dompdf->loadHtml('<h1>Hello World</h1><p>This will trigger font cache.</p>');
$dompdf->setPaper('A4', 'portrait');
$dompdf->render();
$dompdf->stream("test.pdf", ["Attachment" => false]);
