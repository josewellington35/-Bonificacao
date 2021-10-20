<?php 

$pagina = 'login';

if(isset($_GET['i'])){
	$pagina = addslashes($_GET['i']);
}

/* Carrega o header.php */
include 'app/views/header.php';

switch ($pagina) {
	case 'home':
		include 'app/views/home.php';
		break;

	case 'editFuncionario':
		include 'app/views/funcionarios/editarFuncionarios.php';
		break;
	case 'deletFuncionario':
		header("Location: php/Funcionario/deleteFuncionario.php");
		break;
    case 'cadastroFuncionarios':
		include 'app/views/funcionarios/cadastroFuncionario.php';
		break;
    case 'funcionarios':
		include 'app/views/funcionarios/funcionarios.php';
		break; 
   case 'movimentacoes':
		include 'app/views/movimentacoes/movimentacoes.php'; 
		break;
	case 'pesquisaIDFunc':
		include 'app/views/movimentacoes/pesquisaIDFunc.php'; 
		break;
    case 'cadastroMovimentacoes':
		include 'app/views/movimentacoes/cadastroMovimentacoes.php';
		break;
    case 'cadastroAdministrador':
		include 'app/views/administrador/cadastroAdministrador.php';
		break;
    case 'visualizarExtratoFun':
		include 'app/views/funcionarios/visualizarExtratoFun.php';
		break;
	case 'login':
		include 'app/views/login.php';
		break;
	case 'logoff':
		include 'php/logoff.php';
		break;
	default:
		include 'app/views/login.php';
		break;
}
/* Carrega o footer.php */
include 'app/views/footer.php';
