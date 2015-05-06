<!doctype html>
<html lang="fr">
    <head>
        <meta charset="UTF-8" />
        <base href="<?php echo $webRoot ?>" >
        <link rel="stylesheet" href="contents/css/style.css" />
        <title><?php echo $title ?></title>
        <?php
            if(isset($_COOKIE['isTerminal']) && $_COOKIE['isTerminal']) {
                echo '<script type="text/javascript" src="contents/js/whitelist.js"></script>';
                }
        ?>        
    </head>
    <body>
        <div id="global">
            <header>
                <a href=""><h1 id="titreBlog">SOCIONET</h1></a>
            </header>
            <div id="contenu">
                <?php echo $content ?>
            </div> <!-- #contenu -->
            <footer id="piedBlog">
                PHP, HTML5 et CSS.
            </footer>
        </div> <!-- #global -->
    </body>
</html>
