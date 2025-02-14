<?php

namespace App\Models;
use App\Models\User;
use App\Core\Database;
use PDO;

class Admin extends User
{
    private $conn;

    public function __construct($db)
    {
        $this->conn = $db;
    }

    public function banUser($userId)
    {
        $query = "UPDATE users SET active = false WHERE id = :userId";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':userId', $userId, PDO::PARAM_INT);
        return $stmt->execute();
    }

    public function unbanUser($userId)
    {
        $query = "UPDATE users SET active = true WHERE id = :userId";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':userId', $userId, PDO::PARAM_INT);
        return $stmt->execute();
    }
}


