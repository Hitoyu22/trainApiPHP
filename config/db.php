<?php 

function getDatabaseConnection(){
    try {
        $db = new PDO('mysql:host=localhost;dbname=apiPHP;charset=utf8', 'api', 'test');
        return $db;
    }
    catch(Exception $e)
    {
        die('Erreur de bdd:' . $e->getMessage());
    }
}
