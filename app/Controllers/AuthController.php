<?php

namespace App\Controllers;
use App\core\Controller;
use App\Models\User;

class AuthController extends Controller
{

    public function index()
    {
        $this->view('login');
    }
    public function login()
    {
        $this->view('login');
    }
    public function register()
    {
        $this->view('register');
    }


    public function loginUser()
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            header('Location: /login');
            exit();
        }

        if (empty($_POST['email']) || empty($_POST['password'])) {
            $_SESSION['error'] = 'Email and password are required';
            header('Location: /login');
            exit();
        }

        $email = trim($_POST['email']);
        $password = $_POST['password'];
        $user = User::findByEmail($email);

        if (!$user || !password_verify($password, $user->getPassword())) {
            $_SESSION['error'] = 'Invalid email or password';
            header('Location: /login');
            exit();
        }

        $_SESSION['user'] = serialize($user);
        $_SESSION['success'] = "Login successful, welcome " . htmlspecialchars($user->getUsername(), ENT_QUOTES, 'UTF-8');
        header('Location: /home');
        exit();
    }
    public function registerUser()
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            header('Location: /register');
            exit();
        }

        $requiredFields = ['username', 'email', 'password', 'confirmPassword', 'phone', 'role'];
        foreach ($requiredFields as $field) {
            if (empty($_POST[$field])) {
                $_SESSION['error'] = 'All fields are required.';
                header('Location: /register');
                exit();
            }
        }

        $username = trim($_POST['username']);
        $email = trim($_POST['email']);
        $password = $_POST['password'];
        $confirmPassword = $_POST['confirmPassword'];
        $phone = trim($_POST['phone']);
        $role = trim($_POST['role']);
        $avatar = $_FILES['avatar'] ?? null;

        if ($password !== $confirmPassword) {
            $_SESSION['error'] = 'Passwords do not match.';
            header('Location: /register');
            exit();
        }

        $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

        if (!$avatar || $avatar['error'] !== UPLOAD_ERR_OK) {
            $_SESSION['error'] = 'Avatar upload is required.';
            header('Location: /register');
            exit();
        }

        if ($avatar['size'] > 5 * 1024 * 1024) {
            $_SESSION['error'] = 'Avatar size should not exceed 5MB';
            header('Location: /register');
            exit();
        }

        $allowedImageTypes = ['image/jpeg', 'image/png', 'image/jpg'];
        if (!in_array($avatar['type'], $allowedImageTypes)) {
            $_SESSION['error'] = 'Only JPG and PNG images are allowed.';
            header('Location: /register');
            exit();
        }

        $avatarTmpName = $avatar['tmp_name'];
        $avatarName = uniqid('avatar_') . basename($avatar['name']);
        $targetDir = 'storage/uploads/';
        $targetFile = $targetDir . $avatarName;

        if (!move_uploaded_file($avatarTmpName, $targetFile)) {
            $_SESSION['error'] = 'Error uploading file.';
            header('Location: /register');
            exit();
        }

        $user = new User(null, $avatarName, $username, $email, $phone, $hashedPassword, $role);
        $user->save();

        $_SESSION['success'] = 'Registration successful, please login.';
        header('Location: /login');
        exit();
    }


    public function logout()
    {
        session_start();
        session_destroy();
    }


}