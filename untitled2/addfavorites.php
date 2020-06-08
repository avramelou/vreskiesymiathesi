<?php

session_start();
$username=$_SESSION["username"];
$locid=$_GET['id'];

$link = mysqli_connect('localhost', "root", "eresos4ever", "USER_MAP");
$sql1 = "SELECT ID FROM USER WHERE USERNAME='$username'";
$result1 = mysqli_query($link, $sql1);
$row1 = mysqli_fetch_assoc($result1);
$userID=$row1['ID'];

$sql2 = "INSERT INTO FAVOURITES (USER_ID, LOCATION_ID) VALUES ('" . $userID . "', $locid)";
$result2=mysqli_query($link, $sql2);
echo   "<script> window.location='profil.php'</script>";