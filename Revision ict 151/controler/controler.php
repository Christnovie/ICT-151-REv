<?php
/**
 * Author   : nicolas.glassey@cpnv.ch
 * Project  : 151_2019_ForStudents
 * Created  : 05.02.2019 - 18:40
 *
 * Last update :    [01.12.2018 author]
 *                  [add $logName in function setFullPath]
 * Git source  :    [link]
 */

session_start();
/**
 *function for home
 */
function home(){
    require "view/home.php";
}

/**
 *function for login
 */
function login($loginregister){

require "model/userManagement.php";
    if (!isset($_SESSION['login']) || $_SESSION['login'] == "") {
        if(isset($loginregister['inputUsername'])) {
            if (checkin($loginregister)) {

                $_SESSION['login'] = $_SESSION['admin'];
                $_SESSION['userEmail'] = $_GET['userEmail'];
                $_GET['action'] = "resultLogin";
                require "view/home.php";
            } else
                require "View/login.php";
        }else
            require  "View/login.php";
    } else {
        require "view/home.php";
    }
}

/**
 *function for register
 */
function register($dataUser){
    require "model/userManagement.php";
    $erroreConfirme = "";
    $_GET['errorPassword'] = $erroreConfirme;
    if (isset($dataUser['createUser'])) {
        if ($dataUser['createpwd'] == $dataUser['confirmepwd']) {
            $_GET['action'] = "login";
            $_GET['errorConfirme'] = '';
            if (creatUser($dataUser)) {

                require "View/login.php";
            } else
                $_GET['errorConfirme'] = 'Username or email is already taken';
            require "View/register.php";
        } else
            $_GET['errorConfirme'] = 'password no match';
        require "View/register.php";

    } else {
        require "View/register.php";

    }
}
function logout(){
    session_unset();
    session_destroy();
    require "view/login.php";
}

/**
 *function for gestion
 */
function gestionnaire(){
    require_once "model/userManagement.php";
    $_GET['Clients'] = showUser();
    require_once "view/gestionUtilisateur.php";
}