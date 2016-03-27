<?php
//guard of direct access to other files
defined(NANOSHOP) or die('ACCESS DENIED');
session_start();
if (empty($_GET['view'])){
    $view = 'index';
}else{
    $view = $_GET['view'];
}
require_once TEMPLATE.$view.'.php';
