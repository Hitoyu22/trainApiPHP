<?php

function createBook($bookEntity){
    

    require_once __DIR__ . "/../../config/db.php";
    require_once __DIR__ . "/../../librairies/response.php";

    $db = getDatabaseConnection();

    $req = $db->prepare('INSERT INTO books (title, author) VALUES (:title, :author)');
    $req->execute(array('title' => $bookEntity['title'], 'author' => $bookEntity['author']));

    $book = $req->fetch(PDO::FETCH_ASSOC);

    if($book){
        echo jsonResponse(201, 
                        ["SCHOOL" => "ESGI"], 
                        ["success" => true, "data" => $book]
                );
    } else { 
        echo jsonResponse(404, 
                        ["SCHOOL" => "ESGI"], 
                        ["success" => false, "message" => "Book not found"]
                );
    }


};