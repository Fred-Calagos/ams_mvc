<?php

namespace App\Controllers;

use App\Models\User;

class AuthController {
    public function showLogin() {
        include_once __DIR__ . '/../Views/auth/login.php';
    }

    public function login() {
        session_start();
        $email = $_POST['email'] ?? '';
        $password = $_POST['password'] ?? '';
    
        if (empty($email) || empty($password)) {
            $_SESSION['error'] = "Please fill in all fields.";
            header("Location: /login");
            exit;
        }
    
        $userModel = new User();
        $user = $userModel->getUserByEmail($email);
    
        if (!$user && $password !== $user['password']) {
            $_SESSION['error'] = "Invalid email and password";
        }else {
            $_SESSION['user'] = $user;
            header("Location: /dashboard");
            exit;
        }
    
        header("Location: /login");
        exit;
    }
    
    

    public function logout() {
        session_start();
        session_destroy();
        header("Location: /login");
        exit;
    }
}
