<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1.4">
    <meta name="author" content="Javier Cebrián Muñoz">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <?php include "../views/styles.php"; ?>
    <!-- <script src="js/script.js"></script> -->
    <title>Register Superhero</title>
</head>

<body>
    <?php include "../views/header.php"; ?>
    <?php include "../views/nav.php"; ?>
    <main>
        <header>
            <h2>Register Superhero</h2>
        </header>
        <form action="" method="post" enctype="multipart/form-data" class="card flex-vertical">
            <div style="display:flex; align-items: center;">
                <div class="card grid columns-2">
                    <label>user</label>
                    <input type="text" name="user" id="user" value="" required>
                    <label>psw</label>
                    <input type="password" name="psw" id="psw" value="" required>
                    <label>name</label>
                    <input type="text" name="name" id="name" value="" required>
                    <label>image</label>
                    <input type="file" id="img" name="img" required>
                </div>
                <div class="card grid columns-2">
                    <?php
                    foreach ($data as $ability) {
                        echo '<label for="' . $ability['name'] . '">' . $ability['name']  . '</label>';
                        echo '<input type="number" id="' . $ability['name'] . '" min="0" name="' . $ability['name']  . '" min="0" max="100" placeholder="50">';
                    }
                    ?>
                </div>
            </div>

            <button type="submit" name="submit" value="register">Register</button>
        </form>
    </main>
    <aside class="card">
        <a href="<?php URLBASE ?>img/sh-img.zip" download>Imagenes de ejemplo </a>
    </aside>
</body>

</html>