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
    <?php include "../views/header.php"; ?>
    <?php include "../views/nav.php"; ?>
    <main>
        <header>
            <h2>List</h2>
        </header>
        <?php
        foreach ($data as $superhero) {
            echo '<div class="card grid columns-3">';
            echo '<img src="' . URLBASE . 'img/' . $superhero['image'] . '" alt="">';
            echo '<div>';
            echo '<h1>' . $superhero['name'] . '</h1>';
            echo '<p>' . $superhero['evolution'] . '</p>';
            echo '</div>';

            echo '<div class="card grid columns-2">';
            foreach ($superhero['abilities'] as $ability) {
                echo '<div>' . $ability[0] . '</div>';
                echo '<div>' . $ability[1] . '</div>';
            }

            echo '</div>';
            if (array_search($_SESSION['user']['profile'], ['citizen']) > -1) {
                echo '<form action="/request/new" method="post">
                <input type="text" name="superhero_id" value="' . $superhero['id'] . '" hidden>
                <input type="text" name="citizen_id" value="' . $_SESSION['citizen']['id'] . '" hidden>
                <button type="submit">Request</button>
                </form>';
            }
            echo '</div>';
        }
        ?>

    </main>

</body>


</html>