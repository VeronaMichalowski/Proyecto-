<?php

include('consulta.php');


if ($_SERVER['REQUEST_METHOD']=='POST'){
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


$stmt = $dbh->prepare("INSERT INTO clientes (name, username, password, email) 
VALUES ( :name, :username, :password, :email)");


$name = $_POST['name'];
$username = $_POST['username'];
$password = $_POST['password'];
$email = $_POST['email'];


$stmt->bindValue(':name', $name); 
$stmt->bindValue(':username', $username); 
$stmt->bindValue(':password', $password);
$stmt->bindValue(':email', $email);  


$stmt->execute();
}

?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <title>Usuarios</title>
</head>
<body>
<h1 style="color: yellow;" style="padding:20px">Users</h1>  

  <button type="button" class="btn btn-light"><a href="./index.html">Back</a></button>
    <table class="table table-hover">   
    <form method="post" action="">
        <thead>
            <tr style="color:blueviolet" style="width: 20px">
                <th scope="col">Id</th>
                <th scope="col">Name</th>
                <th scope="col">Username</th>
                <th scope="col">Password</th>
                <th scope="col">Email</th>
                <div>
           </thead>
        <tbody> 
            <?php foreach ($miConsulta as $values){ ?> 
            <tr style="width: 15px">
                <td style="width: 5px"><?= $values['id']; ?></td>     
                <td><?= $values['name']; ?></td>
                <td><?= $values['username']; ?></td> 
                <td><?= $values['password']; ?></td>
                <td><?= $values['email']; ?></td>
                <td><?= $values['id']; ?></td>              
                <td>
                    <div class="botones" style="display:flex">
                    <form method="post" action="editar.php">
                        <input type="hidden" name="id" value="<?= $values['id'] ?>" />
                        <button type="submit" class="btn btn-warning">Edit</button>
                    </form>
                    <form method="post" action="borrar.php">
                        <input type="hidden" name="id" value="<?= $values['id'] ?>" />
                        <button type="submit" class="btn btn-info" style="margin-left: 10px;" id="boton_b">Delete</button>
                    </form>
                </div>
                </td>
        <?php  }?>         
        </table>
    </tbody>

    <script src="./script.js"></script> 
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">
    </script>
   

</body>

