<?php
	
	$secret = 'Culo!';
	$sign = $_SERVER['HTTP_X_HUB_SIGNATURE'];
	
	list($sha, $hash) = explode('=', $sign, 2);
	
	
	$json = file_get_contents('php://input');
	$jsonHash = hash_hmac($sha, $json, $secret);
	
	$payload = json_decode($json);	
	
	if($hash !== $jsonHash){
		die('Foca!!!');
	}
	
	if($payload->ref == "refs/heads/culocane"){
		echo("branch OK");
shell_exec('cd C:\inetpub\wwwroot\test-deploy && git fetch && git merge');



	}else{
		echo("merd");
	}





?>