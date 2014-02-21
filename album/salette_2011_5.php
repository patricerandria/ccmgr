<div id="galerie">
<?php
// on déclare un tableau qui contiendra le nom des fichiers de nos miniatures
$tableau = array();  
$dir = 'album/images/salette_2011_5/';
$dir_t = 'album/images/pic_salette_2011_5/';
$dir_mini = 'album/images/mini_salette_2011_5/';
// on ouvre notre dossier contenant les miniatures
$dossier = opendir($dir_t);
//$dossier = opendir ('album/mini/');  
while ($fichier = readdir($dossier)) { 
   if ($fichier != '.' && $fichier != '..' && $fichier != 'index.php' && $fichier != 'Thumbs.db') { 
      // on stocke le nom des fichiers des miniatures dans un tableau
      $tableau[] = $fichier; 
	
   }  
}  
closedir($dossier);  

// on compte le nombre de miniatures
$nbpics = count($tableau);  
// on défini le nombre de colonne sur lesquelles vont s'afficher nos miniatures
$nbcol=$nbpics; 
// si on a au moins une miniature, on les affiche toutes
if ($nbpics != 0) {
	//echo '<div id="galerie">';
	echo '<strong> Zaikam-Paritra 2011, La Salette <strong/><br />';
	echo '<ul id="galerie_mini">';
	
	for ($i=0; $i<$nbpics; $i++){
		// noter bien que l'on place un lien vers le fichier mini.php qui va générer nos miniatures. On ajoute un argument, le nom de fichier image à miniaturiser
		 echo '<li><a href="' , $dir_t , $tableau[$i] , '" title=" "><img src="' , $dir_mini ,'mini_' , $tableau[$i] , '" alt="Image' , $tableau[$i] , '" /></a></li>';
		// echo '<li><a href="' , $dir , $tableau[$i] , '" title="', $tableau[$i],'"><img src="' , $dir_mini ,'mini_' , $tableau[$i] , '" alt="Image' , $tableau[$i] , '" /></a></li>';

	}
	echo '</ul>';
	echo '<dl id="photo">';
    echo '<dt> </dt>';
    echo '<dd><img id="big_pict" src="' , $dir_t , $tableau[0] , '" alt="Photo 1 en taille normale" /></dd>';
	echo '</dl>';
	//echo '</div>';
}
/*if ($nbpics != 0) { 
   echo '<table>'; 
   for ($i=0; $i<$nbpics; $i++){ 
      if($i%$nbcol==0) echo '<tr>'; 
      // pour chaque miniature, on affiche la miniature munie d'un lien vers la photo en taille réelle
      echo '<td><a href="album/images/' , $tableau[$i] , '"><img src="album/mini/' , $tableau[$i] , '" alt="Image" /></a></td>'; 
      if($i%$nbcol==($nbcol-1)) echo '</tr>'; 
   } 
   echo '</table>';  
}  */
// si on a aucune miniature, on affiche un petit message :)
else echo 'Aucune image à afficher';  
?>
</div>