<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1.4">
    <meta name="author" content="Javier Cebrián Muñoz">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="/superheroes/public/css/normalize.css">
    <link rel="stylesheet" href="/superheroes/public/css/styles.css">
    <!-- <script src="js/script.js"></script> -->
    <title>Add Superhero</title>
</head>

<body>
    <header>
        <h1>Add Superhero</h1>
    </header>
    <main>
        <?php
        echo '<form action="" method="post">';
        echo '<input type="text" name="name" id="name" value="">';
        echo '<button type="submit" name="submit" value="insert">Insert</button>';
        echo '</form>';
        ?>

        <!-- TODO abilities -->
    </main>

</body>

</html>