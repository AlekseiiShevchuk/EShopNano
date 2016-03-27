<?php
$id = '1';
if (isset($_GET['id'])) {
    $id = $_GET['id'];
}
$goods = getGoodsPriceById($dbh,$id);

if ($goods['price']) { //check if the goods is in DB or somebody wants to hack us
    if ($_SESSION['goods'][$id]) {
        $_SESSION['goods'][$id]++;
    } else {
        $_SESSION['goods'][$id] = 1;
    }
}

calculateTotalGoods();
calculateTotalPrice($dbh);

/*echo '<pre>';
print_r($_SESSION['goods']);
echo '</pre>';*/

/*session_destroy();*/
header("Location: ".$_SERVER['HTTP_REFERER']);
exit;
