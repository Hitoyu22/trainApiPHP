<?php

function isId(string $e) : bool 
{
    return is_numeric($e);
}

// path  /books/22/author
// route /books/:id/author
function isPath(string $route) : bool
{
    $path = $_SERVER["REQUEST_URI"];
    $separatorPattern = "#/#";

    // découpage 
    $routeArray = preg_split($separatorPattern, trim($route, "/"));
    $pathArray = preg_split($separatorPattern, trim($path, "/"));
    // ou explode
    
    // compare si autant d'elements dans l'uri
    if (count($routeArray) !== count($pathArray)){
        return false;
    }

    // on parcourt chaque élément
    foreach($routeArray as $key => $routePart) {
        // à clé équivalente
        $pathPart = $pathArray[$key];

        // si c'est un wildcard dans route, 
        // on passe si c'est bien un id
        if(str_starts_with($routePart, ":")){
            if (isId($pathPart)){
                continue;
            } else {
                return false;
            }
        }
        // on compare chaque morceau
        if ($routePart !== $pathPart) {
            return false;
        }
    }
    return true;
}