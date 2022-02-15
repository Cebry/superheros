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
    <title>Users</title>
</head>

<body>
    <header>
        <h1>Users</h1>
    </header>

    <nav>
        <ul>
            <li>
                <?php echo '<a href="/' . DIRBASEURL . '/user/add' . '" class="add">NEW</a>'; ?> </li>
        </ul>
    </nav>
    <main>
        <section>
            <?php
            foreach ($data as $user) {
                echo '<form action="" method="post" class="card">';
                echo '<input type="number" name="id" id="id" value="' . $user['id'] . '" readonly>';
                echo '<input type="text" name="user" id="user" value="' . $user['user'] . '" readonly>';
                echo '<input type="text" name="psw" id="psw" value="' . $user['psw'] . '" readonly>';
                echo '<input type="datetime" name="createdAt" id="createdAt" value="' . $user['created_at'] . '" readonly>';
                echo '<input type="datetime" name="updatedAt" id="updatedAt" value="' . $user['updated_at'] . '" readonly>';
                echo '<a href="/' . DIRBASEURL . '/user/edit/' . $user['id'] . '" class="update">EDIT</a>';
                echo '<a href="/' . DIRBASEURL . '/user/del/' . $user['id'] . '" class="delete">DELETE</a>';
                echo '</form>';
            }
            ?>
        </section>
    </main>
</body>

</html>