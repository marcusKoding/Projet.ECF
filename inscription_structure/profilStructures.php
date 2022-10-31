<?php
session_start();
$bdd = mysqli_connect('mysql:localhost; dbname=structures', 'root', 'Marcus2022' );

if(isset($_POST['save_checkbox'])){
  $name = $_POST['name'];
  $agree = $_POST['agree'];
  $check3 = $_POST['check3'];
  $check4 = $_POST['check4'];

  $query="INSERT INTO structures.contract (name, agree) VALUES ('$name','$agree')";
  $query_run = mysqli_query($bdd,$query);

  if($query_run){
    $_SESSION['status'] = "Success";
    header('Location:profil.php');
  }else{
    $_SESSION['status'] = "Incertain";
    header('Location:profil.php');
  }
  }
