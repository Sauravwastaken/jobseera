<?php
require 'vendor/autoload.php';

use Nesk\Puphpeteer\Puppeteer;

$puppeteer = new Puppeteer;
$browser = $puppeteer->launch();
$browserPath = $browser->process()->getCommandLine();
echo $browserPath;
$browser->close();
?>