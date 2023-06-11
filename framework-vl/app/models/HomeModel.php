<?php
namespace App\Models;
class HomeModel{
    private $db;
    public function __construct($db){
        $this->db = $db;
    }

    public function getNoticias()
    {
        $query = "SELECT * FROM noticias ORDER BY data DESC LIMIT 5";
        return $this->db->query($query)->fetchAll();
    }
}
