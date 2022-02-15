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
    <title>Requests</title>
</head>

<body>
    <header>
        <h1>Requests</h1>
    </header>

    <nav>
        <ul>
            <li>
                <?php echo '<a href="/' . DIRBASEURL . '/request/add' . '" class="add">NEW</a>'; ?> </li>
        </ul>
    </nav>
    <main>
        <section>
            <?php
            foreach ($data as $request) {
                echo '<form action="" method="post" class="card">';
                echo '<input type="number" name="id" id="id" value="' . $request['id'] . '" readonly>';
                echo '<input type="text" name="title" id="title" value="' . $request['title'] . '" readonly>';
                echo '<input type="text" name="description" id="description" value="' . $request['description'] . '" readonly>';
                echo '<input type="text" name="done" id="done" value="' . $request['done'] . '" readonly>';
                echo '<input type="text" name="idSuperhero" id="idSuperhero" value="' . $request['idSuperhero'] . '" readonly>';
                echo '<input type="text" name="idCitizen" id="idCitizen" value="' . $request['idCitizen'] . '" readonly>';
                echo '<input type="datetime" name="createdAt" id="createdAt" value="' . $request['created_at'] . '" readonly>';
                echo '<input type="datetime" name="updatedAt" id="updatedAt" value="' . $request['updated_at'] . '" readonly>';
                echo '<a href="/' . DIRBASEURL . '/request/edit/' . $request['id'] . '" class="update">EDIT</a>';
                echo '<a href="/' . DIRBASEURL . '/request/del/' . $request['id'] . '" class="delete">DELETE</a>';
                echo '</form>';
            }
            ?>
        </section>
    </main>
</body>

</html>