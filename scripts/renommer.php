<?php
	session_start ();
	$msg = array();

	if( (isset($_SESSION['login']) && isset($_SESSION['pwd'])) && XXXXXXXXXXXXXXXXXXXXX ) {
		$fichier_old = $_POST['fichier'];

		$fichier_new = $_POST['fichier_new'];
		$fichier_ext = $_POST['ext'];
		$fichier_new = htmlentities($fichier_new).'.'.$fichier_ext;

		$dossier = $_POST['dossier'];
		
		if( file_exists ($fichier_old)) {
			if (rename ($fichier_old, $dossier.$fichier_new)) {
				$msg[] = 'Le fichier a été renommé avec succès en <b>'.$fichier_new.'</b> !';
				$msgInfo = 'success';
			} else {
				$msg[] = 'Erreur. Le fichier n\'a pas été renommé ! Veuillez essayer ultérieurement.';
				$msgInfo = 'danger';				
			}
		} else {
			$msg[] = 'Fichier introuvable ou déja supprimé :<br>'.$fichier_old;
			$msgInfo = 'danger';
		}

		$_SESSION['msg'] = $msg;
		$_SESSION['msgInfo'] = $msgInfo;
		header('location: /FTP.php');

	} else {
		echo 'Veuillez vous connecter...';
	}
?>