<?php

    // HTML forms can not send PUT/PATCH/DELETE spoof the intended verb:
    // <input type="hidden" name="_method" value="PATCH">

    $db = new \App\Core\Database(config('database'));
    $currentUserId = 1;

    $note = $db->query('select * from notes where id = :id', [
        'id' => $_GET['id'] ?? 0
    ])->findOrFail();

    $requestMethod = $_POST['_method'] ?? $_SERVER['REQUEST_METHOD'];

    if ($requestMethod === 'PATCH') {
        $errors = [];

        if (! \App\Core\Validator::string($_POST['body'], 1, 1000)) {
            $errors['body'] = 'A body of no more than 1,000 characters is required.';
        }

        if (empty($errors)) {
            $db->query('UPDATE notes SET body = :body WHERE id = :id', [
                'body' => $_POST['body'],
                'id' => $_GET['id']
            ]);

            header('Location: /note/' . $_GET['id']);
            exit;
        }
    }

    authorize($note['user_id'] === $currentUserId);

    require base_path('/views/notes/note-edit.view.php');
