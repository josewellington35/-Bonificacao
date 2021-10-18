		<?php
		
		$servidor = "localhost";
		$usuario = "root";
		$senha = "";
		$dbname = "nanoincub";

		//Criar a conexao
		$conn = mysqli_connect($servidor, $usuario, $senha, $dbname);
        session_start();
		$pagina = filter_input(INPUT_POST, 'pagina', FILTER_SANITIZE_NUMBER_INT);
		$qnt_result_pg = filter_input(INPUT_POST, 'qnt_result_pg', FILTER_SANITIZE_NUMBER_INT);
		//calcular o inicio visualização
		$inicio = ($pagina * $qnt_result_pg) - $qnt_result_pg;
		//_SESSION para o pesqios 
		$_SESSION['inicio'] = $inicio;
		$_SESSION['qnt_result_pg'] = $qnt_result_pg;
		//consultar no banco de dados
		
		   
		if($_SESSION['controleDePesquisa'] == 1){// fazer o pesquisar pega do pesquisar funcionario
			$result_usuario = $_SESSION['sqlPesquisa'];
		}else{
		$result_usuario = "SELECT * FROM funcionario ORDER BY id DESC LIMIT $inicio, $qnt_result_pg";
		}
        $_SESSION['controleDePesquisa'] =0;
		$resultado_usuario = mysqli_query($conn, $result_usuario);

		//gerar_usuarios_bd
		//Verificar se encontrou resultado na tabela "usuarios"
		if(($resultado_usuario) AND ($resultado_usuario->num_rows != 0)){
			?>
			<table class="table table-striped table-bordered table-hover">
				<thead>
					<tr>
						<th scope="col">ID</th>
						<th scope="col">Nome</th>
						<th scope="col">Saldo atual</th>
						<th scope="col">Data de criação</th>
						<th scope="col">Ação</th>
					</tr>
				</thead>
				<tbody>
					<?php
					
						while($row_usuario = mysqli_fetch_array($resultado_usuario)){
							 
							?>
						<tr>
				
							<td><?php echo  $row_usuario['id']; ?></td>
							<td><?php echo  $row_usuario['nome_completo']; ?></td>
							<td><?php echo  $row_usuario['saldo_atual']; ?></td>
							<td><?php echo  $row_usuario['data_criacao']  ?></td>
							<td>
								<a href="?i=editFuncionario&id=<?php echo $row_usuario['id'];?>" class="btn btn-warning btn-sm " role="button" >
								<i class="fas fa-pencil-alt"></i>&nbsp;Editar</a>
								<a href="?i=visualizarExtratoFun&id=<?php echo $row_usuario['id']; ?>" class="btn btn-info btn-sm " role="button" >
								<i class="far fa-address-card"></i>&nbsp;Extrato </a>
								<a href="https://localhost/NanoInCub/php/Funcionario/deleteFuncionario.php?&id=<?php  echo $row_usuario['id'];  ?>" class="btn btn-danger btn-sm " role="button" >
								<i class="fas fa-trash-alt"></i></a>
							</td>
						</tr>
						<?php } //fechando o while  ?> 
				</tbody>
			</table>
			<?php
			//Paginação - Somar a quantidade de usuários
			$result_pg = "SELECT COUNT(id) AS num_result FROM funcionario";
			$resultado_pg = mysqli_query($conn, $result_pg);
			$row_pg = mysqli_fetch_assoc($resultado_pg);

			//Quantidade de pagina
			$quantidade_pg = ceil($row_pg['num_result'] / $qnt_result_pg);

			//Limitar os link antes depois
			$max_links = 2;

			echo '<nav aria-label="paginacao">';
			echo '<ul class="pagination">';
			echo '<li class="page-item">';
			echo "<span class='page-link'><a href='#' onclick='listar_usuario(1, $qnt_result_pg)'>Primeira</a> </span>";
			echo '</li>';
			for ($pag_ant = $pagina - $max_links; $pag_ant <= $pagina - 1; $pag_ant++) {
				if($pag_ant >= 1){
					echo "<li class='page-item'><a class='page-link' href='#' onclick='listar_usuario($pag_ant, $qnt_result_pg)'>$pag_ant </a></li>";
				}
			}
			echo '<li class="page-item active">';
			echo '<span class="page-link">';
			echo "$pagina";
			echo '</span>';
			echo '</li>';

			for ($pag_dep = $pagina + 1; $pag_dep <= $pagina + $max_links; $pag_dep++) {
				if($pag_dep <= $quantidade_pg){
					echo "<li class='page-item'><a class='page-link' href='#' onclick='listar_usuario($pag_dep, $qnt_result_pg)'>$pag_dep</a></li>";
				}
			}
			echo '<li class="page-item">';
			echo "<span class='page-link'><a href='#' onclick='listar_usuario($quantidade_pg, $qnt_result_pg)'>Última</a></span>";
			echo '</li>';
			echo '</ul>';
			echo '</nav>';

		}else{
			echo "<div class='alert alert-danger' role='alert'>Nenhum usuário encontrado!</div>";
		}
