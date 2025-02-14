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
            $this->redirect('authController/login');
        }

        if (empty($_POST['email']) || empty($_POST['password'])) {
            $_SESSION['error'] = 'Email and password are required';
            $this->redirect('authController/login');

        }

        $email = trim($_POST['email']);
        $password = $_POST['password'];
        $user = User::findByEmail($email);

        if (!$user || !password_verify($password, $user->getPassword())) {
            $_SESSION['error'] = 'Invalid email or password';
            $this->redirect('authController/login');

        }

        $_SESSION['user'] = serialize($user);
        $_SESSION['success'] = "Login successful, welcome " . htmlspecialchars($user->getUsername(), ENT_QUOTES, 'UTF-8');
        header('Location: /home');
        exit();
    }
    public function registerUser()
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            $this->redirect('authController/register');

        }

        $requiredFields = ['username', 'email', 'password', 'confirmPassword', 'phone', 'role'];
        foreach ($requiredFields as $field) {
            if (empty($_POST[$field])) {
                $_SESSION['error'] = "$field is required";
                $this->redirect('authController/register');

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
            $this->redirect('authController/register');

        }

        $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

        if (!$avatar || $avatar['error'] !== UPLOAD_ERR_OK) {
            $_SESSION['error'] = 'Avatar upload is required.';
            $this->redirect('authController/register');

        }

        if ($avatar['size'] > 5 * 1024 * 1024) {
            $_SESSION['error'] = 'Avatar size should not exceed 5MB';
            $this->redirect('authController/register');

        }

        $allowedImageTypes = ['image/jpeg', 'image/png', 'image/jpg'];
        if (!in_array($avatar['type'], $allowedImageTypes)) {
            $_SESSION['error'] = 'Only JPG and PNG images are allowed.';
            $this->redirect('authController/register');

        }

        $avatarTmpName = $avatar['tmp_name'];
        $avatarName = uniqid('avatar_') . basename($avatar['name']);
        $targetDir = '/storage/uploads/';
        $targetFile = $targetDir . $avatarName;

        if (!move_uploaded_file($avatarTmpName, $targetFile)) {
            $_SESSION['error'] = 'Error uploading file.';
            $this->redirect('authController/register');

        }

        $user = new User(null, $avatarName, $username, $email, $phone, $hashedPassword, $role);
        $user->save();

        $_SESSION['success'] = 'Registration successful, please login.';
        $this->redirect('authController/login');

    }


    public function logout()
    {
        session_start();
        session_destroy();
    }


}