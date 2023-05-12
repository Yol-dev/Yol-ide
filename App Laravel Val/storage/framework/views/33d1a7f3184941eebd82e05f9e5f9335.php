<?php
  @session_start();
  
  if (isset($_SESSION['sessionUsername']) && isset($_SESSION['sessionID']))
  {
    redirect("/app")->send();
  }
  else
  {

  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Yol.Dev - Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>
<body>
    <?php if(session()->has('error')): ?>
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
      <strong>Erreur !</strong> <?php echo e(session()->get('error')); ?>

      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    <?php endif; ?>
    <form action="/auth/register" method="post">
        <?php echo csrf_field(); ?>
        <input type="email" name="email" id="email" placeholder="email" required>
        <p><input type="text" name="username" id="username" placeholder="username" required></p>
        <p><input type="password" name="password" id="password" placeholder="password" required></p>
        <p><button type="submit">Créer son compte</button></p>
    </form>
    <p><h5>Déjà un compte ? <a href="/login">Se connecter</a></h5></p>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>
</html><?php /**PATH /home/valentin/Yol-ide/App Laravel Val/resources/views/register.blade.php ENDPATH**/ ?>