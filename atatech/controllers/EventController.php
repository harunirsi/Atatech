<?php

class EventController {
    public function index() {
        $db = Database::getInstance();
        
        $filter = $_GET['filter'] ?? 'all';
        
        $query = "SELECT * FROM events WHERE status = 'active'";
        
        switch ($filter) {
            case 'upcoming':
                $query .= " AND date >= NOW()";
                break;
            case 'past':
                $query .= " AND date < NOW()";
                break;
        }
        
        $query .= " ORDER BY date DESC";
        
        $events = $db->fetchAll($query);
        
        View::render('events/index', [
            'events' => $events,
            'filter' => $filter
        ]);
    }
    
    public function show($id) {
        $db = Database::getInstance();
        
        $event = $db->fetch(
            "SELECT * FROM events WHERE id = ? AND status = 'active'",
            [$id]
        );
        
        if (!$event) {
            http_response_code(404);
            View::render('errors/404');
            return;
        }
        
        // Galeri JSON'dan array'e çevir
        if ($event['gallery']) {
            $event['gallery'] = json_decode($event['gallery'], true) ?? [];
        } else {
            $event['gallery'] = [];
        }
        
        View::render('events/show', [
            'event' => $event
        ]);
    }
}
