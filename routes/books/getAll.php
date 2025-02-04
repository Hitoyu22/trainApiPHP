<?php


function getAllBooks(){


        require_once __DIR__ . "/../../config/db.php";
        require_once __DIR__ . "/../../librairies/response.php";

        $db = getDatabaseConnection();

        $req = $db->query('SELECT * FROM books');

        $books = $req->fetchAll(PDO::FETCH_ASSOC);

        echo jsonResponse(200, 
                        ["SCHOOL" => "ESGI"], 
                        ["success" => true, "data" => $books]
                );

}