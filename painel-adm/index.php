  <?php 

  @session_start();
  require_once('../conexao.php');
  require_once('verificar-permissao.php');

  //VARIAVEIS DO MENU ADMINISTRATIVO

  $menu1 = 'home';
  $menu2 = 'usuarios';
  $menu3 = 'fornecedores';
  $menu4 = 'categorias';
  $menu5 = 'produtos';
  $menu6 = 'compras';


  //RECUPERAR DADOS DO USUARIO

  $query = $pdo->query("SELECT * from usuarios WHERE id = '$_SESSION[id_usuario]'");
  $res = $query->fetchAll(PDO::FETCH_ASSOC);
  $nome_usu = $res[0]['nome'];
  $email_usu = $res[0]['email'];
  $senha_usu = $res[0]['senha'];
  $nivel_usu = $res[0]['nivel'];
  $cpf_usu = $res[0]['cpf'];
  $id_usu = $res[0]['id'];

  ?>

  <!DOCTYPE html>
  <html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Painel Administrativo</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <link rel="stylesheet" type="text/css" href="../vendor/DataTables/datatables.min.css"/>

    <script type="text/javascript" src="../vendor/DataTables/datatables.min.js"></script>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">

  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar navbar-dark bg-primary">
      <div class="container-fluid">

        <a class="navbar-brand" href="/index.php">
          <img src="../img/logo_daupause.jpg" width="30"> Daupause</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="index.php?pagina=<?php echo $menu1 ?>">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="index.php?pagina=<?php echo $menu2 ?>">Usuários</a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="index.php?pagina=<?php echo $menu3 ?>">Fornecedores</a>
            </li>

            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Produtos
              </a>
              <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item" href="index.php?pagina=<?php echo $menu5 ?>">Cadastro de Produtos</a></li>
                <li><a class="dropdown-item" href="index.php?pagina=<?php echo $menu4 ?>">Cadastro de Categorias</a></li>
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item" href="index.php?pagina=<?php echo $menu6 ?>">Lista de Compras</a></li>
              </ul>
            </li>

          </ul>
          <div class="d-flex mx-3">
            <img src="../img/icone-user.png" width="40px" height="40px">

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDarkDropdown" aria-controls="navbarNavDarkDropdown" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDarkDropdown">
              <ul class="navbar-nav">
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" id="navbarDarkDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <?php echo $nome_usu ?>
                  </a>
                  <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDarkDropdownMenuLink">
                    <li><a class="dropdown-item" href="" data-bs-toggle="modal" data-bs-target="#modalPerfil">Editar Perfil</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item" href="../logout.php">Sair</a></li>

                  </ul>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </nav>

    <div class="container mt=2">  

      <?php 

      if(@$_GET['pagina'] == $menu1){
        require_once($menu1. '.php');

      } 
      else if(@$_GET['pagina'] == $menu2){
        require_once($menu2. '.php');
      } 
      else if(@$_GET['pagina'] == $menu3){
        require_once($menu3. '.php');
      }
      else if(@$_GET['pagina'] == $menu4){
        require_once($menu4. '.php');
      }
      else if(@$_GET['pagina'] == $menu5){
        require_once($menu5. '.php');
      }
       else if(@$_GET['pagina'] == $menu6){
        require_once($menu6. '.php');
      }
      else {
        require_once($menu1. '.php');
      }

      ?>
    </div> 
  </body>
  </html>

  <div class="modal fade" tabindex="-1" id="modalPerfil" data-bs-backdrop="static">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Editar Perfil</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form method="POST" id="form-perfil">
          <div class="modal-body">

            <div class="row">
              <div class="col-md-6">
                <div class="mb-3">
                  <label for="exampleFormControlInput1" class="form-label">Nome</label>
                  <input type="text" class="form-control" id="nome-perfil" name="nome-perfil" placeholder="Nome" required="" value="<?php echo @$nome_usu ?>">
                </div> 
              </div>
              <div class="col-md-6">
                <div class="mb-3">
                  <label for="exampleFormControlInput1" class="form-label">CPF</label>
                  <input type="text" class="form-control" id="cpf-perfil" name="cpf-perfil" placeholder="CPF" required="" value="<?php echo @$cpf_usu ?>">
                </div>  
              </div>
            </div>

            <div class="mb-3">
              <label for="exampleFormControlInput1" class="form-label">Email</label>
              <input type="email" class="form-control" id="email-perfil" name="email-perfil" placeholder="Email" required="" value="<?php echo @$email_usu ?>">
            </div>  

            <div class="mb-3">
              <label for="exampleFormControlInput1" class="form-label">Senha</label>
              <input type="text" class="form-control" id="senha-perfil" name="senha-perfil" placeholder="Senha" required="" value="<?php echo @$senha_usu ?>">
            </div>  

            <small><div align="center" class="mt-1" id="mensagem-perfil">

            </div> </small>

          </div>
          <div class="modal-footer">
            <button type="button" id="btn-fechar-perfil" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
            <button name="btn-salvar-perfil" id="btn-salvar-perfil" type="submit" class="btn btn-primary">Salvar</button>

            <input name="id-perfil" type="hidden" value="<?php echo @$id_usu ?>">

            <input name="antigo-perfil" type="hidden" value="<?php echo @$cpf_usu ?>">
            <input name="antigo2-perfil" type="hidden" value="<?php echo @$email_usu ?>">

          </div>
        </form>
      </div>
    </div>
  </div>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>

  <script type="text/javascript" src="../vendor/js/mascaras.js"></script>

  <!--AJAX PARA INSERÇÃO E EDIÇÃO DOS DADOS COM IMAGEM -->
  <script type="text/javascript">
    $("#form-perfil").submit(function () {

      event.preventDefault();
      var formData = new FormData(this);

      $.ajax({
        url: "editar-perfil.php",
        type: 'POST',
        data: formData,

        success: function (mensagem) {

          $('#mensagem-perfil').removeClass()

          if (mensagem.trim() == "Salvo com Sucesso!") {

                      //$('#nome').val('');
                      //$('#cpf').val('');
                      $('#btn-fechar-perfil').click();
                      //window.location = "index.php?pagina="+pag;

                    } else {

                      $('#mensagem-perfil').addClass('text-danger')
                    }

                    $('#mensagem-perfil').text(mensagem)

                  },

                  cache: false,
                  contentType: false,
                  processData: false,
              xhr: function () {  // Custom XMLHttpRequest
                var myXhr = $.ajaxSettings.xhr();
                  if (myXhr.upload) { // Avalia se tem suporte a propriedade upload
                    myXhr.upload.addEventListener('progress', function () {
                      /* faz alguma coisa durante o progresso do upload */
                    }, false);
                  }
                  return myXhr;
                }
              });
    });
  </script>