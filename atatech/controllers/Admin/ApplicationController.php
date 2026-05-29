<?php

namespace Admin;

use \Auth;
use \Database;
use \View;

class ApplicationController {
    public function index() {
        Auth::requireAuth();
        
        $db = Database::getInstance();
        $applications = $db->fetchAll("SELECT * FROM applications ORDER BY created_at DESC");
        
        View::render('admin/applications/index', [
            'layout' => 'admin',
            'applications' => $applications
        ]);
    }
    
    public function show($id) {
        Auth::requireAuth();
        
        $db = Database::getInstance();
        $application = $db->fetch("SELECT * FROM applications WHERE id = ?", [$id]);
        
        if (!$application) {
            http_response_code(404);
            die('Application not found');
        }
        
        // JSON decode
        $application['interests'] = json_decode($application['interests'], true) ?? [];
        $application['skills'] = json_decode($application['skills'], true) ?? [];
        
        View::render('admin/applications/show', [
            'layout' => 'admin',
            'application' => $application
        ]);
    }
    
    public function updateStatus($id) {
        Auth::requireAuth();
        
        $db = Database::getInstance();
        $status = $_POST['status'] ?? 'pending';
        $notes = $_POST['notes'] ?? '';
        
        $user = Auth::user();
        
        $db->query(
            "UPDATE applications SET status = :status, notes = :notes, reviewed_by = :reviewed_by, reviewed_at = NOW() WHERE id = :id",
            [
                'status' => $status,
                'notes' => $notes,
                'reviewed_by' => $user['id'],
                'id' => $id
            ]
        );
        
        header('Location: /atatech/admin/applications/' . $id);
        exit;
    }
}
