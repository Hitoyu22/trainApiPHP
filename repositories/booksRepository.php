<?php
$bookData = [[
        'id' => 3,
        'title' => 'one piece'
    ],
    [
        'id' => 6,
        'title' => 'dungeon meshi'
    ]];


function getAllBooksFromData() {
    global $bookData;
    return $bookData;
}

function getBookByIdFromData(int $id) {
    global $bookData;
    $books = $bookData;
    $ids = array_column($books, 'id');
    $found_key = array_search($id, $ids);
    return $books[$found_key];
}

function getBookByTitleFromData(string $title) {
    global $bookData;
    $books = $bookData;
    foreach ($books as $key => $book) {
        if($book["title"] == $title) {
            return $book;
        }
    }
    return NULL;
}

function saveBookToData($book){
    global $bookData;
    //$newId = getFirstUnusedId();
    $newId = 1;
    $bookData[] = ["id" => $newId, "title" => $book["title"]];
    return $bookData;
} 