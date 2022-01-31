<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daniel Ayala Cantador</title>
    <link rel="stylesheet" href="../css/estilos.css">
</head>
<body>
    <div class="container-titulo">
        <h1>CRUD MySQL</h1>
        <form action="" method="POST">
            <input type="text" name="inputValor" >
            <input type="submit" value="FIND" class="filter-btn buton-buscar">
        </form>
    </div>
    <div>
        <table>
            <tr>
                <th colspan="2">SHOW SUPER HERO</th>
                <th><a href="./add" class="filter-btn buton-mas">ADD</a></th>
            </tr>
            <tr>
              <th>Name</th>
              <th>Speed</th>
              <th>Action</th>
            </tr>
            
            <?php
                foreach ($data as $elemento){
                    echo "<tr>";
                        echo "<td>".$elemento["nombre"]."</td>";
                        echo "<td>".$elemento["velocidad"]."</td>";
                        echo "<td> <a href=\"del/".$elemento["id"]."\" class=\"filter-btn buton-del\">DEL</a> <a href=\"edit/".$elemento["id"]."\" class=\"filter-btn buton-edit\">EDIT</a> </td>";
                    echo "</tr>";
                }    
            ?>
        </table>
    </div>
</body>
</html>