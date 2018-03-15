<?php

namespace lib;
use \lib\Library as Library;

class Merchant extends Library {
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

    public function getInventoryAllocation($channelId, $merchantId, $uri) {
        $uri = (!empty($uri)) ? $uri : "";
        $path = "/channel/".$channelId."/allocation/merchant/".$merchantId.$uri;
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

    public function getList($channelId) {
        $path = "/channel/".$channelId."/merchants/";
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
