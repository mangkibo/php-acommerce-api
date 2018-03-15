<?php

namespace lib;
use \lib\Library as Library;

class Salt extends Library {
    public $baseUrl;
    public $auth;

    public function __construct($param=array()) {
        $this->baseUrl = $param['baseUrl'];
        $this->auth = $param['auth'];
    }

    public function memberRegistration($param) {
        $request = array(
            "url" => $this->baseUrl . "/loyaltyApi/Member/PublicAdd",
            "method" => "POST",
            "header" => array(
                "Content-Type: application/json",
                "Authorization: " . $this->auth
            ),
            "body" => json_encode($param)
        );

        return $this->curl($request);
    }

    public function phoneOrEmailValidation($param) {
        $request = array(
            "url" => $this->baseUrl . "/loyaltyApi/Member/PublicIsExist",
            "method" => "POST",
            "header" => array(
                "Content-Type: application/json",
                "Authorization: " . $this->auth
            ),
            "body" => json_encode($param)
        );
        return $this->curl($request);
    }

    public function uploadReceipt($param) {
        $request = array(
            "url" => $this->baseUrl . "/loyaltyApi/Receipt/PublicUpload",
            "method" => "POST",
            "header" => array(
                "Content-Type: application/json",
                "Authorization: " . $this->auth
            ),
            "body" => json_encode($param)
        );
        return $this->curl($request);
    }
}
