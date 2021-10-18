<?php
// session_start inicia a sessão
session_start();


if(isset($_SESSION['login'])){
    session_destroy();
    ?>
    <script>
    alert(" Até logo !!!");
    window.location.replace("https://localhost/NanoInCub/index.php?i=home");
    </script>

<?php
}
?>