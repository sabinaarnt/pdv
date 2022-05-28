<?php 
require_once("../conexao.php");

$nome = $_POST['nome-perfil'];
$email = $_POST['email-perfil'];
$cpf = $_POST['cpf-perfil'];
$senha = $_POST['senha-perfil'];
$id = $_POST['id-perfil'];

$antigo = $_POST['antigo-perfil'];
$antigo2 = $_POST['antigo2-perfil'];

//EVITAR DUPLICIDADE DO EMAIL
if($antigo2 != $email){
$query_con = $pdo->prepare("SELECT * from usuarios WHERE email = :email");
$query_con->bindValue(":email", $email);
$query_con->execute();

$res_con = $query_con->fetchAll(PDO::FETCH_ASSOC);
if(@count($res_con) > 0){
	echo 'Email já cadastrado.';
	exit();
}
}

if($antigo != $cpf){
//EVITAR DUPLICIDADE DO CPF
$query_con = $pdo->prepare("SELECT * from usuarios WHERE cpf = :cpf");
$query_con->bindValue(":cpf", $cpf);
$query_con->execute();

$res_con = $query_con->fetchAll(PDO::FETCH_ASSOC);
if(@count($res_con) > 0){
	echo 'CPF já cadastrado.';
	exit();
}
}

	$res = $pdo->prepare("UPDATE usuarios SET nome = :nome, email = :email, cpf = :cpf, senha = :senha WHERE id = :id");
	$res->bindValue(":nome", $nome);
	$res->bindValue(":email", $email);
	$res->bindValue(":cpf", $cpf);
	$res->bindValue(":senha", $senha);
	$res->bindValue(":id", $id);

	$res->execute();


echo 'Salvo com Sucesso!';
?>