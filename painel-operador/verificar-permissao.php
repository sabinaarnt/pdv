<?php 
   //VERIFICAR PERMISSAO DO USUARIO
    if(@$_SESSION['nivel_usuario'] != 'Operador'){
      echo "<script language='javascript'>window.location='../index.php'</script>"; 
    }

 ?>