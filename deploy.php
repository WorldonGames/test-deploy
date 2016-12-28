<?php
	
	$secret = 'Culo!';
	$sign = $_SERVER['HTTP_X-Hub-Signature'];
	
	list($sha, $hash) = explode('=', $sign, 2);
	
	$payload = file_get_contents('php://input');
	
	// Calculate hash based on payload and the secret
	$payloadHash = hash_hmac($algo, $payload, $secret);
	
	// Check if hashes are equivalent
	if($hash !== $payloadHash){
		die('Foca!!!');
	}else{
		echo('WORKZZZ');
	}

?>