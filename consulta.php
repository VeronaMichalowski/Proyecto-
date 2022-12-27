<?php
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

// Prepara SELECT
$miConsulta = $dbh->prepare("SELECT * FROM clientes");


$miConsulta->execute();


 

?>