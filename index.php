<?php
    function main() {
        require 'class/main.php';
        $func = new Main();
        $func->navigation();
    }
?>
<!DOCTYPE HTML>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Piłka Nożna</title>
</head>
<body>
    <main>
        <?php main();?>
    </main>
</body>
</html>