<?php

    // Seed users and notes. Run: php seed.php
    // Note: truncates both tables first.

    require 'Database.php';

    $config = require 'config.php';

    $db = new Database($config['database']);

    $db->query("set foreign_key_checks = 0");
    $db->query("truncate table notes");
    $db->query("truncate table users");
    $db->query("set foreign_key_checks = 1");

    $users = [
        ['name' => 'John Doe',  'email' => 'john@example.com'],
        ['name' => 'Jane Smith', 'email' => 'jane@example.com'],
        ['name' => 'Ali Hassan', 'email' => 'ali@example.com'],
    ];

    foreach ($users as $user) {
        $db->query(
            "insert into users (name, email) values (:name, :email)",
            ['name' => $user['name'], 'email' => $user['email']]
        );
    }

    $notes = [
        ['body' => 'Learned about router.php and how requests are routed to controllers.'],
        ['body' => 'Refactored database connection to use config.php as parameters.'],
        ['body' => 'Practice: build a form to create new notes with prepared statements.'],
        ['body' => 'Read about PDO error modes and why ERRMODE_EXCEPTION is best.'],
        ['body' => 'Try session handling next: remember which user created a note.'],
    ];

    foreach ($notes as $index => $note) {
        $userId = $index % count($users) + 1;

        $db->query(
            "insert into notes (body, user_id) values (:body, :user_id)",
            ['body' => $note['body'], 'user_id' => $userId]
        );
    }

    echo "Seeded " . count($users) . " users and " . count($notes) . " notes.\n";
