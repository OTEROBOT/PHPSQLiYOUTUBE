<?php
require('dbconnect.php');
$sql = "SELECT * FROM employee"; // เลือกข้อมูลจากตาราง employee ออกมาแสดง
$result = mysqli_query($con, $sql); // รันคำสั่งที่ถูกเก็บไว้ในตัวแปร $sql

$count = mysqli_num_rows($result); // เก็บผลที่ได้จากคำสั่ง $result ไว้ในตัวแปร $count
$order = 1; // ให้เริ่มนับแถวจากเลข 1
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>รายชื่อพนักงานทั้งหมด</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f9f7fc; /* สีพื้นหลังพาสเทล */
            color: #4a4a4a;
            margin: 0;
            padding: 20px;
        }

        h1 {
            color: #6c63ff; /* สีม่วงพาสเทล */
        }

        .btn-info {
            background-color: #a3d8f4; /* สีฟ้าพาสเทล */
            border: none;
        }

        .btn-info:hover {
            background-color: #83c5db; /* สีฟ้าเข้มขึ้นเล็กน้อย */
        }

        .btn-success {
            background-color: #b8e4c9; /* สีเขียวพาสเทล */
            border: none;
        }

        .btn-success:hover {
            background-color: #9fd7b7; /* สีเขียวเข้มขึ้นเล็กน้อย */
        }

        .btn-danger {
            background-color: #f8b6c0; /* สีชมพูพาสเทล */
            border: none;
        }

        .btn-danger:hover {
            background-color: #f29ca7; /* สีชมพูเข้มขึ้นเล็กน้อย */
        }

        .table {
            background-color: #ffffff; /* สีพื้นหลังของตาราง */
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .table-dark {
            background-color: #d3c0f9; /* สีม่วงอ่อนพาสเทล */
        }

        .form-control {
            background-color: #f3f1fa; /* สีพื้นหลังช่องค้นหา */
            border: 1px solid #ddd;
            border-radius: 5px;
        }

        .form-control:focus {
            background-color: #eae6fb; /* สีพาสเทลเมื่อโฟกัส */
            border-color: #6c63ff;
            outline: none;
        }

        .container {
            max-width: 900px;
            margin: auto;
        }
    </style>
</head>
<body>
<div class="container">
    <h1 class="text-center mt-3">รายชื่อพนักงานทั้งหมด</h1>
    <form action="searchdata.php" class="form-group my-3" method="POST">
        <div class="row">
            <div class="col-6">
                <input type="text" placeholder="กรอกชื่อพนักงานที่ต้องการค้นหา" name="namesearch" class="form-control">
            </div>
            <div class="col-6">
                <input type="submit" value="ค้นหาข้อมูลพนักงาน" class="btn btn-info">
            </div>
        </div>
    </form>
    <table class="table table-striped">
        <thead class="table-dark">
        <tr>
            <th>#</th>
            <th>คำนำหน้า</th>
            <th>ชื่อ</th>
            <th>สกุล</th>
            <th>วันเกิด</th>
            <th>แก้ไขข้อมูล</th>
            <th>ลบข้อมูล</th>
        </tr>
        </thead>
        <tbody>
        <?php while ($row = mysqli_fetch_assoc($result)) { ?>
            <tr>
                <td><?php echo $order++; ?></td>
                <td><?php echo $row["emp_title"]; ?></td>
                <td><?php echo $row["emp_name"]; ?></td>
                <td><?php echo $row["emp_surname"]; ?></td>
                <td><?php echo $row["emp_birthday"]; ?></td>
                <td><a href="editdata.php?emp_id=<?php echo $row["emp_id"]; ?>" class="btn btn-success">แก้ไข</a></td>
                <td><a href="deletedata.php?emp_id=<?php echo $row["emp_id"]; ?>" class="btn btn-danger">ลบข้อมูล</a></td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
    <a href="insertform.php" class="btn btn-success">กรอกข้อมูลพนักงาน</a>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
