<?php

    $db = new \App\Core\Database(config('database'));
    $currentUserId = 1;

    $note = $db->query('select n.*, u.name as author from notes n join users u on u.id = n.user_id where n.id = :id', [
        'id' => $_GET['id']
    ])->findOrFail();

    authorize($note['user_id'] === $currentUserId);

    require base_path('/views/notes/note.view.php');
