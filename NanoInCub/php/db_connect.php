<?php



header("Access-Control-Allow-Origin: *"); // erro de cors
$servername = "localhost";
$username ="root";
$passaword = "";
$db_name ="nanoincub";


$connect = mysqli_connect($servername,$username,$passaword,$db_name);
mysqli_set_charset($connect, "utf8");
if (mysqli_connect_error()):
	echo "Erro na conexao".mysqli_connect_error();

endif;