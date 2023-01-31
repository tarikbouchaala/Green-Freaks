<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Green Freaks</title>
    <link rel="icon" href="images/planet-earth.png">
    <link rel="stylesheet" href="css/master.css">
    <link rel="stylesheet" href="css/normalize.css">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;700&display=swap">
</head>

<body>
    <div class="landing-page">
        <div class="overlay"></div>
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
        <div class="presentation-text">
            <span class="type-writer"></span>
        </div>
    </div>
    <div class="article">
        <div class="article-content">
            <p>
                Dans le monde, 2 milliards de tonnes de déchets sont produits chaque année et ce chiffre augmente sans
                cesse. Alors, il est urgent d’agir. Le recyclage est une des solutions. Le principe est d’utiliser un
                objet qui a été jeté, pour participer à la fabrication d’un nouveau produit.
            </p>
            <img src="images/recyclage.jpg" alt="Nature Image">
        </div>
        <div class="article-content">
            <p>
                Pourquoi recycler le plastique ? Parce les enjeux environnementaux liés au sont gigantesques. Offrant
                des débouchés durables dans de nombreux domaines, la valorisation de mes déchets plastiques offre des
                économies conséquentes en matière de ressources naturelles, d'énergie et de CO2.
            </p>
            <img src="images/recyclage plastique.jpg" alt="Recyclage">
        </div>
        <div class="article-content">
            <p>
                Les forêts jouent un rôle primordial dans la préservation des écosystèmes de la planète. Divers
                facteurs, dont les activités de l'Homme, contribuent cependant à la disparition de cet écosystème. Agir
                rapidement à travers des écogestes à adopter au quotidien est nécessaire afin de limiter la destruction
                des forêts.
            </p>
            <img src="images/foret recyclage.jpeg" alt="Forest Image">
        </div>
    </div>
    <div class="about-us">
        <h2 id="abtus">Qui Sommes-nous</h2>
        <div class="container">
            <p>
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Omnis dolorem libero, sed eveniet recusandae
                repellat, deserunt, velit assumenda at error architecto placeat excepturi! Doloremque earum doloribus
                cumque, minus sequi inventore consectetur incidunt, sunt enim mollitia sed sapiente, quos magni amet
                architecto tempore error maxime temporibus officiis facere ipsum? In dolor nostrum ut odit, dicta
                officia id
            </p>
            <div class="img"><img src=".//images/about us.jpg" alt="Team Image"></div>
        </div>
    </div>
    <div class="contact">
        <div class="overlay"></div>
        <div class="container">
            <h1 id="contact">Contactez-Nous</h1>
            <form id="myForm">
                <input type="te" id="email-contact" placeholder="Entrez votre email">
                <br>
                <input type="text" id="objet" placeholder="Objet">
                <br>
                <textarea id="text-contact" cols="30" rows="10" placeholder="Entrez votre message" maxlength="510"></textarea>
                <br>
                <input type="submit" id="contactBtn">
            </form>
        </div>
    </div>
    <script src="script/script.js"></script>
    <script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
</body>
</html>