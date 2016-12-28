<?php
	
	$secret = 'Culo!';
	$sign = $_SERVER['HTTP_X_HUB_SIGNATURE'];
	
	list($sha, $hash) = explode('=', $sign, 2);
	
	$payload = file_get_contents('php://input');
	
	// Calculate hash based on payload and the secret
	$payloadHash = hash_hmac($sha, $payload, $secret);
	
	// Check if hashes are equivalent
	if($hash !== $payloadHash){
		die('Foca!!!');
	}
	
	if($payload->ref == "refs/heads/culocane"){
		echo("branch OK");
	}else{
		echo("merda"};
	}

?>