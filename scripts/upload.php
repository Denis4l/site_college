<?php
	session_start ();

	if( isset($_FILES['file']) AND ( (isset($_SESSION['login']) && isset($_SESSION['pwd']))) AND XXXXXXXXXXXXXXXXXXXXX  ) ) {

		$extensions = array('.php', '.phtml', '.asp', '.php1', '.php2', '.php3', '.php4', '.php5', '.htaccess');
		$repertoire = $_POST['repertoire'];
		$dossier = '../FTP/'.$repertoire.'/';
		
		$fichier = basename($_FILES['file']['name']);
		$filename = $dossier.$fichier;
		$msg = array();

		for($i=0; $i<count($_FILES['file']['name']); $i++) {
			$fichier = basename($_FILES['file']['name'][$i]);
			$filename = $dossier.$fichier;
			$extension = strrchr($_FILES['file']['name'][$i], '.');

			if(in_array($extension, $extensions)) {
				$msg[] = 'Le fichier &laquo; <b>'.$fichier.'</b> &raquo; est interdit.';
				$msgInfo = 'danger';
			} else {
				if (file_exists($filename)) {
					$msg[] = 'Le fichier &laquo; <b>'.$fichier.'</b> &raquo; existe déjà ! Il n\'a pas été copié.';
					$msgInfo = 'danger';
				} else {
					if(!move_uploaded_file($_FILES['file']['tmp_name'][$i], $dossier . $fichier)) {
						$msg[] = 'Echec de l\'upload du fichier &laquo; <b>'.$fichier.'</b> &raquo; !';
						$msgInfo = 'danger';
					} else {
						$msg[] = 'Fichier &laquo; <b>'.$fichier.'</b> &raquo; ajouté avec succès au serveur.';
						$msgInfo = 'success';
					}
				}
			}
		}

		$_SESSION['msgInfo'] = $msgInfo;
		$_SESSION['msg'] = $msg;
		header('location: /FTP.php');
		

	} else {
		echo 'Veuillez vous connecter...';
	}
?>
