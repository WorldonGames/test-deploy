<?php




$output = shell_exec('cd C:\inetpub\wwwroot\test-deploy && git fetch && git merge');
echo "<pre>$output</pre>";


?>