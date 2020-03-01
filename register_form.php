<?php

$db = new SQLite3("trade.db");
$db->exec('CREATE TABLE IF NOT EXISTS `users` (
    `id` int(11) NOT NULL,
    `user_login` varchar(30) NOT NULL,
    `user_password` varchar(32) NOT NULL,
    PRIMARY KEY (`id`)
)');
$db->close();

if (!empty($_POST)) {

    $login = $_POST['name'];
    $password = md5(md5(trim($_POST['password'])));
    echo $login;
    echo $password;

    $pdo = new PDO("sqlite:trade.db");

    $data = [
        'user_login' => $login,
        'user_password' => $password,
    ];
    $sql = "INSERT INTO users (id, user_login, user_password) VALUES ('',:user_login, :user_password)";
    $stmt= $pdo->prepare($sql);
    $stmt->execute($data);
}

if (!empty($_SESSION['name']) && !empty($_SESSION['email']) &&  !empty($_SESSION['phone'])) {
    echo '<a href="super_globals.php">Перейти к калькулятору</a>';
} else {
    echo '<table>
    <form method=post>
        <tr><td>Имя:</td><td><input required type=text name=name></td></tr>
        <tr><td>e-mail:</td><td><input required type=email name=email></td></tr>
        <tr><td>Пароль:</td><td><input required type=password name=password></td></tr>
        <tr><td></td><td><input type=submit value=\'Зарегистрировать\'></td></tr>
    </form>
</table>';
}
