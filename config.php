<?php
//guard of direct access to other files
defined(NANOSHOP) or die('ACCESS DENIED');
// domain name
define('PATH','http://diplom1.local/');

//model path
define('MODEL','model/model.php');

//controller path
define('CONTROLLER','controller/controller.php');

//view path
define('VIEW','views/');

//active template
define('TEMPLATE',VIEW.'nano_default/');

define('DBHOST','localhost');
define('DBUSER','root');
define('DBPASS','');
define('DBNAME','nanoShop');

//global shop title
define('TITLE','Nano Olexii Shop');

$dbh = mysqli_connect(DBHOST,DBUSER,DBPASS) or die('Can not connect to mysql server');
mysqli_select_db($dbh,DBNAME) or die("Can not find database");
mysqli_query($dbh,"SET NAMES 'UTF8'") or die('Can not set charset');