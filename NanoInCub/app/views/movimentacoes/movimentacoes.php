
<form method="POST" action="php/Movimentacao/pesquisarMovimentacao.php">
<section class="masthead .bg-secondary.bg-gradient bg-opacity-25 text-white text-center" >
<div class="container d-flex align-items-center flex-column">

    <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">Movimentações</h2>
    <div class="divider-custom">
      <div class="divider-custom-line"></div>
       <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
      <div class="divider-custom-line"></div>
    </div>

<div class="input-group mb-3">
  <input type="text" class="form-control" id="pesquisar" name="pesquisar" placeholder="Nome  e data de cadastro" aria-label="Recipient's username" aria-describedby="button-addon2">
  <input id="date" name="date" type="date">
  
   <label class="visually-hidden" for="inlineFormSelectPref">Tipo de Movimentaçõa</label>
   <select class="form-select" name="tipoMovimentacao" id="tipoMovimentacao">
        <option value="todos" selected>Todos os tipos</option>
        <option value="entrada">Entrada</option>
        <option value="saida">Saída</option>
   </select>

</input>
  <button class="btn btn-outline-secondary" type="submit" id="button-addon2">Buscar</button>
</div>
<div class="col-lg-12" style="text-align: right;">
   <a href="?i=pesquisaIDFunc" class="btn btn-danger btn-sm" role="button" >
<i class="fas fa-plus"></i>&nbsp;Nova Movimentção</a>
</div>
<div class="container">
                <span id="conteudo"></span><br><br><br>    <!-- Tabela de movimentacoes-->
              </div>

          <!-- Pegando tabela de movimentacoes da pagina listar movimentacoes-->
              <script>
                var qnt_result_pg = 4; //quantidade de registro por página
                var pagina = 1; //página inicial
                $(document).ready(function () {
                  listar_usuario(pagina, qnt_result_pg); //Chamar a função para listar os registros
                });
                
                function listar_usuario(pagina, qnt_result_pg){
                  var dados = {
                    pagina: pagina,
                    qnt_result_pg: qnt_result_pg
                   
                  }
           
                  $.post('app/views/movimentacoes/listar_movimentacoes.php', dados , function(retorna){
                    //Subtitui o valor no seletor id="conteudo"
                    $("#conteudo").html(retorna);
                  });
                }
              </script>


</div>
</section>
 