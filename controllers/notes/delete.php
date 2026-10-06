<?php

    $db = new \App\Core\Database(config('database'));
    $currentUserId = 1;

    $note = $db->query('select * from notes where id = :id', [
        'id' => $_GET['id'] ?? 0
    ])->findOrFail();

    authorize($note['user_id'] === $currentUserId);

    $requestMethod = $_POST['_method'] ?? $_SERVER['REQUEST_METHOD'];

    if ($requestMethod === 'DELETE') {
        $db->query('DELETE FROM notes WHERE id = :id', [
            'id' => $_GET['id']
        ]);

        header('Location: /');
        exit;
    }

    abort();
