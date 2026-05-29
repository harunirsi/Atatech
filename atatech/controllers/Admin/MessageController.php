<?php

namespace Admin;

use \Auth;
use \Database;
use \View;

class MessageController {
    public function index() {
        Auth::requireAuth();
        
        $db = Database::getInstance();
        $messages = $db->fetchAll("SELECT * FROM messages ORDER BY created_at DESC");
        
        View::render('admin/messages/index', [
            'layout' => 'admin',
            'messages' => $messages
        ]);
    }
    
    public function show($id) {
        Auth::requireAuth();
        
        $db = Database::getInstance();
        $message = $db->fetch("SELECT * FROM messages WHERE id = ?", [$id]);
        
        if (!$message) {
            http_response_code(404);
            die('Message not found');
        }
        
        // Okundu olarak işaretle
        if ($message['status'] === 'unread') {
            $db->query("UPDATE messages SET status = 'read' WHERE id = ?", [$id]);
        }
        
        View::render('admin/messages/show', [
            'layout' => 'admin',
            'message' => $message
        ]);
    }
    
    public function updateStatus($id) {
        Auth::requireAuth();
        
        $db = Database::getInstance();
        $status = $_POST['status'] ?? 'read';
        
        $db->query("UPDATE messages SET status = :status WHERE id = :id", [
            'status' => $status,
            'id' => $id
        ]);
        
        header('Location: /atatech/admin/messages/' . $id);
        exit;
    }
}
