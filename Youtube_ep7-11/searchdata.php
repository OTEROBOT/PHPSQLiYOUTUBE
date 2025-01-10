<?php
require('dbconnect.php'); // Connect to database

// Check if 'emp_data' exists in the POST array
$emp_data = isset($_POST["emp_data"]) ? $_POST["emp_data"] : ''; // If not set, use an empty string

$sql = "SELECT * FROM employee WHERE emp_name LIKE '%$emp_data%' OR emp_surname LIKE '%$emp_data%' ORDER BY emp_name ASC"; 
$result = mysqli_query($con, $sql); // Execute the query

$count = mysqli_num_rows($result); // Count the number of rows returned by the query
$order = 1; // Initialize row numbering

$stmt = $con->prepare("SELECT * FROM employee WHERE emp_name LIKE ? OR emp_surname LIKE ? ORDER BY emp_name ASC");
$emp_data = '%' . $emp_data . '%';  // Add '%' around the value
$stmt->bind_param("ss", $emp_data, $emp_data);
$stmt->execute();
$result = $stmt->get_result();
?>

<!-- The rest of your HTML code follows below -->


<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>รายชื่อพนักงานทั้งหมด</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        body {
            font-family: 'Prompt', sans-serif;
            background-color: #f7f9fc;
            color: #5a5a5a;
            margin: 0;
            padding: 20px;
        }
        h1 {
            color: #7f89c2;
            margin-bottom: 20px;
        }
        .btn-info {
            background-color: #a8d9f4;
            border: none;
        }
        .btn-info:hover {
            background-color: #90c6e8;
        }
        .btn-success {
            background-color: #bce7d6;
            border: none;
        }
        .btn-success:hover {
            background-color: #a5d4c1;
        }
        .btn-danger {
            background-color: #f7c1c6;
            border: none;
        }
        .btn-danger:hover {
            background-color: #f5a6ae;
        }
        .table {
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            width: 100%;
            table-layout: auto;
        }
        .table th, .table td {
            border: 1px solid #dcdcdc;
            padding: 8px;
            line-height: 1.2;
            text-align: center;
        }
        .table-dark {
            background-color: #d8d2eb;
            color: #4a4a4a;
        }
        .form-control {
            background-color: #eef4f7;
            border: 1px solid #dcdcdc;
            border-radius: 8px;
        }
        .form-control:focus {
            background-color: #e1f0ff;
            border-color: #7f89c2;
            outline: none;
        }
        .container {
            width: 100%;
            max-width: 960px;
            margin: auto;
            background: #ffffff;
            border-radius: 15px;
            padding: 15px;
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.15);
        }
        .table th:nth-child(8), .table td:nth-child(8) {
            white-space: normal;
            min-width: 130px;
            word-wrap: break-word;
        }

        .table th:nth-child(5), .table td:nth-child(5) {
            white-space: normal;
            min-width: 110px;
            word-wrap: break-word;
        }

        .table th:nth-child(6), .table td:nth-child(6) {
            white-space: normal;
            min-width: 200px;
            word-wrap: break-word;
        }

        .table th:nth-child(3), .table td:nth-child(3) {
            white-space: normal;
            min-width: 75px;
            word-wrap: break-word;
            text-align: left;
        }

        .table th:nth-child(4), .table td:nth-child(4) {
            white-space: normal;
            min-width: 95px;
            word-wrap: break-word;
            text-align: left;
        }
    </style>
</head>
<body>
<div class="container">
    <h1 class="text-center">รายชื่อพนักงานที่ต้องการค้นหา</h1>
    <form action="searchdata.php" class="form-group my-3" method="POST">
    <div class="row">
        <div class="col-6">
            <input type="text" placeholder="กรอกชื่อหรือนามสกุลที่ต้องการค้นหา" class="form-control" name="emp_data" required>
        </div>
        <div class="col-6">
            <input type="submit" value="ค้นหาข้อมูลพนักงาน" class="btn btn-info">
        </div>
    </div>
    </form>
    <?php if ($count > 0) { ?>
    <div class="table-responsive">
        <table class="table table-striped">
            <thead class="table-dark">
                <tr>
                    <th>#</th>
                    <th>คำนำหน้า</th>
                    <th>ชื่อ</th>
                    <th>นามสกุล</th>
                    <th>วันเกิด</th>
                    <th>ที่อยู่ปัจจุบัน</th>
                    <th>ทักษะความสามารถ</th>
                    <th>เบอร์โทรศัพท์</th>
                    <th>แก้ไขข้อมูล</th>
                    <th>ลบข้อมูล</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                    <tr>
                        <td><?php echo htmlspecialchars($order++); ?></td>
                        <td><?php echo htmlspecialchars($row["emp_title"]); ?></td>
                        <td><?php echo htmlspecialchars($row["emp_name"]); ?></td>
                        <td><?php echo htmlspecialchars($row["emp_surname"]); ?></td>
                        <td><?php echo htmlspecialchars($row["emp_birthday"]); ?></td>
                        <td><?php echo htmlspecialchars($row["emp_adr"]); ?></td>
                        <td><?php echo htmlspecialchars($row["emp_skill"]); ?></td>
                        <td><?php echo htmlspecialchars($row["emp_tel"]); ?></td>
                        <td><a href="editformdata.php?emp_id=<?php echo htmlspecialchars($row["emp_id"]); ?>" class="btn btn-success">แก้ไข</a></td>
                        <td><a href="deletedata.php?emp_id=<?php echo $row["emp_id"]; ?>" class="btn btn-danger" onclick="return confirm('ยืนยันการลบข้อมูล')">ลบ</a></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
    <?php } else { ?>
        <div class="alert alert-danger">
            <b>ไม่พบข้อมูลพนักงาน!!</b>
        </div>
    <?php } ?>
    <a href="index.php" class="btn btn-success mt-4">กลับหน้าแรก</a>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
