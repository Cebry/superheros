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
    <header>
        <h1>Register Superhero</h1>
    </header>
    <?php include "../views/nav.php"; ?>
    <main>
        <form action="" method="post" enctype="multipart/form-data">
            <div style="display:flex;">
                <div class="card grid columns-4">
                    <label>user</label>
                    <label>psw</label>
                    <label>name</label>
                    <label>image</label>
                    <input type="text" name="user" id="user" value="" required>
                    <input type="text" name="psw" id="psw" value="" required>
                    <input type="text" name="name" id="name" value="" required>
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
</body>

</html>