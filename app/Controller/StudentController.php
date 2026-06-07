<?php
require_once '/../Model/SinhvienModel.php';
class StudentController extends Controller
{
    public function index() {
        $model = new SinhvienModel();
        $sinhvien = $model->getAllSinhvien(); // lấy dữ liệu từ model

        include '/../View/sinhvien/index.php'; // truyền $sinhvien vào view
    }
}

