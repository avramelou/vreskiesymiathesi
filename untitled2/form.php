<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>ΒΡΕΣ ΚΙ ΕΣΥ ΜΙΑ ΘΕΣΗ </title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="manifest" href="site.webmanifest">
    <link rel="icon" href="amea.png"/>
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
    <a class="navbar-brand" href="index.html"><img src="media/logo.png" alt="logo icon" height="70px" width=125px" /></a>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav">
            <a class="nav-item nav-link" href="index.html">ΑΡΧΙΚΗ</a>
            <a class="nav-item nav-link" href="map.html">ΕΥΡΕΣΗ ΘΕΣΗΣ</a>
            <a class="nav-item nav-link" href="new.html">ΥΠΟΒΟΛΗ ΝΕΑΣ ΘΕΣΗΣ</a>
            <a class="nav-item nav-link active" href="form.html">ΕΠΙΚΟΙΝΩΝΙΑ</a>
            <a class="nav-item nav-link" href="help.html">ΣΥΧΝΕΣ ΕΡΩΤΗΣΕΙΣ</a>
        </div>
    </div>
    <a href="login.html"><button type="button" class="btn navbar-button"><i class="fas fa-user"></i> Σύνδεση</button></a>
</nav>



<form class="form-contact" method="post" action="form.php">
    <img class="message-image" src="media/message.png" alt="contact us">
    <h5>Επικοινωνήστε μαζί μας</h5><br>
    <div>
        <label for="inputName">Όνομα:</label><br>
        <input type="text" name="Name" id="inputName" required><a style="color: red"> *</a><br>
    </div>
    <div>
        <label for="inputLastname">Επώνυμο:</label><br>
        <input type="text" name="LastName" id="inputLastname" required><a style="color: red"> *</a><br>
    </div>
    <div>
        <label for="inputEmail"><i class="fas fa-at"></i> Email:</label><br>
        <input type="email" name="Email" id="inputEmail" required><a style="color: red"> *</a><br>
    </div>
    <div>
        <label for="inputTel"><i class="fas fa-phone-alt"></i> Τηλέφωνο:</label><br>
        <input type="tel" name="Tel" id="inputTel"><br><br>
    </div>
    <div>
        <label for="inputComments"><i class="far fa-comment-dots"></i> Σχόλια: <a style="color: red">*</a></label><br>
        <textarea class="comments-form" rows="5" cols="52" type="text" name="Comments" id="inputComments" placeholder="Γράψτε τα σχόλιά σας εδώ." maxlength="1500" required></textarea>
    </div>
    <div>
        <a style="color: red">*</a><a><small>Υποχρεωτικά πεδία</small></a><br><br>
    </div>
    <div>
        <button class="submit-form" type="submit" name="submit" value="submit">Υποβολή</button>
    </div>
</form>

<?php
$name="";
$lastName="";
$email="";
$tel="";
$comments="";
if (isset($_POST['submit'])) {
    $name=$_POST['Name'];
    $lastName=$_POST['LastName'];
    $email=$_POST['Email'];
    $tel=$_POST['Tel'];
    $comments=$_POST['Comments'];

    $link=mysqli_connect('localhost',"root","eresos4ever","CONTACTFORM");
    $sql="INSERT INTO form_contact (ID, Name, Lastname, Email, Telephone, Comments) VALUES (NULL, '".$name."', '".$lastName."', '".$email."', '".$tel."', '".$comments."')";
    if(mysqli_query($link,$sql)) echo "<p align='center' style='margin-top: 10px'><i class=\"far fa-check-circle\"></i> Ευχαριστούμε που επικοινωνήσατε μαζί μας.</p>";
    else echo "<p align='center' style='margin-top: 10px'><i class=\"fa fa-exclamation-triangle\" aria-hidden=\"true\"></i> Σφάλμα. Δοκιμάστε ξανά.</p>";

}
?>


<footer class="footer">
    <div class="fb-share-button" data-href="http://localhost:63342/vreskiesymiathsi/untitled2/index.html?_ijt=drbuie6ggtrueacrt4gcv9a29l" data-layout="button" data-size="small"><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=http%3A%2F%2Flocalhost%3A63342%2Fvreskiesymiathsi%2Funtitled2%2Findex.html%3F_ijt%3Ddrbuie6ggtrueacrt4gcv9a29l&amp;src=sdkpreparse" class="fb-xfbml-parse-ignore">Share</a></div>
    <a href="https://twitter.com/share?ref_src=twsrc%5Etfw" class="twitter-share-button" data-show-count="false">Tweet</a>
</footer>

<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v6.0"></script>
<script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>

</body>
</html>

