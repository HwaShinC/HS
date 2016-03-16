<?php
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'agark');
define('DB_PASSWORD', 'dcbKPbtm7cD695UE');
define('DB_DATABASE', 'agark');

class DB_con {

    function __construct() {
        $connection = mysql_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD) or die('Oops connection error -> ' . mysql_error());
        mysql_select_db(DB_DATABASE, $connection) or die('Database error -> ' . mysql_error());
    }

}
?>
