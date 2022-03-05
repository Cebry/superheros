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
        <div class="card grid columns-3">
            <span>name</span>
            <span>image</span>
            <span>evolution</span>
        </div>
        <?php
        foreach ($data as $superhero) {
            echo '<div class="card">';

            echo '<div class="card grid columns-3">';
            echo '<div>' . $superhero['name'] . '</div>';
            echo '<div>' . $superhero['image'] . '</div>';
            echo '<div>' . $superhero['evolution'] . '</div>';

            echo '</div>';


            // foreach ($superhero['abilities'] as $ability) {

            //     echo '<div class="card grid columns-2">';
            //     echo '<div>' . $ability['id_ability'] . '</div>';
            //     echo '<div>' . $ability['value'] . '</div>';
            //     echo '</div>';
            // }

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