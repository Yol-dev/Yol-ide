<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <title>Yol.Dev - Fichiers</title>
</head>
<body>
    <?php if(session()->has('error')): ?>
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Erreur !</strong> <?php echo e(session()->get('error')); ?>

        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    <?php elseif(session()->has('success')): ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
      <strong>Succès !</strong> <?php echo e(session()->get('success')); ?>

      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    <?php else: ?>
    <?php endif; ?>
    <h3 style="text-align:center; margin:0px;">UID : <?php echo e($_SESSION['sessionUsername']); ?> - ID : <?php echo e($_SESSION['sessionID']); ?></h3>
    <h1 style="text-align:center;">Page Gestion de Fichier</h1>
    <form action="/create/file" method="post">
        <?php echo csrf_field(); ?>
        <div class="input-group mb-3">
            <input name="filename" type="text" class="form-control" required placeholder="Nom du fichier" aria-label="Nom du fichier" aria-describedby="button-addon2">
            <button class="btn btn-primary" type="submit" id="button-addon2">Créer</button>
        </div> 
    </form>
    <?php $__currentLoopData = $userfiles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $file): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php if($file->ownerid == $_SESSION['sessionID']): ?>
        <div class="btn-group" style="margin: 10px">
            <a href="/file/<?php echo e($file->uuid); ?>" class="btn btn-primary" aria-current="page"><?php echo e($file->name); ?>.c</a>
            <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#<?php echo e($file->uuid); ?>">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-gear" viewBox="0 0 16 16">
                    <path d="M8 4.754a3.246 3.246 0 1 0 0 6.492 3.246 3.246 0 0 0 0-6.492zM5.754 8a2.246 2.246 0 1 1 4.492 0 2.246 2.246 0 0 1-4.492 0z"/>
                    <path d="M9.796 1.343c-.527-1.79-3.065-1.79-3.592 0l-.094.319a.873.873 0 0 1-1.255.52l-.292-.16c-1.64-.892-3.433.902-2.54 2.541l.159.292a.873.873 0 0 1-.52 1.255l-.319.094c-1.79.527-1.79 3.065 0 3.592l.319.094a.873.873 0 0 1 .52 1.255l-.16.292c-.892 1.64.901 3.434 2.541 2.54l.292-.159a.873.873 0 0 1 1.255.52l.094.319c.527 1.79 3.065 1.79 3.592 0l.094-.319a.873.873 0 0 1 1.255-.52l.292.16c1.64.893 3.434-.902 2.54-2.541l-.159-.292a.873.873 0 0 1 .52-1.255l.319-.094c1.79-.527 1.79-3.065 0-3.592l-.319-.094a.873.873 0 0 1-.52-1.255l.16-.292c.893-1.64-.902-3.433-2.541-2.54l-.292.159a.873.873 0 0 1-1.255-.52l-.094-.319zm-2.633.283c.246-.835 1.428-.835 1.674 0l.094.319a1.873 1.873 0 0 0 2.693 1.115l.291-.16c.764-.415 1.6.42 1.184 1.185l-.159.292a1.873 1.873 0 0 0 1.116 2.692l.318.094c.835.246.835 1.428 0 1.674l-.319.094a1.873 1.873 0 0 0-1.115 2.693l.16.291c.415.764-.42 1.6-1.185 1.184l-.291-.159a1.873 1.873 0 0 0-2.693 1.116l-.094.318c-.246.835-1.428.835-1.674 0l-.094-.319a1.873 1.873 0 0 0-2.692-1.115l-.292.16c-.764.415-1.6-.42-1.184-1.185l.159-.291A1.873 1.873 0 0 0 1.945 8.93l-.319-.094c-.835-.246-.835-1.428 0-1.674l.319-.094A1.873 1.873 0 0 0 3.06 4.377l-.16-.292c-.415-.764.42-1.6 1.185-1.184l.292.159a1.873 1.873 0 0 0 2.692-1.115l.094-.319z"/>
                </svg>
            </button>              
        </div>

        <div class="modal fade" id="<?php echo e($file->uuid); ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h1 class="modal-title fs-5" id="exampleModalLabel">Paramètres pour " <?php echo e($file->name); ?>.c "</h1>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="/editname/<?php echo e($file->uuid); ?>" method="post">
                        <?php echo csrf_field(); ?>
                        <div class="input-group mb-3">
                            <input name="newname" type="text" class="form-control" required placeholder="Changer de nom" aria-label="Changer de nom" aria-describedby="button-addon2">
                            <button class="btn btn-primary" type="submit" id="button-addon2<?php echo e($file->uuid); ?>" onclick="save<?php echo e($file->uuid); ?>()">Sauvegarder</button>
                        </div>                     
                    </form>
                    <form style="text-align: center" action="/delete/<?php echo e($file->uuid); ?>">
                        <?php echo csrf_field(); ?>
                        <button class="btn btn-danger" id="button-addon1<?php echo e($file->uuid); ?>" onclick="save2<?php echo e($file->uuid); ?>()" type="submit">Supprimer</button>
                    </form>
                    <h6 style="text-align: center; color: grey; margin:15px;">Dernière modification : <?php echo e($file->updated_at); ?></h6>          
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                </div>
              </div>
            </div>
        </div>

        <script>
            function save<?php echo e($file->uuid); ?>()
            {
                document.getElementById("button-addon2<?php echo e($file->uuid); ?>").innerHTML = "<span class='spinner-border spinner-border-sm' role='status' aria-hidden='true'></span> Chargement...";
            }
            function save2<?php echo e($file->uuid); ?>()
            {
                document.getElementById("button-addon1<?php echo e($file->uuid); ?>").innerHTML = "<span class='spinner-border spinner-border-sm' role='status' aria-hidden='true'></span> Chargement...";
            }
        </script>
        <?php endif; ?>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      
    <p><a class="btn btn-primary" href="/auth/disconnect" role="button">Se déconnecter</a></p>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>
</html><?php /**PATH /home/valentin/Yol-ide/App Laravel Val/resources/views/file_management.blade.php ENDPATH**/ ?>