<?php
session_destroy();

// Redirect to login.php after logging out
header("Location: index.php");
exit();