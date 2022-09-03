<?php
    session_start();
// libera variaveis da sessao
    session_unset();

// destroi a sessao 
    session_destroy();
    
    header('Location:../admin/index.php');
?>