<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Ajouter une randonnée</title>
	<link rel="stylesheet" href="css/basics.css" media="screen" title="no title" charset="utf-8">
</head>
<body>
	<a href="/read.php">Liste des données</a>
	<?php  
	try{
		$dbh = new PDO('mysql:host=localhost;dbname=reunion_island;charset=utf8','root', 'root');
    // $dbh = null;
	}catch(PDOException $e){
		print"Error !:".$e->getMessage()."<br/>";
		die();
	}

	$id= $_GET['id'];
	$res = "SELECT * FROM `hiking` WHERE `id`=".$id;
	foreach ($dbh->query($res) as $row) {
		$name = $row['name'];
		$difficulty = $row['difficulty'];
		$distance = $row['distance'];
		$duration = $row['duration'];
		$height_difference = $row['height_difference'];

		$name = $_POST['name'];
		$difficulty = $_POST['difficulty'];
		$distance = intval($_POST['distance']);
		$duration = $_POST['duration'];
		$height_difference = intval($_POST['height_difference']);

		$sql = "INSERT INTO hiking(name,difficulty,distance,duration,height_difference) VALUES(:name,:difficulty,:distance,:duration,:height_difference) ;";
		$sth = $dbh->prepare($sql);
		$res=$sth->execute(array(':name' => $name,':difficulty' => $difficulty,':distance' => $distance,':duration' => $duration,':height_difference' => $height_difference));
		
	}
	?>
	<h1>Ajouter</h1>
	<form action="" method="post">
		<div>
			<label for="name">Name</label>
			<input type="text" name="name" value="<?php echo $name;?>">
		</div>

		<div>
			<label for="difficulty">Difficulté</label>
			<select name="difficulty">
				<option <?php if($difficulty=="très facile"){echo "selected";}?> value="très facile">Très facile</option>
				<option <?php if($difficulty=="facile"){echo "selected";}?> value="facile">Facile</option>
				<option <?php if($difficulty=="moyen"){echo "selected";}?> value="moyen">Moyen</option>
				<option <?php if($difficulty=="difficile"){echo "selected";}?> value="difficile">Difficile</option>
				<option <?php if($difficulty=="très difficile"){echo "selected";}?> value="très difficile">Très difficile</option>
			</select>
		</div>
		
		<div>
			<label for="distance">Distance</label>
			<input type="text" name="distance" value="<?php echo $distance;?>">
		</div>
		<div>
			<label for="duration">Durée</label>
			<input type="duration" name="duration" value="<?php echo $duration;?>">
		</div>
		<div>
			<label for="height_difference">Dénivelé</label>
			<input type="text" name="height_difference" value="<?php echo $height_difference;?>">
		</div>
		<button type="button" name="button">Envoyer</button>
	</form>
</body>
</html>
