<?php
	$secret = 'Culo!';
	$hash = 'Cenere';
	$jsonHash = 'Ebreo';
	
	if(isset($_SERVER['HTTP_X_HUB_SIGNATURE'])){
		$sign = $_SERVER['HTTP_X_HUB_SIGNATURE'];
		list($sha, $hash) = explode('=', $sign, 2);
		$json = file_get_contents('php://input');
		$jsonHash = hash_hmac($sha, $json, $secret);
		$payload = json_decode($json);
	}
	
	if( $hash == $jsonHash ||	(isset($_POST['auth']) && ($_POST['auth'] == $secret))){
		//Comandi
		$valore = "********";
		$cmds = array(
			'whoami',
			'git pull',
			'git status'
		);
		// Run the commands for output
		$output = 'Credenziali verificate, inizio procedura di sincronizzazione'."\n\n";
		foreach($cmds AS $cmd){
			// Run it
			$tmp = shell_exec($cmd);
			// Output
			$output .= "C:\deploy.wog>{$cmd}\n";
			$output .= htmlentities(trim($tmp)) . "\n\n";
		}
	}
?>



<!DOCTYPE HTML>


<html lang="it-IT" style="background: #000; line-height: 1; font-family: courier, monospace; font-size: 14px; font-weight: bold; color: #c0c0c0; overflow-x: hidden;">
	<head>
		<title>=WoG= Command Prompt</title>
		<meta http-equiv="Content-Type" content="text/html" charset="UTF-8">
		
		<style>
		input[type="password"]{
			background: transparent;
			border: none;
			color: #c0c0c0;
		}
		</style>
		
  </head>
	<body style="padding: 0 10px;">
		<div style="margin-top: 32px; width: 100%; height: auto; position: relative;">
			<div style="width: 600px; padding: 32px; border: 2px solid; height: auto; margin: 0 auto; position: relative;">
				<pre>
WorldonGames.net [Versione 0.1.1110]
(c) 2013-<?phpecho date('Y')?> WorldonGames Italia. Tutti i diritti riservati.

 _    _            _     _             _____
| |  | |          | |   | |           |  __ \
| |  | | ___  _ __| | __| | ___  _ __ | |  \/ __ _ _ __ ___   ___  ___ 
| |/\| |/ _ \| '__| |/ _` |/ _ \| '_ \| | __ / _` | '_ ` _ \ / _ \/ __|
\  /\  / (_) | |  | | (_| | (_) | | | | |_\ \ (_| | | | | | |  __/\__ \
 \/  \/ \___/|_|  |_|\__,_|\___/|_| |_|\____/\__,_|_| |_| |_|\___||___/
       _       _            _          _                        _
      /_\ _  _| |_ ___   __| |___ _ __| |___ _  _ _ __  ___ _ _| |_
     / _ \ || |  _/ _ \ / _` / -_) '_ \ / _ \ || | '  \/ -_) ' \  _|
    /_/ \_\_,_|\__\___/ \__,_\___| .__/_\___/\_, |_|_|_\___|_||_\__|
                                  |_|         |__/

//----------------------------------------------------------------------

This website is automagically synced with our git repository, hence
there is absolutely no need to visit this page anytime.

However, sometimes things goes in the wrong way; if you are here to
perform a manual synchronization, please verify your credentials below:

<span style="float: left;">C:\deploy.wog></span><form autocomplete="off" action="" style="margin-top: -2px;" method="POST"><input type="password" name="auth" <?php if(isset($valore)) echo 'value="'.$valore.'" disabled'; ?> autofocus></input><input type="submit" style="position: absolute; left: -9999px"/></form><?php if(isset($output)) echo $output; ?>

				</pre>
			</div>
		</div>
	</body>
</html>

<?php
	die();
	

	
	

	
	if($hash !== $jsonHash){
		die('Foca!!!');
	}
	
	if($payload->ref == "refs/heads/culocane"){
		echo("branch OK");
		shell_exec('cd C:\inetpub\wwwroot\test-deploy && git fetch && git merge 2>&1');



	}else{
		echo("merdaaaaaaaaaaaaaaaaaaaaaaaa");
		echo("");
	}





?>