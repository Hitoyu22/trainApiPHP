<?php

//$entityBody = file_get_contents('php://input');


require_once __DIR__  . "/librairies/method.php";
require_once __DIR__  . "/librairies/path.php";
require_once __DIR__  . "/librairies/response.php";

require_once __DIR__ . "/routes/books/getAll.php";
require_once __DIR__ . "/routes/books/getOne.php";
require_once __DIR__ . "/routes/books/create.php";
require_once __DIR__ . "/routes/books/deleteOne.php";

require_once __DIR__ . "/repositories/booksRepository.php";


require_once __DIR__ . "/config/db.php";




if(isPath("books")) {
    if(isMethod("GET")) {
        getAllBooks();
        die();
    } 
    if(isMethod("POST")) {
        $entityBody = json_decode(file_get_contents('php://input'), true);
        createBook($entityBody);
        die();
    }  
} 

if(isPath("books/:id")) {
    if(isMethod("GET")) {

        //getOneBook

        // Récupérer l'id qui est en mode /books/:id
        $id = explode("/", $_SERVER['REQUEST_URI'])[2];

        getOneBook($id);


        die();
    } 
    die();
    if(isMethod("DELETE")) {
        //deleteOneBook
        $id = explode("/", $_SERVER['REQUEST_URI'])[2];
        deleteOneBook($id);
        die();
    }
    
}
if (isPath("books/:id/author")) {
    if(isMethod("GET")) {
        echo "ici les infos d'un auteur du livre donné";
        die();
    } 
    echo "methode non gérée sur un auteur";
    die();
    
}
echo "chemin inconnu";

