<section class="masthead .bg-secondary.bg-gradient bg-opacity-25 text-white text-center" >
    <div class="container d-flex  flex-column">
               
                <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">Editar Funcionários</h2>
              
                <div class="divider-custom">
                    <div class="divider-custom-line"></div>
                    <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                    <div class="divider-custom-line"></div>
                </div>
               <?php
                include 'php/db_connect.php';
                session_start();

              $idFun = $_GET['id'];
              $sql = "SELECT * FROM funcionario WHERE id = '$idFun'";
               
               $buscar = mysqli_query($connect, $sql);

              while($array = mysqli_fetch_array($buscar)){
              
              $_SESSION['id'] = $array['id'];
              $_SESSION['administrador_id'] = $array['administrador_id'];
              $_SESSION['data_criacao'] = $array['data_criacao'];
              $nome = $array['nome_completo'];
              $login = $array['login'];
              $senha = $array['senha'];
              $saldo_atual = $array['saldo_atual'];
             
          
            
               ?>
                <div class="row justify-content-center">
                    <div class="col-lg-8 col-xl-7">
                      <form  action="php/Funcionario/editarFuncionario.php" method="post" id="func" data-sb-form-api-token="API_TOKEN">
                      
                            <div class="form-floating mb-3">
                                <input class="form-control" id="name" name="name" type="text" value="<?php  echo  $nome  ?>" placeholder="Seu nome.."  required />
                                <label for="name">Nome Completo </label>
                                <div class="invalid-feedback" data-sb-feedback="name:required">Campo obrigatorio.</div>
                            </div>
                            <div class="form-floating mb-3">
                                <input class="form-control" id="login" name="login" type="text" value="<?php  echo  $login  ?>" placeholder="Seu user.."   required />
                                <label for="name">Login </label>
                                <div class="invalid-feedback" data-sb-feedback="name:required">Campo obrigatorio.</div>
                            </div>
                          
                            <div class="form-floating mb-3">
                                <input class="form-control" id="senha" name="senha" type="password" value="<?php  echo  $senha  ?>" placeholder="Sua senha..." required />
                                <label for="password">Senha</label>
                                <div class="invalid-feedback" data-sb-feedback="senha:required">Campo obrigatorio.</div>
                            
                            </div>
                             <div class="form-floating mb-3">
                                
                               
                                <input class="form-control" id="saldo" name="saldo" onkeyup="somenteNumeros(this);" maxlength="15" type="text" ng-model="numero.valor" placeholder="0.00..."   value="<?php  echo  $saldo_atual  ?>"  placeholder="Saldo..."  required />
                                <label for="name">Saldo Atual </label>
                                <div class="invalid-feedback" data-sb-feedback="name:required">Campo obrigatorio.</div>
                            </div>
                       
                          <div class="d-grid gap-2 col-6 mx-auto">
                            <button class="btn btn-primary outline btn-xl  " id="submitButton" type="submit">Atualizar</button>
                          </div>
                        </form>
                    </div>
                </div>
                  <?php }?>
            </div>
        </section>