<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=chrome">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/reset.css">
    <link rel="stylesheet" href="/css/userSelect.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <script src="/js/selectUser.js"></script>
    <title>Manage users</title>
</head>
<body>
    <script type="text/javascript" src="home.js"></script>
    <div class = "body-container">
        <div class="header-container-general">
            <div class="header-container1">
                    <a class="button-back" href="/home"><img src="/images/arrowLeft.png"></a>
            </div>
            <div class="header-container2">
                   <h1 class="title">Manage users</h1>
            </div>
        </div>
       <div class = "main-container">
           <table class="table">
               <tr>
                   <th>ID</th>
                   <th>Name</th>
                   <th>Username</th>
                   <th>Email</th>
                   <th>Password</th>
                   <th>Status</th>
                </tr>
                <?php
                        foreach ($users as $user => $row) {
                            ?>
                        <form id="user-form" method="post">
                            <tr>
                                <th id="codigo"><?= $row['id'] ?></th>
                                <input type="hidden" id="id" name="id" value="<?= $row['id'] ?>"></input>
                                <input type="hidden" id="name_DB" name="name_DB" value="<?= $row['name'] ?>"></input>
                                <input type="hidden" id="accessName_DB" name="accessName_DB"value="<?= $row['access_name'] ?>"></input>
                                <input type="hidden" id="email_DB" name="email_DB" value="<?= $row['email'] ?>"></input>
                                <input type="hidden" id="password_DB" name="password_DB" value="<?= $row['password'] ?>"></input>
                                <input type="hidden" id="status_DB" name="status_DB" value="<?= $row['status'] ?>"></input>
                                <input type="hidden" id="user" name="user" value="<?= $user ?>"></input>
                                <input type="hidden" id="adm" name="adm" value="<?= $row['adm'] ?>"></input>
                                <th><input type="text" class="input-text" name="name" id="name" value="<?= $row['name'] ?>"></th>
                                <th><input type="text" class="input-text" id="access_name" name="access_name" value="<?= $row['access_name']?>"></th>
                                <th><input type="text" class="input-text" id="email" name="email" value="<?= $row['email'] ?>"></th>
                                <th><input type="password" class="input-text" id="password" name="password" value="<?= $row['password'] ?>" readonly></th>
                                <th><input type="text" class="input-text" id="status" name="status" value="<?= $row['status'] ?>"></th>
                                <th><input type="text" class="input-text" id="adm" name="adm" value="<?= $row['adm'] ?>"></th>
                                <th>
                                    <?php echo csrf_field();?>
                                    <input type="submit" class="btn-edit" value="Edit" formaction='/users/update'>
                                    <input type="submit" class="btn-delete" value="Delete" formaction='/users/delete'>
                                </th>
                            </tr>
                        </form>
                        <?php } ?>
                </table>
        </div>
        <div class="button-container">
            <a class="button-insert"href="/users/createScreen">Insert new user</a>
        </div>
    </div>
</body>
</html>