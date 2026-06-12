<?php
require_once __DIR__ . '/../Core/DB.php';
class SinhvienModel{
    private $conn;
    public function __construct(){
        $this->conn = ConnectDB::Connect();
    }
    public function countTotal(): int
    {
        if (!$this->conn) {
            return 0;
        }
        $stmt = $this->conn->query("SELECT COUNT(*) FROM sinhvien");
        return (int) $stmt->fetchColumn();
    }

    public function getSinhvienPaginated($page = 1, $perPage = 8){
        $offset = ($page - 1) * $perPage;
        $query = "SELECT * FROM sinhvien LIMIT :limit OFFSET :offset";
        $stmt = $this->conn->prepare($query);
        $stmt->bindValue(':limit', $perPage, PDO::PARAM_INT);
        $stmt->bindValue(':offset', $offset, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
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