<?php
$output = shell_exec('cd C:\inetpub\wwwroot\test-deploy && git fetch && git merge 2>&1');
echo "<pre>$output</pre>";
?>
