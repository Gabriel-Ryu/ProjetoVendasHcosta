<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=chrome">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/reset.css">
    <link rel="stylesheet" href="/css/home.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <title>Document</title>
</head>
<body>
    <script type="text/javascript" src="/js/home.js"></script>
    <div class = "body-container">
        <div class="header-container-general">
            <div class = "header-container1">
                    <button class="material-symbols-outlined" onclick="openOption()"> Menu</button>
                    <?php
                        if(cache('adm') == 1){
                            ?>
                    <a href="/pedidos/select" class="pedidos" id="onlyAdm-whishlist" style="display:flex">Pedidos</a>
                            <?php
                        }
                    ?>
                    <?php
                        if(cache('adm') == 0){
                            ?>
                    <a href="/pedidos/select" class="pedidos" id="whishlist" style="display:flex">Meus Pedidos</a>
                            <?php
                        }
                    ?>
                    
            </div>
            <div class = "header-container2">
                    <?php
                        if(cache('adm') == 1){
                            ?>
                <div id="onlyAdm-userlist" style="display:flex">
                    <a href="users/select" >User</a>
                    <p>|</p>
                </div>
                <?php
                        }
                    ?>
                <a href="/pedidos/createTela">Comprar</a>
                <p>|</p>
                <a>Carrinho</a>
                <div class="container-personal-image">
                    <img src="/images/profileTeste.png" alt="" class="personal-image" onclick="openMenu()">
                </div>
             </div>
        </div>
        <div class="option-modal">
            <div class="options">
                <a href="">About us</a>
            </div>
            <div class="button-back">
                <img src="images/arrowLeft.png" class="close-option-modal"></img>
            </div>
        </div>
        <div class="profile-modal">
            <div class="profile-button-close-container">
                <div class="profile-button-close">
                    <img src="images/close.png" class="close-option-modal"></img>
                </div>
            </div>
            <div class="header-profile-modal">
                <div class="img-profile-container">
                    <img src="/images/profileTeste.png" alt="" class="img-profile">
                </div>
            </div>
            <div class="header-profile-modal">
                <div class="nome-profile-container">
                    <p><?=
                        cache('user');
                    ?></p>
                </div>
            </div>
            <div class="exit-container">
                <a href="/">Exit</a>
            </div>
        </div>
    </div>
</body>
</html>