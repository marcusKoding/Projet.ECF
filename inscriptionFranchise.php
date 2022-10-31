<?php
$pdo= require_once './database.php';
const ERROR_REQUIRED = 'Veuillez renseigner ce champs';
const ERROR_TOO_SHORT = 'Ce champ est trop court';
const ERROR_PASSWORD_TOO_SHORT = 'Le mot de passe doit faire au moins 8 caractères';
const ERROR_EMAIL_INVALID = 'L\' Email n\'est pas valide';
$errors = [
  'firstname' => '',
  'company' => '',
  'adress' => '',
  'email' => '',
  'password' => ''
];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $input = filter_input_array(INPUT_POST, [
    'firstname' => FILTER_SANITIZE_SPECIAL_CHARS,
    'company' => FILTER_SANITIZE_SPECIAL_CHARS,
    'adress' => FILTER_SANITIZE_SPECIAL_CHARS,
    'email' => FILTER_SANITIZE_EMAIL,
  ]);
  $firstname = $input['firstname'] ?? '';
  $company = $input['company'] ?? '';
  $adress = $input['adress'] ?? '';
  $email = $input['email'] ?? '';
  $password = $_POST['password'] ?? '';

  if (!$firstname) {
    $errors['firstname'] = ERROR_REQUIRED;
  } elseif (mb_strlen($firstname) < 2) {
    $errors['firstname'] = ERROR_TOO_SHORT;
  }
  if (!$company) {
    $errors['company'] = ERROR_REQUIRED;
  } elseif (mb_strlen($company) < 2) {
    $errors['company'] = ERROR_TOO_SHORT;
  }
  if (!$adress) {
    $errors['adress'] = ERROR_REQUIRED;
  } elseif (mb_strlen($adress) < 2) {
    $errors ['adress'] = ERROR_TOO_SHORT;
  }
  if (!$email) {
    $errors['email'] = ERROR_REQUIRED;
  } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors['email'] = ERROR_EMAIL_INVALID;
  }
  if (!$password) {
    $errors['password'] = ERROR_REQUIRED;
  } elseif (mb_strlen($password) < 8) {
    $errors['password'] = ERROR_PASSWORD_TOO_SHORT;
  }


  if (empty(array_filter($errors, fn ($e) => $e !== ''))) {
    $statement = $pdo->prepare('INSERT INTO user VALUES (
      DEFAULT,
      :firstname,
      :company,
      :adress,
      :email,
      :password

    )');
    $hashedPassword = password_hash($password, PASSWORD_ARGON2I);
    $statement->bindValue(':firstname', $firstname);
    $statement->bindValue(':company', $company);
    $statement->bindValue(':adress', $adress);
    $statement->bindValue(':email', $email);
    $statement->bindValue(':password', $hashedPassword);
    $statement->execute();
    header('Location: /');
  }

}


?>


<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
  <link rel="stylesheet" href="/style.css">
  <title>Inscription</title>
</head>
<body>
<section class="vh-100 gradient-custom">
  <div class="container py-5 h-100">
    <div class="row justify-content-center align-items-center h-100">
      <div class="col-12 col-lg-9 col-xl-7">
        <div class="card shadow-2-strong card-registration" style="border-radius: 15px;">
          <div class="card-body p-4 p-md-5">
            <h3 class="mb-4 pb-2 pb-md-0 mb-md-5">Formulaire d'ajout de partenaire</h3>

            <form action="/inscriptionFranchise.php" method="POST">

              <div class="row">
                <div class="col-md-6 mb-4">

                  <div class="form-outline">
                    <label class="form-label" for="firstName" name="firstname" >Nom</label>
                    <input type="text" id="firstname" class="form-control form-control-lg" name="firstname" value="<?= $firstname ??'' ?>" />
                    <?php if($errors['firstname']) : ?>
                      <p class="text-danger"><?= $errors['firstname'] ?></p>
                    <?php endif; ?>  
                  </div>

                </div>
                <div class="col-md-6 mb-4">

                  <div class="form-outline">
                    <label class="form-label" for="company" name="company">ID</label>
                    <input type="text" id="company" class="form-control form-control-lg" name="company" value="<?= $company ??'' ?>" />
                    <?php if($errors['company']) : ?>
                      <p class="text-danger"><?= $errors['company'] ?></p>
                    <?php endif;?>  
                  </div>

                </div>
              </div>

              <div class="row">
                <div class="col-md-14 mb-4 d-flex align-items-center">

                  <div class="form-outline datepicker w-100">
                    <label for="adress" class="form-label" name="address">Adresse</label>
                    <input type="text" class="form-control form-control-lg" id="Adresse" name= "adress" value="<?= $adress ??'' ?>" />
                    <?php if($errors['adress']) : ?>
                      <p class="text-danger"><?= $errors['adress'] ?></p>
                    <?php endif;?>  
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-md-6 mb-4 pb-2">

                  <div class="form-outline">
                    <label class="form-label" for="email" name="email">Email</label>
                    <input type="email" id="email" class="form-control form-control-lg" name ="email"  value="<?= $email ??'' ?>" />
                    <?php if($errors['email']) : ?>
                      <p class="text-danger"><?= $errors['email'] ?></p>
                    <?php endif;?>  
                  </div>

                </div>
                <div class="col-md-6 mb-4 pb-2">

                  <div class="form-outline">
                    <label class="form-label" for="password" name="password">Mot de passe</label>
                    <input type="text" id="password" class="form-control form-control-lg" name="password" value="<?= $password ??'' ?>" />
                    <?php if($errors['password']) : ?>
                      <p class="text-danger"><?= $errors['password'] ?></p>
                    <?php endif;?>  
                  </div>

                </div>
              </div>
              <div class="row buttonspace">
              <div class="pt-5 text-center">
                <a class="btn btn-outline-secondary btn-lg" href="/index.php" role="button">Retour</a>
                <button input class="btn btn-outline-success btn-lg" type="submit" value="valider"> Sauvegarder</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<style>
  .btn{
    margin: 12px;
    padding: 0.5rem 2.5rem 0.5rem 2.5rem;
  }

</style>

</body>
</html>
