<?php 
require_once('config.php');

date_default_timezone_set('America/Fortaleza');	

try {
	$pdo = new PDO("mysql:dbname=$banco;host=$servidor;charset=utf8", "$usuario", "$senha");
} catch (Exception $e) {
	echo 'Erro ao Conectar com o banco de dados! <p>' .$e;
}

 ?>