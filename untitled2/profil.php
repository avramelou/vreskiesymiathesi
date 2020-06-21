<?php
session_start();
if(isset($_SESSION["LOGGED IN"]))
{
    $username=$_SESSION["username"];
    $password=$_SESSION["password"];

    $link=mysqli_connect('localhost',"root","eresos4ever","USER_MAP");
    $sql="SELECT * FROM USER WHERE USERNAME='$username'";
    $result=mysqli_query($link,$sql);
    $row=mysqli_fetch_assoc($result);
    $name=$row['NAME'];
    $surname=$row['SURNAME'];
    $email=$row['EMAIL'];
    $tel=$row['TELEPHONE'];
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
    <a class="navbar-brand" href="index.php"><img src="media/logo.png" alt="logo icon" height="70px" width=125px" /></a>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav">
            <a class="nav-item nav-link" href="index.php">ΑΡΧΙΚΗ</a>
            <a class="nav-item nav-link" href="map.php">ΕΥΡΕΣΗ ΘΕΣΗΣ</a>
            <a class="nav-item nav-link" href="new.php">ΥΠΟΒΟΛΗ ΝΕΑΣ ΘΕΣΗΣ</a>
            <a class="nav-item nav-link" href="form.php">ΕΠΙΚΟΙΝΩΝΙΑ</a>
            <a class="nav-item nav-link" href="help.php">ΣΥΧΝΕΣ ΕΡΩΤΗΣΕΙΣ</a>
        </div>
    </div>

    <div class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <img src="media/profile.png" alt="profile symbol" style="width:50px; height: 50px;">
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="profil.php"><i class="fas fa-user"></i> Προφίλ</a>
            <a class="dropdown-item" href="logout.php" ><i class="fas fa-power-off"></i> Έξοδος</a>
        </div>
    </div>

</nav>

<?php
if(isset($_SESSION['search']))
{
    $search=$_SESSION['search'];
}
else
{
    $search="";
}
if (isset($_POST['submit'])) {
    $search=$_POST['search'];
    $_SESSION['search']=$search;
}

?>

<div class="form-contact">

    <div align="center">
        <img src="media/profile2.png" alt="profil picture" style="width:20%; height:20%;" >
    </div>

    <h5>Γεια σας, <?php echo $username;?></h5><br>
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
                    <button class="eye-button" title="Εμφάνιση κωδικού" type="button" onclick="show()"><i class="fas fa-eye"></i></button>
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

            $link=mysqli_connect('localhost',"root","eresos4ever","USER_MAP");
            $sql="SELECT ID FROM USER WHERE USERNAME='$username'";
            $result=mysqli_query($link,$sql);
            $row=mysqli_fetch_assoc($result);

            if($password==$password1)
            {
                if($passwordnew==$passwordnew1)
                {
                    $id=$row['ID'];
                    $sql="UPDATE USER SET USERNAME='$username1', PASSWORD='$passwordnew', EMAIL='$email', TELEPHONE='$tel', NAME='$name', SURNAME='$surname' WHERE ID=$id";
                    if(mysqli_query($link,$sql)) {
                        $_SESSION["username"] = $username1;
                        $_SESSION["password"] = $passwordnew;
                        echo "<script>alert('Η ενημέρωση ολοκληρώθηκε επιτυχώς.');</script>";
                    }
                    else {
                        echo "<script>alert('Σφάλμα. Δοκιμάστε ξανά.');</script>";
                    }
                }
                else{
                    echo "<script>alert('Οι κωδικοί δεν ταιριάζουν.');</script>";
                }
            }
            else{
                echo "<script>alert('Ο τρέχων κωδικός είναι λάθος.');</script>";
            }
        }
        else
        {
            $link=mysqli_connect('localhost',"root","eresos4ever","USER_MAP");
            $sql="SELECT ID FROM USER WHERE USERNAME='$username'";
            $result=mysqli_query($link,$sql);
            $row=mysqli_fetch_assoc($result);

            $id=$row['ID'];
            $sql="UPDATE USER SET EMAIL='$email', TELEPHONE='$tel', NAME='$name', SURNAME='$surname' WHERE ID=$id";
            if(mysqli_query($link,$sql)) echo "<p align='center' style='margin-top: 10px'><i class=\"far fa-check-circle\"></i>Η ενημέρωση ολοκληρώθηκε επιτυχώς.</p>";
            else echo "<p align='center' style='margin-top: 10px'><i class=\"fa fa-exclamation-triangle\"></i> Σφάλμα. Δοκιμάστε ξανά.</p>";

        }
        echo "<script> window.location='profil.php'</script>";
    }
    ?>


    <h5>Η λίστα με τις αγαπημένες σας θέσεις:</h5>


    <?php
    $link = mysqli_connect('localhost', "root", "eresos4ever", "USER_MAP");
    $sql="SELECT PARKING.ID, ΟΔΟΣ, ΑΡΙΘΜΟΣ, ΠΕΡΙΟΧΗ, SITE FROM PARKING, FAVOURITES, USER WHERE USER.ID=USER_ID AND LOCATION_ID=PARKING.ID AND USERNAME='$username'";
    $result = mysqli_query($link, $sql);
    if(mysqli_num_rows($result)==0){
        echo "Δεν υπάρχουν θέσεις στα αγαπημένα.";
    }

    for ($i = 0; $i < mysqli_num_rows($result); $i++) {
        $row = mysqli_fetch_assoc($result);
        $show = $row["ΟΔΟΣ"] . ' ' . $row["ΑΡΙΘΜΟΣ"] . ' ' . $row["ΠΕΡΙΟΧΗ"];
        $site = $row["SITE"];
        $id = $row["ID"];

        echo "<p><br> <a href='deletefavorites.php?id=$id' ><i title='Αφαίρεση' style='color: red' class='fas fa-heart'></i></a>  $show <a href='$site' target='_blank' title='Άνοιγμα στο GoogleMaps'> <i style='color: blue' class=\"fas fa-map-marker-alt\"></i></a> </p>";
    }
    ?>
    <br>

    <br>
    <form method="post" action="profil.php">
        <br>
        <h5>Αναζητήστε μια θέση</h5>
        <input type="text" id="search" placeholder="Αναζήτηση..." name="search" class="search-box-input"  value="<?=$search;?>">
        <button class="submit-signup" type="submit" name="submit" value="submit" style="margin-top: 1%;"><i class="fa fa-search"></i> Νέα θέση</button>
    </form>

    <?php
    if(!empty($search)) {
        $link = mysqli_connect('localhost', "root", "eresos4ever", "USER_MAP");
        $sql = "SELECT * FROM PARKING WHERE ΟΔΟΣ='$search' OR ΠΕΡΙΟΧΗ='$search'";
        $result = mysqli_query($link, $sql);
        if (mysqli_num_rows($result) == 0) {
            echo "<p><br><br> Δεν βρέθηκαν θέσεις πάρκινγκ. </p>";
        }



        for ($i = 0; $i < mysqli_num_rows($result); $i++) {
            $sql1="SELECT PARKING.ID FROM PARKING, FAVOURITES, USER WHERE USER.ID=USER_ID AND LOCATION_ID=PARKING.ID AND USERNAME='$username'";
            $result1 = mysqli_query($link, $sql1);

            $row = mysqli_fetch_assoc($result);

            $show = $row["ΟΔΟΣ"] . ' ' . $row["ΑΡΙΘΜΟΣ"] . ' ' . $row["ΠΕΡΙΟΧΗ"];
            $site = $row["SITE"];
            $id = $row["ID"];

            $flag = false;
            for ($j = 0; $j < mysqli_num_rows($result1); $j++)
            {
                $row1 = mysqli_fetch_assoc($result1);
                $id2=$row1["ID"];
                if($id == $id2)
                    $flag=true;
            }
            if (!$flag){
                echo "<p><br> <a href='addfavorites.php?id=$id'><i style='color: red' title='Προσθήκη' class=\"far fa-heart\"></i></a> $show <a href='$site' target='_blank' title='Άνοιγμα στο GoogleMaps'> <i style='color: blue' class=\"fas fa-map-marker-alt\"></i></a> </p>";

            }
        }
    }
    ?>


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