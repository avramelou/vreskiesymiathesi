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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

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
            <a class="nav-item nav-link active" href="map.php">ΕΥΡΕΣΗ ΘΕΣΗΣ</a>
            <a class="nav-item nav-link" href="new.php">ΥΠΟΒΟΛΗ ΝΕΑΣ ΘΕΣΗΣ</a>
            <a class="nav-item nav-link" href="form.php">ΕΠΙΚΟΙΝΩΝΙΑ</a>
            <a class="nav-item nav-link" href="help.php">ΣΥΧΝΕΣ ΕΡΩΤΗΣΕΙΣ</a>
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
<?php
$search="";
if ($_POST['submit']=="submit") {
    $search=$_POST['search'];
}
?>


<div class="map">
    <div class="map-text">
        <br>
        <h5>Εύρεση θέσης πάρκινγκ</h5><br>
        <p>Αναζητήστε μία θέση πάρκινγκ στο Δήμο της Θεσσαλλονίκης.<br>Πατήστε μία θέση στον χάρτη για να δείτε που βρίσκεται ή αναζητήστε μια οδό για να βρείτε θέσεις κοντά.</p>
        <div class="search-box-wrapper">
            <form method="post" action="map.php">
                <input type="text" id="search" placeholder="Αναζήτηση..." name="search" class="search-box-input"  value="<?=$search;?>">
                <button class="search-box-button" type="submit" name="submit" value="submit"><i class="fa fa-search"></i></button>
            </form>
        </div>
        <?php
        if(!empty($search))
        {
            $link=mysqli_connect('localhost',"root","eresos4ever","USER_MAP");
            $sql="SELECT * FROM PARKING WHERE ΟΔΟΣ LIKE '%$search%' OR ΠΕΡΙΟΧΗ LIKE '%$search%'";
            $result=mysqli_query($link,$sql);
            if(mysqli_num_rows($result)==0)
            {
                echo "<p><br> Δεν βρέθηκαν θέσεις πάρκινγκ. </p>";
            }
            for ($i=0; $i<mysqli_num_rows($result); $i++) {
                $row = mysqli_fetch_assoc($result);
                $show=$row["ΟΔΟΣ"] .' ' .$row["ΑΡΙΘΜΟΣ"] .' ' . $row["ΠΕΡΙΟΧΗ"];
                $site=$row["SITE"];
                $id=$row['ID'];
                if(isset($_SESSION['LOGGED IN']) && $_SESSION['LOGGED IN']=="user")
                {
                    $username=$_SESSION['username'];
                    $sql1="SELECT * FROM PARKING, FAVOURITES, USER WHERE USER.ID=USER_ID AND LOCATION_ID=PARKING.ID AND USERNAME='$username' AND LOCATION_ID=$id";
                    $result1=mysqli_query($link,$sql1);
                    if(mysqli_num_rows($result1)!=0)
                    {
                        echo "<p><br> <i style='color: red' class=\"fas fa-heart\"></i>  $show <a href='$site' target='_blank' title='Άνοιγμα στο GoogleMaps'> <i style='color: blue' class=\"fas fa-map-marker-alt\"></i></a> </p>";
                        continue;
                    }
                }
                echo "<p><br> $show <a href='$site' target='_blank' title='Άνοιγμα στο GoogleMaps'> <i style='color: blue' class=\"fas fa-map-marker-alt\"></i></a> </p>";
            }
        }
        ?>
    </div>

    <div>
        <br>
        <iframe class="map-frame" src="https://www.google.com/maps/d/embed?mid=1FJTcgJvioT3JF0h0GYj7WNzUtmOH-efl"></iframe>
        <small><p>* Όλες οι θέσεις πάρκινγκ που απεικονίζονται αντλήθηκαν από δεδομένα που προσφέρει ο Δήμος Θεσσαλονίκης</p></small>
    </div>
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
