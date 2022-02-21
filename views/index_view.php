<?php
$valueInput = "";
if (isset($_POST['inputValue'])) {
	$valueInput = $_POST['inputValue'];
}
?>

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
						<span>Manage <b>Heros</b></span>
					</div>
					<div>
						<form action="" method="POST">
							<label>User:  <input type="text" name="inputUser"></label>
							<label>Password:  <input type="password" name="inputPassword"></label>
							<input type="submit" value="Send">
						</form>
						<a href="/register-citizen">Register</a>
					</div>
					<div>
						<form action="" method="POST">
							<label><input type="text" name="inputValue" value="<?php echo $valueInput?>"></label>
							<input type="submit" value="Find">
						</form>
						<a href="/add-superhero" class="btn btn-success" data-toggle="modal"><i class="material-icons">&#xE147;</i> <span>Add</span></a>
					</div>
                </div>
            </div>
			<?php
			if (!empty($data)) {
				?>
				<table class="table table-striped table-hover">
					<thead>
						<tr>
							<th></th>
							<th>Name</th>
							<th>Evolution</th>
							<th>Create Date</th>
							<th>Option</th>
						</tr>
					</thead>
					<tbody>
						<?php
						foreach ($data as $elemento){
							?>
							<tr>
								<td><img src="../img/heros/<?php echo $elemento['img'];?>" alt="Img of superhero"></td>
								<td><?php echo $elemento['name'];?></td>
								<td><?php echo $elemento['evolution_type'];?></td>
								<td><?php echo $elemento['created_at'];?></td>
								<td>
									<a href="/edit-superhero/<?php echo $elemento['id'];?>" class="edit"><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a>
									<a href="/delete-superhero/<?php echo $elemento['id'];?>" class="delete"><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a>
									<a href="/request/<?php echo $elemento['id'];?>" class="look"><span class="material-icons">assignment</span></a>
									<a href="/hero-abilities/<?php echo $elemento['id'];?>" class="look"><span class="material-icons">visibility</span></a>
								</td>
							</tr>
							<?php
						}
						?>
					</tbody>
				</table>
				<div class="clearfix">
					<div class="hint-text">Total <b><?php echo count($data);?></b> superheros</div>
				</div>
				<?php
			}else{
				echo "<h2>No heros</h2>";
			}
			?>

        </div>
    </div>
</body>
</html>