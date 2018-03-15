<?php
namespace lib;

use \lib\Product as Product;
use \lib\Library as Library;
use \lib\Order as Order;
use \lib\Webhook as Webhook;
use \lib\Merchant as Merchant;

class Acommerce extends Library {
    public $host;
    public $username;
    public $appKey;

    public function __construct($config) {
        $this->host = $config["host"];
        $this->username = $config["username"];
        $this->apiKey = $config["apiKey"];
    }

    public function auth() {
        $result = $this->curl(array(
            'url' => "https://". $this->host . "/identity/token",
            'method' => "POST",
            'header' => array(
                'Content-Type: application/json'
            ),
            'body' => json_encode(array(
                "auth" => array(
                    "apiKeyCredentials" => array(
                        "username" => $this->username,
                        "apiKey" => $this->apiKey
                    )
                )
            ))
        ));

        if ($result["code"] != "200")
            die ("Cannot reach API.");

        $this->token = $result['return']->token;
    }

    public function product() {
        return new Product($this);
    }

    public function merchant() {
        return new Merchant($this);
    }

    public function order() {
        return new Order($this);
    }

    public function webhook() {
        return new Webhook($this);
    }

    public function shipping() {
        return new Shipping($this);
    }
}
