<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <?php require '../header.php' ?>
    <link rel="stylesheet" href="<?= URL_DEFAULT_PATH ?>/web/css/admin.css">
    <title>Painel</title>
</head>

<body class="bg-secondary d-flex align-items-center" style="height: 100vh;">

    <?php
    require 'login.php';
    setcookie('teste', 'teste',0, URL_DEFAULT_PATH);
    ?>

    <div>
        oi
       <?php print_r($_COOKIE['teste']); ?>
    </div>


</body>

</html>