            <?php
            // session_start inicia a sessão
            session_start();

            include 'db_connect.php';

            $login = $_POST['login'];
            $senha = $_POST['senha'];
               //Login do Admin
            $sql = "SELECT * FROM `administrador` WHERE login = '$login' and senha = '$senha'"; 
            $resultado = mysqli_query($connect, $sql);

            mysqli_num_rows($resultado) > 0;
            $dados = mysqli_fetch_array($resultado);

            if($login == $dados['login'] &&  $senha== $dados['senha']){
            $_SESSION['login'] = $login;
            $_SESSION['senha'] = $senha;
            $_SESSION['administrador_id'] = $dados['id']; 
            $_SESSION['acesso'] = 2; //tem acesso total
            ?>
            <script>
            alert(" Logado com sucesso !!!");
            window.location.replace("https://localhost/NanoInCub/index.php?i=home");

            </script>

            <?php }else{
                
                //testan se o  usuário que está logando
                 $sqlFun = "SELECT * FROM `funcionario` WHERE login = '$login' and senha = '$senha'"; 
                 $resultadoFun = mysqli_query($connect, $sqlFun);

                 mysqli_num_rows($resultadoFun) > 0;
                 $dadosFun = mysqli_fetch_array($resultadoFun);
                 if($login == $dadosFun['login'] &&  $senha== $dadosFun['senha']){
                    ?>
                    <script>
                    window.location.replace("https://localhost/NanoInCub/index.php?i=visualizarExtratoFun&id=<?php echo $dadosFun['id']?>");
                   </script>
                 <?php
                  }else{
                     ?>
                    <script>
                        document.body.style.backgroundColor = "black";
                        alert("Senha ao Login estão errados !!!");
                        window.location.replace("https://localhost/NanoInCub/index.php?i=login");
                    </script>
                    <?php
                 }
             } 
         

          

      