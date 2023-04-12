<?php

//logout.php

include('php/login/config.php');

//Reset OAuth access token
$clienteGoogle->revokeToken();

//Destroy entire session data.
session_destroy();

//redirect page to index.php
header('location:index.php');

?>