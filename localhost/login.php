<?php
session_start();
include('config.php');
if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $query = $db->prepare(sprintf('SELECT * FROM users WHERE email="%s"', $email));
    $query->execute();
    $result = $query->fetch(PDO::FETCH_ASSOC);
    if (!$result) {
        echo '<p class="error">Неверные пароль или почта!</p>';
    } else {
        if (password_verify($password, $result['password'])) {
            $_SESSION['user_id'] = $result['id'];
            $_SESSION['name'] = $result['name'];
            header("location: welcome.php");
//            echo '<p class="success">Поздравляем, вы прошли авторизацию!</p>';
        } else {
            echo '<p class="error"> Неверные пароль или почта!</p>';
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
<form method="post" action="" name="login-form">
    <div class="form-element">
        <label>Email</label>
        <input type="email" name="email" required />
    </div>
    <div class="form-element">
        <label>Password</label>
        <input type="password" name="password" required />
    </div>
    <button type="submit" name="login" value="login">Login</button>
</form>
<p>no? <a href="/register.php">register!</a></p>
<p><a href="logout.php">logout</a></p>
<?php
$params = array(
    'client_id'     => '632355373107-p90sv3h6tieaanoqc3hlp2k1ndgfm80t.apps.googleusercontent.com',
    'redirect_uri'  => 'http://localhost/login_google.php',
    'response_type' => 'code',
    'scope'         => 'https://www.googleapis.com/auth/userinfo.email https://www.googleapis.com/auth/userinfo.profile',
    'state'         => '123'
);

$url = 'https://accounts.google.com/o/oauth2/auth?' . urldecode(http_build_query($params));
echo '<a href="' . $url . '">GOOOOOOOOOOOOOOOOOOOOOOOOOOGL</a>';
?>
</body>
</html>