<?php

class MemberController {
    public function index() {
        $db = Database::getInstance();
        
        $members = $db->fetchAll(
            "SELECT * FROM members WHERE status = 'active' ORDER BY position_order ASC, name ASC"
        );
        
        View::render('members/index', [
            'members' => $members
        ]);
    }
    
    public function show($id) {
        $db = Database::getInstance();
        
        $member = $db->fetch(
            "SELECT * FROM members WHERE id = ? AND status = 'active'",
            [$id]
        );
        
        if (!$member) {
            http_response_code(404);
            View::render('errors/404');
            return;
        }
        
        View::render('members/show', [
            'member' => $member
        ]);
    }
}
