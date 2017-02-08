<?php  
//Ecrivez votre adresse e-mail entre les guillemets  
$destinataire='cbrailly@gmail.com';  
?>


<!DOCTYPE html>  
<html lang="fr">  


<head>  
<link rel="stylesheet" href="../css/formulaire.css">
<link href="https://fonts.googleapis.com/css?family=Titillium+Web" rel="stylesheet">
  <title>Contact</title>   
  <meta charset="UTF-8"/>
  <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
  <meta http-equiv="content-type" content="Content-type:text/html;charset=iso-8859-1">  
</head>  


<body style="direction: ltr;">   

<?php  
$Envoi="\n".'<p class="envoyer">  
<input name="envoi" tabindex="4" value="Envoyer" type="submit"></p>';  
if (isset($_POST['message']))  
  {  
    // La variable $verif va nous permettre d'analyser si la sémantique de l'email est bonne  
    $verif='#^[\w.-]+@[\w.-]+\.[a-zA-Z]{2,5}$#';  
    //quelques remplacements pour les specialchars  
    $message=preg_replace('#(<|>)#', '-', $_POST['message']);  
    $message=str_replace('"', "'",$message);  
    $message=str_replace('&', 'et',$message);  
    $objet=preg_replace('#(<|>)#', '-', $_POST['objet']);  
    $objet=str_replace('"', "'",$objet);  
    $objet=str_replace('&', 'et',$objet);  
    // On assigne et/ou protège nos variables  
    $votremail=stripslashes(htmlentities($_POST['votremail']));  
    $message=stripslashes(htmlspecialchars($message));  
    $objet=stripslashes(htmlspecialchars($objet));  
    //input envoi/previsualiser  
    $envoi=htmlentities($_POST['envoi']);  
    //on enlève les espaces  
    $votremail=trim($votremail);  
    $message=trim($message);  
    $objet=trim($objet);  

    /*On vérifie si l'e mail et le message sont pleins, et on agit en fonction.  
      (on affiche Apercu du resultat, tel ou tel champ est vide, etc...*/  
    //Si ca ne vas pas (mal rempli, mail non valide...)  
    if((empty($message))or(empty($objet))or(!preg_match($verif,$votremail)))  
      {  
        //les 3 champs sont vides  
        if(empty($votremail)and(empty($message))and(empty($objet)))  
          {  
            echo '<p>Tous les champs doivent être rempli pour pouvoir envoyer le mail.</p>';  
            $message='';$votremail='';$objet='';$apercu_resultat='';  
          }  
        //un des champs est vide  
        else  
          {  
            if(!preg_match($verif,$votremail))  
              echo'<p>Votre adresse e-mail n\'est pas valide.</p>';  
            else  
            {  
              echo'<p>Un des champs n\'est pas rempli, il faut remplir tout les champ pour envoyer le mail.</p>';  
              if(empty($message))  
                $apercu_resultat='';  
            }  
          }  
      }  
    //Si les deux sont pleins et que l'adresse est valide, on envoie on on prévisualise sans envoi  
    else  
      {  
        $domaine=preg_replace('#[^@]+@(.+)#','$1',$votremail);  
        $DomaineMailExiste=checkdnsrr($domaine,'MX');  
        if(!$DomaineMailExiste)  
          echo'<p>Le nom de domaine de l\'adresse e-mail que vous avez donné n\'existe pas.</p>';  
        elseif(!empty($envoi))  
            {  
              $objet='[SITE] : '.$objet;  
              $headers='From:'.$votremail."\r\n".'To:'."\r\n".'Subject:'.$objet."\r\n".'Content-type:text/plain;charset=iso-8859-1'."\r\n".'Sent:'.date('l, F d, Y H:i');  
              if(mail($objet,$message,$headers))  
              {  
                echo '<p>Votre message a bien été envoyé. Merci !</p>';  
                $Envoi='';  
              }  
              else  
                echo'<p>Un problème est survenu durant l\'envoi du mail.</p>';  
            }  
        else  
          echo'<p>Une condition innatendue est survenue lors de l\'exécution du script.</p>';  
      }   
  }  
else  
  {  
    echo'<p>Pour nous envoyer un mail, remplissez ce rapide formulaire.</p>';
  $votremail='';$message='';  
  }  
$bas_formulaire=$Envoi;  
?>  

<form id='contact' method="post" action="<?php echo $_SERVER['PHP_SELF'];?>" enctype="multipart/form-data">  
  <div id="centrage"><p id='objet'><label for='objet'>Objet<br>  
  <input type='text' name='objet' id='objet' tabindex='10' size='30'></label></p>   

  <p id="mail"><label for="mail">E-mail<br>  
  <input name="votremail" tabindex="20" size="30" type="text" id="mail" value="<?php echo $votremail; ?>"></label></p>  
    
  <p id="message"><label for="message">Message<br>  
  <textarea tabindex="30" rows="20" cols="120" name="message" id="message"><?php echo $message; ?></textarea>  
  </label></p>  
<?php echo $bas_formulaire;?>  </div>
</form>

</body>
</html>