<table>
    <form method=post>
        <tr>
            <td>e-mail:</td>
            <td><input required type=email name=email></td>
        </tr>
        <tr>
            <td>Пароль:</td>
            <td><input required type=password name=password></td>
        </tr>
        <tr>
            <td></td>
            <td><input type=submit value='Войти'></td>
        </tr>
    </form>
</table>

<?php
if (!empty($_POST)) {
    $mail = $_POST['email'];
    $password = md5(md5(trim($_POST['password'])));

    $pdo = new PDO("sqlite:trade.db");

    $result = $pdo->prepare('SELECT * FROM users WHERE user_mail = ? ;');
    $result->execute(array($mail));
    $data = $result->fetchAll();

    $pass_bd = '';
    foreach ($data as $row) {
        $pass_bd = ($row['user_password']);
    }
    if ($pass_bd === $password) {
        echo 'Можно войти';
    } else {
        echo 'Неверный пароль или логин';
    }

}