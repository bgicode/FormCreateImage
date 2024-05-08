<?php
include_once('formHandler.php');
?>

<!DOCTYPE html>
<html lang="ru">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>
    <body>
        <div class="wrap">
            <div class="formWraper">
                <form class="form" name="generateImg" method="POST" action="<?php $_SERVER['REQUEST_URI'] ?>">
                    <div class="formTitle">Текст</div>
                    <textarea name="text" required></textarea>
                    <div class="btnWrap">
                        <input class="submitBtn" type="submit" name="submit_btn" value="Сгенерировать">
                    </div>
                </form>
            </div>
            <div class="imageWrap">
                <?php
                if ($image) {
                    echo '<img src="image.php" class="image">';
                }
                ?>
            </div>
        </div>
    </body>
</html>
