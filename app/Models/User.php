<?php

class User {
    private $table = 'users';
    private $avatar;
    private $username;
    private $email;
    private $phone;
    private $password;
    private $role;
    
    public function getAvatar() {
        return $this->avatar;
    }

    public function getUsername() {
        return $this->username;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getPhone() {
        return $this->phone;
    }

    public function getPassword() {
        return $this->password;
    }

    public function getRole() {
        return $this->role;
    }

    public function setAvatar($avatar) {
        $this->avatar = $avatar;
    }

    public function setUsername($username) {
        $this->username = $username;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function setPhone($phone) {
        $this->phone = $phone;
    }

    public function setPassword($password) {
        $this->password = $password;
    }

    public function setRole($role) {
        $this->role = $role;
    }

    public function register() {
        $query = "INSERT INTO" . $this->table . "
        ( avatar, username, password, email, phone, role) values (:avatar, :username, :password, :email, :phone, :role) ";
        
        $stmt = $this->conn->prepare($query);
        
        $this->username = htmlspecialchars(strip_tags($this->username));
        $this->avatar = htmlspecialchars(strip_tags($this->avatar));
        $this->password = htmlspecialchars(strip_tags($this->password));
        $this->email = htmlspecialchars(strip_tags($this->email));
        $this->phone = htmlspecialchars(strip_tags($this->phone));
        $this->role = htmlspecialchars(strip_tags($this->role));
    
        $stmt->bindParam(":avatar", $this->avatar);
        $stmt->bindParam(":username", $this->username);
        $stmt->bindParam(":password", $this->password);
        $stmt->bindParam(":email", $this->email);
        $stmt->bindParam(":phone", $this->phone);
        $stmt->bindParam(":role", $this->role);

        return $stmt->execute();
    }

    public function login($username, $email, $password) {
        $query = "select id, username, password, role form " . $this->table . " where username = :username or email = :email";
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(":username", $username);
        $stmt->bindParam(":email", $email);
        $stmt->execute();

        if($stmt->rowCount() > 0) {
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            if (password_verify($password, $row['password'])) {
                $this->setId((int) $row['id']);
                $this->setUsername($row['username']);
                $this->setEmail($row['email']);
                $this->setRole($row['role']);

                return [
                    'id' => $this->getId(),
                    'username' => $this->getUsername(),
                    'email' => $this->getEmail(),
                    'role' => $this->getRole()
                ];
            }
        }
        return false;
    }

    public function editProfile($key, $value, $id) {
        $query = "update users set " . $key . " = " . $value . " where id = " . $id . ";";
        if($key === 'username') {
            setUsername($value);
        } else if($key === 'phone') {
            setPhone($value);
        } else if($key === 'avatar') {
            setAvatar($value);
        } else if($key === 'password') {
            setPassword($value);
        }
    }
}