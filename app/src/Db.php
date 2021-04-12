<?php

    declare(strict_types=1);

    namespace App;

    use PDO as PDO;

    class DB
    {
        private static function connect(): PDO
        {
            $pdo = new PDO('mysql:host=localhost;dbname=rest_api', 'root', 'root');
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            return $pdo;
        }

        /**
         * @param $query
         * @param array $params
         * @return array|null
         */
        public static function query($query, array $params = []): ?array
        {
            $stmt = self::connect()->prepare($query);
            $stmt->execute($params);
            if (explode(' ', $query)[0] == 'SELECT') {
                $data = $stmt->fetchAll(PDO::FETCH_ASSOC);

                return $data;
            } else {
                return null;
            }
        }
    }
