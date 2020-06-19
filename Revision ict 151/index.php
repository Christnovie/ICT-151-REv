<?php
/**
 * Revision ict 151 - index.php
 *version : ${VERSION}
 *Initial version by: Christnovie.KIALA-BI
 *Initial version created on : 19.06.2020
 *Time : 08:20
 */
require "controler/controler.php";
if(isset($_GET['action'])){
    $action = $_GET['action'];
    switch($action){
        case 'home':
            home();
            break;
        case 'login':
            login($_POST);
            break;
        case 'register':
            register($_POST);
            break;
        case 'logout':
            logout();
            break;
        case 'userSetting':
            gestionnaire();
            break;
        case 'test':
            break;
    }
}else{
    home();
}