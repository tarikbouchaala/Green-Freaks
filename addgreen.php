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
    <link rel="stylesheet" href="css/addgreen.css">
    <link rel="icon" href="images/planet-earth.png">
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
    <div class="container">
        <form action="" method="POST" enctype="multipart/form-data">
            <input type="text" name="title" id="title" placeholder="Titre du GreenWork" value="<?php if ($_SERVER['REQUEST_METHOD'] == 'POST') echo $_POST['title'] ?>">
            <textarea name="ingred" id="ingred" maxlength="250" placeholder="Ingrédients"><?php if ($_SERVER['REQUEST_METHOD'] == 'POST') echo $_POST['ingred'] ?></textarea>
            <textarea name="etapes" id="etapes" maxlength="1000" placeholder="Etapes et démarches de réalisation"><?php if ($_SERVER['REQUEST_METHOD'] == 'POST') echo $_POST['etapes'] ?></textarea>
            <input type="file" name="imgs[]" id="imgs" multiple="multiple">
            <input type="submit" name="btn" value="Ajouter">
        </form>
    </div>
    <div class="aler">
        <?php
        include('bdconnect.php');
        extract($_POST);
        if (isset($btn) && !(empty($btn))) {
            if (isset($title) && !(empty($title)) && isset($ingred) && !(empty($ingred)) && isset($etapes) && !(empty($etapes))) {
                $imgs = $_FILES['imgs'];
                $imgsnames = $imgs['name'];
                $imgstype = $imgs['type'];
                $imgstpm_name = $imgs['tmp_name'];
                $imgserror = $imgs['error'];
                $imgssize = $imgs['size'];
                $imagesext = array('jpeg', 'jpg', 'gif', 'png', 'ico', 'jfif');
                $err = array();
                $cpt = 0;
                $cptnoimg = 0;
                $cptt = 0;
                foreach ($imgsnames as $name) {
                    $actualext = explode('.', $name);
                    if (!in_array(strtolower(end($actualext)), $imagesext)) {
                        $cpt++;
                        break;
                    }
                }
                foreach ($imgserror as $error) {
                    if ($error == 4) {
                        $cptnoimg++;
                    } elseif ($error > 0) {
                        $cptt++;
                        break;
                    }
                }
                $resultat = $db->prepare("SELECT * FROM greenworks");
                $resultat->execute();
                $lignes = $resultat->fetchAll(PDO::FETCH_ASSOC);
                if (count($imgs['name']) > 6) {
                    echo "<script>
                            let alert = document.createElement('div')
                            alert.classList.add('alert')
                            let message = document.createElement('div')
                            let span=document.createElement('span')
                            span.innerHTML = `Le maximum de fichier que vous pouvez selectionner est 6`
                            message.classList.add('message')
                            let leave = document.createElement('div')
                            leave.innerHTML = 'X'
                            leave.classList.add('leave')
                            leave.addEventListener('click', e => {
                            e.target.parentElement.parentElement.remove()
                            })
                            message.appendChild(span)
                            message.appendChild(leave)
                            alert.appendChild(message)
                            document.body.appendChild(alert)
                        </script>";
                } elseif ($cptnoimg == count($imgs['name'])) {
                    echo "<script>
                            let alert = document.createElement('div')
                            alert.classList.add('alert')
                            let message = document.createElement('div')
                            let span=document.createElement('span')
                            span.innerHTML = `Aucun Image na été selectionner`
                            message.classList.add('message')
                            let leave = document.createElement('div')
                            leave.innerHTML = 'X'
                            leave.classList.add('leave')
                            leave.addEventListener('click', e => {
                            e.target.parentElement.parentElement.remove()
                            })
                            message.appendChild(span)
                            message.appendChild(leave)
                            alert.appendChild(message)
                            document.body.appendChild(alert)
                        </script>";
                } elseif ($cptt > 0) {
                    echo "<script>
                            let alert = document.createElement('div')
                            alert.classList.add('alert')
                            let message = document.createElement('div')
                            let span=document.createElement('span')
                            span.innerHTML = `Un image ou plusieur ont échoué`
                            message.classList.add('message')
                            let leave = document.createElement('div')
                            leave.innerHTML = 'X'
                            leave.classList.add('leave')
                            leave.addEventListener('click', e => {
                            e.target.parentElement.parentElement.remove()
                            })
                            message.appendChild(span)
                            message.appendChild(leave)
                            alert.appendChild(message)
                            document.body.appendChild(alert)
                        </script>";
                } elseif ($cpt > 0) {
                    echo "<script>
                            let alert = document.createElement('div')
                            alert.classList.add('alert')
                            let message = document.createElement('div')
                            let span=document.createElement('span')
                            span.innerHTML = `Un fichier selectionner n'est pas une image`
                            message.classList.add('message')
                            let leave = document.createElement('div')
                            leave.innerHTML = 'X'
                            leave.classList.add('leave')
                            leave.addEventListener('click', e => {
                            e.target.parentElement.parentElement.remove()
                            })
                            message.appendChild(span)
                            message.appendChild(leave)
                            alert.appendChild(message)
                            document.body.appendChild(alert)
                        </script>";
                } else {
                    $imagepath = array();
                    for ($i = 0; $i < count($imgsnames); $i++) {
                        $actualext = explode('.', $imgsnames[$i]);
                        $newimgname = rand(0, 1000000000) . "." . end($actualext);
                        move_uploaded_file($imgstpm_name[$i], $_SERVER['DOCUMENT_ROOT'] . "\CC2_php\GreenWorks_Img\user" . $_GET['id'] . '\\' . $newimgname);
                        $imagepath[] = $newimgname;
                    }
                    try {
                        $req = $db->prepare("INSERT INTO greenworks(id_User_Green,title,ingredients,etapes,image) VALUES(:id,:title,:ingredients,:etapes,:img)");
                        $req->execute(
                            array(
                                "id" => $_GET['id'],
                                "title" => $title,
                                "ingredients" => $ingred,
                                "etapes" => $etapes,
                                "img" => implode("|||", $imagepath)
                            )
                        );
                        header("Location:listgreen.php?id=" . $_GET['id']);
                    } catch (PDOException $errrr) {
                        echo "Insertion des donnes a échoué" . $errrr->getCode();
                    }
                }
            } else {
                if (!(isset($title)) || empty($title)) {
                    echo "
            <script>
                let alert = document.createElement('div')
                alert.classList.add('alert')
                let message = document.createElement('div')
                let span=document.createElement('span')
                span.innerHTML = `Entrer le titre du GreenWork`
                message.classList.add('message')
                let leave = document.createElement('div')
                leave.innerHTML = 'X'
                leave.classList.add('leave')
                leave.addEventListener('click', e => {
                e.target.parentElement.parentElement.remove()
                })
                message.appendChild(span)
                message.appendChild(leave)
                alert.appendChild(message)
                document.body.appendChild(alert)
            </script>";
                } elseif (!(isset($ingred)) || empty($ingred)) {
                    echo "
            <script>
                let alert = document.createElement('div')
                alert.classList.add('alert')
                let message = document.createElement('div')
                let span=document.createElement('span')
                span.innerHTML = `Entrer les ingrédients du GreenWork`
                message.classList.add('message')
                let leave = document.createElement('div')
                leave.innerHTML = 'X'
                leave.classList.add('leave')
                leave.addEventListener('click', e => {
                e.target.parentElement.parentElement.remove()
                })
                message.appendChild(span)
                message.appendChild(leave)
                alert.appendChild(message)
                document.body.appendChild(alert)
            </script>";
                } else {
                    echo "
            <script>
                let alert = document.createElement('div')
                alert.classList.add('alert')
                let message = document.createElement('div')
                let span=document.createElement('span')
                span.innerHTML = `Entrer les étapes de realisation du GreenWork`
                message.classList.add('message')
                let leave = document.createElement('div')
                leave.innerHTML = 'X'
                leave.classList.add('leave')
                leave.addEventListener('click', e => {
                e.target.parentElement.parentElement.remove()
                })
                message.appendChild(span)
                message.appendChild(leave)
                alert.appendChild(message)
                document.body.appendChild(alert)
            </script>";
                }
            }
        }
        ?>
    </div>
    <script src="script/all.js"></script>
</body>
</html>