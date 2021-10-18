<?php

session_start();

include '../db_connect.php';

$nome  = $_POST['name'];
$login = $_POST['login'];
$senha = $_POST['senha'];
$saldo = $_POST['saldo'];
$administrador_id  = $_SESSION['administrador_id'];// essa super global vem do verificadorLogin
$hoje = date('Y/m/d ');


$sql = "INSERT INTO `funcionario`( `nome_completo`, `login`, `senha`, `saldo_atual`, `administrador_id`, `data_criacao`, `data_alteracao`) 
            VALUES ('$nome','$login','$senha','$saldo','$administrador_id','$hoje','$hoje')"; 

if(mysqli_query($connect, $sql)):


?>
<script ">
alert("Cadastro Realizado com Sucesso !!!");
window.location.replace("https://localhost/NanoInCub/index.php?i=funcionarios");

</script>
<?php endif; ?>