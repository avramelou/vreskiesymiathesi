<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>ΒΡΕΣ ΚΙ ΕΣΥ ΜΙΑ ΘΕΣΗ </title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="manifest" href="site.webmanifest">
    <link rel="icon" href="media/amea.png"/>

    <link href="https://fonts.googleapis.com/css?family=Literata:400,700&display=swap&subset=greek,greek-ext" rel="stylesheet">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
    <meta name="theme-color" content="#fafafa">
</head>
<body>
<?php

$username="";
$password="";
if (isset($_POST['submitInsert'])) {
    $username=$_POST['username'];
    $password=$_POST['password'];
}
?>

<table class="table">
    <thead class="thead-dark">
    <tr align="center">
        <th colspan="8">USER</th>
    </tr>
    <tr>
        <th scope="col">Username</th>
        <th scope="col">Password</th>
        <th scope="col">Email</th>
        <th scope="col">Telephone</th>
        <th scope="col">Name</th>
        <th scope="col">Surname</th>
        <th scope="col">Administrator</th>
        <th scope="col">Delete</th>
    </tr>
    </thead>

    <tbody>
    <?php
    $link=mysqli_connect('localhost',"root","eresos4ever","USER_MAP");
    $sql="SELECT * FROM USER ";
    $result=mysqli_query($link,$sql);
    if(mysqli_num_rows($result)==0)
    {
        echo "<p align='center'><br><br>Δεν βρέθηκαν καταχωρήσεις στη βάση.</p>";
    }

    for ($i=0; $i<mysqli_num_rows($result); $i++) {
        $row = mysqli_fetch_assoc($result);
        $id=$row["ID"];
        echo "<tr class='bg-light'>
                        <td>".$row["USERNAME"]."</td>
                        <td>".$row["PASSWORD"]."</td>
                        <td>".$row["EMAIL"]."</td>
                        <td>".$row["TELEPHONE"]."</td>
                        <td>".$row["NAME"]."</td>
                        <td>".$row["SURNAME"]."</td>";
        if($row["ADMIN"]){
            echo "<td><i style='color: green' class=\"fas fa-user-check\"></i></td>
                    <td><a href='deleteuser.php?id=$id'><i style='color: red' class=\"fa fa-trash\" aria-hidden=\"true\"></i></a></td></tr>";
        }else{
            echo "<td><i style='color: red' class=\"fas fa-user-times\"></i></td>
                   <td><a title='Δεν έχετε δυνατότητα να διαγράψετε αυτό το χρήστη'><i style='color: grey' class=\"fa fa-trash\" aria-hidden=\"true\"></i></a></td></tr>";

        }
    }
    ?>
    </tbody>
</table>

<div align="center" class = "boxes">
    <form action="usersdb.php" method="post">
        <br>
        <h5>Προσθήκη administator</h5>
        <input class="delete-input" type="text" placeholder="username" name="username" required>
        <input class="delete-input" type="text" placeholder="password" name="password" required>
        <button class="delete-button"  type="submit" name="submitInsert" value="submit" style="color: lawngreen"><i class="fas fa-plus"></i></button>
    </form>
</div>




<?php
if(!empty($username)){
    $link=mysqli_connect('localhost',"root","eresos4ever","USER_MAP");
    $sql = "SELECT PASSWORD FROM USER WHERE USERNAME='$username'";
    $result = mysqli_query($link, $sql);
if (mysqli_num_rows($result) == 0) {
    $sql = "INSERT INTO USER (USERNAME,PASSWORD,ADMIN) VALUES ('" . $username . "', '" . $password . "',true)";
    if (mysqli_query($link, $sql)) {
        echo "<script>alert('Η καταχώρηση προστέθηκε επιτυχώς.');</script>";
    } else {
        echo "<script>alert('Σφάλμα. Δοκιμάστε ξανά.');</script>";
    }
}
else
{
    echo "<p align='center' style='margin-top: 100px'><i class=\"fa fa-exclamation-triangle\" aria-hidden=\"true\"></i> Το username υπάρχει ήδη.</p>";
}
    echo   "<script> window.location='usersdb.php'</script>";
}
?>

<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

</body>
</html>