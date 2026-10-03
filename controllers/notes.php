<?php
    require 'Database.php';

    $config = require 'config.php';

    $db = new Database($config['database']);

    $notes = $db->fetchAll(
        "select * from notes"
    );

    require "views/index.view.php"
?>