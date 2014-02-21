<?php
//signup.php
include 'connect.php';
include 'header.php';

echo '<h3>Ouvrir un compte</h3><br />';

if($_SERVER['REQUEST_METHOD'] != 'POST')
{
    /*the form hasn't been posted yet, display it
	  note that the action="" will cause the form to post to the same page it is on */
    echo '<form method="post" action="">
 	 	Login: <input type="text" name="user_name" /><br />
 		Mot de passe: <input type="password" name="user_pass"><br />
		Resaisir le Mot de passe: <input type="password" name="user_pass_check"><br />
		E-mail: <input type="email" name="user_email"><br />
 		<input type="submit" value="Valider" />
 	 </form>';
}
else
{
    /* so, the form has been posted, we'll process the data in three steps:
		1.	Check the data
		2.	Let the user refill the wrong fields (if necessary)
		3.	Save the data 
	*/
	$errors = array(); /* declare the array for later use */
	
	if(isset($_POST['user_name']))
	{
		//the user name exists
		if(!ctype_alnum($_POST['user_name']))
		{
			$errors[] = 'Le Login ne peut contenir que des lettres et des chiffres.';
		}
		if(strlen($_POST['user_name']) > 30)
		{
			$errors[] = 'Le Login ne peut contenir plus de 30 caract&#232;res.';
		}
	}
	else
	{
		$errors[] = 'Vous devez entrer un Login..';
	}
	
	
	if(isset($_POST['user_pass']))
	{
		if($_POST['user_pass'] != $_POST['user_pass_check'])
		{
			$errors[] = 'Les deux mots de passe ne sont pas identiques.';
		}
	}
	else
	{
		$errors[] = 'Vous devez entrer un Mot de passe.';
	}
	
	if(!empty($errors)) /*check for an empty array, if there are errors, they're in this array (note the ! operator)*/
	{
		echo 'Uh-oh.. quelques champs ne sont pas remplis correctement..<br /><br />';
		echo '<ul>';
		foreach($errors as $key => $value) /* walk through the array so all the errors get displayed */
		{
			echo '<li>' . $value . '</li>'; /* this generates a nice error list */
		}
		echo '</ul>';
	}
	else
	{
		//the form has been posted without, so save it
		//notice the use of mysql_real_escape_string, keep everything safe!
		//also notice the sha1 function which hashes the password
		$sql = "INSERT INTO
					users(user_name, user_pass, user_email ,user_date, user_level)
				VALUES('" . mysql_real_escape_string($_POST['user_name']) . "',
					   '" . sha1($_POST['user_pass']) . "',
					   '" . mysql_real_escape_string($_POST['user_email']) . "',
						NOW(),
						0)";
						
		$result = mysql_query($sql);
		if(!$result)
		{
			//something went wrong, display the error
			echo 'Un probl&#232;me est survenu lors de l\'enregistrement. R&#233;essayer plus tard SVP.';
			//echo mysql_error(); //debugging purposes, uncomment when needed
		}
		else
		{
			echo 'Enregistrement r&#233;ussi. Vous pouvez vous <a href="signin.php">authentifier</a> et commencer &#224; poster maintenant! :-)';
		}
	}
}

include 'footer.php';
?>
