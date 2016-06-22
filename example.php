<?php require 'class.image-to-css.php'; ?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>

<div id="image"></div>

<?=(new ImageToCss('pacman.png', '#image'))->draw();?>

</body>
</html>
