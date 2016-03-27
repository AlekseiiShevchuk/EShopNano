<div class="cartName">Регистрация</div>

<main>
<form method="post" action="">
    <div class="register">
        <div>
            <h3>Контактное лицо (ФИО):</h3>
            <input type="text" name="fio" placeholder="Введите свои ФИО" value="<?=$fio?>">
            <h3>E-mail адрес</h3>
            <input type="text" name="email" placeholder="Введите совю электронную почту" value="<?=$email?>">
        </div>
        <div>
            <h3>Пароль</h3>
            <input type="password" name="pass1" placeholder="Введите пароль">
            <h3>Повторите пароль</h3>
            <input type="password" name="pass2" placeholder="Повторите пароль">
        </div>
        <button type="submit" class="button" style="cursor: pointer">Зарегистрироваться</button>
    </div>