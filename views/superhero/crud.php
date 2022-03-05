<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1.4">
    <meta name="author" content="Javier Cebrián Muñoz">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <?php include "../views/styles.php"; ?>
    <!-- <script src="js/script.js"></script> -->
    <title>Superheroes</title>
</head>

<body>
    <header>
        <h1>Superheroes</h1>
    </header>
    <?php include "../views/nav.php"; ?>
    <main>
        <section>
            <div class="card grid columns-8">
                <span>image</span>
                <span>id</span>
                <span>name</span>
                <span>evolution</span>
                <span>id_user</span>
                <span>created-at</span>
                <span>updated-at</span>
                <span>actions</span>
            </div>
            <?php
            foreach ($data as $superhero) {
                echo '<div action="" method="post" class="card grid columns-8">';
                echo '<img width="50px" src="' . URLBASE . 'img/' . $superhero['image'] . '" alt="">';
                echo '<div>' . $superhero['id'] . '</div>';
                echo '<div>' . $superhero['name'] . '</div>';
                echo '<div>' . $superhero['evolution'] . '</div>';
                echo '<div>' . $superhero['id_user'] . '</div>';
                echo '<div>' . $superhero['created_at'] . '</div>';
                echo '<div>' . $superhero['updated_at'] . '</div>';
                echo '<div class="flex-vertical">';
                echo '<a href="/sh/update/' . $superhero['id'] . '">EDIT</a>';
                echo '<a href="/sh/delete/' . $superhero['id'] . '">DELETE</a>';
                echo '</div>';
                echo '</div>';
            }
            // TODO: actualizar para que se muestren habilidades
            ?>
        </section>

    </main>

</body>

</html>