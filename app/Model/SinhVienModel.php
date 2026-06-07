<?php
require_once __DIR__ .'/../App/Core/DB.php';
class SinhvienModel{
    private $conn;
    public function __construct(){
        $this->conn = ConnectDB::Connect();
    }
    public function getAllSinhvien(){
        $query = "SELECT * FROM sinhvien";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function create($data){
        $query = "INSERT INTO sinhvien (mssv, hoten, gioitinh) VALUES (:mssv, :hoten, :gioitinh)";
        $stmt = $this->conn->prepare($query);
        if($stmt->execute()){
            return true;
        } else {
            return false;
        }
    }
}   
?>