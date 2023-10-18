<?php

$servidor = "localhost";
$usuario = "root";
$password = "";
$basededatos = "recerdo";

try {
   $bd = new PDO("mysql:host=$servidor;dbname=$basededatos", $usuario,$password);
} catch (Exception $error) {
    echo $error ->get_Messege();
}

?>