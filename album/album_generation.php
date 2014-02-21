<?php include $_SERVER['DOCUMENT_ROOT']."/Dossier/header.php"; ?>

<?php include $_SERVER['DOCUMENT_ROOT']."/Dossier/menu.php"; ?>


<div id="galerie">
<?php
//function album_generation() {
$album = $_GET['album'];
$titre = $_GET['titre'];
// on d�clare un tableau qui contiendra le nom des fichiers de nos miniatures
$tableau = array();  
$dir = 'images/'.$album.'/';
$dir_t = 'images/pic_'.$album.'/';
$dir_mini = 'images/mini_'.$album.'/';
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
// on d�fini le nombre de colonne sur lesquelles vont s'afficher nos miniatures
$nbcol=$nbpics; 
// si on a au moins une miniature, on les affiche toutes
if ($nbpics != 0) {
	echo '<strong>' , $titre , '<strong/><br />';
	echo '<ul id="galerie_mini">';
	
	for ($i=0; $i<$nbpics; $i++){
		// noter bien que l'on place un lien vers le fichier mini.php qui va g�n�rer nos miniatures. On ajoute un argument, le nom de fichier image � miniaturiser
		 echo '<li><a href="' , $dir_t , $tableau[$i] , '" title=" "><img src="' , $dir_mini ,'mini_' , $tableau[$i] , '" alt="Image' , $tableau[$i] , '" /></a></li>';
		

	}
	echo '</ul>';
	echo '<dl id="photo">';
    echo '<dt> </dt>';
    echo '<dd><img id="big_pict" src="' , $dir_t , $tableau[0] , '" alt="Photo 1 en taille normale" /></dd>';
	echo '</dl>';
	//echo '</div>';
}

// si on a aucune miniature, on affiche un petit message :)
else echo 'Aucune image � afficher';  
//}
?>
</div>
<?php include $_SERVER['DOCUMENT_ROOT']."/Dossier/foot.php"; ?>
