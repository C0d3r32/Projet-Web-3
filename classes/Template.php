<?php
class Template
{

    public static function render(string $content) : void{?>

        <!doctype html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <title>CinéList</title>
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>

            <link rel="stylesheet" href="<?php echo $GLOBALS['CSS_DIR'] ?>style.css">

        </head>
        <body>
            <?php include "header.php" ?>

            <div class="content">
                <?php echo $content ?>
            </div>

            <?php include "footer.php" ?>

        </body>
        </html>

    <?php
    }

}