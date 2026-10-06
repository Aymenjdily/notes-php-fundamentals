<?php

    $db = new \App\Core\Database(config('database'));

    $notes = $db->query('select n.*, u.name as author from notes n join users u on u.id = n.user_id order by n.id')->get();

    require base_path('/views/notes/index.view.php');
