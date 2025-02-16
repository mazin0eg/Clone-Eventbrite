<?php

namespace App\Models;
use App\Core\Database;
use PDO;
use Exception;
use PDOException;

abstract class User
{
    private $id;
    private $avatar;
    private $username;
    private $email;
    private $phone;
    private $password;
    private $role;
    private $active;

    public function __construct($id, $email, $avatar = null, $username = null, $phone = null, $password = null, $role = null, $active = true)
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

    //static methods

    public static function findRoleByEmail($email)
    {
        $db = Database::getInstance()->getConnection();
        $stmt = $db->prepare("SELECT role FROM users WHERE email = :email");
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        return $result ? $result['role'] : null;
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

    public function loadUser($email)
    {
        $db = Database::getInstance()->getConnection();
        $stmt = $db->prepare("SELECT * FROM users WHERE email = :email");
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($result) {
            $this->id = $result['id'];
            $this->avatar = $result['avatar'];
            $this->username = $result['username'];
            $this->email = $result['email'];
            $this->phone = $result['phone'];
            $this->password = $result['password'];
            $this->role = $result['role'];
            $this->active = $result['active'];
            return true;
        }

        return false;
    }
}
