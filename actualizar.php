<?php

include('consulta.php');


$name = $_POST['name'];
$username = $_POST['username'];
$email = $_POST['email'];
$id = $_POST['id'];

$stmt = $dbh->prepare ("UPDATE clientes SET name = '$name', username = '$username', email = '$email' WHERE id = :id");
$stmt->bindValue(':id', $id);

echo "Se ha actualizado con éxito";


$stmt->execute(); 
?>

<html>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
<button type="button" class="btn btn-light"><a href="./usuarios.php">Back</a></button>
