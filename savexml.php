<?php
#********************************************************************************************#
//////////////////////////////////////////////////////////////////////////////////////////////
/**	* Enregistrement du XML venant de l'appliquette
	* @package		Custom
	* @copyright	2013
	* @licence		Under licence, as specified in the README.txt file
	* @description	From here, you'll find the available variables to work, in the $THISpage array
	* @help			Check http://www.anamia.fr/ for help
//////////////////////////////////////////////////////////////////////////////////////////////
*/#******************************************************************************************#

/********************************************************************************************/
//	Ouverture de session
/********************************************************************************************/
	session_start();
	header('Content-Type: text/html; Charset=utf-8');

/********************************************************************************************/
//	Récupération des fonctions
/********************************************************************************************/
	require $_SESSION['square']['serveurroot'].'/librairies/lib_general.php';
	
/********************************************************************************************/
//	Sauvegarde
/********************************************************************************************/
	$str = '<?xml version="1.0" encoding="UTF-8" ?>';
	$str .= stripslashes($_POST['datas']);
//	Nom du fichier
	$filename = 'study/study_'.$_POST['id'].'.xml';
	$file =fopen($filename,"w");
	$write = fwrite($file, $str);
	if ($write) {
	    echo "&result=ok&";    
	} else {
	    echo "&result=error&";
	}
	fclose($file);
?>