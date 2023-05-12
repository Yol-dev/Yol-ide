<!doctype html>
<!-- Pour dire c est du htlm au navigateur -->
<html lang="fr"> 
<!-- Langue par defauts du site -->

<head>
  <meta charset="utf-8"> 
    <!-- l'encodage de caractères utilisé du site -->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
        <!-- Pour l adaptativité du site sur mobile -->
          <meta http-equiv="X-UA-Compatible" content="IE=edge"> 
            <!-- Compatibilite avec edge -->
              <title>App - Yol.dev</title> 
                <!-- Titre de la page -->
                  <link rel="stylesheet" href="https://yolnews.fr/assets laravel/ide.css"> <style></style> 
                  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
                    <!-- Link Css dans le sources ou ecris ton Css entre <style></style> -->
                      <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script> 
                        <!-- Bibliothèques Pour les icon -->
                          <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script> 
                            <!-- Le site :https://ionic.io/ionicons -->
                              <script src="https://yolnews.fr/assets laravel/js/ide.js"></script>
                            <!-- Link Js dans le sources ou ecris ton Js entre -->
                          <script src="https://yolnews.fr/assets laravel/js/codemirror/lib/codemirror.js"></script>
                        <!--Librairie code mirror, ne pas suprrimer-->
                      <link href="https://yolnews.fr/assets laravel/js/codemirror/lib/codemirror.css" rel="stylesheet"/>
                    <!--Librairie code mirror, ne pas suprrimer-->
                  <script src="https://yolnews.fr/assets laravel/js/codemirror/mode/clike/clike.js"></script>
                <!--Librairie code mirror, ne pas suprrimer-->
              <link href="https://yolnews.fr/assets laravel/js/codemirror/theme/dracula.css" rel="stylesheet"/>
            <!--Librairie code mirror, ne pas suprrimer-->
          <script src="https://yolnews.fr/assets laravel/js/codemirror/addon/hint/show-hint.js"></script>
        <!--Librairie code mirror, ne pas suprrimer-->
      <script src="https://yolnews.fr/assets laravel/js/codemirror/addon/hint/anyword-hint.js"></script>
    <!--Librairie code mirror, ne pas suprrimer-->
  <link href="https://yolnews.fr/assets laravel/js/codemirror/addon/hint/show-hint.css" rel="stylesheet"/>
</head>

  <body style="background-color: rgb(46, 46, 102)">
    <?php if(session()->has('success')): ?>
    <div style="z-index: 3;" class="alert alert-success alert-dismissible fade show" role="alert">
      <strong>Succès !</strong> <?php echo e(session()->get('success')); ?>

      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    <?php endif; ?>
      <div class="parent">
        <div class="left" id="left">
          <div class="headLeft">
            <h1 class="headLeftH1">Yol.dev 0.1</h1>
            <ion-icon name="apps-outline" class="LeftIcon" ></ion-icon>
          </div>
          <div class="buttonExecuter">
            <button>Executer</button>
            <button>Partager</button>
            <a class="btn btn-primary" href="/file" role="button">Page Ficher</a>
          </div>
          <div class="fileLeft">     
            <form action="/create" method="post">
            <?php echo csrf_field(); ?>
              <input name="searchbar" id="searchbar" type="text" placeholder="Nom d'un fichier...">
            </form>  
                    <?php $__currentLoopData = $file; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $f): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <?php if($f->ownerid == $_SESSION['sessionID']): ?>     
                      <a href="/file/<?php echo e($f->uuid); ?>"><button id="files"><?php echo e($f->name); ?>.c</button></a>
                      <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </div>
          <div class="fileOpen">
            <ion-icon name="hammer-outline" onclick="BP_color()" class="LeftIcon"></ion-icon>
            <div class="PageColor" id="color">
              <div id="colorH1">
                <h1>Color</h1>
              </div>
              <div id="colorBtn">
                <button id="btn1" class="btnC">1</button>
                <button id="btn2" class="btnC">2</button>
                <button id="btn3" class="btnC">3</button>
                <button id="btn4" class="btnC">4</button>
                <button id="btn5" class="btnC">5</button>
                <button id="btn6" class="btnC">6</button>
                <button id="btn7" class="btnC">7</button>
                <button id="btn8" class="btnC">8</button>
              </div>
            </div>
            <ion-icon name="mail-outline" class="LeftIcon"></ion-icon>
            <ion-icon name="shield-checkmark-outline" class="LeftIcon"></ion-icon>
          </div>
        </div>
        <div class="right">
            <span class="colorSyntaxe">
            <form method="post" action="/save/<?php echo e($fileuuid); ?>">
              <?php echo csrf_field(); ?>
              <textarea id="editor" name="editor" class="text"><?php echo e($filecontent); ?></textarea>
              <button type="submit" class="btn btn-primary">Enregistrer</button>
            </form>
            
  <script>
    var editor = CodeMirror.fromTextArea(document.getElementById('editor'), 
    {
        mode: "text/x-c",
        theme: "dracula",
        lineNumbers: true,
        dragDrop: true,
        tabSize: 4,
        extraKeys: {"Ctrl-Space": "autocomplete"},
    });
    editor.setSize("", "95vh");
  </script> 
            </span>
        </div>
      </div>
    <script>// pour les differents themes
          function changeStyle(event) {
        var link = document.getElementsByTagName("link")[0];
        var target = event.target;
        var id = target.id;
        var href;

        switch (id) {
          case'btn1':href="ide1.css";break;
          case'btn2':href="IDE2.css";break;
          case'btn3':href="IDE3.css";break;
          case'btn4':href="IDE4.css";break;
          case'btn5':href="IDE5.css";break;
          case'btn6':href="IDE6.css";break;
          case'btn7':href="IDE7.css";break;
          case'btn8':href="IDE8.css";break;
          default:href="ide1.css";
        }

        document.body.classList.add("fade-out");
        setTimeout(() => {link.setAttribute("href", href);document.body.classList.remove("fade-out");}, 500);}

      document.getElementById("btn1").addEventListener("click", changeStyle);
      document.getElementById("btn2").addEventListener("click", changeStyle);
      document.getElementById("btn3").addEventListener("click", changeStyle);
      document.getElementById("btn4").addEventListener("click", changeStyle);
      document.getElementById("btn5").addEventListener("click", changeStyle);
      document.getElementById("btn6").addEventListener("click", changeStyle);
      document.getElementById("btn7").addEventListener("click", changeStyle);
      document.getElementById("btn8").addEventListener("click", changeStyle);
      document.body.onclick = function (e) {
        
}
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
  </body>
</html>

<!--
<!DOCTYPE html>
<html>
  <head>
    <title>Exemple de bouton pour la suppression de contenu de la div2 et la restauration avec une transition</title>
    <style>
      #div2 {
        transition: opacity 0.5s ease-in-out; /* Ajout d'une transition de 0,5 seconde pour la propriété d'opacité */
      }
    </style>
  </head>
  <body>
    <div id="div1">
      <button onclick="supprimerContenu()">Supprimer le contenu de la div2</button>
    </div>
    <div id="div2">
      <p>Contenu de la div2 que nous souhaitons supprimer.</p>
      <p>Plus de contenu de la div2 que nous souhaitons supprimer.</p>
    </div>
    
    <script>
      var contenuSupprime = false;
      var div2 = document.getElementById("div2");
      var contenuOriginal = div2.innerHTML; // Sauvegarde du contenu d'origine de la div2
      
      function supprimerContenu() {
        if (!contenuSupprime) {
          div2.style.opacity = 0; // Applique une opacité de 0 pour supprimer le contenu de la div2
          contenuSupprime = true;
        } else {
          div2.innerHTML = contenuOriginal;
          div2.style.opacity = 1; // Applique une opacité de 1 pour restaurer le contenu d'origine de la div2
          contenuSupprime = false;
        }
      }
    </script>
  </body>
</html>
-->

<!--https://www.youtube.com/watch?v=ZXtWarf3lvg&t=189s-->

<!--https://www.youtube.com/watch?v=02L994Xth2M-->

<!--
___________________________________________________________________________________________________________________
|                                                                                                                  |
|  ,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,((((,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,  |
|  ,@@@@@@@,,,,,,,@@@@@@#,,,,,,,,,,,,,,,,,,&@@@@@,,,,,,,,,,,,,,,,,,,,,,,,,,,&@@@,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,  |
|  ,,(@@@@@@,,,,,@@@@@@*,,,,,,,,,,,,,,,,,,,&@@@@@,,,,,,,,,,,,,,,,,,,,,,,,,,*@@@#,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,  |
|  ,,,,@@@@@@*,#@@@@@@,,,,,,,,,,,,,,,,,,,,,&@@@@@,,,,,,,,,,,,,,,,,,,,,,,,,,%@@@,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,  |
|  ,,,,,&@@@@@@@@@@@/,,,,(@@@@@@@@@@@@,,,,,&@@@@@,,,,,,,,,,,,,,,*@@@@@@@@@/@@@#,,,,,@@@@@@@@@@,,,%@@@,,,,,,,*@@@%  |
|  ,,,,,,/@@@@@@@@@*,,,%@@@@@@@@@@@@@@@@,,,&@@@@@,,,,,,,,,,,,,(@@@@*,,,,,@@@@@*,,/@@@@,,,,,*@@@%,*@@@#,,,,,%@@@*,  |
|  ,,,,,,,,@@@@@@&,,,,/@@@@@/,,,,,,@@@@@@,,&@@@@@,,,,,,,,,,,,#@@@*,,,,,,,,@@@@,,(@@@********(@@@,,&@@@,,,,@@@@,,,  |
|  ,,,,,,,,&@@@@@/,,,,/@@@@@/,,,,,,@@@@@@,,&@@@@@,,,,,,,,,,,,@@@%,,,,,,,,*@@@%,,@@@@@@@@@@@@@@@/,,,@@@#,(@@@/,,,,  |
|  ,,,,,,,,&@@@@@/,,,,,@@@@@@@/,*%@@@@@@/,,&@@@@@,,,,@@@@(,,,@@@@,,,,,,,*@@@@,,,@@@@,,,,,,,,,,,,,,,/@@@&@@@,,,,,,  |
|  ,,,,,,,,&@@@@@/,,,,,,/@@@@@@@@@@@@@@,,,,&@@@@@,,,@@@@@@@,,,#@@@@@%@@@@@@@%,,,,&@@@@&%%@@@@@,,,,,,&@@@@%,,,,,,,  |
|  ,,,,,,,,/@@@@@,,,,,,,,,,,#@@@@@@(,,,,,,,/@@@@(,,,,*@@@,,,,,,,,%@@@@(,,#@@,,,,,,,,#@@@@@(,,,,,,,,,,@@@,,,,,,,,,  |
|                                                                                                                  |
|__________________________________________________________________________________________________________________|

--><?php /**PATH /home/valentin/Yol-ide/App Laravel Val/resources/views/ide.blade.php ENDPATH**/ ?>