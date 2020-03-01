<?php
session_start();

if (!empty($_POST)) {
        $_SESSION['name'] = $_POST['name'];
        $_SESSION['email'] = $_POST['email'];
        $_SESSION['phone'] = $_POST['phone'];
}

if (!empty($_SESSION['name']) && !empty($_SESSION['email']) &&  !empty($_SESSION['phone'])) {
    echo '<a href="super_globals.php">Перейти к калькулятору</a>';
} else {
    echo '<table>
    <form method=post>
        <tr><td>Имя:</td><td><input required type=text name=name></td></tr>
        <tr><td>e-mail:</td><td><input required type=email name=email></td></tr>
        <tr><td>Телефон:</td><td><input required type=text name=phone></td></tr>
        <tr><td></td><td><input type=submit value=\'Зарегистрировать\'></td></tr>
    </form>
</table>';
}
