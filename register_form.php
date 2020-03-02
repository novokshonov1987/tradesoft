<?php

$db = new SQLite3("trade.db");
$db->exec('CREATE TABLE IF NOT EXISTS `users` (
    `user_login` varchar(30) NOT NULL,
    `user_mail` varchar(30) NOT NULL,
    `user_password` varchar(32) NOT NULL
)');
$db->close();

if (!empty($_POST)) {

    $login = $_POST['name'];
    $mail = $_POST['email'];
    $password = md5(md5(trim($_POST['password'])));

    $pdo = new PDO("sqlite:trade.db");

    $data = [
        'user_login' => $login,
        'user_mail' => $mail,
        'user_password' => $password,
    ];
    $sql = "INSERT INTO users (user_login, user_mail, user_password) VALUES (:user_login, :user_mail, :user_password)";
    $stmt= $pdo->prepare($sql);
    $stmt->execute($data);
}
?>
<table>
    <form method=post>
        <tr><td>Имя:</td><td><input required type=text name=name></td></tr>
        <tr><td>e-mail:</td><td><input required type=email name=email></td></tr>
        <tr><td>Пароль:</td><td><input required type=password name=password></td></tr>
        <tr><td></td><td><input type=submit value='Зарегистрировать'></td></tr>
    </form>
</table>
<a href="login.php">Уже зарегистрированы? Авторизоваться! </a>


