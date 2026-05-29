<?php

class ApplicationController {
    public function index() {
        View::render('applications/index');
    }
    
    public function store() {
        $db = Database::getInstance();
        
        $data = [
            'name' => $_POST['name'] ?? '',
            'email' => $_POST['email'] ?? '',
            'phone' => $_POST['phone'] ?? '',
            'interests' => json_encode($_POST['interests'] ?? []),
            'skills' => json_encode($_POST['skills'] ?? []),
            'experience' => $_POST['experience'] ?? '',
            'motivation' => $_POST['motivation'] ?? '',
        ];
        
        // Validation
        if (empty($data['name']) || empty($data['email']) || empty($data['phone'])) {
            View::json(['success' => false, 'message' => 'Lütfen tüm zorunlu alanları doldurun.'], 400);
            return;
        }
        
        try {
            $db->query(
                "INSERT INTO applications (name, email, phone, interests, skills, experience, motivation) 
                 VALUES (:name, :email, :phone, :interests, :skills, :experience, :motivation)",
                $data
            );
            
            View::json(['success' => true, 'message' => 'Başvurunuz başarıyla gönderildi!']);
        } catch (Exception $e) {
            View::json(['success' => false, 'message' => 'Bir hata oluştu. Lütfen tekrar deneyin.'], 500);
        }
    }
}
