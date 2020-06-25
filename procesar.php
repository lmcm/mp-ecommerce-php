<?php

//require_once 'vendor/autoload.php'; // You have to require the library from your Composer vendor folder
require __DIR__ . '/vendor/autoload.php';

MercadoPago\SDK::setAccessToken("TEST-7927007857849250-062405-afb9bb9c52903c3deb1ad9e8116e5aa0-590656607"); // On Sandbox

$preference = new MercadoPago\Preference();
$preference->external_reference = "am.er.90@hotmail.com";

$item1 = new MercadoPago\Item();
$item1->id = "1234";
$item1->title = $_POST['title'];
$item1->description = "Dispositivo móvil de Tienda e-commerce";
$item1->quantity = $_POST['unit'];
$item1->picture_url = $_POST['img'];
$item1->unit_price = $_POST['price'];
$item1->currency_id = "MXN";

$payer = new MercadoPago\Payer();
$payer->name = "Lalo";
$payer->surname = "Landa";
$payer->email = "test_user_92028894@testuser.com";
$payer->phone = array(
    "area_code" => "52",
    "number" => "5549737300",
);
$payer->address = array(
    "street_name" => "Insurgentes Sur",
    "street_number" => "1602",
    "zip_code" => "03940",
);



$preference->items = array($item1);
$preference->payer = $payer;
$preference->payment_methods = array(
    "excluded_payment_methods" => array(
        array("id" => "amex"), // no amex
    ),
    "excluded_payment_types" => array(
        array("id" => "atm"), //no atm
    ),
    "installments" => 6,
);

$preference->back_urls = array(
    "success" => "https://lcastillo90-mp-commerce-php.herokuapp.com/success.php",
    "failure" => "https://lcastillo90-mp-commerce-php.herokuapp.com/failure.php",
    "pending" => "https://lcastillo90-mp-commerce-php.herokuapp.com/pending.php"
);

//$preference->save(); # Save the preference and send the HTTP Request to create

# Return the HTML code for button

//echo "<a href='$preference->sandbox_init_point'> Pagar </a>";
var_dump($preference);
echo $preference->sandbox_init_point;
