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
$delete="";
if (isset($_POST['submitDelete'])) {
    $delete=$_POST['delete'];
    $delete = intval ($delete, 10);
}
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
        <th scope="col">ID</th>
        <th scope="col">Οδός</th>
        <th scope="col">Αριθμός</th>
        <th scope="col">Περιοχή</th>
        <th scope="col">Site</th>
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
        echo "<tr class='bg-light' align='center'>
                        <th scope=\"row\">".$row["ID"]."</th>
                        <td>".$row["ΟΔΟΣ"]."</td>
                        <td>".$row["ΑΡΙΘΜΟΣ"]."</td>
                        <td>".$row["ΠΕΡΙΟΧΗ"]."</td>
                        <td>".$row["SITE"]."</td>
                  </tr>";
    }
    ?>
    </tbody>
</table>

<div align="center" style="margin-bottom: 5em">
    <form action="mapdb.php" method="post" >
        <br>
        <h5>Διαγραφή τοποθεσίας</h5>
        <input class="delete-input" type="number" placeholder="Πληκτρολογήστε ID" name="delete">
        <button class="delete-button"  type="submit" name="submitDelete" value="submit"  ><i class="fas fa-trash"></i></button>
    </form>
</div>

<div align="center" style="margin-bottom: 5em">
    <form action="mapdb.php" method="post" >
        <h5>Προσθήκη τοποθεσίας</h5>
        <input class="delete-input" type="text" placeholder="Οδός" name="street" required>
        <input class="delete-input" type="number" placeholder="Αριθμός" name="streetNum" required>
        <input class="delete-input" type="text" placeholder="Περιοχή" name="location" required>
        <input class="delete-input" type="text" placeholder="Site" name="site" required>
        <button class="delete-button"  type="submit" name="submitInsert" value="submit" style="color: lawngreen" ><i class="fas fa-plus"></i></button>
    </form>
</div>

<?php
$link=mysqli_connect('localhost',"root","eresos4ever","USER_MAP");
if(!empty($delete)){
    $sql="DELETE FROM PARKING WHERE ID='$delete'";
    if(mysqli_query($link,$sql)) echo "<p align='center' style='margin-top: 10px'><i class=\"far fa-check-circle\"></i> Η καταχώρηση διαγράφτηκε επιτυχώς.</p>";
    else echo "<p align='center' style='margin-top: 10px'><i class=\"fa fa-exclamation-triangle\"></i> Σφάλμα. Δοκιμάστε ξανά.</p>";
    $page=$_SERVER['PHP_SELF'];
    $sec="0";
    header("Refresh:$sec; url=$page");
}

if(!empty($street)){
    $sql="INSERT INTO PARKING (ΟΔΟΣ, ΑΡΙΘΜΟΣ, ΠΕΡΙΟΧΗ, SITE) VALUES ('".$street."', '".$streetNum."', '".$location."', '".$site."')";
    if(mysqli_query($link,$sql)) echo "<p align='center' style='margin-top: 10px'><i class=\"far fa-check-circle\"></i> Η καταχώρηση προστέθηκε επιτυχώς.</p>";
    else echo "<p align='center' style='margin-top: 10px'><i class=\"fa fa-exclamation-triangle\"></i> Σφάλμα. Δοκιμάστε ξανά.</p>";
    $page=$_SERVER['PHP_SELF'];
    $sec="0";
    header("Refresh:$sec; url=$page");
}
?>

<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

</body>
</html>