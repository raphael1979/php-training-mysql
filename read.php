<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Randonnées</title>
  <link rel="stylesheet" href="css/basics.css" media="screen" title="no title" charset="utf-8">
</head>
<body>
  <a href="create.php">ajouter une rando</a>
  <?php 
  try{
    $dbh = new PDO('mysql:host=localhost;dbname=reunion_island;charset=utf8','root', 'root');
    // $dbh = null;
  }catch(PDOException $e){
    print"Error !:".$e->getMessage()."<br/>";
    die();
  }
  ?>
  <h1>Liste des randonnées</h1>
  <!-- Afficher la liste des randonnées -->

  <table border=1px>

    <tr>
      <th>name</th>
      <th>difficulty</th>
      <th>distance</th>
      <th>duration</th>
      <th>height_difference</th>
    </tr>
    <?php
    foreach ($dbh->query('SELECT * FROM hiking') as $row){
      echo ('<tr><td><a href="update.php?id='.$row['id'].'">'.$row["name"].'</a></td><td>'.$row["difficulty"].'</td><td>'.$row["distance"].'</td><td>'.$row["duration"].'</td><td>'.$row["height_difference"].'</td></tr>') ;
    }
    ?>
  </table>
</body>
</html>
