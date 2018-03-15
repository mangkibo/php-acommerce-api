<?php

namespace lib;
use \lib\Library as Library;

class Shipping extends Library{
    private $username;
    private $tokenId;
    private $expiredAt;
    private $baseUrl;

    public function __construct($config) {
        $this->username = $config->token->username;
        $this->tokenId = $config->token->token_id;
        $this->expiredAt = $config->token->expires_at;
        $this->baseUrl = "https://shipping." . $config->host;
    }

    public function orderCreate($partnerId, $orderId, $param=array()) {
        $path = "/partner/".$partnerId."/order/".$orderId;
        $request = array(
            'url' => $this->baseUrl . $path,
            'method' => "PUT",
            'header' => array(
                'x-subject-token: ' . $this->tokenId,
                'Content-Type: application/json'
            ),
            'body' => json_encode($param)
        );
        return $this->curl(request);
    }

    public function orderRetrieve($partnerId, $orderId) {
        $path = "/partner/".$partnerId."/order/".$orderId;
        $request = array(
            'url' => $this->baseUrl . $path,
            'method' => "GET",
            'header' => array(
                'x-subject-token: ' . $this->tokenId,
                'Content-Type: application/json'
            ),
            'body' => null
        );
    }


    public function orderStatus($partnerId, $uri) {
        $uri = (!empty($uri)) ? $uri : "";
        $path = "/partner/".$partnerId."/shipping-order-status" . $uri;
        $request = array(
            'url' => $this->baseUrl . $path,
            'method' => "GET",
            'header' => array(
                'x-subject-token: ' . $this->tokenId,
                'Content-Type: application/json'
            ),
            'body' => null
        );
        return $this->curl($request);
    }
}
