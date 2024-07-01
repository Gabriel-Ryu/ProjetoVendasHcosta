<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=chrome">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/reset.css">
    <link rel="stylesheet" href="/css/pedidoSelect.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <script src="/js/pedidoSelect.js"></script>
    <title>Pedidos</title>
</head>
<body>
    <script type="text/javascript" src="home.js"></script>
    <div class = "body-container">
        <div class="header-container-general">
            <div class="header-container1">
                    <a class="button-back" href="/home"><img src="/images/arrowLeft.png"></a>
            </div>
            <div class="header-container2">
                   <h1 class="title">Pedidos</h1>
            </div>
        </div>
       <div class = "main-container">
           <table class="table">
               <tr>
                   <th>Código</th>
                   <th>Cliente</th>
                   <th>Valor</th>
                   <th>Produto</th>
                   <th>Quantidade</th>
                   <th>Valor Total</th>
                   <th>Status</th>
                </tr>
                <?php
                        $pedidos;
                        foreach ($pedidos as $pedido => $row) {
                            $detalhes = json_decode($row['detalhes']);
                            ?>
                        <form id="pedidos-form" method="post">
                            <tr>
                                <th id="codigo"><?= $row['id'] ?></th>
                                <input type="hidden" id="id" name="id" value="<?= $row['id'] ?>"></input>
                                <input type="hidden" id="cliente_DB" name="cliente_DB" value="<?= $row['cliente'] ?>"></input>
                                <input type="hidden" id="valorTotal_DB" name="valorTotal_DB"value="<?= $row['valorTotalPedido'] ?>"></input>
                                <input type="hidden" id="status_DB" name="status_DB" value="<?= $row['status'] ?>"></input>
                                <th><input type="text" class="input-text" name="cliente" id="cliente" value="<?= $row['cliente'] ?>"></th>
                                <?php
                                    $produto = "";
                                    $quantidade = 0;
                                    foreach ($detalhes as $k => $v) {
                                        foreach ($v as $key => $value) {
                                            $nome = trim(json_encode($key),'"');
                                            if($nome == "produto"){
                                                $produto = trim(json_encode($value),'"');
                                                ?>
                                                <th><input type="text" class="input-text" id="<?= $nome?>" name="<?= $nome?>[]" value="<?= $produto?>"></th>
                                                <?php
                                            }
                                            if($nome == "valor"){
                                                $valor = trim(json_encode($value),'"');
                                                ?>
                                                <th><input type="text" class="input-text" id="<?= $nome?>" name="<?= $nome?>[]" value="<?= $valor?>"></th>
                                                <?php
                                            }
                                            if($nome =="quantidade"){
                                                $quantidade = trim(json_encode($value),'"');
                                                ?>
                                                <th><input type="text" class="input-text" id="<?= $nome?>" name="<?= $nome?>[]" value="<?= $quantidade?>"></th>
                                                <?php
                                            }
                                            ?>
                                        <?php
                                    }
                                }  
                                ?>
                                <th><input type="text" class="input-text" id="valorTotal" name="valorTotal" value="<?= $row['valorTotalPedido']?>"></th>
                                <th><input type="text" class="input-text" id="status" name="status" value="<?= $row['status'] ?>"></th>
                                <th>
                                    <?php echo csrf_field();?>
                                    <input type="submit" class="btn-delete" value="Cancelar" formaction='/pedidos/delete'>
                                    <?php
                                        if(cache('adm') == 1){
                                            ?>
                                            <input type="submit" class="btn-edit" value="Editar" formaction='/pedidos/update'>
                                        <?php
                                        }
                                    ?>
                                </th>
                            </tr>
                        </form>
                        <?php } ?>
                </table>
        </div>
    </div>
</body>
</html>