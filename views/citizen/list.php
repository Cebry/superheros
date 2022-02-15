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
    <title>Citizens</title>
</head>

<body>
    <header>
        <h1>Citizens</h1>
    </header>
    <?php include "../views/nav.php"; ?>
    <main>
        <section>
            <?php echo '<a href="/' . DIRBASEURL . '/citizen/add' . '" class="add">NEW</a>'; ?>
            <?php
            foreach ($data as $citizen) {
                echo '<form action="" method="post" class="card">';
                echo '<input type="number" name="id" id="id" value="' . $citizen['id'] . '" readonly>';
                echo '<input type="text" name="name" id="name" value="' . $citizen['name'] . '" readonly>';
                echo '<input type="text" name="email" id="email" value="' . $citizen['email'] . '" readonly>';
                echo '<input type="text" name="idUser" id="idUser" value="' . $citizen['idUser'] . '" readonly>';
                echo '<input type="datetime" name="createdAt" id="createdAt" value="' . $citizen['created_at'] . '" readonly>';
                echo '<input type="datetime" name="updatedAt" id="updatedAt" value="' . $citizen['updated_at'] . '" readonly>';
                echo '<a href="/' . DIRBASEURL . '/citizen/edit/' . $citizen['id'] . '" class="update">EDIT</a>';
                echo '<a href="/' . DIRBASEURL . '/citizen/del/' . $citizen['id'] . '" class="delete">DELETE</a>';
                echo '</form>';
            }
            ?>
        </section>
    </main>
</body>

</html>