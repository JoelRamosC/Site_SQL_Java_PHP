<?php 

$host    = "localhost";
$usuario = "root";
$senha   = "";
$banco   = "wise_machines";


$ligar=mysqli_connect($host, $usuario,$senha,$banco);

$ligar -> set_charset("utf8") ;

if ($ligar -> connect_error){
    echo "Erro de conexão";
}

?>