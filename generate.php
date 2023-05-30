<?php 
//ALL THIS AT THIS HEADER ARE ALL NAME SPACES
//this will load the vendor folder and everything inside
require "vendor/autoload.php";
//this will load some packages inside the vendor folder
use Endroid\QrCode\QrCode;
//create a png image
use Endroid\QrCode\Writer\PngWriter;
//to set color to the image
use Endroid\QrCode\Color\Color;


$text = $_POST["text"];

//creates an object of the arcode class 
$qr_code = QrCode::create($text)->setSize(600)->setMargin(40);


$writer = new PngWriter;

$result = $writer->write($qr_code);

//We need to tell the browser we are loading an image
header("Content-Type: " . $result->getMimeType());


echo $result->getString();

?>