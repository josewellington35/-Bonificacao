<?php

session_start();

include '../db_connect.php';

$id    = $_SESSION['id'] ;
$administrador_id   = $_SESSION['administrador_id'] ;
$data_criacao    = $_SESSION['data_criacao'] ;
$nome  = $_POST['name'];
$login = $_POST['login'];
$senha = $_POST['senha'];
$saldo = $_POST['saldo'];
$administrador_id  = $_SESSION['administrador_id'];// essa super global vem do verificadorLogin
$hoje = date('Y/m/d ');


$sql = "UPDATE funcionario SET nome_completo='$nome',login='$login',senha='$senha',saldo_atual='$saldo',administrador_id='$administrador_id',data_criacao='$data_criacao ',data_alteracao='$hoje' WHERE id = '$id'";

if(mysqli_query($connect, $sql)):


?>
<script ">
alert("Alterado  com Sucesso !!!");
window.location.replace("https://localhost/NanoInCub/index.php?i=funcionarios");

</script>
<?php endif; ?>