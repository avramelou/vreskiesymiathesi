<?php
session_start();
$_SESSION["search"] = "";
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
<nav class="navbar navbar-dark navbar-expand-md bg-primary fixed-top" >
    <div>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" style="display: none">
            <span class="navbar-toggler-icon"></span>
        </button>
    </div>
    <a class="navbar-brand" href="index.php"><img src="media/logo.png" alt="logo icon" height="70px" width=125px" /></a>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav">
            <a class="nav-item nav-link" href="index.php">ΑΡΧΙΚΗ</a>
            <a class="nav-item nav-link" href="map.php">ΕΥΡΕΣΗ ΘΕΣΗΣ</a>
            <a class="nav-item nav-link" href="new.php">ΥΠΟΒΟΛΗ ΝΕΑΣ ΘΕΣΗΣ</a>
            <a class="nav-item nav-link" href="form.php">ΕΠΙΚΟΙΝΩΝΙΑ</a>
            <a class="nav-item nav-link active" href="help.php">ΣΥΧΝΕΣ ΕΡΩΤΗΣΕΙΣ</a>
        </div>
    </div>
    <?php
    if(isset($_SESSION["LOGGED IN"]) && $_SESSION["LOGGED IN"]=="user")
    {
        echo "<div class=\"nav-item dropdown\">
        <a class=\"nav-link dropdown-toggle\" href=\"#\" id=\"navbarDropdown\" role=\"button\" data-toggle=\"dropdown\" aria-haspopup=\"true\" aria-expanded=\"false\">
            <img src=\"media/profile.png\" alt=\"profile symbol\" style=\"width:50px; height: 50px;\">
        </a>
        <div class=\"dropdown-menu\" aria-labelledby=\"navbarDropdown\">
            <a class=\"dropdown-item\" href=\"profil.php\"><i class=\"fas fa-user\"></i> Προφίλ</a>
            <a class=\"dropdown-item\" href=\"logout.php\"><i class=\"fas fa-power-off\"></i> Έξοδος</a>
        </div>
    </div>";
    }
    elseif(isset($_SESSION["LOGGED IN"]) && $_SESSION["LOGGED IN"]=="admin") {
        echo "<div class=\"nav-item dropdown\">
        <a class=\"nav-link dropdown-toggle\" href=\"#\" id=\"navbarDropdown\" role=\"button\" data-toggle=\"dropdown\" aria-haspopup=\"true\" aria-expanded=\"false\">
            <img src=\"media/admin.png\" alt=\"profile symbol\" style=\"width:50px; height: 50px;\">
        </a>
        <div class=\"dropdown-menu\" aria-labelledby=\"navbarDropdown\">
            <a class=\"dropdown-item\" href=\"administrator.php\"><i class=\"fas fa-user\"></i> Προφίλ</a>
            <a class=\"dropdown-item\" href=\"logout.php\"  ><i class=\"fas fa-power-off\"></i> Έξοδος</a>
        </div>
    </div>";
    }
    else
    {
        echo "<a href=\"login.php\"><button type=\"button\" class=\"btn navbar-button\"><i class=\"fas fa-user\"></i> Σύνδεση</button></a>";
    }
    ?>
</nav>

<div class="help">
    <h3 style="text-align: center">Συχνές ερωτήσεις</h3><br>
    <h5 class="header-help-style"> 1. Πως αναζητώ θέση πάρκινγκ;</h5>
    <p class = "text-help-style"> Για να αναζητήσετε θέση παρκινγκ θα πρέπει να μεταφερθείτε στην σελίδα εύρεσης πάρκινγκ πατώντας
        <a href="map.php">εδώ</a> ή πατώντας στο μενού "ΕΥΡΕΣΗ ΘΕΣΗΣ". </p>
    <h5 class = "header-help-style">2. Πως υποβάλω αίτηση για νέα θέση πάρκινγκ;</h5>
    <p class="text-help-style"> Για να υποβάλετε αίτηση για νέα θέση πάρκινγκ σε κάποιο μέρος όπου θα θέλατε να υπάρχει, για νέες
        θέσεις πάρκινγκ σε κάποιο μέρος όπου υπάρχουν αλλά δεν επαρκούν ή για θέσεις όπου υπάρχουν αλλά δεν είναι καταχωρημένες
        στο σύστημα μας, θα πρέπει να μεταφερθείτε στην σελίδα υποβολής θέσης πάρκινγκ πατώντας <a href="new.php">εδώ</a>
        ή πατώντας στο μενού "ΥΠΟΒΟΛΗ ΝΕΑΣ ΘΕΣΗΣ" και να συμπληρώσετε την φόρμα αίτησης.</p>
    <h5 class="header-help-style">3. Πως μπορώ να επικοινωνήσω μαζί σας;</h5>
    <p class="text-help-style">Για να επικοινωνήσετε μαζί μας θα πρέπει να μεταφερθείτε στην σελίδα με την φόρμα επικοινωνίας πατώντας
        <a href="form.php">εδώ</a> ή πατώντας στο μενού "ΕΠΙΚΟΙΝΩΝΙΑ". Μετά, θα πρέπει να συμπληρώσετε τα απαραίτητα πεδία της φόρμας και
        να μας στείλετε το μήνυμα σας.</p>
    <h5 class="header-help-style">4. Πως μπορώ να φτιάξω λογαριασμό στην σελίδα;</h5>
    <p class="text-help-style"> Μπορείτε να φτιάξετε λογαριασμό πατώντας <a href="signup.php">εδώ</a> ή πατώντας το κουμπί "Σύνδεση", όπου βρίσκεται
        πάνω δεξιά και να πατήσετε πάνω στην λέξη "εδώ", όπως φαίνεται στην φωτογραφία παρακάτω.</p>
    <div align="center">
        <img class="image-help-style" src="media/signup.png" alt="image for sign up">
    </div>
    <h5 class="header-help-style"> 5. Πως μπορώ να συνδεθώ στον λογαριασμό μου;</h5>
    <p class="text-help-style"> Μπορείτε να συνδεθείτε στον λογαριασμό σας πατώντας <a href="login.php">εδώ</a> ή πατώντας πάνω δεξιά
        το κουμπί "Σύνδεση", όπου θα πρέπει να εισάγετε τα στοιχεία σας (όνομα χρήστη και κωδικό πρόσβασης) και να πατήσετε το κουμπί "Σύνδεση".</p>
    <h5 class="header-help-style">6. Τι δικαιολογητικά χρειάζονται για θέση στάθμευσης ΑΜΕΑ;</h5>
    <p class="text-help-style">Μπορείτε να βρείτε πληροφορίες για τα δικαιολογητικά που χρειάζονται πατώντας <a href="https://www.dikaiologitika.gr/arxeio/1979/dikaiologitika-gia-thesi-stathmefsis-amea" target="_blank" title="άνοιγμα στο dikaiologitika.gr">εδώ</a>. </p><br>
    <h5 class="header-help-style"><b>Για οποιαδήποτε άλλη απορία μπορείτε να επικοινωνήσετε μαζί μας μέσω της <a
                    href="form.php">φόρμας επικοινωνίας.</a></b></h5>
</div>

<footer class="footer">
    <div class="fb-share-button" data-href="http://83.212.77.226/index.html" data-layout="button" data-size="small"><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=http%3A%2F%2Flocalhost%3A63342%2Fvreskiesymiathsi%2Funtitled2%2Findex.html%3F_ijt%3Ddrbuie6ggtrueacrt4gcv9a29l&amp;src=sdkpreparse" class="fb-xfbml-parse-ignore">Share</a></div>
    <a href="https://twitter.com/share?ref_src=twsrc%5Etfw" class="twitter-share-button" data-show-count="false">Tweet</a>
</footer>


<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v6.0"></script>
<script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>

</body>
</html>

