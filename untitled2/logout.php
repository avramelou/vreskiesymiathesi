<?php

session_start();
$_SESSION["search"] = "";
session_destroy();
echo "<script> window.location='index.php'</script>";
exit;