<?php

namespace Admin;

use \Auth;
use \Database;
use \View;

class MemberController {
    public function index() {
        Auth::requireAuth();
        
        $db = Database::getInstance();
        $members = $db->fetchAll("SELECT * FROM members ORDER BY position_order ASC, name ASC");
        
        View::render('admin/members/index', [
            'layout' => 'admin',
            'members' => $members
        ]);
    }
    
    public function create() {
        Auth::requireAuth();
        View::render('admin/members/create', ['layout' => 'admin']);
    }
    
    public function store() {
        Auth::requireAuth();
        
        $db = Database::getInstance();
        $photo = $this->handleFileUpload('photo', 'members');
        
        $data = [
            'name' => $_POST['name'] ?? '',
            'position' => $_POST['position'] ?? '',
            'photo' => $photo,
            'vision' => $_POST['vision'] ?? '',
            'linkedin' => $_POST['linkedin'] ?? '',
            'github' => $_POST['github'] ?? '',
            'email' => $_POST['email'] ?? '',
            'bio' => $_POST['bio'] ?? '',
            'position_order' => (int)($_POST['position_order'] ?? 0),
        ];
        
        $db->query(
            "INSERT INTO members (name, position, photo, vision, linkedin, github, email, bio, position_order) 
             VALUES (:name, :position, :photo, :vision, :linkedin, :github, :email, :bio, :position_order)",
            $data
        );
        
        header('Location: /atatech/admin/members');
        exit;
    }
    
    public function edit($id) {
        Auth::requireAuth();
        
        $db = Database::getInstance();
        $member = $db->fetch("SELECT * FROM members WHERE id = ?", [$id]);
        
        if (!$member) {
            http_response_code(404);
            die('Member not found');
        }
        
        View::render('admin/members/edit', [
            'layout' => 'admin',
            'member' => $member
        ]);
    }
    
    public function update($id) {
        Auth::requireAuth();
        
        $db = Database::getInstance();
        $photo = $this->handleFileUpload('photo', 'members');
        
        $data = [
            'name' => $_POST['name'] ?? '',
            'position' => $_POST['position'] ?? '',
            'vision' => $_POST['vision'] ?? '',
            'linkedin' => $_POST['linkedin'] ?? '',
            'github' => $_POST['github'] ?? '',
            'email' => $_POST['email'] ?? '',
            'bio' => $_POST['bio'] ?? '',
            'position_order' => (int)($_POST['position_order'] ?? 0),
        ];
        
        if ($photo) {
            $data['photo'] = $photo;
            $db->query(
                "UPDATE members SET name = :name, position = :position, photo = :photo, vision = :vision, 
                 linkedin = :linkedin, github = :github, email = :email, bio = :bio, position_order = :position_order 
                 WHERE id = :id",
                array_merge($data, ['id' => $id])
            );
        } else {
            $db->query(
                "UPDATE members SET name = :name, position = :position, vision = :vision, 
                 linkedin = :linkedin, github = :github, email = :email, bio = :bio, position_order = :position_order 
                 WHERE id = :id",
                array_merge($data, ['id' => $id])
            );
        }
        
        header('Location: /atatech/admin/members');
        exit;
    }
    
    public function delete($id) {
        Auth::requireAuth();
        
        $db = Database::getInstance();
        $db->query("UPDATE members SET status = 'inactive' WHERE id = ?", [$id]);
        
        header('Location: /atatech/admin/members');
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
