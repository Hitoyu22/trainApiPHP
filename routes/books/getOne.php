<?php 


function getOneBook($id){
    require_once __DIR__ . "/../../config/db.php";
    require_once __DIR__ . "/../../librairies/response.php";

    $db = getDatabaseConnection();

    $req = $db->prepare('SELECT * FROM books WHERE id = :id');
    $req->execute(array('id' => $id));

    $book = $req->fetch(PDO::FETCH_ASSOC);

    if($book){
        echo jsonResponse(200, 
                        ["SCHOOL" => "ESGI"], 
                        ["success" => true, "data" => $book]
                );
    } else {
        echo jsonResponse(404, 
                        ["SCHOOL" => "ESGI"], 
                        ["success" => false, "message" => "Book not found"]
                );
    }
}