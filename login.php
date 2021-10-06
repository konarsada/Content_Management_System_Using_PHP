<?php

require "includes/init.php";

if($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $conn = require "includes/db.php";

    if(User::authenticate($conn, $_POST["username"], $_POST["password"])) {

        Auth::login();

        Url::redirect("index.php");
    }
    else
        $error = "Login incorrect";
}

?>

<?php require "includes/header.php" ?>

<h2>Login</h2>

<?php if(!empty($error)): ?>
    <p><?= $error ?>
<?php endif; ?>

<form action="#" method="post">
    <div class="form-group">
        <label for="username">Username</label>
        <input class="form-control" type="text" name="username" id="username">
    </div>
    <div class="form-group">
        <label for="password">Password</label>
        <input class="form-control" type="password" name="password" id="password">
    </div>
    <button class="btn" type="submit">Log in</button>
</form>

<?php require "includes/footer.php" ?>