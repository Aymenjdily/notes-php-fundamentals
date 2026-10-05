<?php

    require 'Database.php';

    $config = require 'config.php';

    $db = new Database($config['database']);
    $currentUserId = 1;

    $note = $db->query('select n.*, u.name as author from notes n join users u on u.id = n.user_id where n.id = :id', [
        'id' => $_GET['id']
    ])->findOrFail();

    authorize($note['user_id'] === $currentUserId);

    require "views/note.view.php";
