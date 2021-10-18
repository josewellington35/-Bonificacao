  <?php
   // Verifica se está logado ou não-->
   
	 
     session_start();
	 
	  
  




	 // Verifica se a session não for igual a false-->
	 if((!isset ($_SESSION['login']) == false) and (!isset ($_SESSION['senha']) == false)) {
      $nomeCampo = 'Sair';
      $nomeCampoFuncionario = 'Funcionários';
      $nomeCampoMovimentacao = 'Movimentações';
	  $link = '?i=logoff';
      $linkFuncionario = '?i=funcionarios';
      
      $linkMovimentacao = '?i=movimentacoes';
    
	 }
     
	 // Verifica se a session não for igual a true-->
	  if((!isset ($_SESSION['login']) == true) and (!isset ($_SESSION['senha']) == true)) {
	  $nomeCampo = 'LOGIN';
	 
      $nomeCampoFuncionario = '';
      $nomeCampoMovimentacao = '';
	  $link = '?i=login';
      $linkFuncionario = '';
      $linkMovimentacao = '';
 
	?>
       <script>
         window.location.replace("https://localhost/nanoincub/index.php?i=login");
         break;
       </script>
    <?php
    }
    ?>
    
       



    



  




<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>NanoInCub</title>

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <script src="https://use.fontawesome.com/releases/v5.15.3/js/all.js" crossorigin="anonymous"></script>
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css" />
    

        <link href="css/styles.css" rel="stylesheet" />
     
    </head>
     <body id="page-top">
 
        <nav class="navbar navbar-expand-lg bg-secondary text-uppercase fixed-top" id="mainNav">
            <div class="container">
                <a href="?i=home" class="navbar-brand">Nano In Cub</a>
                <button class="navbar-toggler text-uppercase font-weight-bold bg-primary text-white rounded" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    Menu
                    <i class="fas fa-bars"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ms-auto">
                          <li id="funionario"  class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded " href="<?php echo $linkFuncionario ?>"><?php echo $nomeCampoFuncionario ?></a></li>
                          <li id ="movimentacao"  class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded " href="<?php echo $linkMovimentacao ?>"><?php echo $nomeCampoMovimentacao ?></a></li>
                          <div id="btnSairLogin"class="nav-item mx-0 mx-lg-1" ><a class="nav-link py-3 px-0 px-lg-3 rounded" onclik  href="<?php echo $link ?>"><?php echo $nomeCampo ?></a></div>
                    </ul>
                        
                </div>
                 
            </div>
              
        </nav>
           

