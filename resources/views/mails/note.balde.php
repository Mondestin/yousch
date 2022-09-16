<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
  <title>Yousch Note Notification</title>
<body>

   <div class="container">
    <div class="container mt-5">
     <div class="card text-center col-md-6">
  <div class="card-body">
    <h3 class="card-title">Yousch Notification</h3>
    <p class=" mt-5">Bonjour {{ $user['name'] }},  <br> <br><br>Une note a été ajouté ou modifié, veuillez vous connecter pour la consulté</p>
    <a href="https://www.yousch-app.site" class="btn btn-primary">Cliquer ici pour vous connecter</a>
  </div><br><br>
  <div class="card-footer text-danger">
  </div>
    </div>
</div>
   </div>
</body>
</html>
