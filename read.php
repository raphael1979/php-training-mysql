<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Randonnées</title>
  <link rel="stylesheet" href="css/basics.css" media="screen" title="no title" charset="utf-8">
</head>
<body>
  <?php 
  try{
    $dbh = new PDO('mysql:host=localhost;dbname=reunion_island','root', 'root');
    // $dbh = null;
  }catch(PDOException $e){
    print"Error !:".$e->getMessage()."<br/>";
    die();
  }
  ?>
  <h1>Liste des randonnées</h1>
  <!-- Afficher la liste des randonnées -->

  <table>

    <tr>
      <th>name</th>
      <th>difficulty</th>
      <th>distance</th>
      <th>duration</th>
      <th>height_difference</th>
    </tr>
    <?php
    foreach ($dbh->query('SELECT * from hiking') as $row){
      echo '<tr>.$row["name"]." ".$row["distance"]."</tr> ' ;
    }
    ?>
  </table>
</body>
</html>
