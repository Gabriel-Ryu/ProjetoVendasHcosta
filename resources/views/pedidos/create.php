<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=chrome">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/reset.css">
    <link rel="stylesheet" href="/css/productsSelect.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <script src="/js/selectIngredients.js"></script>
    <title>products</title>
</head>
<body>
    <div class = "body-container">
        <div class="header-container-general">
            <div class="header-container1">
                    <a class="button-back" href="/home"><img src="/images/arrowLeft.png"></a>
            </div>
            <div class="header-container2">
                   <h1 class="title">Faça seu pedido</h1>
            </div>
        </div>
        <div class = "main-container">
           <table class="table">
                <tr>
                   <th>ID</th>
                   <th>Nome</th>
                   <th>Valor</th>
                   <th>Quantidade</th>
                </tr>
                <form id="user-form" action="/pedidos/create" method="post">
                    <div class="form-container">
                        <div class="form-middle-container">
                        <?php
                            foreach ($products as $key => $value) {
                                $produtoJson = json_encode($value);
                                $produto = json_decode($produtoJson, true);
                                ?>
                                <tr>
                                    <th id="codigo"><?= $produto['id'] ?></th>
                                    <th><input type="text" class="input-text" name="descricao[]" id="descricao" value="<?= $produto['descricao'] ?>" readonly></th>
                                    <th><input type="text" class="input-text" name="valor[]" id="valor" value="<?= $produto['valor'] ?>" readonly></th>
                                    <th><input type="number" class="input-text" id="quantidade" name="quantidade[]"></th>
                                </tr>
                        </div>
                        <?php
                        $key = "";
                        $value = "";
                        } 
                        
                        ?>
                        <?php echo csrf_field();?>
                            <div class="form-button-container">
                                    <input type="submit" value="Finalizar pedido" class="button-insert">
                            </div>
                    </div>
                </form>
            </table>
        </div>
    </div>
</body>
</html>