<?php
	
	$secret = 'Culo!'; 					//Chiave Segreta di github, nonché password manuale
	$hash = 'Cenere';						//Valore a caso per richieste non-git 
	$jsonHash = 'Ebreo';				//Altro valore a caso diverso dal precedente
	
	//Controlla se la richiesta proviene da github
	if(isset($_SERVER['HTTP_X_HUB_SIGNATURE'])){
		$sign = $_SERVER['HTTP_X_HUB_SIGNATURE'];				//Assegna la variabile firma
		list($sha, $hash) = explode('=', $sign, 2);			//Separa la firma dal tipo di hash
		$json = file_get_contents('php://input');				//Ottiene il carico inviato da git
		$jsonHash = hash_hmac($sha, $json, $secret);		//Calcola l'hash del carico sulla base della chiave segreta
		$payload = json_decode($json);									//Decodifica il carico
		$branch = $payload->ref;												//Legge il valore della branch
	}

	//Controlla l'autenticazione (git o manuale)
	if(($hash == $jsonHash && ($branch == "refs/heads/master")) || (isset($_POST['auth']) && ($_POST['auth'] == $secret))){
		
		//Messaggi da stampare per l'invio delle credenziali
		$valore = "********";
		$output = 'Credenziali verificate, inizio procedura di sincronizzazione'."\n\n";
		
		//Definizione dei comandi
		$cmds = array(
			'whoami',
			'git fetch',
			'git pull',
			'git status'
		);

		//Elaborazione dei comandi
		foreach($cmds AS $cmd){
			//Esecuzione
			$tmp = shell_exec($cmd);
			//Restituzione del risultato
			$output .= "C:\deploy.wog>{$cmd}\n";
			$output .= htmlentities(trim($tmp))."\n\n";
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