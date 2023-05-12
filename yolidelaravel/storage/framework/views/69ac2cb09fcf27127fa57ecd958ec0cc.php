<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="loginstyle.css">  <!--style css intégré -->
        <title>Conexion Claledar'it </title>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Sora:wght@100;200;300;400;500;600;700;800&display=swap" rel="stylesheet"> 
    </head>
    <body> 
        <div class="containeur"> <!--Espace total de la page -->
             <div class="logo">  <!--emplacement logo-->
                <p> 
                    <img src="Logo.png" class="Logo" alt="Logo" />  <!--image logo -->
                </p>
            </div>
            <div class="partiegauche">
                <div class="bandeaudeconnection">  <!--Zone du Bandeau de connection -->
                    <div class="Titre">   
                        <p class= "titreprincipale">Créer votre compte</p>    
                        <p class="soustitre">Completement gratuit pour toujours</p>
                    </div>
                    <p class= "soustitre"> </p>
                     <form method="post" action="traitement.php" class="renterdemails" >
                        <p>
                            <label for="pseudo"> </label>
                            <input autocomplete="off" type="email" class="renterdemail" name="pseudo" id="pseudo" placeholder="Mail" size="40" maxlength="30" required/>    <!--renter de l'eMail -->
                        </p>
                    </form>
                    <form method="post" action="traitement.php" class="renterdepassword" > 
                        <p>
                            <label for="motdepasse"> </label>
                            <input autocomplete="off" type="password" name="motdepasse" class="rentermotdepasse" id="motdepasse" placeholder="Password" size="40" maxlength="15" required/>  <!--rentrer du mot de passe -->
                        </p>
                    </form>
                    <form action="https" class="boutondevalidation">
                        <p class="buttonconnection">   
                            <button  id="button" type="button" >Sign in</button>  <!--bouton de validation -->
                        </p>
                    </form>
                    <p class="boutoninscription"><a  href="inscriptionpage.html">Sign up</a></p>
                </div>
            </div> 
            <div class="partiedroite">
                <img src="canyon6.png" class="fondcanyon" width="auto" height="650" logo="image de fond canyon" />
            </div>
        </div>
        

    </body>
</html>
<?php /**PATH C:\Users\Elias\Documents\GitHub\Yol-ide\yolide laravel\resources\views/login.blade.php ENDPATH**/ ?>