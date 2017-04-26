<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Ajouter une randonnée</title>
	<link rel="stylesheet" href="css/basics.css" media="screen" title="no title" charset="utf-8">
</head>
<body>
	<a href="/read.php">Liste des données</a>
	<h1>Ajouter</h1>
	<form action="" method="post">
		<div>
			<label for="name">Name</label>
			<input type="text" name="name" value="">
		</div>

		<div>
			<label for="difficulty">Difficulté</label>
			<select name="difficulty">
				<option value="tres facile">Très facile</option>
				<option value="facile">Facile</option>
				<option value="moyen">Moyen</option>
				<option value="difficile">Difficile</option>
				<option value="tres difficile">Très difficile</option>
			</select>
		</div>
		
		<div>
			<label for="distance">Distance</label>
			<input type="text" name="distance" value="">
		</div>
		<div>
			<label for="duration">Durée</label>
			<input type="duration" name="duration" value="">
		</div>
		<div>
			<label for="height_difference">Dénivelé</label>
			<input type="text" name="height_difference" value="">
		</div>
		<button type="submit" name="button">Envoyer</button>
		<?php 
		try{
			$dbh = new PDO('mysql:host=localhost;dbname=reunion_island;charset=utf8','root', 'root');
		// $dbh = null;
		}catch(PDOException $e){
			print"Error !:".$e->getMessage()."<br/>";
			die();
		}

		$name = $_POST['name'];
		$difficulty = $_POST['difficulty'];
		$distance = intval($_POST['distance']);
		$duration = $_POST['duration'];
		$height_difference = intval($_POST['height_difference']);

		$sql = "INSERT INTO hiking(name,difficulty,distance,duration,height_difference) VALUES(:name,:difficulty,:distance,:duration,:height_difference) ;";
		$sth = $dbh->prepare($sql);
		$res=$sth->execute(array(':name' => $name,':difficulty' => $difficulty,':distance' => $distance,':duration' => $duration,':height_difference' => $height_difference));
		
		if(!$res){
			echo "la ya error";
		}else{
			echo "ajout d'une randonnée";
			$dbh->close();
		}


		?>
	</form>
</body>
</html>
