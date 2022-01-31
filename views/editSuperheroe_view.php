<?php
$nombre = $data[0]["nombre"];
$velocidad = $data[0]["velocidad"];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>CRUD EDIT</h1>
    <form action="" method="POST">
        <label>Name <input type="text" name="inputNombre" value="<?php echo $nombre?>"></label>
        <label>Speed <input type="text" name="inputVelocidad" value="<?php echo $velocidad?>"></label>
        <input type="submit" value="Cambiar datos">
    </form>
    <a href="../home">Back</a>

</body>
</html>
