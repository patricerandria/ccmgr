<?php 
session_start();

//connect.php
$server	= 'phpmyadmin.free.fr';
$username	= 'ccmg.grenoble';
$password	= 'kato38';
$database	= 'ccmg_grenoble';

if(!mysql_connect($server, $username, $password))
{
 	exit('Error: could not establish database connection');
}
if(!mysql_select_db($database))
{
 	exit('Error: could not select the database');
}
?>