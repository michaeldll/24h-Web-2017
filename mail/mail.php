<!DOCTYPE HTML> 
<html lang="fr"> 
<head> 
<meta charset="utf-8">
<style type="text/css">
    .titanic {float: none;}
    html { margin-left: 200px; margin-right: 200px}
</style>

<!-- le bootstrap, yo: -->

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>

</head> 
<body>
<form action="mailing.php" method="post">
<h1> Mail </h1>
<?php  
	include('functions.php');

	displayField ('destinataire', 'destinataire', 'Destinataire', 'text');

	displayField ('sujet', 'sujet', 'Sujet', 'text');

    displayTextarea ('Message', '5', 'message');
?>
<div class="envoyer">
<button type="submit" class="btn_btn-default"> ENVOYER! </button>
</div>
</form>
</body> 
</html> 
<!--copyright 10000-tron super sérieux lol mdr !!!1!-->