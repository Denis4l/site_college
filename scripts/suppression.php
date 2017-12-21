<?php
	session_start ();
	$msg = array();

	if( (isset($_SESSION['login']) && isset($_SESSION['pwd'])) && XXXXXXXXXXXXXXXXXXXXX  ) {
		$fichier_suppr = $_POST['fichier'];
		
		if( file_exists ($fichier_suppr)) {
			unlink($fichier_suppr);
			$msg[] = 'Le fichier a été supprimé avec succès !';
			$msgInfo = 'success';
		} else {
			$msg[] = 'fichier introuvable ou déja supprimé :<br>'.$fichier_suppr;
			$msgInfo = 'danger';
		}

		$_SESSION['msg'] = $msg;
		$_SESSION['msgInfo'] = $msgInfo;
		header('location: /FTP.php');

	} else {
		echo 'Veuillez vous connecter...';
	}
?>