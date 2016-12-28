<?php
	
	$secret = 'Culo!';
	$sign = $_SERVER['HTTP_X_HUB_SIGNATURE'];
	
	list($sha, $hash) = explode('=', $sign, 2);
	
	
	$json = file_get_contents('php://input');
	$payload = json_decode($json);	
	
	$payloadHash = hash_hmac($sha, $payload, $secret);
	
	if($hash !== $payloadHash){
		die('Foca!!!');
	}
	
	if($payload->ref == "refs/heads/culocane"){
		echo("branch OK");
	}else{
		echo("merda");
	}

?>