<?php

class ContactController {
    public function index() {
        View::render('contact/index');
    }
    
    public function store() {
        $db = Database::getInstance();
        
        $data = [
            'name' => $_POST['name'] ?? '',
            'email' => $_POST['email'] ?? '',
            'subject' => $_POST['subject'] ?? '',
            'message' => $_POST['message'] ?? '',
        ];
        
        // Validation
        if (empty($data['name']) || empty($data['email']) || empty($data['message'])) {
            View::json(['success' => false, 'message' => 'Lütfen tüm zorunlu alanları doldurun.'], 400);
            return;
        }
        
        try {
            $db->query(
                "INSERT INTO messages (name, email, subject, message) 
                 VALUES (:name, :email, :subject, :message)",
                $data
            );
            
            View::json(['success' => true, 'message' => 'Mesajınız başarıyla gönderildi!']);
        } catch (Exception $e) {
            View::json(['success' => false, 'message' => 'Bir hata oluştu. Lütfen tekrar deneyin.'], 500);
        }
    }
}
