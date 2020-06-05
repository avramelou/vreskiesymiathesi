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
if (isset($_POST['submit'])) {
    $delete=$_POST['delete'];
    $delete = intval ($delete, 10);
}
?>

<table class="table">
    <thead class="thead-dark">
    <tr align="center">
        <th colspan="7">NEW_LOCATION</th>
    </tr>
    <tr align="center">
        <th scope="col">ID</th>
        <th scope="col">Street</th>
        <th scope="col">StreetNumber</th>
        <th scope="col">City</th>
        <th scope="col">PostCode</th>
        <th scope="col">Choice</th>
        <th scope="col">Comments</th>
    </tr>
    </thead>

    <tbody>
    <?php
    $link=mysqli_connect('localhost',"root","eresos4ever","NEW_LOCATION");
    $sql="SELECT * FROM NEW_LOCATION ";
    $result=mysqli_query($link,$sql);
    if(mysqli_num_rows($result)==0)
    {
        echo "<p align='center'><br><br> Δεν βρέθηκαν καταχωρήσεις στη βάση. </p>";
    }


    for ($i=0; $i<mysqli_num_rows($result); $i++) {
        $row = mysqli_fetch_assoc($result);
        echo "<tr align='center' class='bg-light'>
                        <th scope=\"row\">".$row["ID"]."</th>
                        <td>".$row["STREET"]."</td>
                        <td>".$row["STREET_NUM"]."</td>
                        <td>".$row["CITY"]."</td>
                        <td>".$row["POST_CODE"]."</td>
                        <td>".$row["CHOICE"]."</td>
                        <td>".$row["COMMENTS"]."</td>
                  </tr>";
    }
    ?>
    </tbody>
</table>

<div align="center">
    <form action="newdb.php" method="post">
        <br>
        <h5>Διαγραφή καταχώρησης</h5>
        <input class="delete-input" type="number" placeholder="ID για διαγραφή" name="delete">
        <button class="delete-button"  type="submit" name="submit" value="submit" ><i class="fas fa-trash"></i></button>
    </form>
</div>

<?php
if(!empty($delete)){
    $link=mysqli_connect('localhost',"root","eresos4ever","NEW_LOCATION");
    $sql="DELETE FROM NEW_LOCATION WHERE ID='$delete'";
    if(mysqli_query($link,$sql)) echo "<p align='center' style='margin-top: 10px'><i class=\"far fa-check-circle\"></i> Η καταχώρηση διαγράφτηκε επιτυχώς.</p>";
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
