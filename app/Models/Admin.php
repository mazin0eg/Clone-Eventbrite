<?php

namespace App\Models;
use App\Models\User;
use App\Core\Database;
use PDO;

class Admin extends User
{

    public function banUser($userId)
    {
        $conn = Database::getInstance()->getConnection();
        $query = "UPDATE users SET active = false WHERE id = :userId";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(':userId', $userId, PDO::PARAM_INT);
        return $stmt->execute();
    }

    public function unbanUser($userId)
    {
        $conn = Database::getInstance()->getConnection();
        $query = "UPDATE users SET active = true WHERE id = :userId";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(':userId', $userId, PDO::PARAM_INT);
        return $stmt->execute();
    }
}


