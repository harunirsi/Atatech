<?php

class HomeController {
    public function index() {
        $db = Database::getInstance();
        
        // İstatistikler
        $stats = [
            'members' => (int)$db->fetch("SELECT value FROM settings WHERE key_name = 'member_count'")['value'] ?? 0,
            'events' => (int)$db->fetch("SELECT value FROM settings WHERE key_name = 'event_count'")['value'] ?? 0,
            'projects' => (int)$db->fetch("SELECT value FROM settings WHERE key_name = 'project_count'")['value'] ?? 0,
        ];
        
        // Son etkinlikler
        $events = $db->fetchAll(
            "SELECT * FROM events WHERE status = 'active' AND date >= NOW() ORDER BY date ASC LIMIT 6"
        );
        
        // Öne çıkan etkinlikler
        $featuredEvents = $db->fetchAll(
            "SELECT * FROM events WHERE status = 'active' AND is_featured = 1 ORDER BY date ASC LIMIT 3"
        );
        
        // Aktif projeler
        $projects = $db->fetchAll(
            "SELECT * FROM projects WHERE status = 'active' AND featured = 1 ORDER BY created_at DESC LIMIT 6"
        );
        
        View::render('home/index', [
            'stats' => $stats,
            'events' => $events,
            'featuredEvents' => $featuredEvents,
            'projects' => $projects,
        ]);
    }
}
