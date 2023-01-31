<?php
if (!isset($_GET['idGreen']) || empty($_GET['idGreen'])) {
    header('Location:listedegreenworks.php');
}
include('bdconnect.php');
$req = $db->prepare("SELECT * FROM greenworks WHERE idGreen=?");
$req->execute([$_GET['idGreen']]);
$ligne = $req->rowCount();
if ($ligne == 0) {
    header('Location:listedegreenworks.php');
}

$req = $db->prepare("SELECT * FROM greenworks WHERE idGreen=?");
$req->execute([$_GET['idGreen']]);
$ligne = $req->fetch(PDO::FETCH_ASSOC);
$images = explode("|||", $ligne['image']);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Green Freaks</title>
    <link rel="stylesheet" href="css/details.css">
</head>

<body>
    <div class="header">
        <div class="overlay"></div>
        <div class="logo"><a href="acceuil.php">Green Freaks</a></div>
        <span class="translate">
            <div class="translate" id="google_translate_element"></div>
            <script type="text/javascript">
                function googleTranslateElementInit() {
                    new google.translate.TranslateElement({
                        pageLanguage: 'fr'
                    }, 'google_translate_element');
                }
            </script>
            <script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
        </span>
        <ul class="nav-bar">
            <li><a href="listedegreenworks.php">GreenWorks</a></li>
            <li><a href="mesgreenworks.php">Mes GreenWorks</a></li>
            <li><a href="acceuil.php#abtus">Qui Sommes-nous</a></li>
            <li><a href="acceuil.php#contact">Contact</a></li>
        </ul>
        <div class="hamburger">
            <span class="bar"></span>
            <span class="bar"></span>
            <span class="bar"></span>
        </div>
    </div>
    <div class="container">
        <?php
        foreach ($images as $img) {
            echo "<div class='img'><img src='GreenWorks_img/user" . $ligne['id_User_Green'] . "/" . $img . "' alt='" . $ligne['title'] . "'></div>";
        }
        ?>
    </div>
    <div class="description">
        <div class="info">
            <h1>Les ingrédients </h1>
            <?php
            echo "<p>" . $ligne["ingredients"] . "</p>"
            ?>
        </div>
        <div class="info">
            <h1>Les étapes</h1>
            <?php
            echo "<p>" . $ligne["etapes"] . "</p>"
            ?>
        </div>
    </div>
    <script src="script/all.js"></script>
</body>

</html>