<?php
session_start();
?>
<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

    <title>Administration - Orange bleu</title>
  </head>
     <body>
       <section class="vh-100 gradient-custom">
       <div class="container py-5 h-100">
       <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-12 col-md-8 col-lg-6 col-xl-5">
        <div class="card bg-dark text-white" style="border-radius: 1rem;">
          <div class="card-body p-5 text-center">

            <div class="mb-md-5 mt-md-4 pb-5">

              <h2 class="fw-bold mb-2 text-uppercase title">Connexion</h2>
              <p class="text-white-50 mb-5">Entrer votre identifiant et mot de passe</p>
     <form method="POST" action="login.php">
              <div class="form-outline form-white mb-4">
                <input type="text" id="text" class="form-control form-control-lg" placeholder="Email" name="email" autocomplete="off"/>

              </div>

              <div class="form-outline form-white mb-4">
                <input type="password" id="typePasswordX" class="form-control form-control-lg" placeholder="Mot de passe" name="pass" />

              </div>

              <p class="small mb-5 pb-lg-2"><a class="text-white-50" href="#" name="forget">mot de passe oublié?</a></p>

              <button class="btn btn-outline-light btn-lg px-5" type="submit" name="submit">Login</button>
      </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  </section>

  </body>
</html>