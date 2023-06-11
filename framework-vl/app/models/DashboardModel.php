<?php

namespace App\Models;

class Dashboard{
    private $db;

    public function __construct($db){
        $this->db = $db;
    }
}
