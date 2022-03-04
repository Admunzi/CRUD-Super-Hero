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
                        <span>Manage <b>Request</b></span>
                    </div>
                    <div>
                        
                    </div>
                    <div>
						<?php
						$elementos = explode('/',$_SERVER['REQUEST_URI']);
						$idHero = end($elementos);
						if ($_SESSION['profile'] == "Citizen") {
							?>
								<a href="/add-request/<?php echo $idHero?>" class="btn btn-success" data-toggle="modal"><i class="material-icons">&#xE147;</i> <span>Add New Request</span></a>
							<?php
						}
						?>
                    </div>
                </div>
            </div>
			<?php
			if (!empty($data)) {
				?>
				<table class="table table-striped table-hover">
					<thead>
						<tr>
							<th>Title</th>
							<th>Description</th>
							<th>Status</th>
							<th>Create Date</th>
							<th>Option</th>
						</tr>
					</thead>
					<tbody>
						<?php
						foreach ($data as $elemento){
							?>
							<tr>
								<td><?php echo $elemento['title'];?></td>
								<td><?php echo $elemento['description'];?></td>
								<td><?php echo ($elemento['completed']!= 0)? "Completed": "No completed";?></td>
								<td><?php echo $elemento['created_at'];?></td>
								<td>
								<?php
									if ($elemento['completed'] == 0 && $_SESSION['idProfile'] == $idHero) {
										?><a href="/complete-request/<?php echo $elemento['id']."/".$idHero;?>" class="look"><span class="material-icons">done</span></a><?php
									}
									if ($_SESSION['idProfile'] == $idHero) {
										?><a href="/delete-request/<?php echo $elemento['id'];?>" class="delete"><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a><?php
									}
								?>
								</td>
							</tr>
							<?php
						}
						?>
					</tbody>
				</table>
				<div class="clearfix">
					<div class="hint-text">Total <b><?php echo count($data);?></b> request</div>
				</div>
				<?php
			}else{
				echo "<h2>No request</h2>";
			}
			?>
        </div>
    </div>

</body>
</html>