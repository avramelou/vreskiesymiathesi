<?php
session_start();
$locid=$_GET['id'];

$link=mysqli_connect('localhost',"root","eresos4ever","NEW_LOCATION");
$sql="DELETE FROM NEW_LOCATION WHERE ID=$locid";
$result=mysqli_query($link,$sql);
$rows=mysqli_affected_rows($link);
if($result && $rows!=0) {
    echo "<script>alert('Η καταχώρηση διαγράφτηκε επιτυχώς.')</script>";
}
else {
    echo "<script>alert('Σφάλμα. Δοκιμάστε ξανά.')</script>";
}
echo   "<script> window.location='newdb.php'</script>";