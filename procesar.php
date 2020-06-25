<?php
 
//require_once 'vendor/autoload.php'; // You have to require the library from your Composer vendor folder
require __DIR__ .  '/vendor/autoload.php';
 
 

MercadoPago\SDK::setAccessToken("TEST-7927007857849250-062405-afb9bb9c52903c3deb1ad9e8116e5aa0-590656607"); // On Sandbox


echo 'hola mundo';
//MercadoPago\SDK::setAccessToken("TEST-7927007857849250-062405-afb9bb9c52903c3deb1ad9e8116e5aa0-590656607"); // Either Production or SandBox AccessToken
 
$preference = new MercadoPago\Preference();


$item1 = new MercadoPago\Item();
$item1->id = "00001";
$item1->title = "item"; 
$item1->quantity = 1;
$item1->unit_price = 100;

$item2 = new MercadoPago\Item();
$item2->id = "00001";
$item2->title = "item"; 
$item2->quantity = 1;
$item2->unit_price = 100;

$preference->items = array($item1, $item2);

$preference->payment_methods = array(
  "excluded_payment_types" => array(
    array("id" => "credit_card")
  ),
  "installments" => 12
);

$preference->external_reference = rand() ;

$preference->save(); # Save the preference and send the HTTP Request to create

# Return the HTML code for button

echo "<a href='$preference->sandbox_init_point'> Pagar </a>";
 


?> 