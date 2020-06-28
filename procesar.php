<?php

require __DIR__ .  '/vendor/autoload.php';
MercadoPago\SDK::setAccessToken("APP_USR-8058997674329963-062418-89271e2424bb1955bc05b1d7dd0977a8-592190948");
MercadoPago\SDK::setIntegratorId("dev_24c65fb163bf11ea96500242ac130004");


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
$payer->email = "test_user_58295862@testuser.com";
$payer->phone = array(
    "area_code" => "52",
    "number" => "5549737300",
);
$payer->address = array(
    "street_name" => "Insurgentes Sur",
    "street_number" => 1602,
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

 

$preference->notification_url = "https://lcastillo90-mp-commerce-php.herokuapp.com/notification.php";
$preference->payer = $payer;
$preference->save();  


 
echo  $preference->init_point;
 /*

echo $protocol.$_SERVER['SERVER_NAME']."/".$_POST['img'];
echo '</br>';
echo preg_replace('/\s+/', '', $_POST['price']);*/


?> 