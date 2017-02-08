<!DOCTYPE HTML> 
<html lang="fr"> 
<head> 
<meta charset="utf-8">  
</head> 
<body>
<?php
include('functions.php');
$headers = headers();

mail($_POST['destinataire'], $_POST['sujet'], $_POST['message'], implode("\r\n", $headers));
// michael.de-laborde-noguez@etudiant.univ-reims.fr
echo "<h1>Envoyé</h1>";
?>
</body> 
</html> 