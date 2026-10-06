<?php

    $db = new \App\Core\Database(config('database'));
    $currentUserId = 1;

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $errors = [];

        if (! \App\Core\Validator::string($_POST['body'], 1, 1000)) {
            $errors['body'] = 'A body of no more than 1,000 characters is required.';
        }

        if (empty($errors)) {
            $db->query('INSERT INTO notes (body, user_id) VALUES (:body, :user_id)', [
                'body' => $_POST['body'],
                'user_id' => $currentUserId
            ]);

            header('Location: /');
            exit;
        }
    }

    require base_path('/views/notes/note-create.view.php');
