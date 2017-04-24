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
				<option value="très facile">Très facile</option>
				<option value="facile">Facile</option>
				<option value="moyen">Moyen</option>
				<option value="difficile">Difficile</option>
				<option value="très difficile">Très difficile</option>
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
			$dbh = new PDO('mysql:host=localhost;dbname=colyseum','root', 'root');
		// $dbh = null;
		}catch(PDOException $e){
			print"Error !:".$e->getMessage()."<br/>";
			die();
		}

		$name = $_POST['name'];
		$difficulty = $_POST['difficulty'];
		$distance = (int)$_POST['distance'];
		$duration = (int)$_POST['duration'];
		$height_difference = (int)$_POST['height_difference'];

		$sql = 'INSERT INTO name, difficulty, distance, duration, height_difference FROM hiking WHERE name = :name AND difficulty = :difficulty AND distance = :distance AND duration = :duration AND height_difference = :height_difference';
		$sth = $dbh->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
		$sth->execute(array(':name' => $name, ':difficulty' => $difficulty, ':distance' => $distance, ':duration' => $duration, ':height_difference' => $height_difference));




		?>
	</form>
</body>
</html>
