<?php

namespace App\Models;
use App\Core\Database;
use PDO;
use Exception;
use PDOException;

class User
{
    private $id;
    private $avatar;
    private $username;
    private $email;
    private $phone;
    private $password;
    private $role;
    private $active;

    public function __construct($id, $avatar, $username, $email, $phone, $password, $role, $active = true)
    {
        $this->id = $id;
        $this->avatar = $avatar;
        $this->username = $username;
        $this->email = $email;
        $this->phone = $phone;
        $this->password = $password;
        $this->role = $role;
        $this->active = $active;
    }

    // Add getter for active
    public function isActive(): bool
    {
        return $this->active;
    }

    // Add setter for active
    public function setActive(bool $active): void
    {
        $this->active = $active;
    }

    // Previous getters remain the same...
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

    // Previous setters remain the same...
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
        if (!in_array($role, ['admin', 'participant', 'organisateur'])) {
            throw new Exception("Invalid role specified");
        }
        $this->role = $role;
    }

    public static function getAllUsers()
    {
        $db = Database::getInstance()->getConnection();
        $stmt = $db->query("SELECT * FROM users");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function save()
    {
        $db = Database::getInstance()->getConnection();
        try {
            if ($this->id) {
                $stmt = $db->prepare("UPDATE users SET avatar = :avatar, username = :username, email = :email, phone = :phone, password = :password, role = :role, active = :active WHERE id = :id");
                $stmt->bindParam(':id', $this->id, PDO::PARAM_INT);
            } else {
                $stmt = $db->prepare("INSERT INTO users (avatar, username, email, phone, password, role, active) VALUES (:avatar, :username, :email, :phone, :password, :role, :active)");
            }

            $stmt->bindParam(':avatar', $this->avatar, PDO::PARAM_STR);
            $stmt->bindParam(':username', $this->username, PDO::PARAM_STR);
            $stmt->bindParam(':email', $this->email, PDO::PARAM_STR);
            $stmt->bindParam(':phone', $this->phone, PDO::PARAM_STR);
            $stmt->bindParam(':password', $this->password, PDO::PARAM_STR);
            $stmt->bindParam(':role', $this->role, PDO::PARAM_STR);
            $stmt->bindParam(':active', $this->active, PDO::PARAM_BOOL);

            $stmt->execute();
        } catch (PDOException $e) {
            error_log("Database error: " . $e->getMessage());
            throw new Exception("An error occurred while saving the user.");
        }
    }

    public static function findByEmail($email)
    {
        $db = Database::getInstance()->getConnection();
        $stmt = $db->prepare("SELECT * FROM users WHERE email = :email");
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($result) {
            return new User(
                $result['id'],
                $result['avatar'],
                $result['username'],
                $result['email'],
                $result['phone'],
                $result['password'],
                $result['role'],
                $result['active']
            );
        }

        return null;
    }
}
