<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <?php require 'header.php' ?>
    <link rel="stylesheet" href="web/css/admin.css">
    <title>Painel</title>
</head>

<body>

    <pre>
        <?php 
        print_r($_POST);
        setcookie('teste','1234');
        ?>           
    </pre>

    <form action="./admin.php" method="POST">
        <input type="text" name="teste">
        <button type="submit">Ok</button>
    </form>

</body>

</html>