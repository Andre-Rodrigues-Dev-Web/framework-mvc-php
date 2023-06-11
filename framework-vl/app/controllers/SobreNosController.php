<?php

namespace App\Controllers;

class SobreNosController {
    private $db;
    
    public function __construct($db) {
        $this->db = $db;
    }
    
    public function index() {
        // Carregar a view 'sobrenos.php'
        require_once __DIR__ . '/../views/sobrenos.php';
    }
}
