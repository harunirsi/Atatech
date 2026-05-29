<?php

class ApiController {
    public function stats() {
        $db = Database::getInstance();
        
        $stats = [
            'members' => (int)$db->fetch("SELECT value FROM settings WHERE key_name = 'member_count'")['value'] ?? 0,
            'events' => (int)$db->fetch("SELECT value FROM settings WHERE key_name = 'event_count'")['value'] ?? 0,
            'projects' => (int)$db->fetch("SELECT value FROM settings WHERE key_name = 'project_count'")['value'] ?? 0,
        ];
        
        View::json($stats);
    }
    
    public function upcomingEvents() {
        $db = Database::getInstance();
        
        $events = $db->fetchAll(
            "SELECT * FROM events WHERE status = 'active' AND date >= NOW() ORDER BY date ASC LIMIT 5"
        );
        
        View::json($events);
    }
    
    public function members() {
        $db = Database::getInstance();
        
        $members = $db->fetchAll(
            "SELECT id, name, position, photo, vision FROM members WHERE status = 'active' ORDER BY position_order ASC"
        );
        
        View::json($members);
    }
}
