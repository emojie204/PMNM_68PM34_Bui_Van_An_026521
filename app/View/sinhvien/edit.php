<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cập nhật thông tin sinh viên</title>
</head>
<body>
    <h1>Cập nhật thông tin sinh viên</h1>
    
    <form action="/StudentController/update" method="POST">
        
        <label for="mssv">MSSV:</label>
        <input type="text" id="mssv" name="mssv" 
               value="<?php echo htmlspecialchars($sinhvien['mssv'] ?? ''); ?>" 
               readonly><br><br>

        <label for="hoten">Họ tên:</label>
        <input type="text" id="hoten" name="hoten" 
               value="<?php echo htmlspecialchars($sinhvien['hoten'] ?? ''); ?>" 
               required><br><br>

        <label for="gioitinh">Giới tính:</label>
        <select id="gioitinh" name="gioitinh" required>
            <option value="Nam" <?php echo ($sinhvien['gioitinh'] ?? '') === 'Nam' ? 'selected' : ''; ?>>Nam</option>
            <option value="Nữ" <?php echo ($sinhvien['gioitinh'] ?? '') === 'Nữ' ? 'selected' : ''; ?>>Nữ</option>
            <option value="Khác" <?php echo ($sinhvien['gioitinh'] ?? '') === 'Khác' ? 'selected' : ''; ?>>Khác</option>
        </select><br><br>

        <button type="submit">Cập nhật</button>
        <a href="/sinhvien">Hủy bỏ</a>
    </form>
</body>
</html>