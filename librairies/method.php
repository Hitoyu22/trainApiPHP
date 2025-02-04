<?php

function isMethod(string $method ) : bool 
{
    return $_SERVER["REQUEST_METHOD"] === $method;
}