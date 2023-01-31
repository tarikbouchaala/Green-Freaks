<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Green Freaks</title>
    <link rel="icon" href="images/planet-earth.png">
    <link rel="stylesheet" href="css/listedegreenworks.css">
    <link rel="stylesheet" href="css/normalize.css">
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
    <div class="greens">
        <?php
        include('bdconnect.php');
        try {
            $req = "SELECT * FROM greenworks";
            $result = $db->prepare($req);
            $result->execute();
            $cards = $result->fetchAll(PDO::FETCH_ASSOC);
            if (count($cards) == 0) {
                echo "
                    <script>
                        let divcenter=document.createElement('div')
                        divcenter.classList.add('nogreens')
                        divcenter.innerHTML='No GreenWorks At the moment'
                        document.body.appendChild(divcenter)
                    </script>";
            } else {
                foreach ($cards as $card) {
                    $images = explode('|||', $card['image']);
                    $c = 0;
                    echo "
                    <script>
                        var card=document.createElement('div')
                        var greens=document.querySelector('.greens')
                        card.className='card'
                        var cardimg=document.createElement('img')
                        cardimg.alt=`" . $card['title'] . "`
                        cardimg.src=`" . "GreenWorks_Img/user" . $card['id_User_Green'] . "/" . $images[0] . "`
                        var title=document.createElement('span')
                        title.innerText='" . $card['title'] . "'
                        card.appendChild(cardimg)
                        card.appendChild(title)
                        greens.appendChild(card)
                        card.onclick=function(){
                            window.location.href=`details.php?idGreen=" . $card['idGreen'] . "`
                        }
                    </script>";
                }
            }
        } catch (PDOException $err) {
            echo "Error" . $err->getMessage();
        }

        ?>
        <script src="script/all.js"></script>
    </div>
</body>

</html>