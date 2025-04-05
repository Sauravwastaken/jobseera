<?php

require __DIR__ . '/../vendor/autoload.php';

use Spatie\Browsershot\Browsershot;

// Detect Chromium path from Puppeteer's local install
$chromiumPath = __DIR__ . '/../node_modules/puppeteer/.local-chromium/chrome/linux-135.0.7049.42/chrome-linux64/chrome';



if (!file_exists($chromiumPath)) {
    die("Chromium not found at: $chromiumPath");
}

if (!is_executable($chromiumPath)) {
    die("Chromium exists but is not executable.");
}

if (!$chromiumPath || !file_exists($chromiumPath)) {
    die("Chromium not found. Run: npx puppeteer browsers install");
} else {
    "done";
}

// Capture rendered HTML from template1.php
ob_start();
include __DIR__ . '/../templates/template1.php'; // this file must output valid HTML
$html = ob_get_clean();
echo $html;
// exit;

// Generate the PDF

Browsershot::html($html)
    ->setChromePath($chromiumPath)
    ->setOption('args', ['--no-sandbox'])
    ->format('A4')
    ->save(__DIR__ . '/resume.pdf');

echo "PDF generated successfully: resume.pdf";
