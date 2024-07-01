<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/reset.css">
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="/css/login.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="/js/login.js"></script>
    <title>Login</title>
</head>
<body>
    <div class = "body-container">
        <div class = "header-container">
            <div class = "label-title">Sign in to CRUD</div>
        </div>
        <div class = "main-container">
            <form action="/in" method="post">
                <?php
                    foreach ($users as $user) {
                        $accessNameDB = $user['access_name'];
                        $passwordDB = $user['password'];
                ?>
                <?php } ?>
                <?php echo csrf_field();?>
                <div class = "label">Username</div>
                <input type="text" name="access_name" id="username" class="textbox">
                <div class = "label">Password</div>
                <input type="password" name="password" id="password" class="textbox">
                <input type="submit" value="Sign in" class="submit" name="botao">
            </form>
        </div>
        <!-- <div class = "main-container2">
            <div class = "forgot-password" onclick="forgotPassword()">Forgot password?</div>
        </div> -->
        <div class="footer-container">
            <p>If you're a new user, please&nbsp;</p>
            <a href="/users">create a account</a>
        </div>
    </div>
</body>
<?php
    if(isset($erro)){
        echo '<script type="text/javascript">';
        echo 'ErroLogin();';
        echo '</script>';
    }