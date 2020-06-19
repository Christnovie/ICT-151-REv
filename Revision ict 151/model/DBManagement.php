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
/**
 * @param $query
 * @return array
 */

function ExecuteQuery($query)
{

    $dbConnector = mysqlConnection();

    $statment = $dbConnector->prepare($query);//prepare query
    $statment->execute();//execute query
    $queryResult = $statment->fetchAll();//prepare result for client



    $dbConnector = null;//close database connexion
    return $queryResult;
}

/**
 * @return PDO|null
 */
function mysqlConnection()
{
    $tempDbConnexion = null;
    $sqlDriver = 'mysql';
    $hostname = '127.0.0.1';
    $port = 50000;
    $charset = 'utf8';
    $dbName = 'agencies';
    $userName = 'root';
    $userPwd = '2001Chris';
    $dsn = $sqlDriver . ':host=' . $hostname . ';dbname=' . $dbName . ';port=' . $port . ';charset=' . $charset;

    try{
        $tempDbConnexion = new PDO($dsn, $userName, $userPwd);
    }
    catch (PDOException $exception) {
        echo 'Connection failed: ' . $exception->getMessage();
    }
    return $tempDbConnexion;

}