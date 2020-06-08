<?php

session_start();
$username=$_SESSION["username"];
$locid=$_GET['id'];
$link = mysqli_connect('localhost', "root", "eresos4ever", "USER_MAP");
$sql1 = "SELECT ID FROM USER WHERE USERNAME='$username'";
$result1 = mysqli_query($link, $sql1);
$row1 = mysqli_fetch_assoc($result1);
$userID=intval($row1['ID'],10);

$sql="DELETE FROM FAVOURITES WHERE LOCATION_ID=$locid AND USER_ID=$userID";
$result10 = mysqli_query($link, $sql);
$rows = mysqli_affected_rows($link);

if ($rows==0) {
    echo "<script>alert('Σφάλμα. Δοκιμάστε ξανά.');</script>";
}
echo "<script> window.location='profil.php'</script>";

