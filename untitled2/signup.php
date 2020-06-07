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

<nav class="navbar navbar-dark navbar-expand-md bg-primary fixed-top" >
    <div>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" style="display: none">
            <span class="navbar-toggler-icon"></span>
        </button>
    </div>
    <a class="navbar-brand" href="index.php"><img src="media/logo.png" alt="logo icon" height="70px" width=125px" /></a>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav">
            <a class="nav-item nav-link " href="index.php">ΑΡΧΙΚΗ</a>
            <a class="nav-item nav-link" href="map.php">ΕΥΡΕΣΗ ΘΕΣΗΣ</a>
            <a class="nav-item nav-link" href="new.php">ΥΠΟΒΟΛΗ ΝΕΑΣ ΘΕΣΗΣ</a>
            <a class="nav-item nav-link" href="form.php">ΕΠΙΚΟΙΝΩΝΙΑ</a>
            <a class="nav-item nav-link" href="help.php">ΣΥΧΝΕΣ ΕΡΩΤΗΣΕΙΣ</a>
        </div>
    </div>
    <a href="login.php"><button type="button" class="btn navbar-button"><i class="fas fa-user"></i> Σύνδεση</button></a>
</nav>

<form class="form-signin text-center" method="post" action="signup.php">
    <div align="center">
        <img class="mb-4" src="media/logo.png" alt="" width="178" height="100">
    </div>
    <h5>Δημιουργήστε έναν λογαριασμό</h5>
    <label class="caption-style" for="inputUsername"> Εισάγετε το όνομα χρήστη </label>
    <label for="inputUsername" class="sr-only">Όνομα χρήστη</label>
    <input type="text" id="inputUsername" class="form-control" placeholder="Όνομα χρήστη" required autofocus name="username">
    <label class="caption-style" for="inputPassword"> Εισάγετε τον κωδικό </label>
    <label for="inputPassword" class="sr-only">Κωδικός</label>
    <input type="password" id="inputPassword" class="form-control" placeholder="Κωδικός" required name="password">

    <button class="eye-button" title="Εμφάνιση κωδικού" type="button" onclick="show()"><img src="media/visibility.png"></button>

    <label class="caption-style" for="inputUsername"> Επιβεβαιώστε τον κωδικό </label>
    <label for="confirmPassword" class="sr-only">Επιβεβαίωση κωδικού</label>
    <input type="password" id="confirmPassword" class="form-control" placeholder="Επιβεβαίωση κωδικού" required name="confirmpassword"> <br>

    <button class="btn-block submit-signup" type="submit" name="signup" value="submit">Εγγραφή</button>
</form>
<?php
$username="";
$password="";
$password1="";
if (isset($_POST['signup'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $password1 = $_POST['confirmpassword'];

    if ($password != $password1) {
        echo "<p align='center' style='margin-top: 100px'><i class=\"fa fa-exclamation-triangle\" aria-hidden=\"true\"></i> Οι κωδικοί δεν ταιριάζουν.</p>";
    } else {
        $link = mysqli_connect('localhost', "root", "eresos4ever", "USER_MAP");
        $sql = "SELECT PASSWORD FROM USER WHERE USERNAME='$username'";
        $result = mysqli_query($link, $sql);
        if (mysqli_num_rows($result) == 0) {
            $sql = "INSERT INTO USER (USERNAME, PASSWORD, ADMIN) VALUES ('" . $username . "', '" . $password . "', false)";
            if (mysqli_query($link, $sql))
            {
                $_SESSION["LOGGED IN"]="user";
                $_SESSION["username"]=$username;
                $_SESSION["password"]=$password;
                echo "<script> window.location='profil.php'</script>";
            }
            else echo "<p align='center' style='margin-top: 100px'><i class=\"fa fa-exclamation-triangle\" aria-hidden=\"true\"></i> Σφάλμα. Δοκιμάστε ξανά.</p>";
        } else {
            echo "<p align='center' style='margin-top: 100px'><i class=\"fa fa-exclamation-triangle\" aria-hidden=\"true\"></i> Το username υπάρχει ήδη.</p>";
        }

    }
}
?>

<script>
    function show() {
        var pw = document.getElementById("inputPassword");
        var pw1 = document.getElementById("confirmPassword");
        if(pw.type == "text"){
            pw.type = "password";
            pw1.type = "password";
        } else {
            pw.type = "text";
            pw1.type = "text";
        }
    }
</script>

<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

</body>
</html>

