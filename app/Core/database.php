<?php
class Database
{
  private static ?Database $instance = null;
  private PDO $connection;

  private function __construct()
  {
    $config = require_once __DIR__ . '/../../config/database.php';

    $dsn = sprintf(
      "pgsql:host=%s;port=%s;dbname=%s",
      $config['host'],
      $config['port'],
      $config['database']
    );

    try {
      $this->connection = new PDO(
        $dsn,
        $config['username'],
        $config['password'],
        [
          PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
          PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
          PDO::ATTR_EMULATE_PREPARES => false
        ]
      );
    } catch (PDOException $e) {
      throw new Exception("Connection failed: " . $e->getMessage());
    }
  }

  public static function getInstance(): Database
  {
    if (self::$instance === null) {
      self::$instance = new self();
    }
    return self::$instance;
  }

  public function getConnection(): PDO
  {
    return $this->connection;
  }

}