<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=chrome">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/reset.css">
    <link rel="stylesheet" href="/css/userCreate.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <title>Create user</title>
</head>
<body>
    <script type="text/javascript" src="home.js"></script>
    <div class = "body-container">
        <div class="header-container-general">
            <div class="header-container1">
                    <a class="button-back" href="/home"><img src="/images/arrowLeft.png"></a>
            </div>
            <div class="header-container2">
                   <h1 class="title">Create a new user</h1>
            </div>
        </div>
        <div class="main-container">
            <div class="form-container">
                <form action="/users/create" method="post">
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
                    <?php echo csrf_field();?>
                    <input type="submit" value="Create" class="submit">
                </form>
            </div>
        </div>
    </div>
</body>
</html>