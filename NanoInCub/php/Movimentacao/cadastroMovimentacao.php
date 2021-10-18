                <?php

                session_start();

                include '../db_connect.php';

                        $valor  = $_POST['valorMovimentacao'];
                        $funcionario = $_POST['funcionarioMovimentacao'];
                        $observacao = $_POST['observacaoMovimentacao'];
                        $tipomovimentacao = $_POST['tipoMovimentacao'];
                        $administrador_id  = $_SESSION['administrador_id'];// essa super global vem do verificadorLogin
                        $hoje = date('Y/m/d ');

                        $valoratual = $_GET['valoratual'];

                $sql ="INSERT INTO movimentacao( tipo_movimentacao, valor, observacao,funcionario_id,administrador_id,data_criacao) 
                                    VALUES ('$tipomovimentacao','$valor','$observacao','$funcionario','$administrador_id','$hoje')";
                echo $sql;
                if(mysqli_query($connect, $sql)):

                 if($tipomovimentacao == 'entrada')
                 {
                  $valoratual =  $valoratual + $valor;
                  
                 }else{
                     $valoratual =  $valoratual - $valor;
                 }
                 if($valoratual < 0 )
                 { 
                  $valoratual = 0;
                 }
                    $sql = "UPDATE `funcionario` SET `saldo_atual`= $valoratual WHERE id = $funcionario";
                    if(mysqli_query($connect, $sql)):
                ?>
                <script ">
                 document.body.style.backgroundColor = "black";
                 alert("Movimentação Realizado com Sucesso !!!");
                 window.location.replace("https://localhost/NanoInCub/index.php?i=movimentacoes");

                </script>
                <?php endif; endif; ?>