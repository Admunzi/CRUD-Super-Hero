<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Superheros CRUD</title>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="../css/estilos.css">
  
  <body>
    <div class="container">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div>
                        <a href="/home"><img src="../img/logo.svg" alt="Logo img"></a>
                        <span>Add <b>Ability</b></span>
                    </div>
                    <div>
                        
                    </div>
                    <div>
                    </div>
                </div>
            </div>
            <div class="containerMain">

                <h2>Add ability to Hero</h2>
                <form action="" method="POST">
                    <select name="selectAbilities">
                        <?php
                        foreach ($data as $elemento) {
                            echo "<option value='".$elemento['id']."'>".$elemento['name']."</option>";
                        }
                        ?>
                    </select>
                    <label>Value: <input type="text" name="inputValue"></label>
                    <input type="submit" value="Submit">
                </form>

                <h2>Add ability to DB</h2>
                <form action="" method="POST">
                    <label>
                        <input type="text" name="inputName">
                    </label>
                    <input type="submit" value="Submit">
                </form>
            </div>

        </div>
    </div>
</body>
</html>