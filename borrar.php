<?php

include('consulta.php');

$dbname = 'clientes';
$user='root';
$password='';

try {

$dsn = "mysql:host=localhost;dbname=$dbname";
$dbh = new PDO($dsn, $user, $password);
$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch (PDOException $e){
echo $e->getMessage();
}

$id = $_POST['id'];
$stmt = $dbh->prepare("DELETE FROM clientes WHERE id=:id");


$stmt->bindValue(':id', $id);


$stmt->execute(); 

header("Location: usuarios.php");