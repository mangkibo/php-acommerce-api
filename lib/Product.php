<?php

namespace lib;
use \lib\Library as Library;

class Product extends Library{
    private $username;
    private $tokenId;
    private $expiredAt;
    private $baseUrl;

    public function __construct($config) {
        //var_dump($config);
        //die();

        $this->username = $config->token->username;
        $this->tokenId = $config->token->token_id;
        $this->expiredAt = $config->token->expires_at;
        $this->baseUrl = "https://seller." . $config->host;
    }

    public function get($partnerId) {
        $path = "/partner/".$partnerId."/products";
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

    public function submission($partnerId, $param=array()) {
        $path = "/partner/".$partnerId."/product-submission/";
        $request = array(
            'url' => $this->baseUrl . $path,
            'method' => "POST",
            'header' => array(
                'x-subject-token: ' . $this->tokenId,
                'Content-Type: application/json'
            ),
            'body' => json_encode($param)
        );

        return $this->curl($request);
    }

    public function submissionRetrieval($partnerId, $productSubmissionId) {
        $path = "/partner/".$partnerId."/product-submission/". $productSubmissionId;
        $request = array(
            'url' => $this->baseUrl . $path,
            'method' => "GET",
            'header' => array(
                'x-subject-token: ' . $this->tokenId
            ),
            'body' => null
        );
        return $this->curl($request);
    }
}
