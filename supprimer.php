<?php
session_start();
if (!isset($_SESSION['id_session'])) {
    header("Location:mesgreenworks.php");
} else {
    if ($_SESSION['id_user'] != $_GET['id']) {
        header('Location:mesgreenworks.php');
    }
}
if(isset($_GET['id']) && !(empty($_GET['id'])) && isset($_GET['idGreen']) && !(empty($_GET['idGreen']))){
    include('bdconnect.php');
    $result=$db->prepare("DELETE FROM greenworks WHERE id_User_Green=".$_GET['id']." AND idGreen='".$_GET['idGreen']."'");
    $result->execute();
    header("Location:listgreen.php?id=".$_GET['id']);
}
?>