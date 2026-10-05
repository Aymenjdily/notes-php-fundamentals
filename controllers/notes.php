<?php
    require 'Database.php';

    $config = require 'config.php';

    $db = new Database($config['database']);

    $notes = $db->query('select * from notes')->get();

    require "views/index.view.php"
?>
