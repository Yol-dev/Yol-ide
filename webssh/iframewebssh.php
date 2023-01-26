<!-- Iframe de l'affichage de la console avec webssh à ajouter dans la page IDE -->

<?php
//Mettre les hosts dans des variables//
$hostwebssh = "serveurhostwebsssh";
$host = "ipserveur";
$port = "8888";
$username = "usernameserveur";

//Encoder le mot de passe en base64 (demandé par webssh sinon ne fonctionne pas)//
$password = "motdepasseserveur";
$passwordbase64 = base64_encode($password);
?>
<!-- iframe de la console webssh -->
<iframe title="WebSSH" id="console" src="http://<?php echo $hostwebssh ?>:<?php echo $port ?>/?command=clear@hostname=<?php echo $host ?>&username=<?php echo $username ?>&password=<?php echo $passwordbase64 ?>" height="275"></iframe>