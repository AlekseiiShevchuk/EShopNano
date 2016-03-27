<?php
//guard of direct access to other files
defined(NANOSHOP) or die('ACCESS DENIED');

require_once __DIR__.'/../functions/functions.php';

$catId = '1';
if (isset($_GET['catid'])) {
    $catId = $_GET['catid'];
}

$categoryArr = getCategoryList($dbh);
