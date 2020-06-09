<?php
session_start();
$locid=$_GET["id"];

$link=mysqli_connect('localhost',"root","eresos4ever","USER_MAP");
$sql="DELETE FROM USER WHERE ID=$locid";
        if(mysqli_query($link,$sql)) {
            echo "<script>alert('Η καταχώρηση διαγράφτηκε επιτυχώς.');</script>";
        }
        else {
            echo "<script>alert('Σφάλμα. Δοκιμάστε ξανά.');</script>";
        }
echo   "<script> window.location='usersdb.php'</script>";
