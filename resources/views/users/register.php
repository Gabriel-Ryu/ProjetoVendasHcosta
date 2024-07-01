<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/reset.css">
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="/css/register.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="/js/register.js"></script>
    <title>Register</title>
</head>
<body>
    <div class = "body-container">
        <div class="header-container">
            <div class = "label-title">Create a account</div>
        </div>
        <div class="main-container">
            <form action="/users/register" method="post">
                <div class = "label">Name</div>
                <input type="text" name="name" id="name" class="textbox">
                <div class = "label">Username</div>
                <input type="text" name="access_name" id="access_name" class="textbox">
                <div class = "label">Email</div>
                <input type="email" name="email" id="email" class="textbox">
                <div class = "label">Password</div>
                <input type="password" name="password" id="password" class="textbox">
                <div class = "label">Confirm Password</div>
                <input type="password" name="confirmation_password" id="password-confirmation" class="textbox" onblur="checkPassword()">
                <div class="img-container">
                <div class = "label">Put a image for your profile</div>
                <input type="file" name="img-profile" id="img-profile" class="img-profile" value = "image">
            </div>
                <?php echo csrf_field();?>
                <input type="submit" value="Create" class="submit">
            </form>
        </div>
        <div class = "footer-container">
            <a href="/" class="button-cancel">Cancel</a>
        </div>
    </div>
</body>
</html>