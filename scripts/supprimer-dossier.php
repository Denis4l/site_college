<?php
	session_start ();
	$msg = array();

	if( (isset($_SESSION['login']) && isset($_SESSION['pwd'])) && XXXXXXXXXXXXXXXXXXXXX  ) {
	
		$del_dossier = $_POST['del_dossier'];
		$dossier = '../FTP/'.$del_dossier.'/';
		
		function dossier_vide($repertoire) {
			$dp = opendir($repertoire) ;
			while ( $entree = readdir($dp) ) {
				if ( ($entree != '.') && ($entree != '..') ) {
					return FALSE ;
				}
			}
			closedir($dp) ;
			return TRUE;
		}

		if ( dossier_vide($dossier) == TRUE && $dossier != '../FTP/' ){
			rmdir($dossier);
			$msg[] = "Dossier supprimé avec succès !";
			$msgInfo = 'success';
			header('location: /FTP.php');
		} else {
			$msg[] = "Le dossier n'est pas vide ! Supprimer d'abord les fichiers qu'il contient";
			$msgInfo = 'danger';
		}

	} else {
		echo "Veuillez vous connecter...";
	}
	
	$_SESSION['msg'] = $msg;
	$_SESSION['msgInfo'] = $msgInfo;
	header('location: /FTP.php');
?>