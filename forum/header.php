<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="nl" lang="nl">
<head>
 	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
 	<meta name="description" content="A short description." />
 	<meta name="keywords" content="put, keywords, here" />
 	<title>Forum CCMG Grenoble</title>
	<link rel="stylesheet" href="style.css" type="text/css">
</head>
<body>
<h1>Forum CCMG Grenoble</h1>
	<div id="wrapper">
	<br/><a class="item" href="http://<?php echo $_SERVER['HTTP_HOST']; ?>/index.php">Accueil CCMG </a><br/><br/><br/>
	<div id="menu">
		<a class="item" href="index.php">Accueil</a> -
		<a class="item" href="create_topic.php">Nouveau sujet</a> -
		<a class="item" href="create_cat.php">Nouvelle catégorie</a>
		
		<div id="userbar">
		
		<?php

		//set the $_SESSION['signed_in'] variable to TRUE
		//$_SESSION['signed_in'] = true;
		//$result = mysql_query("select * from users");
		//we also put the user_id and user_name values in the $_SESSION, so we can use it at various pages
		/*while($row = mysql_fetch_assoc($result))
		{
		$_SESSION['user_id'] = $row['user_id'];
		$_SESSION['user_name'] = $row['user_name'];
		//$_SESSION['user_level'] = $row['user_level'];
		}*/

		if($_SESSION['signed_in'])
		{
		echo 'Bonjour ' . $_SESSION['user_name'] . '. Ce n\'est pas vous? <a class="item" href="signout.php">Déconnexion</a>';
		}
		else
		{
		echo '<a class="item" href="signin.php">S\'authentifier</a> ou <a class="item" href="signup.php">Créer un compte</a>.';
		}

		?>
		</div>
	</div>
		<div id="content">