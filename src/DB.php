<?php
namespace Src;
use PDO;

class DB {
        public $conn;

        public function __construct()
        {
            // $this->conn = null;
            
            // Set Options of conn
            $options = [
                \PDO::ATTR_ERRMODE            => \PDO::ERRMODE_EXCEPTION,
                \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC,
                \PDO::ATTR_EMULATE_PREPARES   => false,
            ];

            try {
                $this->conn = new PDO("mysql:host=localhost;dbname=api;port=3307", "root", "", $options);
            } catch (\Throwable $e) {
                throw new \PDOException($e->getMessage(), (int)$e->getCode());
            }
        }

        public function get_vars($table = null, $array = [])
        {

        }

        public function db()
        {
            return $this->conn;
        }
    }