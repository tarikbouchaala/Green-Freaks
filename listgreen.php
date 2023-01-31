<?php
session_start();
if (!isset($_SESSION['id_session'])) {
    header("Location:mesgreenworks.php");
} else {
    if ($_SESSION['id_user'] != $_GET['id']) {
        header('Location:mesgreenworks.php');
    }
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
    <link rel="stylesheet" href="css/listgreen.css">
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
    <?php
    if (isset($_GET['id']) && !(empty($_GET))) {
        try {
            include('bdconnect.php');
            $result = $db->prepare("SELECT * FROM greenworks WHERE id_user_green =" . $_GET['id']);
            $result->execute();
            $lignes = $result->fetchAll(PDO::FETCH_ASSOC);
            if (count($lignes) == 0) {
                echo "
                    <script>
                        var divcenter=document.createElement('div')
                        divcenter.style.cssText=`position: absolute;
                        top: 50%;
                        left: 50%;
                        z-index: 1;
                        width: 100%;
                        transform: translate(-50%, -50%);
                        color: white;
                        font-size: 40px;
                        text-align: center;`
                        divcenter.innerHTML='No GreenWorks At the moment'
                        document.body.appendChild(divcenter)
                    </script>";
            } else {
                echo "<script>
                    var div=document.createElement('div')
                    div.className='content'
                    document.body.appendChild(div)
                    </script>";
                $table = "<table><tr><td>ID Green</td><td>Titre du GreenWork</td><td>Date de Création</td><td>Actions</td></tr>";
                foreach ($lignes as $user) {
                    $table .= "<tr><td>" . $user['idGreen'] . "</td><td>" . $user['title'] . "</td><td>" . $user['date_creation'] . "</td><td><a href='modifier.php?id=" . $_GET['id'] . "&idGreen=" . $user['idGreen'] . "'><i class='far fa-edit'></i></a><a onClick=\"return confirm('Voulez vous vraiment supprimer cette GreenWork?')\" href='supprimer.php?id=" . $_GET['id'] . "&idGreen=" . $user['idGreen'] . "'><i class='far fa-trash-alt'></i></a></td></tr>";
                }
                $table .= "</table>";
                echo "<script>
                var content=document.querySelector('.content')
                content.innerHTML=`$table`
                </script>";
            }
        } catch (PDOException $err) {
            echo "Error" . $err->getMessage();
        }
    }
    ?>
    <script src="script/all.js"></script>
</body>

</html>