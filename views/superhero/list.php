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
            <?php echo '<a href="/sh/add" class="add">NEW</a>'; ?>
            <?php
            foreach ($data as $superhero) {
                echo '<form action="" method="post" class="card">';
                echo '<input type="number" name="id" id="id" value="' . $superhero['id'] . '" readonly>';
                echo '<input type="text" name="nombre" id="nombre" value="' . $superhero['name'] . '" readonly>';
                echo '<input type="datetime" name="createdAt" id="createdAt" value="' . $superhero['created_at'] . '" readonly>';
                echo '<input type="datetime" name="updatedAt" id="updatedAt" value="' . $superhero['updated_at'] . '" readonly>';
                echo '<a href="/sh/edit/' . $superhero['id'] . '" class="update">EDIT</a>';
                echo '<a href="/sh/del/' . $superhero['id'] . '" class="delete">DELETE</a>';
                echo '</form>';
            }
            ?>
            <!-- TODO abilities -->
        </section>

    </main>

</body>

</html>