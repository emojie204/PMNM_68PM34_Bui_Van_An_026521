<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách sinh viên</title>
</head>
<body>
    <h1>Danh sách sinh viên</h1>

    <table border="1">
        <tr>
            <th>STT</th>
            <th>MSSV</th>
            <th>Họ tên</th>
            <th>Giới tính</th>
        </tr>
        <?php foreach ($sinhvien as $i => $sv): ?>
        <tr>
        <td><?= $i + 1 ?></td>
        <td><?= htmlspecialchars($sv['mssv']) ?></td>
        <td><?= htmlspecialchars($sv['hoten']) ?></td>
        <td><?= htmlspecialchars($sv['gioitinh']) ?></td>
        </tr>
        <?php 
        endforeach; 
        ?>
    </table>
</body>
</html>