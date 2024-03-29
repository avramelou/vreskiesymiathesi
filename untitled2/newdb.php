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


<table class="table">
    <thead class="thead-dark">
    <tr align="center">
        <th colspan="7">NEW_LOCATION</th>
    </tr>
    <tr>
        <th scope="col">Street</th>
        <th scope="col">StreetNumber</th>
        <th scope="col">City</th>
        <th scope="col">PostCode</th>
        <th scope="col">Choice</th>
        <th scope="col">Comments</th>
        <th scope="col">Delete</th>
    </tr>
    </thead>

    <tbody>
    <?php
    $link=mysqli_connect('localhost',"root","eresos4ever","NEW_LOCATION");
    $sql="SELECT * FROM NEW_LOCATION ";
    $result=mysqli_query($link,$sql);
    if(mysqli_num_rows($result)==0)
    {
        echo "<p align='center'><br> Δεν βρέθηκαν καταχωρήσεις στη βάση. <br></p>";
    }


    for ($i=0; $i<mysqli_num_rows($result); $i++) {
        $row = mysqli_fetch_assoc($result);
        $id=$row["ID"];
        if($row["CHOICE"]==1)
        {
            $choice="Δεν υπάρχουν θέσεις";
        }
        elseif ($row["CHOICE"]==2)
        {
            $choice="Δεν επαρκούν οι θέσεις";
        }
        else
        {
            $choice="Υπάρχουν θέσεις αλλά δεν είναι καταχωρημένες στον χάρτη";
        }
        echo "<tr class='bg-light'>
                        <td>".$row["STREET"]."</td>
                        <td>".$row["STREET_NUM"]."</td>
                        <td>".$row["CITY"]."</td>
                        <td>".$row["POST_CODE"]."</td>
                        <td>".$choice."</td>
                        <td>".$row["COMMENTS"]."</td>
                        <td><a href='deletenew.php?id=$id' title='Διαγραφή'><i style='color: black' class=\"fa fa-trash\"></i></a></td>
                  </tr>";
    }
    ?>
    </tbody>
</table>

<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

</body>
</html>
