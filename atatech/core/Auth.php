<?php

class Auth {
    public static function check() {
        return isset($_SESSION['admin_id']);
    }

    public static function user() {
        if (!self::check()) {
            return null;
        }

        $db = Database::getInstance();
        return $db->fetch(
            "SELECT * FROM admins WHERE id = ?",
            [$_SESSION['admin_id']]
        );
    }

    public static function login($email, $password) {
        $db = Database::getInstance();
        $admin = $db->fetch(
            "SELECT * FROM admins WHERE email = ?",
            [$email]
        );

        if ($admin && password_verify($password, $admin['password'])) {
            $_SESSION['admin_id'] = $admin['id'];
            $_SESSION['admin_role'] = $admin['role'];
            return true;
        }

        return false;
    }

    public static function logout() {
        session_destroy();
        session_start();
    }

    public static function requireAuth() {
        if (!self::check()) {
            if (ob_get_level()) {
                ob_clean();
            }
            header('Location: /atatech/admin/login');
            exit;
        }
    }

    public static function requireRole($role) {
        self::requireAuth();
        $user = self::user();
        
        if ($user['role'] !== $role && $user['role'] !== 'admin') {
            http_response_code(403);
            die('Access denied');
        }
    }
}
