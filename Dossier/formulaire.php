<?php
	/*
		********************************************************************************************
		CONFIGURATION
		********************************************************************************************
	*/
	// destinataire est votre adresse mail. Pour envoyer � plusieurs � la fois, s�parez-les par une virgule
	$destinataire = 'ccmg.grenoble@free.fr';

	// copie ? (envoie une copie au visiteur)
	$copie = 'non'; // 'oui' ou 'non'

	// Messages de confirmation du mail
	$message_envoye = "Votre message nous est bien parvenu! <a href=\"../index.php\"> Retour � l'accueil </a>";
	$message_non_envoye = "L'envoi du mail a �chou�, veuillez r�essayer SVP. <a href=\"../index.php\"> Retour � l'accueil </a>";

	// Messages d'erreur du formulaire
	$message_erreur_formulaire = "Vous devez d'abord <a href=\"../index.php\">envoyer le formulaire</a>.";
	$message_formulaire_invalide = "V�rifiez que tous les champs soient bien remplis et que l'email soit sans erreur.";

	/*
		********************************************************************************************
		FIN DE LA CONFIGURATION
		********************************************************************************************
	*/

	// on teste si le formulaire a �t� soumis
	if (!isset($_POST['envoi']))
	{
		// formulaire non envoy�
		echo '<p>'.$message_erreur_formulaire.'</p>'."\n";
	}
	else
	{
		/*
		 * cette fonction sert � nettoyer et enregistrer un texte
		 */
		function Rec($text)
		{
			$text = trim($text); // delete white spaces after & before text
			if (1 === get_magic_quotes_gpc())
			{
				$stripslashes = create_function('$txt', 'return stripslashes($txt);');
			}
			else
			{
				$stripslashes = create_function('$txt', 'return $txt;');
			}

			// magic quotes ?
			$text = $stripslashes($text);
			$text = htmlspecialchars($text, ENT_QUOTES); // converts to string with " and ' as well
			$text = nl2br($text);
			return $text;
		};

		/*
		 * Cette fonction sert � v�rifier la syntaxe d'un email
		 */
		function IsEmail($email)
		{
			$pattern = "^([a-z0-9_]|\\-|\\.)+@(([a-z0-9_]|\\-)+\\.)+[a-z]{2,7}$";
			return (@eregi($pattern,$email)) ? true : false;
		};

		// formulaire envoy�, on r�cup�re tous les champs.
		$nom     = (isset($_POST['anarana']))     ? Rec($_POST['anarana'])     : '';
		$email   = (isset($_POST['mailaka']))   ? Rec($_POST['mailaka'])   : '';
		$objet   = 'Site CCMG';
		// (isset($_POST['objet']))   ? Rec($_POST['objet'])   : '';
		$message = (isset($_POST['soratra'])) ? Rec($_POST['soratra']) : '';

		// On va v�rifier les variables et l'email ...
		$email = (IsEmail($email)) ? $email : ''; // soit l'email est vide si erron�, soit il vaut l'email entr�

		if (($nom != '') && ($email != '') && ($objet != '') && ($message != ''))
		{
			// les 4 variables sont remplies, on g�n�re puis envoie le mail
			$headers = 'From: '.$nom.' <'.$email.'>' . "\r\n";

			// envoyer une copie au visiteur ?
			if ($copie == 'oui')
			{
				$cible = $destinataire.','.$email;
			}
			else
			{
				$cible = $destinataire;
			};

			// Remplacement de certains caract�res sp�ciaux
			$message = str_replace("&#039;","'",$message);
			$message = str_replace("&#8217;","'",$message);
			$message = str_replace("&quot;",'"',$message);
			$message = str_replace('<br>','',$message);
			$message = str_replace('<br />','',$message);
			$message = str_replace("&lt;","<",$message);
			$message = str_replace("&gt;",">",$message);
			$message = str_replace("&amp;","&",$message);

			// Envoi du mail
			if (mail($cible, $objet, $message, $headers))
			{
				echo '<p>'.$message_envoye.'</p>'."\n";
			}
			else
			{
				echo '<p>'.$message_non_envoye.'</p>'."\n";
			};
		}
		else
		{
			// une des 3 variables (ou plus) est vide ...
			echo '<p>'.$message_formulaire_invalide.' <a href="../index.php">Retour � l\'accueil</a></p>'."\n";
		};
	}; // fin du if (!isset($_POST['envoi']))
?>
