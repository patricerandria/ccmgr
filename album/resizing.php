<div id="right">
<?php
ini_set("memory_limit",'500M');  
//$dir = 'album/images/Logo/';

//Copyright
$logo = imagecreatefromjpeg("album/images/Logo/mini_logo.jpeg"); // Le logo est la source
$attr_logo = getimagesize("album/images/Logo/mini_logo.jpeg"); 
// Étape 1 :
$NouvelleLargeur_mini = 80;
$NouvelleLargeur = 540;
for ($nbr = 2; $nbr <= 12; $nbr++)
{
// on déclare un tableau qui contiendra le nom des fichiers de nos miniatures
$tableau = array();
$dir = 'album/images/salette_2011_'.$nbr.'/';
$dir_r = 'album/images/pic_salette_2011_'.$nbr.'/';
$dir_mini = 'album/images/mini_salette_2011_'.$nbr.'/';
// on ouvre notre dossier contenant les miniatures
$dossier = opendir ($dir);
//$dossier = opendir ('album/mini/');  
while ($fichier = readdir ($dossier)) { 
   if ($fichier != '.' && $fichier != '..' && $fichier != 'index.php' && $fichier != 'Thumbs.db') { 
      // on stocke le nom des fichiers des miniatures dans un tableau
      $tableau[] = $fichier; 
		$attr = getimagesize($dir.$fichier);
		// Étape 2 :
		$Reduction_mini = ( ($NouvelleLargeur_mini * 100)/$attr[0] );
		// Étape 3 :
		$NouvelleHauteur_mini = ( ($attr[1] * $Reduction_mini)/100 );
		$src_mini  = imagecreatefromjpeg($dir.$fichier); 
	    $dest_mini = imagecreatetruecolor($NouvelleLargeur_mini,$NouvelleHauteur_mini);
		imagecopyresampled($dest_mini,$src_mini,0,0,0,0,$NouvelleLargeur_mini,$NouvelleHauteur_mini,$attr[0],$attr[1]);
	    imagejpeg ($dest_mini, $dir_mini.'/mini_'.$fichier);
	    ///////////////////////////Photos resizing
	    // Étape 2 :
		$Reduction = ( ($NouvelleLargeur * 100)/$attr[0] );
		// Étape 3 :
		$NouvelleHauteur = ( ($attr[1] * $Reduction)/100 );
		//$src  = imagecreatefromjpeg($dir.$fichier); 
	    $dest = imagecreatetruecolor($NouvelleLargeur,$NouvelleHauteur);
		imagecopyresampled($dest,$src_mini,0,0,0,0,$NouvelleLargeur,$NouvelleHauteur,$attr[0],$attr[1]);
	    ////////////
		// On veut placer le logo en bas à droite, on calcule les coordonnées où on doit placer le logo sur la photo
		$dest_x = $NouvelleLargeur - $attr_logo[0];
		$dest_y =  $NouvelleHauteur - $attr_logo[1];
		// On met le logo (source) dans l'image de destination (la photo)
		imagecopymerge($dest, $logo, $dest_x, $dest_y, 0, 0, $attr_logo[0], $attr_logo[1], 60);
		///////////
		imagejpeg ($dest, $dir_r.$fichier);		
	  
   }  
}
closedir ($dossier);  
} 
?>
</div>