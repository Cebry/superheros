<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1.4">
    <meta name="author" content="Javier Cebrián Muñoz">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- <link rel="stylesheet" href="css/normalize.css"> -->
    <!-- <link rel="stylesheet" href="css/styles.css"> -->
    <!-- <script src="js/script.js"></script> -->
    <title>Numeros</title>
</head>

<body>
    <header>
        <h1>Numeros</h1>
    </header>
    <main>
        <ul>
            <?php foreach ($data as  $value) echo '<li>' . $value . '</li>'; ?>
        </ul>
    </main>

</body>

</html>