<?php 
   //VERIFICAR PERMISSAO DO USUARIO
    if(@$_SESSION['nivel_usuario'] != 'Tesoureiro'){
      echo "<script language='javascript'>window.location='../index.php'</script>"; 
    }

 ?>