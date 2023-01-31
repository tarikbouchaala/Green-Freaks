<?php
session_start();
if (isset($_SESSION['id_session'])) {
    header("Location:choix.php?id=" . $_SESSION['id_user']);
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
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;700&display=swap">
    <link rel="stylesheet" href="fontawesome-free-5.15.4-web/css/all.css">
    <link rel="stylesheet" href="css/mesgreensworks.css">
</head>

<body>
    <div class="landing-page">
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
        <div class="presentation-text">
            <div class="container">
                <form action="" method="POST">
                    <div class="connection">
                        <h1>Connection</h1>
                        <input type="text" placeholder="Login" name="logincon" id="logincon" value="<?php if (isset($_COOKIE['login'])) echo $_COOKIE['login'] ?>">
                        <input type="password" id="passcon" name="passcon" placeholder="Mot de passe" value="<?php if (isset($_COOKIE['password'])) echo $_COOKIE['password'] ?>">
                        <i class="fas fa-eye"></i>
                        <input type="submit" value="Connection" id="btncon" name="btncon">
                    </div>
                    <div class="inscription hiden">
                        <h1>Inscription</h1>
                        <input type="text" placeholder="Nom" id="nomins" name="nomins">
                        <input type="text" id="prenomins" name="prenomins" placeholder="Prenom">
                        <input type="email" id="emailins" name="emailins" placeholder="Email">
                        <input type="text" id="loginins" name="loginins" placeholder="Nom d'utilisateur">
                        <input type="password" id="passins" name="passins" placeholder="Mot de passe">
                        <input type="password" placeholder="Confirmer le mot de passe" id="passcins" name="passcins">
                        <input type="submit" id="btnins" name="btnins" value="Inscription">
                    </div>
                </form>
            </div>
            <div class="choice">
                <div class="connection">
                    <h1>Bienvenue</h1>
                    <p>Si vous n'avez pas un compte vous pouvez le créer</p>
                    <button id="inscriptionbtn">Inscription</button>
                </div>
                <div class="inscription hiden">
                    <h1>Bonjour,</h1>
                    <p>Si vous avez un compte vous pouvez se connecter</p>
                    <button id="connectionbtn">Connection</button>
                </div>
            </div>
        </div>
    </div>
    <script src="script/scriptlogin.js"></script>
    <?php
    include('bdconnect.php');
    if (isset($_POST["btncon"])) {
        extract($_POST);
        if ((isset($logincon) && !(empty($logincon))) && (isset($passcon) && !(empty($passcon)))) {
            if (preg_match("/^.{8,}$/i", $passcon) == 1) {
                try {
                    $req = "SELECT * FROM users";
                    $result = $db->prepare($req);
                    $result->execute();
                    $users = $result->fetchAll(PDO::FETCH_ASSOC);
                    $cpt = 0;
                    foreach ($users as $user) {
                        if ($user['login'] == $logincon && $user['password'] == $passcon) {
                            $cpt++;
                            $_SESSION['id_user'] = $user['id_User'];
                            $_SESSION['id_session'] = session_create_id();
                            setcookie("login", $logincon, time() + 3600);
                            setcookie("password", $passcon, time() + 3600);
                            header('Location:choix.php?id=' . $user['id_User']);
                        }
                    }
                    if ($cpt == 0) {
                        echo "
                        <script>
                            let alert = document.createElement('div')
                            alert.classList.add('alert')
                            let message = document.createElement('div')
                            let span=document.createElement('span')
                            span.innerHTML = `L'utilisateur n'existe pas`
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
                } catch (PDOException $err) {
                    echo $err->getMessage();
                }
            } else {
                echo "<script>let alert = document.createElement('div')
                alert.classList.add('alert')
                let message = document.createElement('div')
                let span=document.createElement('span')
                span.innerHTML = 'Le mot de passe doit être au moins 8 caracter'
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
                document.body.appendChild(alert)</script>";
            }
        } else {
            if ((!(isset($logincon)) || empty($logincon)) && (!(isset($passcon)) || empty($passcon))) {
                echo "<script>let alert = document.createElement('div')
                alert.classList.add('alert')
                let message = document.createElement('div')
                let span=document.createElement('span')
                span.innerHTML = 'Veuillez remplir les champs'
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
                document.body.appendChild(alert)</script>";
            } else {
                if (!(isset($logincon)) || empty($logincon)) {
                    echo "
                    <script>
                        let alert = document.createElement('div')
                        alert.classList.add('alert')
                        let message = document.createElement('div')
                        let span=document.createElement('span')
                        span.innerHTML = 'Veuillez remplir le champ de login'
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
                        span.innerHTML = 'Veuillez remplir le champ du mot de passe'
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
    }

    if (isset($_POST["btnins"])) {
        extract($_POST);
        if (isset($nomins) && !(empty($nomins)) && isset($prenomins) && !(empty($prenomins)) && isset($emailins) && !(empty($emailins)) && isset($passins) && !(empty($loginins)) && isset($loginins) && !(empty($passins)) && isset($passcins) && !(empty($passcins))) {
            if (preg_match("/^[A-Za-z]+$/", $nomins) == 1 && preg_match("/^[A-Za-z]+$/", $prenomins) == 1 && preg_match("/^\w+@[a-z]+\.[a-z]{2,3}$/", $emailins) == 1 && preg_match("/^.{8,}$/", $passins) == 1 && $passins == $passcins) {
                try {
                    $req = "INSERT INTO users(nom,prenom,email,login,password) Value(:nom,:prenom,:email,:login,:password)";
                    $result = $db->prepare($req);
                    $result->execute(array(
                        "nom" => $nomins,
                        "prenom" => $prenomins,
                        "email" => $emailins,
                        "login" => $loginins,
                        "password" => $passins
                    ));
                    $req = "SELECT * FROM users WHERE login=?";
                    $result = $db->prepare($req);
                    $result->execute([$loginins]);
                    $ligne = $result->fetch(PDO::FETCH_ASSOC);
                    if (mkdir(getcwd() . "\GreenWorks_Img" . "\user" . $ligne['id_User'])) {
                    }
                    echo "
                    <script>
                        let alert = document.createElement('div')
                        alert.classList.add('alert')
                        let message = document.createElement('div')
                        let span=document.createElement('span')
                        span.innerHTML = 'Inscription reussie'
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
                } catch (PDOException $err) {
                    if ($err->getCode() == 23000) {
                        echo "
                    <script>
                        let alert = document.createElement('div')
                        alert.classList.add('alert')
                        let message = document.createElement('div')
                        let span=document.createElement('span')
                        span.innerHTML = 'Utilisateur existe déja'
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
                        echo $err;
                    }
                }
            } else {
                if (preg_match("/^[A-Za-z]+$/", $nomins) == 0) {
                    echo "
                    <script>
                        let alert = document.createElement('div')
                        alert.classList.add('alert')
                        let message = document.createElement('div')
                        let span=document.createElement('span')
                        span.innerHTML = 'Nom invalid'
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
                } else if (preg_match("/^[A-Za-z]+$/", $prenomins) == 0) {
                    echo "
                    <script>
                        let alert = document.createElement('div')
                        alert.classList.add('alert')
                        let message = document.createElement('div')
                        let span=document.createElement('span')
                        span.innerHTML = 'Prenom invalid'
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
                } else if (preg_match("/\w+@[a-z]+\.[a-z]{2,3}/", $emailins) == 0) {
                    echo "
                    <script>
                        let alert = document.createElement('div')
                        alert.classList.add('alert')
                        let message = document.createElement('div')
                        let span=document.createElement('span')
                        span.innerHTML = `Email invalid
                        Exemple: tarik@gmail.com`
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
                } else if (preg_match("/^.{8,}$/", $passins) == 0) {
                    echo "
                    <script>
                        let alert = document.createElement('div')
                        alert.classList.add('alert')
                        let message = document.createElement('div')
                        let span=document.createElement('span')
                        span.innerHTML = `Le mot de passe doit être au moins 8 caracter`
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
                        span.innerHTML = 'Les mot de passe ne sont pas identiques'
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
        } else {
            if ((!(isset($nomins)) || empty($nomins)) && (!(isset($prenomins)) || empty($prenomins)) && (!(isset($emailins)) || empty($emailins)) && (!(isset($loginins)) || empty($loginins)) && (!(isset($passins)) || empty($passins)) && (!(isset($passcins)) || empty($passcins))) {
                echo "
                    <script>
                        let alert = document.createElement('div')
                        alert.classList.add('alert')
                        let message = document.createElement('div')
                        let span=document.createElement('span')
                        span.innerHTML = `Veuillez remplir les champs`
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
                if (!(isset($nomins)) || empty($nomins)) {
                    echo "
                <script>
                    let alert = document.createElement('div')
                    alert.classList.add('alert')
                    let message = document.createElement('div')
                    let span=document.createElement('span')
                    span.innerHTML = `Veuillez remplir le champ du nom`
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
                } else if (!(isset($prenomins)) || empty($prenomins)) {
                    echo "
                <script>
                    let alert = document.createElement('div')
                    alert.classList.add('alert')
                    let message = document.createElement('div')
                    let span=document.createElement('span')
                    span.innerHTML = `Veuillez remplir le champ du prenom`
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
                } else if (!(isset($emailins)) || empty($emailins)) {
                    echo "
                <script>
                    let alert = document.createElement('div')
                    alert.classList.add('alert')
                    let message = document.createElement('div')
                    let span=document.createElement('span')
                    span.innerHTML = `Veuillez remplir le champ d'email`
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
                } else if (!(isset($loginins)) || empty($loginins)) {
                    echo "
                <script>
                    let alert = document.createElement('div')
                    alert.classList.add('alert')
                    let message = document.createElement('div')
                    let span=document.createElement('span')
                    span.innerHTML = `Veuillez remplir le champ du nom d'utilisateur`
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
                } else if (!(isset($passins)) || empty($passins)) {
                    echo "
                <script>
                    let alert = document.createElement('div')
                    alert.classList.add('alert')
                    let message = document.createElement('div')
                    let span=document.createElement('span')
                    span.innerHTML = `Veuillez remplir le champ du mot de passe`
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
                    span.innerHTML = `Veuillez remplir le champ du confirmation de mot de passe`
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
    }
    ?>
</body>

</html>