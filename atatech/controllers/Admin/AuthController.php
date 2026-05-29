<?php

namespace Admin;

use \Auth;
use \View;

class AuthController {
    public function showLogin() {
        if (Auth::check()) {
            header('Location: /atatech/admin');
            exit;
        }
        View::render('admin/login', ['layout' => 'admin']);
    }
    
    public function login() {
        $email = $_POST['email'] ?? '';
        $password = $_POST['password'] ?? '';
        
        if (Auth::login($email, $password)) {
            header('Location: /atatech/admin');
            exit;
        }
        
        View::render('admin/login', [
            'layout' => 'admin',
            'error' => 'E-posta veya şifre hatalı!'
        ]);
    }
    
    public function logout() {
        Auth::logout();
        header('Location: /atatech/admin/login');
        exit;
    }
}
