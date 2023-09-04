<?php
session_start();
include('config.php');
if (isset($_POST['register'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $password_hash = password_hash($password, PASSWORD_BCRYPT);
    $query = $db->prepare(sprintf('SELECT * FROM users WHERE email="%s"', $email));
    $query->execute();
    if ($query->rowCount() > 0) {
        echo '<p class="error">Этот адрес уже зарегистрирован!</p>';
    } else {
        $query = $db->prepare(sprintf('INSERT INTO users (name,password,email) VALUES ("%s","%s","%s")', $username, $password_hash, $email));
        $result = $query->execute();
        if ($result) {
            echo '<p class="success">Регистрация прошла успешно!</p>';
        } else {
            echo '<p class="error">Неверные данные!</p>';
        }
    }
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Goida</title>
</head>
<body>
<form method="post" action="" name="signup-form">
    <div class="form-element">
        <label for="username">Username</label>
        <input id="username" type="text" name="username" pattern="[a-zA-Z0-9]+" required/>
    </div>
    <div class="form-element">
        <label for="email">Email</label>
        <input id="email" type="email" name="email" required/>
    </div>
    <div class="form-element">
        <label for="password">Password</label>
        <input id="password" type="password" name="password" required/>
    </div>
    <button type="submit" name="register" value="register">Register</button>
</form>
<p>yes? <a href="/login.php">login!</a></p>
</body>
</html>