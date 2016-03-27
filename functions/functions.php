<?php
defined(NANOSHOP) or die('ACCESS DENIED');
/**
 * @return array
 */
function getCategoryList($dbh) {
    $query = "SELECT * FROM category ORDER BY parent_id, name";
    $res = mysqli_query($dbh,$query) or die(mysqli_query());
        $cat = [];

    while ($row = mysqli_fetch_assoc($res)){
        if($row['parent_id'] === '0'){
            $cat[$row['id']] = $row['name'];
        }else{
            $cat[$row['parent_id']]['sub'][$row['id']] = $row['name'];
        }
    }
    return $cat;
}

/**
 * @param $dbh
 * @return array
 */
function getListOfDeliveryMethods ($dbh) {
    $query = "SELECT * FROM delivery ORDER BY id";
    $res = mysqli_query($dbh,$query) or die(mysqli_query());
    $deliveryMethods = [];

    while ($row = mysqli_fetch_assoc($res)){
        $deliveryMethods[$row['id']] = $row['name'];
    }
    return $deliveryMethods;
}

/*********************************************************** example how to get data from mySQL */
function getListOfAllGoods ($dbh) {
    $query = "SELECT goods . * , category.name AS cat_name, category.id AS cat_id
              FROM  `goods`
              INNER JOIN category ON goods.category_id = category.id";
    $res = mysqli_query($dbh,$query) or die(mysqli_query());
    $goods = [];

    while ($row = mysqli_fetch_assoc($res)){
        $goods[] = $row;
    }
    return $goods;
}
/*********************************************************** example how to get data from mySQL */

function getCountOfRows ($dbh,$table,$condition) {
    $query = "SELECT COUNT(*) FROM $table WHERE $condition";
    $res = mysqli_query($dbh,$query) or die(mysqli_query());
    $row = mysqli_fetch_assoc($res);
        return $row["COUNT(*)"];
}

function getListOfGoodsInCategoryForOnePage ($dbh,$catId,$pageNumber) {
    $start = ($pageNumber*17 - 17);
    $stop = 17;
    $query = "SELECT *
              FROM  `goods`
              WHERE  category_id = $catId
              LIMIT $start , $stop";
    $res = mysqli_query($dbh,$query) or die(mysqli_query());
    $goods = [];

    while ($row = mysqli_fetch_assoc($res)){
        $goods[] = $row;
    }
    return $goods;
}

function getOneGood ($dbh,$id) {
    $query = "SELECT *
              FROM  `goods`
              WHERE id = $id";
    $res = mysqli_query($dbh,$query) or die(mysqli_query());
    $good = [];

    while ($row = mysqli_fetch_assoc($res)){
        $good = $row;
    }
    return $good;
}

function calculateTotalGoods (){
    $_SESSION['totalGoodsCount'] = 0;
    foreach ($_SESSION['goods'] as $id=>$count){
        $_SESSION['totalGoodsCount']+=$count;
    }
}

function calculateTotalPrice ($dbh){
    $_SESSION['totalPrice'] = 0;
    foreach ($_SESSION['goods'] as $id=>$count){
        $_SESSION['totalPrice']+=$count*getOneGood($dbh,$id)['price'];
    }
}

function getGoodsPriceById ($dbh,$id) {
    $query = "SELECT price
              FROM  `goods`
              WHERE id = $id";
    $res = mysqli_query($dbh,$query) or die(mysqli_query());
    $good = [];

    while ($row = mysqli_fetch_assoc($res)){
        $good = $row;
    }
    return $good;
}

/**
 * @param $dbh
 * @param $email
 * @return bool
 */
function checkIfEmailExistInDb ($dbh, $email) {
    $query = "SELECT email
              FROM  `client`
              WHERE email = '$email' LIMIT 1";
    $res = mysqli_query($dbh,$query) or die(mysqli_query());
    if(!mysqli_affected_rows($dbh)){
        return false;
    }else{
        return true;
    }
}