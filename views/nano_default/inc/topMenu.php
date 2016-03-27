<div id="menu">
        <ul>
            <?php foreach ($categoryArr as $key=>$value)
    echo '<!--<li>--><a href="/?view=category&catid='.$key.'">'.$value.'</a><!--</li>-->';
            ?>
</ul>
<div id="login-img"></div>
<div id="login-massage">Войти</div>
<div id="register-massage">Регистрация</div>
<div id="cart-box"></div>
<div class="Cart_Icon"></div>
<div id="priceInCart">
    <span id="priceInCartNumbers"><?=$_SESSION['totalPrice']?></span>
    <span id="priceInCartLetters">
    <?php
            if ($_SESSION['totalGoodsCount'] > 0) {
                echo 'руб.';
            }else{
                echo 'Корзина Пуста';
            }
    ?>
    </span>
</div>
<div id="itemsInCart">
    <?php
    if ($_SESSION['totalGoodsCount']){
    echo $_SESSION['totalGoodsCount'].' товар(ов)';
    }
    ?>
</div>
</div>