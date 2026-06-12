<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm sinh viên</title>
</head>
<body>
    <h1>Thêm sinh viên</h1>
    <form action="/StudentController/save" method="POST">
        <label for="mssv">MSSV:</label>
        <input type="text" id="mssv" name="mssv" required><br><br>

        <label for="hoten">Họ tên:</label>
        <input type="text" id="hoten" name="hoten" required><br><br>

        <label for="gioitinh">Giới tính:</label>
        <input type="text" id="gioitinh" name="gioitinh" required><br><br>

        <button type="submit">Thêm</button>
</body>
</html>