<?php

    require 'Database.php';

    $config = require 'config.php';

    $db = new Database($config['database']);

    $id = (int)($_GET['id'] ?? 0);

    $note = $db->fetchAll(
        "select n.*, u.name as author from notes n join users u on u.id = n.user_id where n.id = :id",
        ['id' => $id]
    )[0] ?? null;

    if (! $note) {
        abort();
    }

    require "views/note.view.php";
