<?php

namespace Admin;

use \Auth;
use \Database;
use \View;

class DashboardController {
    public function index() {
        Auth::requireAuth();
        
        $db = Database::getInstance();
        
        // İstatistikler
        $stats = [
            'members' => $db->fetch("SELECT COUNT(*) as count FROM members WHERE status = 'active'")['count'],
            'events' => $db->fetch("SELECT COUNT(*) as count FROM events WHERE status = 'active'")['count'],
            'applications' => $db->fetch("SELECT COUNT(*) as count FROM applications WHERE status = 'pending'")['count'],
            'messages' => $db->fetch("SELECT COUNT(*) as count FROM messages WHERE status = 'unread'")['count'],
        ];
        
        // Son başvurular
        $recentApplications = $db->fetchAll(
            "SELECT * FROM applications ORDER BY created_at DESC LIMIT 5"
        );
        
        // Son mesajlar
        $recentMessages = $db->fetchAll(
            "SELECT * FROM messages ORDER BY created_at DESC LIMIT 5"
        );
        
        View::render('admin/dashboard', [
            'layout' => 'admin',
            'stats' => $stats,
            'recentApplications' => $recentApplications,
            'recentMessages' => $recentMessages,
        ]);
    }
}
