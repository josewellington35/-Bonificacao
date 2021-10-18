




          <form method="POST" action="php/Movimentacao/pequisaFuncMovimentacao.php">
          <section class="masthead .bg-secondary.bg-gradient bg-opacity-25 text-white text-center" >
          <div class="container  align-items-center flex-column">


            <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">Escolha o Funcionário que deseja fazer uma movimentação!!!</h2>
              <div class="divider-custom">
                <div class="divider-custom-line"></div>
                <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                <div class="divider-custom-line"></div>
              </div>
          <div class="input-group mb-3">
            
              <input type="text" class="form-control" id="buscar" name="buscar"  placeholder="Nome " aria-label="'username" aria-describedby="button-addon2">
              <input id="date" name="date" type="date">
              </input>
              <button class="btn btn-outline-secondary" type="submit" id="button">Buscar</button>
          
          </div>
        



              <div class="container">
                <span id="conteudo"></span><br><br><br>    <!-- Tabela de funcionario-->
              </div>

          <!-- Pegando tabela de funcionarios da pagina listar funcionarios-->
              <script>
                var qnt_result_pg = 2; //quantidade de registro por página
                var pagina = 1; //página inicial
                $(document).ready(function () {
                  listar_usuario(pagina, qnt_result_pg); //Chamar a função para listar os registros
                });
                
                function listar_usuario(pagina, qnt_result_pg){
                  var dados = {
                    pagina: pagina,
                    qnt_result_pg: qnt_result_pg
                   
                  }
           
                  $.post('app/views/movimentacoes/bodyPesquisaIDFunc.php', dados , function(retorna){
                    //Subtitui o valor no seletor id="conteudo"
                    $("#conteudo").html(retorna);
                  });
                }
              </script>
          </div>
          </section>
          </form>