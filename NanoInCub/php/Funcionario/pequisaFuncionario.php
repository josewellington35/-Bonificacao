                    <?php

                    session_start();

                    include '../db_connect.php';


                    $pesquisarNome = $_POST['buscar'];
                    $pesquisarData = $_POST['date'];
                    // Para fazer o orde by
                    $inicio =  $_SESSION['inicio'];
                    $qnt_result_pg = $_SESSION['qnt_result_pg'];

                                                                                  
                    if (empty($pesquisarData)) {  
                    $_SESSION['sqlPesquisa'] =   "SELECT * FROM funcionario WHERE nome_completo LIKE '$pesquisarNome%' ORDER BY id DESC LIMIT $inicio, $qnt_result_pg";
                    }
                    if (empty($pesquisarNome)) {    

                    $_SESSION['sqlPesquisa'] =   "SELECT * FROM funcionario WHERE data_criacao = '$pesquisarData'ORDER BY id DESC LIMIT $inicio, $qnt_result_pg"; 
                    }
                    if (empty($pesquisarNome)and(empty($pesquisarData))) {    

                    $_SESSION['sqlPesquisa'] =   "SELECT * FROM funcionario ORDER BY id DESC LIMIT $inicio, $qnt_result_pg"; 
                    }

                    if (!empty($pesquisarNome)and(!empty($pesquisarData))) {    

                    $_SESSION['sqlPesquisa'] =   "SELECT * FROM funcionario WHERE nome_completo LIKE '$pesquisarNome%' or   data_criacao = '$pesquisarData' ORDER BY id DESC LIMIT $inicio, $qnt_result_pg"; 
                    }
                    

	
                    $_SESSION['controleDePesquisa'] = 1; // controla a pesquisa/ verifica se foi pesquisado ou não

                 

                    ?>
                    <script ">

                       window.location.replace("https://localhost/NanoInCub/index.php?i=funcionarios");  

                    </script>
