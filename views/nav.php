<nav>
    <ul>
        <!-- <li><a href="http://superheroes.local/sh/list">superheroes</a></li>
        <li><a href="http://superheroes.local/ability/list">abilities</a></li>
        <li><a href="http://superheroes.local/user/list">users</a></li>
        <li><a href="http://superheroes.local/citizen/list">citizens</a></li>
        <li><a href="http://superheroes.local/request/list">requests</a></li>
        <li><a href="http://superheroes.local/evolution/list">evolutions</a></li> -->
        <li><a href="<?php echo URLBASE; ?>">Superheros</a></li>
        <li>
            <form action="<?php echo URLBASE; ?>sh/search" method="get" id="searchForm">
                <input type="text" id="name" name="name" placeholder="name">
                <button type="submit"> search</button>
            </form>
        </li>
        <?php
        if (array_search($_SESSION['user']['profile'], ['guest']) > -1) {
            echo '<li><a href="' . URLBASE . 'login">Log in</a></li>';
            echo '<li><a href="' . URLBASE . 'citizen/register">Register</a></li>';
        } else {
            if (array_search($_SESSION['user']['profile'], ['beginner', 'expert']) > -1) {
                echo '<li><a href="' . URLBASE . 'request/list">list my requests</a></li>';
                // echo '<li>
                //     <form action="' . URLBASE . 'sh/edit" method="post">
                //         <input type="text" id="superhero_id" name="superhero_id" value="' . $_SESSION['superhero']['id'] . '" hidden>
                //         <button>Edit abilities</button>
                //     </form>
                // </li>';
            }

            if (array_search($_SESSION['user']['profile'], ['expert']) > -1) {
                echo '<li><a href="' . URLBASE . 'sh/register">Register Superhero</a></li>';
            }

            echo '<li><a href="' . URLBASE . 'logout' . '">Log out</a></li>';
        }
        ?>
    </ul>
</nav>