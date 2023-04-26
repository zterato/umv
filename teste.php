<?php
$id_venda=filter_input(INPUT_GET, 'id', FILTER_SANITIZE_STRING);
$valor_venda=filter_input(INPUT_GET, 'valor', FILTER_SANITIZE_STRING);
  require_once 'vendor/autoload.php';


  MercadoPago\SDK::setAccessToken("APP_USR-8811037502407279-032916-4cf0a1714ec4c305cf718a0ccd1506d0-174980752");


  $preference  = new MercadoPago\Preference();
	 
  $item             = new MercadoPago\Item();
  $item->title      = "Carrinho 324 - Makeuup 10";
  $item->quantity   = 1;
  $item->unit_price = floatval($valor_venda);

  $preference->items = array($item);
	
  $preference->back_urls = array(
  	  "success" => 'https://makeuup.com.br/limpa.php',
	  "failure" => 'https://makeuup.com.br/index.php',
	  "pending" => 'https://makeuup.com.br/',
  );

  $preference->external_reference = 'EXTERNAL_REFERENCE';

  $preference->payment_methods = array(
        "excluded_payment_types" => array(
               array(
                 "id" => "ticket",
               )
         ),
      );

  $preference->notification_url   = 'https://makeuup.com.br/notification.php';

  // Salvar o objeto de Payment para gerar o Pix
  $preference->save();
	$link=$preference->init_point;
 echo 
    "<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=".$link."'>
    "
    ;
  
