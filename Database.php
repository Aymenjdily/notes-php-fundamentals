<?php

    class Database {

        protected static ?PDO $pdo = null;

        protected static array $config = [];

        public function __construct(array $config) {
            self::$config = $config;
        }

        public function connect(): PDO {
            if (self::$pdo === null) {
                $dsn = "mysql:host=" . self::$config['host']
                     . ";port=" . self::$config['port']
                     . ";dbname=" . self::$config['name']
                     . ";charset=utf8mb4";

                self::$pdo = new PDO($dsn, self::$config['username'], self::$config['password'], [
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                ]);
            }

            return self::$pdo;
        }

        public function query(string $sql, array $params = []): PDOStatement {
            $statement = $this->connect()->prepare($sql);
            $statement->execute($params);

            return $statement;
        }

        public function fetchAll(string $sql, array $params = []): array {
            return $this->query($sql, $params)->fetchAll();
        }

    };
