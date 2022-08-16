<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
  <title>Yousch Nouveau Utilisateur</title>
<body>

   <div class="container">
    <div class="container mt-5">
     <div class="card text-center col-md-6">
  <div class="card-body">
    <h3 class="card-title">Yousch Nouveau Utilisateur</h3>
    <p class=" mt-5">Bonjour {{ $user['name'] }},  <br> <br><br>voici vos informations de connection à Bridge PNR: </p>

    <p class="card-text mt-2"> <strong>Email:  {{$user['email']}}</strong> </p>
    <p class="card-text mt-2"> <strong>Mot de passe: {{$user['pass']}}</strong></p>
    <a href="http://consulat-benin-pnr.org/login" class="btn btn-primary">Cliquer ici pour vous connecter</a>
  </div><br><br>
  <div class="card-footer text-danger">
    Ces information sont strictement confidentiel et personnel. <br>
      Ne les partager surtout pas.
  </div>
    </div>
</div>
   </div>
</body>
</html>
