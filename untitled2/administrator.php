<?php
session_start();
if(isset($_SESSION["LOGGED IN"]))
{
    $username=$_SESSION["username"];
    $password=$_SESSION["password"];
}
else{
   $username="";
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
            <img src="media/admin.png" alt="profile symbol" style="width:50px; height: 50px;">
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="profil.php"><i class="fas fa-user"></i> Προφίλ</a>
            <a class="dropdown-item" href="logout.php"><i class="fas fa-power-off"></i> Έξοδος</a>
        </div>
    </div>

</nav>

<div class="form-contact" align="center">
    <br>
    <div >
        <img src="media/admin2.png" alt="profil picture" style="width:20%; height:20%;" >
    </div>

    <br>
    <div class="change-data" >
        <h5>Αλλαγή στοιχείων σύνδεσης</h5><br>
        <div>
            <label for="inputUsername">Όνομα Χρήστη:</label><br>
            <input type="text" id="inputUsername" value="<?=$username;?>"><br>
        </div>
        <div>
            <label for="inputPassword">Τρέχων κωδικός:</label><br>
            <input type="password" id="inputPassword"><br>
        </div>
        <div>
            <label for="inputNewPassword">Νέος κωδικός:</label><br>
            <input type="password" id="inputNewPassword" style="margin-left:35px ">
            <button class="eye-button-admin" title="Εμφάνιση κωδικού" type="button" onclick="show()"><i class="fas fa-eye"></i></button>
        </div>
        <div>
            <label for="confirmNewPassword">Επιβεβαίωση νέου κωδικού:</label><br>
            <input type="password" id="confirmNewPassword"><br><br>
        </div>
    </div>

    <div align="center">
        <button class="admin-submit" type="submit">Ενημέρωση</button>
    </div><br><br>

    <h5>Πρόσβαση στις βάσεις δεδομένων</h5>
    <div>
        <button type="submit" class="admin-submit" ><a href="formdb.php" target="_blank" style="color: black;">Φόρμα Επικοινωνίας</a> </button>
        <button type="submit" class="admin-submit"><a href="newdb.php" target="_blank" style="color: black;">Νέες Θέσεις</a></button>
        <button type="submit" class="admin-submit"><a href="mapdb.php" target="_blank" style="color: black;">Χάρτης</a></button>
        <button type="submit" class="admin-submit"><a href="usersdb.php" target="_blank" style="color: black;">Χρήστες</a></button>
    </div>
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