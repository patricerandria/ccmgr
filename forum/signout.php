<?php
//signout.php
include 'connect.php';
include 'header.php';

echo '<h2>D&#233;connexion</h2>';

//check if user if signed in
if($_SESSION['signed_in'] == true)
{
	//unset all variables
	$_SESSION['signed_in'] = NULL;
	$_SESSION['user_name'] = NULL;
	$_SESSION['user_id']   = NULL;
	echo 'D&#233;connexion r&#233;ussie, merci de votre visite.';
}
else
{
	echo 'Vous ne vous &#234;tes pas authentifi&#233;. Voulez-vous vous <a href="signin.php">authentifier</a>?';
}

include 'footer.php';
?>