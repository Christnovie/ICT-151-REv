<?php
/**
 * Revision ict 151 - userManagement.php
 *version : ${VERSION}
 *Initial version by: Christnovie.KIALA-BI
 *Initial version created on : 19.06.2020
 *Time : 08:44
 */
require "DBManagement.php";
/**
 * function for check login
 * @param $inputdata
 * @return bool
 */
function checkin($inputdata){

    $username = $inputdata['inputUsername'];
    $passwords = $inputdata['pwd'];
    $query = "SELECT  userPsw,pseudo  FROM users where  users.userEmailAddress = '$username' or users.pseudo = '$username'; ";
    $result = ExecuteQuery($query);
    foreach ($result as $item){
        $pwdResult = $item[0];
        $_SESSION['admin']= $item[1];
    }

    if(isset($pwdResult)){
        if(password_verify($passwords,$pwdResult)){

            return true;
        }else{
            return false;
        }

    }{
        return false;
    }
}

/**
 * function for create new user
 * @param $userData
 * @return bool
 */
function creatUser($userData)
{

    $pseudo = $userData['createUser'];
    $password = password_hash( $userData['createpwd'],PASSWORD_DEFAULT);
    $email = $userData['createEmail'];
    $query = "SELECT users.userEmailAddress,users.pseudo  FROM users where  users.userEmailAddress = '$email' or users.pseudo = '$pseudo'; ";
    $result = ExecuteQuery($query);
    foreach ($result as $item){
        $verif = $item;
    }
    if(!isset($verif)){
        $query = "INSERT INTO users ( userEmailAddress, userPsw, pseudo) VALUES( '$email', '$password', '$pseudo');";
        $result = ExecuteQuery($query);

        return true;
    }else {
        return false;
    }
}

function showUser(){
    $query = "select * from agencies.customers";
    $result = ExecuteQuery($query);
    return $result;
}