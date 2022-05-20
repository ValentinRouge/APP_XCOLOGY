<?php

$pass = password_hash("1234", PASSWORD_DEFAULT);
echo $pass;
echo "\n";
if (password_verify("1234","0$2y$10\$fDnTDv1SwQV3f/VU2H2Bjua9ShVu4bwR3Ak1hwATh33G.KY88U0dO")) echo "yes";
if (password_verify("1234",$pass)) echo "yes2";


?>
