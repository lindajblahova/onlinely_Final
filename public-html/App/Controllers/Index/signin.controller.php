<?php
session_start();
require('../../system.controller.php');

$user_email = $_POST["formSignInEmail"];
$user_email_pattern = "~^[\w]{1,}[\w.+-]{0,}@[\w-]{2,}([.][a-zA-Z]{2,}|[.][\w-]{2,}[.][a-zA-Z]{2,})$~";

$user_password = $_POST["formSignInPassword"];
$user_password_pattern = "~(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@*$#]).{8,16}~";

$email_validation = preg_match($user_email_pattern, $user_email);
$password_validation = preg_match($user_password_pattern, $user_password);


if ($email_validation && $password_validation) { //query the database only if email and password are regex pattern compliant

    $db_data = array($user_email);
    //fetching the row by email, fetch returns the first (and only) result entry
    $dbUserRow = phpFetchDB('SELECT * FROM users WHERE user_email = ?', $db_data);
    $db_data = "";

    if (!is_array($dbUserRow)) { //even regex compliant attempt can result in nonexistent record
        //echo "regex ok -> user does not exist -> wrong email or password -> feedback message";
        $_SESSION["msgid"] = "";
        header('Location: ../../Views/Index/index.view.php');

    } else if (!password_verify($user_password, $dbUserRow["user_password"])) { //user OK, password WRONG

       // echo "user ok, password wrong -> wrong email or password -> feedback message";
        $_SESSION["msgid"] = "";
        header('Location: ../../Views/Index/index.view.php');

    } else if (password_verify($user_password, $dbUserRow["user_password"]) ) { //user OK, password OK, activated

        //echo "user ok, password ok -> allow user in the system -> feedback message";
        $_SESSION["uid"] = $dbUserRow["user_id"];
        header('Location: ../../Views/Gate/gate.view.php?module=home');
    }


} else { //not regex pattern compliant -> cannot be in the database, don't query the database, return feedback

    //echo "not regex compliant -> wrong email or password -> feedback message";
    //$_SESSION["msgid"] = "";
    //header('Location: index.view.php');
}

?>