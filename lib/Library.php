<?php
namespace lib;

abstract class Library {
    protected function curl($config) {
		//open connection
		$ch = curl_init($config['url']);

		//set the url, number of POST vars, POST data
		curl_setopt_array($ch, array(
			CURLOPT_HEADER => true,
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 30,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => $config['method'],
			CURLOPT_HTTPHEADER => $config['header'],
			CURLOPT_POSTFIELDS => $config['body']
		));

		//execute post
		$result = curl_exec($ch);

		$header_size = curl_getinfo($ch, CURLINFO_HEADER_SIZE);
		$code = curl_getinfo($ch, CURLINFO_HTTP_CODE);

		$header = substr($result, 0, $header_size);
		$body = substr($result, $header_size);

		//close connection
		curl_close($ch);

		return array(
            'url' => "[".$config['method']."] ".$config['url'],
            'request' => $config['body'],
			'return' => json_decode($body),
			'code' => $code
		);
	}
}
