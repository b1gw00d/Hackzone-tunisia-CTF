

    <?php
    include 'config.php';
    $bd = mysql_connect(DB_HOST, DB_USER, DB_PASS) or die("Could not connect database");
    mysql_select_db(DB_NAME, $bd) or die("Could not select database");
    ?>
