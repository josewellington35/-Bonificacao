<section class="masthead .bg-secondary.bg-gradient bg-opacity-25 text-white text-center" >
    <div class="container d-flex  flex-column">

        <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">Histórico de Extratos</h2>
            <div class="divider-custom">
                <div class="divider-custom-line"></div>
                <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                <div class="divider-custom-line"></div>
            </div>

<table class="table table-success table-striped">
<thead>
    <tr>
      <th scope="col">Data da movimentação</th>
      <th scope="col">Tipo</th>
      <th scope="col">Valor</th>
      <th scope="col">Observação</th>
      
    </tr>
  </thead>
  <tbody>
     <?php
       include 'php/db_connect.php';
        $idFun = $_GET['id'];
       
       $sql = "SELECT * FROM funcionario funcionario INNER JOIN movimentacao movimentacao
   ON funcionario.id = movimentacao.funcionario_id where movimentacao.funcionario_id =  '$idFun'  ORDER BY funcionario.id DESC";

     
   
      
       $buscar = mysqli_query($connect, $sql);
		if(($buscar) AND ($buscar->num_rows != 0)){
       while($array = mysqli_fetch_array($buscar)){
              
              $tipo = $array['tipo_movimentacao'];
              $valor = $array['valor'];
              $observacao = $array['observacao'];
              $funcionario = $array['nome_completo'];
              $data_criacao = $array['data_criacao'];
       ?>
 
    <tr>
    
    
      <td><?php echo  $data_criacao ?></td>
      <td><?php echo  $tipo ?></td>
      <td><?php echo  $valor ?></td>
      <td><?php echo  $observacao ?></td>
     
      
    </tr>
      <?php }
      }else{
			echo "<div class='alert alert-danger' role='alert'> Nenhum extrato encontrado!!</div>";
		}
      ?>
  </tbody>
</table>
</div>
</section>
