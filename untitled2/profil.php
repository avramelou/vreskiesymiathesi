<?php
session_start();
if(isset($_SESSION["LOGGED IN"]))
{
    $username=$_SESSION["username"];
    $password=$_SESSION["password"];

    $link=mysqli_connect('localhost',"root","eresos4ever","user_map");
    $sql="SELECT * FROM User WHERE username='$username'";
    $result=mysqli_query($link,$sql);
    $row=mysqli_fetch_assoc($result);
    $name=$row['name'];
    $surname=$row['surname'];
    $email=$row['email'];
    $tel=$row['telephone'];
}
else{
    $name="";
    $surname="";
    $email="";
    $tel="";
}

?>

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
<!--[if IE]>
<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
<![endif]-->

<!-- Add your site or application content here -->
<nav class="navbar navbar-dark navbar-expand-md bg-primary fixed-top" >

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" style="display: none">
        <span class="navbar-toggler-icon"></span>
    </button>
    <a class="navbar-brand" href="index.html"><img src="media/logo.png" alt="logo icon" height="70px" width=125px" /></a>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav">
            <a class="nav-item nav-link active" href="index.html">ΑΡΧΙΚΗ</a>
            <a class="nav-item nav-link" href="map.html">ΧΑΡΤΗΣ</a>
            <a class="nav-item nav-link" href="new.html">ΥΠΟΒΟΛΗ ΝΕΑΣ ΘΕΣΗΣ</a>
            <a class="nav-item nav-link" href="form.html">ΕΠΙΚΟΙΝΩΝΙΑ</a>
            <a class="nav-item nav-link" href="help.html">ΣΥΧΝΕΣ ΕΡΩΤΗΣΕΙΣ</a>
        </div>
    </div>

    <div class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <img src="media/profile.png" alt="profile symbol" style="width:50px; height: 50px;">
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="profil.html"><i class="fas fa-user"></i> Προφίλ</a>
            <a class="dropdown-item" href="index.html"><i class="fas fa-power-off"></i> Έξοδος</a>
        </div>
    </div>

</nav>

<?php
$search="";
if (isset($_POST['submit'])) {
    $search=$_POST['search'];
}
?>

<div class="form-contact">

    <div align="center">
        <img src="media/profile2.png" alt="profil picture" style="width:20%; height:20%;" >
    </div>

    <h5>Γεια σας, (όνομα)</h5><br>
    <ul>
        <li>Μπορείτε να επεξεργαστείτε τα στοιχεία του προφίλ σας παρακάτω.</li>
        <li>Με την δημιουργία λογαριασμού, έχετε πλέον την δυνατότητα να καταχωρήσετε τις θέσεις πάρκινγκ που χρησιμοποιείτε πιο συχνά στην λίστα με τα
            αγαπημένα, ώστε να τις βρίσκετε ευκολότερα.</li>
    </ul><br>

    <form action="profil.php" method="post">
        <div style="float:left;">
            <h5>Επεξεργασία των στοιχείων σας</h5><br>
            <div>
                <label for="inputName">Όνομα:</label><br>
                <input type="text" id="inputName" name="name" value="<?=$name;?>"><br>
            </div>
            <div>
                <label for="inputLastname">Επώνυμο:</label><br>
                <input type="text" id="inputLastname" name="surname" value="<?=$surname;?>"><br>
            </div>
            <div>
                <label for="inputEmail"><i class="fas fa-at"></i>  Email:</label><br>
                <input type="email" id="inputEmail" name="email" value="<?=$email;?>"><br>
            </div>
            <div>
                <label for="inputTel"><i class="fas fa-phone-alt"></i> Τηλέφωνο:</label><br>
                <input type="tel" id="inputTel" name="telephone" value="<?=$tel;?>"><br><br>
            </div>
        </div>

        <div class="change-data" style="float: right;" >
            <h5>Αλλαγή στοιχείων σύνδεσης</h5><br>
            <div>
                <label for="inputUsername">Όνομα Χρήστη:</label><br>
                <input type="text" id="inputUsername" name="username" value="<?=$username;?>"><br>
            </div>
            <div>
                <label for="inputPassword">Τρέχων κωδικός:</label><br>
                <input type="password" id="inputPassword" name="password"><br>
            </div>
            <div>
                <label for="inputNewPassword">Νέος κωδικός:</label><br>
                <div class="eye">
                    <button class="eye-button" title="Εμφάνιση κωδικού" type="button" onclick="show()"><img src="media/visibility.png"></button>
                </div>
                <input type="password" id="inputNewPassword" name="newpassword"><br>
            </div>
            <div>
                <label for="confirmNewPassword">Επιβεβαίωση νέου κωδικού:</label><br>
                <input type="password" id="confirmNewPassword" name="newpassword1"><br><br>
            </div>
        </div>

        <div align="center">
            <button class="submit-form" type="submit" name="update" value="submit">Ενημέρωση</button>
        </div>
    </form><br><br>


    <?php
    if (isset($_POST['update'])) {
        $name=$_POST['name'];
        $surname=$_POST['surname'];
        $email=$_POST['email'];
        $tel=$_POST['telephone'];
        if(!empty($_POST['password']))
        {
            $username1=$_POST['username'];
            $password1=$_POST['password'];
            $passwordnew=$_POST['newpassword'];
            $passwordnew1=$_POST['newpassword1'];

            $link=mysqli_connect('localhost',"root","eresos4ever","user_map");
            $sql="SELECT id FROM User WHERE username='$username'";
            $result=mysqli_query($link,$sql);
            $row=mysqli_fetch_assoc($result);

            if($password==$password1)
            {
                if($passwordnew==$passwordnew1)
                {
                    $id=$row['id'];
                    $sql="UPDATE User SET username='$username', password='$passwordnew', email='$email', telephone='$tel', name='$name', surname='$surname' WHERE id=$id";
                    if(mysqli_query($link,$sql)) echo "<p align='center' style='margin-top: 10px'><i class=\"far fa-check-circle\"></i>Η ενημέρωση ολοκληρώθηκε επιτυχώς.</p>";
                    else echo "<p align='center' style='margin-top: 10px'><i class=\"fa fa-exclamation-triangle\" aria-hidden=\"true\"></i> Σφάλμα. Δοκιμάστε ξανά.</p>";
                }
            }
        }

    }
    ?>

    <img class="favorites-image" src="media/add-to-favorites.png">
    <h5>Η λίστα με τις αγαπημένες σας θέσεις:</h5><br>
    <form method="post" action="profil.php">
        <input type="text" id="search" placeholder="Αναζήτηση..." name="search" class="search-box-input"  value="<?=$search;?>">
        <button class="submit-signup" type="submit" name="submit" value="submit"><i class="fa fa-search"></i> Νέα θέση</button>
    </form>

    <?php
    if(!empty($search))
    {
        $link=mysqli_connect('localhost',"root","eresos4ever","user_map");
        $sql="SELECT * FROM PARKING WHERE ΟΔΟΣ='$search' OR ΠΕΡΙΟΧΗ='$search'";
        $result=mysqli_query($link,$sql);
        if(mysqli_num_rows($result)==0)
        {
            echo "<p><br><br> Δεν βρέθηκαν θέσεις πάρκινγκ. </p>";
        }


        for ($i=0; $i<mysqli_num_rows($result); $i++) {
            $row = mysqli_fetch_assoc($result);
            $show=$row["ΟΔΟΣ"] .' ' .$row["ΑΡΙΘΜΟΣ"] .' ' . $row["ΠΕΡΙΟΧΗ"];
            $site=$row["SITE"];

            echo "<p> <br><br> <form method='post' action='profil.php'>
                                <button type='submit' name=$i value=$i onclick='doSomething()' style='border: none; color: red; background: white;'><i class=\"far fa-heart\"></i></button>
                                </form>
                                $show <a href='$site' target='_blank' title='Άνοιγμα στο GoogleMaps'> <i class=\"fa fa-location-arrow\" aria-hidden=\"true\"></i></a> </p>";


        }
        $sql="SELECT * FROM PARKING WHERE ΟΔΟΣ='$search' OR ΠΕΡΙΟΧΗ='$search'";
            $result=mysqli_query($link,$sql);


        for ($i=0; $i<mysqli_num_rows($result); $i++) {
            $row2 = mysqli_fetch_assoc($result);

            if (isset($_POST[$i])) {

                echo "oigmew";
                $sql1 = "SELECT id FROM User WHERE username='$username'";
                $result1 = mysqli_query($link, $sql1);
                $row1 = mysqli_fetch_assoc($result1);

                $sql2 = "INSERT INTO FAVOURITES (user_id,location_id) VALUES ('" . $row1["id"] . "', '" . $row2["ID"] . "')";
                echo $sql2;
                if (mysqli_query($link, $sql2)) echo "<p align='center' style='margin-top: 10px'><i class=\"far fa-check-circle\"></i> Η τοποθεσία προστέθηκε στα αγαπημένα.</p>";
                else echo "<p align='center' style='margin-top: 10px'><i class=\"fa fa-exclamation-triangle\" aria-hidden=\"true\"></i> Σφάλμα. Δοκιμάστε ξανά.</p>";
            } else {
                echo "fnewoijukhnjknjgi";
            }
        }

    }
    ?>

</div>



<script>
    function show() {
        var pw = document.getElementById("inputPassword");
        var pw1 = document.getElementById("inputNewPassword");
        var pw2 = document.getElementById("confirmNewPassword");
        if(pw.type == "text"){
            pw.type = "password";
            pw1.type = "password";
            pw2.type = "password";
        } else {
            pw.type = "text";
            pw1.type = "text";
            pw2.type = "text";
        }
    }
</script>


<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v6.0"></script>
<script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
</body>
</html>