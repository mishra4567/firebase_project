<?php

use Firebase\Auth\Token\Exception\InvalidToken;

session_start();
include("./dbcon.php");
if (isset($_POST['login_now_btn'])) {
    $email = $_POST['email'];
    $clearTextPassword = $_POST['password'];
    try {
        $user = $auth->getUserByEmail("$email");
        $signInResult = $auth->signInWithEmailAndPassword($email, $clearTextPassword);
        $idTokenString = $signInResult->idToken();
        try {
            $verifiedIdToken = $auth->verifyIdToken($idTokenString);
        } catch (InvalidToken $e) {
            echo 'The token is invalid' . $e->getMessage();
        } catch (\InvalidArgumentException $e) {
            echo 'The token Could not be parsen:' . $e->getMessage();
        }
    } catch (\Kreait\Firebase\Exception\Auth\UserNotFound $e) {
        $_SESSION['status'] = "No Email Found";
        header("location:login.php");
        exit();
    }
};
