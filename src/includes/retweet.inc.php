<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    include '../../config/dbh.classes.php';
    include "../models/account.classes.php";
    include "../controllers/account.contr.classes.php";

    $account = new AccountController($_SESSION["id"], $_SESSION["mail"]);

    if ($account->checkIfRetweet($_GET["id_post"], $_SESSION['at_user_name'])) {
        
      $account->DelRetweetPost($_GET["id_post"]);
    } else {
        
      $account->retweetPost($_GET["id_post"]);
    }

    
}
?>
