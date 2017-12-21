<?php
	session_start ();
	$msg = array();

	if( (isset($_SESSION['login']) && isset($_SESSION['pwd'])) && XXXXXXXXXXXXXXXXXXXXX ) {

		$nom_dossier = $_POST['nom_dossier'];
		$dossier = '../FTP/'.$nom_dossier.'/';
		
		if(!is_dir($dossier)) {
			mkdir($dossier);
			$msg[] = "Dossier créé avec succès !";
			$msgInfo = 'success';
		} else {
			$msg[] = "Dossier déjà existant !";
			$msgInfo = 'success';
		}
	} else {
		echo "Veuillez vous connecter...";
	}
	
	$_SESSION['msg'] = $msg;
	$_SESSION['msgInfo'] = $msgInfo;
	header('location: /FTP.php');
?>

