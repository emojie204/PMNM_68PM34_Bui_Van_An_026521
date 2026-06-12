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
    public function find($mssv) {
        $query = "SELECT * FROM sinhvien WHERE mssv = :mssv LIMIT 1";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([
            ':mssv' => $mssv
        ]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
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
    public function update($data){
        $query = "UPDATE sinhvien SET hoten = :hoten, gioitinh = :gioitinh WHERE mssv = :mssv";
        $stmt = $this->conn->prepare($query);
        return $stmt->execute([
            ':mssv'     => $data['mssv'],
            ':hoten'    => $data['hoten'],
            ':gioitinh' => $data['gioitinh']
        ]);
    }
    public function delete($mssv) {
        $query = "DELETE FROM sinhvien WHERE mssv = :mssv";
        $stmt = $this->conn->prepare($query);
        return $stmt->execute([
            ':mssv' => $mssv
        ]);
    }
}   
?>