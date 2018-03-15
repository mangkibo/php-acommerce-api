<?php

require_once 'config.php';

use \lib\Acommerce as Acommerce;
use \lib\Salt as Salt;

$channelId = "";
$partnerId = "";

$acommerce = new Acommerce(array(
    //'host' => "api.acommerce.asia.com",
    'host' => "api.acommercedev.com",
    'username' => "",
    'apiKey' => ""
));

$salt = new Salt(array(
    'baseUrl' => "http://nutriclub-umb7v2.staging2.salt.co.id",
    'auth' => "",
));

$acommerce->auth();

echo "<pre>";

/*
// Merchant
//$result = $acommerce->merchant()->getList($channelId);
//var_dump($result);

// Merchant getInventoryAllocation
$result = $acommerce->merchant()
    ->getInventoryAllocation($channelId, $partnerId,"");
var_dump($result);
*/


/* ==================== gak dipake end =====================
// Get product
//$result = $acommerce->product()->get($partnerID);

// Product submission
$result = $acommerce->product()->submission($partnerID, array(
    "sku" => "BAJUROMBENG0001",
    "user" => "kudalumping",
    "defaultLanguage" => "en",
    "active" => true,
    "itemId" => "BIJI001",
    "productName" => array(
        "en" => "Kaos rombeng milik gembel"
    )
));

// Product Submission Retrieval
$productSubmissionID = "BIJI001";
$result = $acommerce->product()->submissionRetrieval($partnerID, $productSubmissionID);

==================== gak dipake end ===================== */

// create order shipping
//result = $acommerce->shipping()->orderCreate($partnerId, "ORDER001", array(

//));

// Get order Shipping Status
//$result = $acommerce->shipping()->orderStatus($partnerId, "");

// Get Order Shipping
//$result = $acommerce->shipping()->orderRetrieve($partnerId, "ORDER0011");

// Create new orders
/*$orderId = "ORDER002";
$result = $acommerce->order()->create($channelId, $orderId, array(
    "orderCreatedTime" => "2017-04-19T16:30:48+00:00",
    "customerInfo" => array(
       "addressee" => "Fortune Hotel",
       "address1" => "Jalan jalan",
       "province" => "Jakarta",
       "postalCode" => "14000",
       "country" => "Indonesia",
       "phone" => "081-000-0000",
       "email" => "test@test.com"
    ),
    "orderShipmentInfo" => array(
       "addressee" => "Fortune Hotel",
       "address1" => "Jalan Karet",
       "address2" => "",
       "subDistrict" => "Karet Tengsin",
       "district" => "Jakarta Pusat",
       "city" => "",
       "province" => "DKI Jakarta",
       "postalCode" => "10500",
       "country" => "Indonesia",
       "phone" => "081-111-2222",
       "email" => "smith@a.com"
    ),
    "paymentType" => "COD",
    "shippingType" => "STANDARD_2_4_DAYS",
    "grossTotal" => 200000,
    "currUnit" => "IDR",
    "orderItems" => array (
       array(
           "partnerId" => $partnerId,
           "itemId" => "TestingItem",
           "qty" => 1,
           "subTotal" => 200000
       )
   )
)); */


// Retrieve Orders
//$result = $acommerce->order()->get($channelId, "?since=2017-05-18T00:00:00Z&status=NEW");

// Get order detail
$orderId = "ORDER001";
$result = $acommerce->order()->detail($channelId, $orderId);

/*
// Create Webhooks
$result = $acommerce->webhook()->create($channelID, array(
    "name" => "Lazada 3PL Staging",
    "url" => "http://128.199.101.189:5000/hook",
    "requestMethod" => "POST",
    "secret" => "terserah",
    "eventType" => array(
        "SALES_ORDER_STATUS",
        "SHIPPING_ORDER_STATUS"
    ),
    "active" => true
));

// Get Webhooks
$result = $acommerce->webhook()->get($channelID)

// Delete Webhooks
$hooksID = "123";
$result = $acommerce->webhook()->delete($channelID, $hooksID)
*/



print_r($result);
