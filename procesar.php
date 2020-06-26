<?php

require __DIR__ .  '/vendor/autoload.php';
MercadoPago\SDK::setAccessToken("TEST-7927007857849250-062405-afb9bb9c52903c3deb1ad9e8116e5aa0-590656607");

$preference = new MercadoPago\Preference();
$protocol = stripos($_SERVER['SERVER_PROTOCOL'],'https') === 0 ? 'https://' : 'http://';


 


$item1 = new MercadoPago\Item();
$item1->id = "1234";
$item1->title = $_POST['title'];
$item1->description = "Dispositivo móvil de Tienda e-commerce";
$item1->quantity = 1;
$item2->picture_url = $protocol.$_SERVER['SERVER_NAME']."/".$_POST['img'];
$item1->unit_price = preg_replace('/\s+/', '', $_POST['price']);
 
 

$preference->items = array($item1);

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

$preference->payment_methods = array(
  "excluded_payment_methods" => array(
      array("id" => "amex"), // no amex
  ),
  "excluded_payment_types" => array(
      array("id" => "atm"), //no atm
  ),
  "installments" => 6
);
$preference->auto_return = "approved";
$preference->external_reference = "am.er.90@hotmail.com";

$preference->back_urls = array(
  "success" => "https://lcastillo90-mp-commerce-php.herokuapp.com/success.php",
  "failure" => "https://lcastillo90-mp-commerce-php.herokuapp.com/failure.php",
  "pending" => "https://lcastillo90-mp-commerce-php.herokuapp.com/pending.php"
);

 

$preference->save();  
 
echo  $preference->sandbox_init_point;
 /*

echo $protocol.$_SERVER['SERVER_NAME']."/".$_POST['img'];
echo '</br>';
echo preg_replace('/\s+/', '', $_POST['price']);*/


?> 