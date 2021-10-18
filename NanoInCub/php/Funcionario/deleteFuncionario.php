<?php

session_start();

include '../db_connect.php';

    $idFun = $_GET['id'];

   $sqlFilho ="DELETE FROM  movimentacao  WHERE funcionario_id='$idFun'"; //Para deletar o funcionario tem que deletar das as sua dependencias
     $sql ="DELETE FROM  funcionario  WHERE id='$idFun'";
                                   
    if(mysqli_query($connect, $sqlFilho)):
    if(mysqli_query($connect, $sql)):


?>
<script ">
alert("Deletado  com Sucesso !!!");
window.location.replace("https://localhost/NanoInCub/index.php?i=funcionarios");

</script>
<?php endif;endif; ?>