<?php 
   //VERIFICAR PERMISSAO DO USUARIO
    if(@$_SESSION['nivel_usuario'] != 'Administrador'){
      echo "<script language='javascript'>window.location='../index.php'</script>"; 
    }

 ?>