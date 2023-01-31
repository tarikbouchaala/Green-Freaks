<?php
session_start();
if (!isset($_SESSION['id_session'])) {
    header('Location:mesgreenworks.php');
}
if ($_SESSION['id_user'] != $_GET['id']) {
    header('Location:mesgreenworks.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Green Freaks</title>
    <link rel="icon" href="images/planet-earth.png">
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/choix.css">
    <link rel="stylesheet" href="fontawesome-free-5.15.4-web/css/all.css">
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
    <div class="choix">
        <div class="choice">
            <i class="far fa-eye"></i>
            <span>Liste de mes GreenWorks</span>
        </div>
        <div class="choice">
            <i class="fas fa-sign-out-alt"></i>
            <span>Déconnexion</span>
        </div>
        <div class="choice">
            <i class="fas fa-plus"></i>
            <span>Ajouter un GreenWork</span>
        </div>
    </div>
    <?php
    if (isset($_GET['id']) && !(empty($_GET['id']))) {
        echo "<script>
        let choices = document.querySelectorAll('.choice')
        choices.forEach(choice => {
            choice.addEventListener('click', e => {
                if (choice.children[1].textContent == `Liste de mes GreenWorks` || choice.children[1].textContent == `List of my GreenWorks`) {
                    window.location.href = 'listgreen.php?id=" . $_GET['id'] . "'
                } else if(choice.children[1].textContent == `Ajouter un GreenWork` || choice.children[1].textContent == `Add a GreenWork`) {
                    window.location.href = 'addgreen.php?id=" . $_GET['id'] . "'
                }
                else
                {
                    window.location.href = 'deconnexion.php'
                    console.log('Hello')
                }
            })
        })
    </script>";
    }
    ?>
    <script src="script/all.js"></script>
</body>

</html>