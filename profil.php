
<?php 
$bdd = new PDO('mysql:host=localhost;dbname=test', 'root', 'Marcus2022');
if(isset($_GET['id']) AND $_GET['id'] > 0){

    $getid = intval($_GET['id']);
    $requser = $bdd->prepare('SELECT * FROM test.user WHERE id = ?');
    $requser->execute(array($getid));
    $userinfo = $requser->fetch();

?>

<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="styleAcceuil.css">
  <link rel="stylesheet" href="/inscription_structure/styleStructure.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
<link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
<script src="/script.js" defer></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
  <title>Acceuil</title>
</head>
<body>
  <nav class="sidebar close">
    <header>
      <div class="image-text">
        <span class="image">
          <img src="/img/obl.png" alt="Logo">
        </span>

        <div class="text header-text">
          <span class="name">Orange Bleue</span>
          <span class="profession">Administration</span>
        </div>
      </div>
      <i class='bx bx-chevron-right toggle'></i>
    </header>

    <div class="menu-bar">
      <div class="menu">
          <li class="search-box">
            <i class='bx bx-search icon' ></i>
            <input type="text" placeholder="Recherche...">
          </li>
        <ul class="menu-links">
          <li class="nav-link">
            <a href="/index.php">
            <i class='bx bx-home-alt icon' ></i>
            <span class="text nav-text">Home</span>
            </a>
          </li>
          <li class="nav-link">
            <a href="/inscriptionFranchise.php">
            <i class='bx bx-buildings icon' ></i>
            <span class="text nav-text">Ajouter Partenaire</span>
            </a>
          </li>
          <li class="nav-link">
            <a href="/inscription_structure/inscriptionStructures.php">
            <i class='bx bx-comment-minus icon' ></i>
            <span class="text nav-text">Salles désactivées</span>
            </a>
          </li>
        </ul>
      </div>

      <div class="bottom-content">
      <li class="">
            <a href="/logout.php">
            <i class='bx bx-log-out icon' ></i>
            <span class="text nav-text">Déconnexion</span>
            </a>
          </li>

          <li class="mode">
            <div class="moon-sun">
              <i class='bx bx-moon icon moon' ></i>
              <i class='bx bx-sun icon sun' ></i>
            </div>

            <span class="mode-text text">Dark Mode</span>
            <div class="toggle-switch">
              <span class="switch"></span>
            </div>
          </li>
      </div>
    </div>
  </nav>
<section class="home">
    <div class="text"> Profil de <?php echo $userinfo['firstname']; ?> </div><br>
    <div class="container">
        <div class="row">
      <br><br>
      <div class="descript">
        <p> Gérant : <?php echo $userinfo['company']; ?></p>
        <p>Adresse : <?php echo $userinfo['adress']; ?></p>
        <p>mail : <?php echo $userinfo['email']; ?></p>
      </div>

 <div class="btn-switch">
<form action="POST" name="forms" action="./inscription_structure/profilStructures.php">
  <label class="switch">
  <input type="checkbox" name="check1" value="Vente de boissons" >
  <span class="slider round"></span>
  </label><p>gestion des plannings</p>
 
  <label class="switch">
  <input type="checkbox" name="check2" value="Vente de boissons">
  <span class="slider round"></span>
  </label>
   <p>Vente de boissons</p>
  
  <label class="switch">
  <input type="checkbox" name="agree" value="Accès a la Newsletters">
  <span class="slider round"></span>
  </label>
  <p>Accès a la Newsletters</p>
  <label class="switch">
  <input type="checkbox" name="name" value="Vente de compléments alimentaire">
  <span class="slider round"></span>
  </label>
  <p>Vente de compléments alimentaire</p><br><br>
<input  class="btn btn-primary" type="submit"  name="save_checkbox">
</form>
</div> 

</section>

</div>
</div>
  </div>
</body>
</html>

<?php
}
?>
