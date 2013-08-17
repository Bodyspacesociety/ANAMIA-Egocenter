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
//	session_start();
//	header('Content-Type: text/html; Charset=utf-8');

/********************************************************************************************/
//	Sauvegarde
/********************************************************************************************/

//error_reporting(0);


$w = (int)$_POST['width'];
$h = (int)$_POST['height'];

$img = imagecreatetruecolor($w, $h);

imagefill($img, 0, 0, 0xFFFFFF);

$rows = 0;
$cols = 0;

for($rows = 0; $rows < $h; $rows++){
	$c_row = explode(",", $_POST['px' . $rows]);
	for($cols = 0; $cols < $w; $cols++){
		$value = $c_row[$cols];
		if($value != ""){
			$hex = $value;
			while(strlen($hex) < 6){
				$hex = "0" . $hex;
			}
			$r = hexdec(substr($hex, 0, 2));
			$g = hexdec(substr($hex, 2, 2));
			$b = hexdec(substr($hex, 4, 2));
			$test = imagecolorallocate($img, $r, $g, $b);
			imagesetpixel($img, $cols, $rows, $test);
		}
	}
}

ob_start();
imagejpeg($img);
$i = ob_get_clean();

$file = fopen('study/study_'.$_POST['ccid'].'.jpg', 'w');
fwrite($file, $i);
fclose($file);
imagedestroy($img);
?>