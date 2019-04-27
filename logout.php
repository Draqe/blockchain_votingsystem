<?php

session_start();

session_destroy();

setcookie("username","",time()-7200);

header("Location: /blockchain_votingsystem/index.php");


?>