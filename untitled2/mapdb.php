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
$street="";
$streetNum="";
$location="";
$site="";
if (isset($_POST['submitInsert'])) {
    $street=$_POST['street'];
    $streetNum=$_POST['streetNum'];
    $location=$_POST['location'];
    $site=$_POST['site'];
    $streetNum = intval ($streetNum, 10);
}
?>

<table class="table">
    <thead class="thead-dark">
    <tr align="center">
        <th colspan="5">PARKING</th>
    </tr>
    <tr>
        <th scope="col">ID</th>
        <th scope="col">Οδός</th>
        <th scope="col">Αριθμός</th>
        <th scope="col">Περιοχή</th>
        <th scope="col">Site</th>
        <th scope="col">Delete</th>
    </tr>
    </thead>

    <tbody>
    <?php
    $link=mysqli_connect('localhost',"root","eresos4ever","USER_MAP");
    $sql="SELECT * FROM PARKING ";
    $result=mysqli_query($link,$sql);
    if(mysqli_num_rows($result)==0)
    {
        echo "<p align='center'><br><br> Δεν βρέθηκαν καταχωρήσεις στη βάση. </p>";
    }


    for ($i=0; $i<mysqli_num_rows($result); $i++) {
        $row = mysqli_fetch_assoc($result);
        $id=$row["ID"];
        echo "<tr class='bg-light'>
                        <th scope=\"row\">".$id."</th>
                        <td>".$row["ΟΔΟΣ"]."</td>
                        <td>".$row["ΑΡΙΘΜΟΣ"]."</td>
                        <td>".$row["ΠΕΡΙΟΧΗ"]."</td>
                        <td>".$row["SITE"]."</td>
                        <td><a href='deletemap.php?id=$id'><i style='color: red' class=\"fa fa-trash\" aria-hidden=\"true\"></i>
</a></td>
                  </tr>";
    }
    ?>
    </tbody>
</table>

<div align="center" style="margin-bottom: 5em" class="boxes">
    <form action="mapdb.php" method="post" >
        <br>
        <h5>Προσθήκη τοποθεσίας</h5>
        <input class="delete-input" type="text" placeholder="Οδός" name="street" style="margin-left: 1%; margin-top: 2%" required>
        <input class="delete-input" type="number" placeholder="Αριθμός" name="streetNum" style="margin-left: 1%; margin-top: 2%;" required>
        <input class="delete-input" type="text" placeholder="Περιοχή" name="location" style="margin-left: 1%; margin-top: 2%" required>
        <input class="delete-input" type="text" placeholder="Site" name="site" style="margin-left: 1%; margin-top: 2%" required>
        <button class="delete-button"  type="submit" name="submitInsert" value="submit" style="color: lawngreen; margin-left: 1%; margin-top: 2%" ><i class="fas fa-plus"></i></button>
    </form>
</div>

<?php
if(!empty($street)){
    $link=mysqli_connect('localhost',"root","eresos4ever","USER_MAP");
    $sql="INSERT INTO PARKING (ΟΔΟΣ, ΑΡΙΘΜΟΣ, ΠΕΡΙΟΧΗ, SITE) VALUES ('".$street."', '".$streetNum."', '".$location."', '".$site."')";
    if(mysqli_query($link,$sql)) {
        echo "<script>alert('Η καταχώρηση προστέθηκε επιτυχώς.')</script>";
    }
    else {
        echo "<script>alert('Σφάλμα. Δοκιμάστε ξανά.')</script>";
    }
    echo   "<script> window.location='mapdb.php'</script>";
}
?>

<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

</body>
</html>