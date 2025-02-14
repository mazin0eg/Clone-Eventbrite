<?php

namespace App\Models;
use App\Core\Database;
use PDO;
class User
{
    private $id;
    private $avatar;
    private $username;
    private $email;
    private $phone;
    private $password;
    private $role;

    public function __construct($id, $avatar, $username, $email, $phone, $password, $role)
    {
        $this->id = $id;
        $this->avatar = $avatar;
        $this->username = $username;
        $this->email = $email;
        $this->phone = $phone;
        $this->password = $password;
        $this->role = $role;
    }

    // Getters
    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAvatar(): ?string
    {
        return $this->avatar;
    }

    public function getUsername(): string
    {
        return $this->username;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getPhone(): string
    {
        return $this->phone;
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    public function getRole(): string
    {
        return $this->role;
    }

    // Setters
    public function setAvatar(string $avatar): void
    {
        $this->avatar = $avatar;
    }

    public function setUsername(string $username): void
    {
        $this->username = htmlspecialchars(strip_tags($username));
    }

    public function setEmail(string $email): void
    {
        $this->email = htmlspecialchars(strip_tags($email));
    }

    public function setPhone(string $phone): void
    {
        $this->phone = htmlspecialchars(strip_tags($phone));
    }

    public function setPassword(string $password): void
    {
        $this->password = password_hash($password, PASSWORD_BCRYPT);
    }

    public function setRole(string $role): void
    {
        $this->role = $role;
    }

    // Save user to the database
    public function save()
    {
        $db = Database::getInstance()->getConnection();
        try {
            if ($this->id) {
                $stmt = $db->prepare("UPDATE user SET avatar = :avatar, username = :username, email = :email, phone = :phone, password = :password, role = :role WHERE id = :id");
                $stmt->bindParam(':id', $this->id, PDO::PARAM_INT);
            } else {
                $stmt = $db->prepare("INSERT INTO user (avatar, username, email, phone, password, role) VALUES (:avatar, :username, :email, :phone, :password, :role)");
            }

            $stmt->bindParam(':avatar', $this->avatar, PDO::PARAM_STR);
            $stmt->bindParam(':username', $this->username, PDO::PARAM_STR);
            $stmt->bindParam(':email', $this->email, PDO::PARAM_STR);
            $stmt->bindParam(':phone', $this->phone, PDO::PARAM_STR);
            $stmt->bindParam(':password', $this->password, PDO::PARAM_STR);
            $stmt->bindParam(':role', $this->role, PDO::PARAM_STR);

            $stmt->execute();
        } catch (PDOException $e) {
            error_log("Database error: " . $e->getMessage());
            throw new Exception("An error occurred while saving the user.");
        }
    }

    // Find user by email
    public static function findByEmail($email)
    {
        $db = Database::getInstance()->getConnection();
        $stmt = $db->prepare("SELECT * FROM user WHERE email = :email");
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($result) {
            return new User($result['id'], $result['avatar'], $result['username'], $result['email'], $result['phone'], $result['password'], $result['role']);
        }

        return null;
    }
}


class Admin extends User {
    private $conn;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function banUser($userId) {
        $query = "UPDATE users SET active = false WHERE id = :userId";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':userId', $userId, PDO::PARAM_INT);
        return $stmt->execute();
    }

    public function unbanUser($userId) {
        $query = "UPDATE users SET active = true WHERE id = :userId";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':userId', $userId, PDO::PARAM_INT);
        return $stmt->execute();
    }

    public function getAllUsers() {
        $query = 'SELECT id, avatar, username, email, phone, role, active FROM "user"';
        $stmt = $this->conn->query($query);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
