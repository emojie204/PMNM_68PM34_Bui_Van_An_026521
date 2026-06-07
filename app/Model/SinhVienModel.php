<?php
require_once __DIR__ . '/../Core/DB.php';
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
        return $stmt->execute([
            ':mssv' => $data['mssv'],
            ':hoten' => $data['hoten'],
            ':gioitinh' => $data['gioitinh'],
        ]);
    }
}   
?>