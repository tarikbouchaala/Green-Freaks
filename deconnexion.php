<?php
session_start();
try{
    session_unset();
    session_destroy();
    header("Location:mesgreenworks.php");
}
catch(Exception $ee ){
    die("Erreur de deconnxion : ".$ee->getMessage());
}
?>