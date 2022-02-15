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
    <title>Abilities</title>
</head>

<body>
    <header>
        <h1>Abilities</h1>
    </header>

    <nav>
        <ul>
            <li>
                <?php echo '<a href="/' . DIRBASEURL . '/ability/add' . '" class="add">NEW</a>'; ?> </li>
        </ul>
    </nav>
    <main>
        <section>
            <?php
            foreach ($data as $ability) {
                echo '<form action="" method="post" class="card">';
                echo '<input type="number" name="id" id="id" value="' . $ability['id'] . '" readonly>';
                echo '<input type="text" name="nombre" id="nombre" value="' . $ability['name'] . '" readonly>';
                echo '<input type="datetime" name="createdAt" id="createdAt" value="' . $ability['created_at'] . '" readonly>';
                echo '<input type="datetime" name="updatedAt" id="updatedAt" value="' . $ability['updated_at'] . '" readonly>';
                echo '<a href="/' . DIRBASEURL . '/ability/edit/' . $ability['id'] . '" class="update">EDIT</a>';
                echo '<a href="/' . DIRBASEURL . '/ability/del/' . $ability['id'] . '" class="delete">DELETE</a>';
                echo '</form>';
            }
            ?>
        </section>
    </main>
</body>

</html>