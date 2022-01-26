<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1.4">
    <meta name="author" content="Javier Cebrián Muñoz">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="/proyecto/public/css/normalize.css">
    <link rel="stylesheet" href="/proyecto/public/css/styles.css">
    <!-- <script src="js/script.js"></script> -->
    <title>Superheroes</title>
</head>

<body>
    <header>
        <h1>Superheroes</h1>
    </header>

    <nav>
        <ul>
            <li><a href="/proyecto/public/index.php/sh/add">NEW</a>
            </li>
        </ul>
    </nav>
    <main>
        <section>
            <?php
            foreach ($data as $superhero) {
                echo '<form action="" method="post" class="card">';
                echo '<input type="number" name="id" id="id" value="' . $superhero['id'] . '" readonly>';
                echo '<input type="text" name="nombre" id="nombre" value="' . $superhero['nombre'] . '" readonly>';
                echo '<input type="number" name="velocidad" id="velocidad" value="' . $superhero['velocidad'] . '" readonly>';
                echo '<input type="datetime" name="createdAt" id="createdAt" value="' . $superhero['created_at'] . '" readonly>';
                echo '<input type="datetime" name="updatedAt" id="updatedAt" value="' . $superhero['updated_at'] . '" readonly>';
                echo '<a href="/' . DIRBASEURL . '/sh/edit/' . $superhero['id'] . '">EDIT</a>';
                echo '<a href="/' . DIRBASEURL . '/sh/del/' . $superhero['id'] . '">DELETE</a>';
                echo '</form>';
            }
            ?>
        </section>

    </main>

</body>

</html>