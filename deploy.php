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

$out = array();
exec('cmd C:\Users\Username\AppData\Local\GitHub\GitHub.appref-ms --open-shell 2>&1',$out,$exitcode);
echo "<br />EXEC: ( exitcode : $exitcode )";
echo "<hr /><pre>";
print_r($out);
echo "</pre>";


	}else{
		echo("merda");
	}

?>