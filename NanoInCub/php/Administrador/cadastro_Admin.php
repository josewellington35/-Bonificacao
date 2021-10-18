<?php

include '../db_connect.php';

$nome = $_POST['name'];
$login = $_POST['login'];
$senha = $_POST['senha'];


$hoje = date('Y/m/d ');


$sql =  "INSERT INTO `administrador`(`nome_completo`, `login`, `senha`, `data_criacao`, `data_alteracao`)
         VALUES ('$nome','$login','$senha','$hoje','$hoje')"; 

 if(mysqli_query($connect, $sql)):


?>
<script ">
alert("Cadastro Realizado com Sucesso !!!");
window.location.replace("https://localhost/NanoInCub/index.php?i=login");

</script>
       
<?php endif; ?>
