<?php

function deleteOneBook($id){
    require_once __DIR__ . "/../../config/db.php";
    require_once __DIR__ . "/../../librairies/response.php";

    $db = getDatabaseConnection();

    $req = $db->prepare('DELETE FROM books WHERE id = :id');
    $req->execute(array('id' => $id));

    $rowsAffected = $req->rowCount();

    if ($rowsAffected > 0) {
        echo jsonResponse(200, 
                        ["SCHOOL" => "ESGI"], 
                        ["success" => true, "message" => "Book deleted successfully"]
                );
    } else {
        echo jsonResponse(404, 
                        ["SCHOOL" => "ESGI"], 
                        ["success" => false, "message" => "Book not found"]
                );
    }
}
