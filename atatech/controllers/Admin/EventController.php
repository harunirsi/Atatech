<?php

namespace Admin;

use \Auth;
use \Database;
use \View;

class EventController {
    public function index() {
        Auth::requireAuth();
        
        $db = Database::getInstance();
        $events = $db->fetchAll("SELECT * FROM events ORDER BY date DESC");
        
        View::render('admin/events/index', [
            'layout' => 'admin',
            'events' => $events
        ]);
    }
    
    public function create() {
        Auth::requireAuth();
        View::render('admin/events/create', ['layout' => 'admin']);
    }
    
    public function store() {
        Auth::requireAuth();
        
        $db = Database::getInstance();
        $poster = $this->handleFileUpload('poster', 'events');
        
        $data = [
            'title' => $_POST['title'] ?? '',
            'description' => $_POST['description'] ?? '',
            'short_description' => $_POST['short_description'] ?? '',
            'poster' => $poster,
            'date' => $_POST['date'] ?? '',
            'location' => $_POST['location'] ?? '',
            'location_lat' => $_POST['location_lat'] ?? null,
            'location_lng' => $_POST['location_lng'] ?? null,
            'capacity' => (int)($_POST['capacity'] ?? 0),
            'is_featured' => isset($_POST['is_featured']) ? 1 : 0,
            'status' => $_POST['status'] ?? 'active',
        ];
        
        $db->query(
            "INSERT INTO events (title, description, short_description, poster, date, location, location_lat, location_lng, capacity, is_featured, status) 
             VALUES (:title, :description, :short_description, :poster, :date, :location, :location_lat, :location_lng, :capacity, :is_featured, :status)",
            $data
        );
        
        header('Location: /atatech/admin/events');
        exit;
    }
    
    public function edit($id) {
        Auth::requireAuth();
        
        $db = Database::getInstance();
        $event = $db->fetch("SELECT * FROM events WHERE id = ?", [$id]);
        
        if (!$event) {
            http_response_code(404);
            die('Event not found');
        }
        
        View::render('admin/events/edit', [
            'layout' => 'admin',
            'event' => $event
        ]);
    }
    
    public function update($id) {
        Auth::requireAuth();
        
        $db = Database::getInstance();
        $poster = $this->handleFileUpload('poster', 'events');
        
        $data = [
            'title' => $_POST['title'] ?? '',
            'description' => $_POST['description'] ?? '',
            'short_description' => $_POST['short_description'] ?? '',
            'date' => $_POST['date'] ?? '',
            'location' => $_POST['location'] ?? '',
            'location_lat' => $_POST['location_lat'] ?? null,
            'location_lng' => $_POST['location_lng'] ?? null,
            'capacity' => (int)($_POST['capacity'] ?? 0),
            'is_featured' => isset($_POST['is_featured']) ? 1 : 0,
            'status' => $_POST['status'] ?? 'active',
        ];
        
        if ($poster) {
            $data['poster'] = $poster;
            $db->query(
                "UPDATE events SET title = :title, description = :description, short_description = :short_description, 
                 poster = :poster, date = :date, location = :location, location_lat = :location_lat, 
                 location_lng = :location_lng, capacity = :capacity, is_featured = :is_featured, status = :status 
                 WHERE id = :id",
                array_merge($data, ['id' => $id])
            );
        } else {
            $db->query(
                "UPDATE events SET title = :title, description = :description, short_description = :short_description, 
                 date = :date, location = :location, location_lat = :location_lat, location_lng = :location_lng, 
                 capacity = :capacity, is_featured = :is_featured, status = :status WHERE id = :id",
                array_merge($data, ['id' => $id])
            );
        }
        
        header('Location: /atatech/admin/events');
        exit;
    }
    
    public function delete($id) {
        Auth::requireAuth();
        
        $db = Database::getInstance();
        $db->query("UPDATE events SET status = 'cancelled' WHERE id = ?", [$id]);
        
        header('Location: /atatech/admin/events');
        exit;
    }
    
    private function handleFileUpload($field, $folder) {
        if (!isset($_FILES[$field]) || $_FILES[$field]['error'] !== UPLOAD_ERR_OK) {
            return null;
        }
        
        $uploadDir = __DIR__ . '/../../public/uploads/' . $folder . '/';
        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0755, true);
        }
        
        $ext = pathinfo($_FILES[$field]['name'], PATHINFO_EXTENSION);
        $filename = uniqid() . '.' . $ext;
        $filepath = $uploadDir . $filename;
        
        if (move_uploaded_file($_FILES[$field]['tmp_name'], $filepath)) {
            return '/atatech/public/uploads/' . $folder . '/' . $filename;
        }
        
        return null;
    }
}
