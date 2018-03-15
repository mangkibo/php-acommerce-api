<?php

namespace lib;
use \lib\Library as Library;

class Webhook extends Library {
    private $username;
    private $tokenId;
    private $expiredAt;
    private $baseUrl;

    public function __construct($config) {
        $this->username = $config->token->username;
        $this->tokenId = $config->token->token_id;
        $this->expiredAt = $config->token->expires_at;
        $this->baseUrl = "https://" . $config->host;
    }

    public function create($channelId, $param) {
        $path = "/channel/".$channelId."/hooks";
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

    public function get($channelId) {
        $path = "/channel/".$channelId."/hooks";
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

    public function delete($channelId, $hooksId) {
        $path = "/channel/".$channelId."/hooks/".$hooksId;
        $request = array(
            'url' => $this->baseUrl . $path,
            'method' => "DELETE",
            'header' => array(
                'x-subject-token: ' . $this->tokenId,
                'Content-Type: application/json'
            ),
            'body' => null
        );
        return $this->curl($request);
    }
}
