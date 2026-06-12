<?php

require_once __DIR__ . '/../Model/SinhVienModel.php';

class StudentController extends Controller
{
    public function index()
    {
        $username = $_SESSION['username'] ?? 'Khách';
        $title = 'Danh sách sinh viên';
        $perPage = 8;

        $page = isset($_GET['page']) ? (int) $_GET['page'] : 1;
        if ($page < 1) {
            $page = 1;
        }
        $model = new SinhvienModel();
        $total = (int) $model->countTotal();
        $totalPages = $total > 0 ? (int) ceil($total / $perPage) : 1;

        if ($page > $totalPages) {
            $page = $totalPages;
        }
        $sinhvien = $model->getSinhvienPaginated($page, $perPage);
        $offset = ($page - 1) * $perPage;

        ob_start();
        require __DIR__ . '/../View/sinhvien/index.php';
        $content = ob_get_clean();
        require __DIR__ . '/../View/layout/masterlayout.php';
    }

    public function create()
    {
        $username = $_SESSION['username'] ?? 'Khách';
        $title = 'Thêm sinh viên mới';

        ob_start();
        require __DIR__ . '/../View/sinhvien/create.php';  
        $content = ob_get_clean();
        require __DIR__ . '/../View/layout/masterlayout.php';
    }
    public function save()
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            header('Location: /sinhvien');
            exit;
        }
        $data = [
            'mssv'     => trim($_POST['mssv'] ?? ''),
            'hoten'    => trim($_POST['hoten'] ?? ''),
            'gioitinh' => trim($_POST['gioitinh'] ?? '')
        ];
        if (empty($data['mssv']) || empty($data['hoten']) || empty($data['gioitinh'])) {
            $_SESSION['error'] = 'Vui lòng nhập đầy đủ MSSV, Họ tên và Giới tính!';
            header('Location: /sinhvien/create');
            exit;
        }
        $model = new SinhvienModel();
        $result = $model->create($data); 

        if ($result) {
            $_SESSION['success'] = 'Thêm sinh viên thành công!';
            header('Location: /sinhvien');    
            exit;
        } else {
            $_SESSION['error'] = 'Thêm thất bại! MSSV có thể đã tồn tại.';
            header('Location: /sinhvien/create');
            exit;
        }
    }
}
