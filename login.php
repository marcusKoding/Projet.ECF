<?php
session_start();

if (isset($_POST['submit']))
{
  $email = $_POST['email'];
  $pass = $_POST['pass'];

  $db = new PDO('mysql:localhost; dbname=loginsystem', 'root', 'Marcus2022' );

  $sql = "SELECT * FROM loginsystem.user where email = '$email' ";
  $result = $db->prepare($sql);
  $result->execute();

  if($result->rowCount() > 0){

    $data = $result->fetchAll();
    if (password_verify($pass, $data[0]["password"]))
    {
      header('Location:/index.php');
      $_SESSION['email'] = $email;
    }

  }else{
    header('Location:/connexion.php');
  }
}

?>
