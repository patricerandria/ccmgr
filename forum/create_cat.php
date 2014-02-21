<?php
//create_cat.php
include 'connect.php';
include 'header.php';

echo '<h2>Creer une nouvelle cat&#233;gorie</h2>';
if($_SESSION['signed_in'] == false | $_SESSION['user_level'] != 1 )
{
	//the user is not an admin
	echo 'D&#233;sol&#233;, vous n\'avez pas les autorisations n&#233;cessaires pour acc&#233;der &#224; cette page.';
}
else
{
	//the user has admin rights
	if($_SERVER['REQUEST_METHOD'] != 'POST')
	{
		//the form hasn't been posted yet, display it
		echo '<form method="post" action="">
			Nom de la cat&#233;gorie: <input type="text" name="cat_name" /><br />
			Description de la cat&#233;gorie:<br /> <textarea name="cat_description" /></textarea><br /><br />
			<input type="submit" value="Valider" />
		 </form>';
	}
	else
	{
		//the form has been posted, so save it
		$sql = "INSERT INTO categories(cat_name, cat_description)
		   VALUES('" . mysql_real_escape_string($_POST['cat_name']) . "',
				 '" . mysql_real_escape_string($_POST['cat_description']) . "')";
		$result = mysql_query($sql);
		if(!$result)
		{
			//something went wrong, display the error
			echo 'Erreur' . mysql_error();
		}
		else
		{
			echo 'Nouvelle cat&#233;gorie rajout&#233;e avec succ&#232;s.';
		}
	}
}

include 'footer.php';
?>
