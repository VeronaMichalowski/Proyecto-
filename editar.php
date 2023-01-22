
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
    
    $id = $_POST['id'];

    $miConsulta = $dbh->prepare("SELECT * FROM clientes WHERE id = $id");


    $miConsulta->execute();
    
    
}

?> 


<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Update user</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <h1 style="color: yellow;">Update user</h1>

    <a href="usuarios.php">
        <button type="button" class="btn btn-light">Back</button>
    </a>

    <form action = "actualizar.php" method="post" style="padding:20px">
    <?php foreach ($miConsulta as $values)  { ?> 
        <div class=" mb-3">
            <label for="name" class="form-label">Name</label>
            <input class="form-control" type="text" id="name" name="name" style="width: 400px;"
            value="<?= $values['name'] ?>">
        </div>
        <div class="mb-3">
            <label for="username" class="form-label">Username</label>
            <input type="text" class="form-control" id="username" name="username" style="width: 400px;" 
            value="<?= $values['username'] ?>">
        </div>
        <div class=" mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" style="width: 400px;"
            value="<?= $values['email'] ?>">
        </div>
        <div class=" mb-3">
            <input type="hidden" class="form-control" name="id" style="width: 400px;"
            value="<?= $values['id'] ?>">
        </div>
        <button type="submit" class="btn btn-warning" value="Actualizar">Edit</button>
        <?php  } ?>  
    </form>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">
    </script>
</body>

