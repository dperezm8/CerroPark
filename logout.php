<?php

//logout.php

require_once ('php/login/config.php');

//Reset OAuth access token
if ($client->getAccessToken() != null) {
    $client->revokeToken();
} 

//Destroy entire session data.
session_start();
session_unset();
session_destroy();

//redirect page to index.php
header('location:index.php');
exit;


?>