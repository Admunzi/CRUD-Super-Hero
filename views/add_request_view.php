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
                        <span>Add <b>Request</b></span>
                    </div>
                    <div>
                        
                    </div>
                    <div>
						<a href="/add-superhero" class="btn btn-success" data-toggle="modal"><i class="material-icons">&#xE147;</i> <span>Add New Hero</span></a>
                    </div>
                </div>
            </div>
            <div class="containerMain">
                <form action="" method="POST" enctype="multipart/form-data">
                    <label>User: <input type="text" name="inputUser"></label>
                    <label>Password: <input type="password" name="inputPassw"></label>

                    <label>Name Superhero: <input type="text" name="inputName"></label>
                    <label>File: <input type="file" name="file"></label>

                    <input type="submit" value="Submit">
                </form>
            </div>

        </div>
    </div>
</body>
</html>