<?php

use App\Core\Response;

return [
      '/' => 'controllers/notes/notes.php',
      '/note/create' => 'controllers/notes/create.php',

      // :id is matched numerically and injected into $_GET['id']
      '/note/:id' => 'controllers/notes/note.php',
      '/note/edit/:id' => 'controllers/notes/edit.php',
      '/note/delete/:id' => 'controllers/notes/delete.php',

      // also reachable as /note?id=1
      '/note' => 'controllers/notes/note.php',
      '/note/edit' => 'controllers/notes/edit.php',
      '/note/delete' => 'controllers/notes/delete.php',
];
