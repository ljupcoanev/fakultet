<?php

include 'model.php';

function Registracija()
{
    Kreiranje();
    include 'views/registracija.php';
}

function Najava()
{

    Najavaa();
//    echo json_encode($posts);
    include 'views/najava.php';
}
function Zaboravena()
{
   Zaboravenaa();

//    echo json_encode($posts);
    include 'views/zaboravena.php';
}

function Lista()
{
    Listaa();

    include 'views/lista.php';
}
function Najaven()
{
    Najavenn();

    include 'views/najaven.php';
}