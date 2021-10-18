<?php

session_start();

include '../db_connect.php';


$pesquisarNome = $_POST['pesquisar'];
$pesquisarData = $_POST['date'];
$pesqiusarTipo = $_POST['tipoMovimentacao'];

$inicio =  $_SESSION['inicioMovimentacao'];
$qnt_result_pg = $_SESSION['qnt_result_pgMovimentacao'];

  // tipos de pesquisas

if (empty($pesquisarNome)and(empty($pesquisarData)and($pesqiusarTipo == 'todos'))) {  //Aqui a pesquisa e geral

   $_SESSION['sqlPesquisaMovimentacao'] =   "SELECT * FROM funcionario funcionario INNER JOIN movimentacao movimentacao
   ON funcionario.id = movimentacao.funcionario_id ORDER BY movimentacao.id DESC LIMIT $inicio, $qnt_result_pg";
}



//tipos de pesquisa por data

if (empty($pesquisarNome)and($pesqiusarTipo == 'saida')and !empty($pesquisarData)) { 

   $_SESSION['sqlPesquisaMovimentacao'] =   "SELECT * FROM funcionario funcionario INNER JOIN movimentacao movimentacao
   ON funcionario.id = movimentacao.funcionario_id WHERE movimentacao.tipo_movimentacao = 'saida' and movimentacao.data_criacao = '$pesquisarData' ORDER BY movimentacao.id DESC LIMIT $inicio, $qnt_result_pg";
}

if (empty($pesquisarNome)and($pesqiusarTipo == 'entrada') and !empty($pesquisarData)) {  

   $_SESSION['sqlPesquisaMovimentacao'] =   "SELECT * FROM funcionario funcionario INNER JOIN movimentacao movimentacao
   ON funcionario.id = movimentacao.funcionario_id WHERE movimentacao.tipo_movimentacao = 'entrada' and movimentacao.data_criacao = '$pesquisarData' ORDER BY movimentacao.id DESC LIMIT $inicio, $qnt_result_pg";
}
if (!empty($pesquisarData)and($pesqiusarTipo == 'todos')and empty($pesquisarNome)) {  

   $_SESSION['sqlPesquisaMovimentacao'] =   "SELECT * FROM funcionario funcionario INNER JOIN movimentacao movimentacao
   ON funcionario.id = movimentacao.funcionario_id WHERE  movimentacao.data_criacao = '$pesquisarData' ORDER BY movimentacao.id DESC LIMIT $inicio, $qnt_result_pg"; 
}


//----------------------------------








                                // Tipos  de pesquisa por nome:
if (empty($pesquisarData)and($pesqiusarTipo == 'saida')and !empty($pesquisarNome)) {  

   $_SESSION['sqlPesquisaMovimentacao'] =   "SELECT * FROM funcionario funcionario INNER JOIN movimentacao movimentacao
   ON funcionario.id = movimentacao.funcionario_id WHERE movimentacao.tipo_movimentacao = 'saida' and funcionario.nome_completo LIKE '$pesquisarNome%' ORDER BY movimentacao.id DESC LIMIT $inicio, $qnt_result_pg";
}
if (empty($pesquisarData)and($pesqiusarTipo == 'todos')and !empty($pesquisarNome)) {  

   $_SESSION['sqlPesquisaMovimentacao'] =   "SELECT * FROM funcionario funcionario INNER JOIN movimentacao movimentacao
   ON funcionario.id = movimentacao.funcionario_id WHERE  funcionario.nome_completo LIKE '$pesquisarNome%' ORDER BY movimentacao.id DESC LIMIT $inicio, $qnt_result_pg";  
}

if (empty($pesquisarData)and($pesqiusarTipo == 'entrada')and !empty($pesquisarNome)) { 

   $_SESSION['sqlPesquisaMovimentacao'] =   "SELECT * FROM funcionario funcionario INNER JOIN movimentacao movimentacao
   ON funcionario.id = movimentacao.funcionario_id WHERE movimentacao.tipo_movimentacao = 'entrada' and funcionario.nome_completo LIKE '$pesquisarNome%' ORDER BY movimentacao.id DESC LIMIT $inicio, $qnt_result_pg"; 
}

//---------------------------------------------------------------
// tipos de pesquisa por tipos de movimentacao
if (empty($pesquisarNome)and(empty($pesquisarData)and($pesqiusarTipo == 'entrada'))) {  

   $_SESSION['sqlPesquisaMovimentacao'] =   "SELECT * FROM funcionario funcionario INNER JOIN
    movimentacao movimentacao ON funcionario.id = movimentacao.funcionario_id WHERE movimentacao.tipo_movimentacao = 'entrada' ORDER BY movimentacao.id DESC LIMIT $inicio, $qnt_result_pg";
}


if (empty($pesquisarNome)and(empty($pesquisarData)and($pesqiusarTipo == 'saida'))) {  

   $_SESSION['sqlPesquisaMovimentacao'] =   "SELECT * FROM funcionario funcionario INNER JOIN
    movimentacao movimentacao ON funcionario.id = movimentacao.funcionario_id WHERE movimentacao.tipo_movimentacao = 'saida' ORDER BY movimentacao.id DESC LIMIT $inicio, $qnt_result_pg";
}


//--------------------------------------------




//tipos de pesquisa por ambos parametros

if (!empty($pesquisarNome)and(!empty($pesquisarData)and($pesqiusarTipo == 'entrada'))) {   

   $_SESSION['sqlPesquisaMovimentacao'] =   "SELECT * FROM funcionario funcionario INNER JOIN
    movimentacao movimentacao ON funcionario.id = movimentacao.funcionario_id WHERE
     movimentacao.tipo_movimentacao = 'entrada' and movimentacao.data_criacao = '$pesquisarData' and 
     funcionario.nome_completo LIKE '$pesquisarNome%' ORDER BY movimentacao.id DESC LIMIT $inicio, $qnt_result_pg";
 }
 if (!empty($pesquisarNome)and(!empty($pesquisarData)and($pesqiusarTipo == 'saida'))) {  

   $_SESSION['sqlPesquisaMovimentacao'] =   "SELECT * FROM funcionario funcionario INNER JOIN
    movimentacao movimentacao ON funcionario.id = movimentacao.funcionario_id WHERE
     movimentacao.tipo_movimentacao = 'saida' and movimentacao.data_criacao = '$pesquisarData' and 
     funcionario.nome_completo LIKE '$pesquisarNome%' ORDER BY movimentacao.id DESC LIMIT $inicio, $qnt_result_pg";
 }
 if (!empty($pesquisarNome)and(!empty($pesquisarData)and($pesqiusarTipo == 'todos'))) {   //aqui faz a pesquisa com todos os parametros

   $_SESSION['sqlPesquisaMovimentacao'] =   "SELECT * FROM funcionario funcionario INNER JOIN
    movimentacao movimentacao ON funcionario.id = movimentacao.funcionario_id WHERE
     movimentacao.tipo_movimentacao = 'todos' and movimentacao.data_criacao = '$pesquisarData' and 
     funcionario.nome_completo LIKE '$pesquisarNome%' ORDER BY movimentacao.id DESC LIMIT $inicio, $qnt_result_pg";
 }
////////////////////////////////////////////////////////////////////////////

$_SESSION['controleDePesquisaMovimentacao'] = 1; // serve para saber se o usuario pesquisou ou não

echo   $_SESSION['sqlPesquisaMovimentacao'];
?>

    <script ">
      window.location.replace("https://localhost/NanoInCub/index.php?i=movimentacoes");  
    </script>