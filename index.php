<?php

include 'controllers.php';

$url = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

$path = explode("index.php/", $url);


$path = $path[1];


if ($path == "" || $path == "registracija")
{
    Registracija();

}
elseif($path == "zaboravena")
{
    Zaboravena();

}
elseif($path == "najava")
{

    Najava();
}
elseif($path == "lista")
{
    Lista();

}
elseif($path == "najaven" && isset($_GET['username']))
{
    Najaven();

}
