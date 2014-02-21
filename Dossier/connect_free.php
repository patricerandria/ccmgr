<?php
//connect.php
//include("Dossier/connect_free.php");
//mysql_connect("phpmyadmin.free.fr", "ccmg.grenob",  "kato38");

//session_start();

$server	= 'phpmyadmin.free.fr';
$username	= 'ccmg.grenoble';
$password	= 'kato38';
$database	= 'ccmg_grenoble';

//mysql_connect($server, $username,  $password);

//echo ' La valeur du test est :' . $test_data ;

//$result = mysql_db_query("database","select * from users;");
//if ($result > 0) {
//    while($row = mysql_fetch_array($result)) {
//        echo $row["user_name"] . $row["user_email"] . "\n";
//} 
//}

if(!mysql_connect($server, $username,  $password))
{
 	exit('Error: could not establish database connection');
}
if(!mysql_select_db($database))
{
 	exit('Error: could not select the database');
}

//mysql_close(); 
?>
	