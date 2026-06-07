<?php
require_once __DIR__ . '/../Model/SinhVienModel.php';
class StudentController extends Controller
{
    public function index() {
        $model = new SinhvienModel();
        $sinhvien = $model->getAllSinhvien();
        require_once __DIR__ . '/../View/sinhvien/index.php';
    }
}

