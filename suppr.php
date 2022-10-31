<?php

$objetPdo = new PDO('mysql:host=localhost;dbname=test','root','Marcus2022');

$pdoStat= $objetPdo->prepare('DELETE  FROM user WHERE id=:num LIMIT 1');

$pdoStat->bindValue(':num', $_GET['deletePart'],PDO::PARAM_INT);

$executeIsOk = $pdoStat->execute();

if($executeIsOk){
  $message = 'Le compte a bien été supprimé';
}else{
  $message = 'Echec de la suppression';
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <h1>Suppression</h1>
  <p><?= $message ?></p>
</body>
</html>
<a href="/index.php">retour</a>