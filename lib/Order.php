<?php

namespace lib;
use \lib\Library as Library;

class Order extends Library {
    private $username;
    private $tokenId;
    private $expiredAt;
    private $baseUrl;

    public function __construct($config) {
        $this->username = $config->token->username;
        $this->tokenId = $config->token->token_id;
        $this->expiredAt = $config->token->expires_at;
        $this->baseUrl = "https://fulfillment." . $config->host;
    }

    public function create($channelId, $orderId, $param=array()) {
        $path = "/channel/".$channelId."/order/".$orderId;
        $request = array(
            'url' => $this->baseUrl . $path,
            'method' => "PUT",
            'header' => array(
                'x-subject-token: ' . $this->tokenId,
                'Content-Type: application/json'
            ),
            'body' => json_encode($param)
        );
        return $this->curl($request);
    }

    public function get($channelId, $uri) {
        $uri = (!empty($uri)) ? $uri : "";
        $path = "/channel/".$channelId."/sales-order-status" . $uri;
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

    public function detail($channelId, $orderId) {
        $path = "/channel/".$channelId."/order/".$orderId;
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
