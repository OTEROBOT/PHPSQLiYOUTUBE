<?php
require('dbconnect.php'); // Connect to database
$sql = "SELECT * FROM employee"; // Query to select all employee data
$result = mysqli_query($con, $sql); // Execute the query

$count = mysqli_num_rows($result); // Count the number of rows returned by the query
$order = 1; // Initialize row numbering
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
        /* ขยายคอลัมน์เบอร์โทรศัพท์ */
        .table th:nth-child(8), .table td:nth-child(8) {
            white-space: normal;
            min-width: 130px;
            word-wrap: break-word;
        }

        /* ขยายคอลัมน์วันเกิด */
        .table th:nth-child(5), .table td:nth-child(5) {
            white-space: normal;
            min-width: 110px;
            word-wrap: break-word;
        }
        /* ชิดซ้ายสำหรับคอลัมน์ชื่อ */
        .table th:nth-child(3), .table td:nth-child(3) {
            white-space: normal;
            min-width: 75px;
            word-wrap: break-word;
            text-align: left;
        }

        /* ชิดซ้ายสำหรับคอลัมน์นามสกุล */
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
<?php
require "nav.php" ;
?>
    <h1 class="text-center">รายชื่อพนักงานทั้งหมด</h1>
    <form action="searchdata.php" class="form-group mb-4" method="POST">
        <div class="row">
            <div class="col-md-8">
                <input type="text" placeholder="กรอกชื่อพนักงานที่ต้องการค้นหา" name="namesearch" class="form-control">
            </div>
            <div class="col-md-4">
                <input type="submit" value="ค้นหาข้อมูลพนักงาน" class="btn btn-info w-100">
            </div>
        </div>
    </form>

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
                </tr>
            </thead>
            <tbody>
                <?php if ($count > 0) {
                    while ($row = mysqli_fetch_assoc($result)) { ?>
                        <tr>
                            <td><?php echo htmlspecialchars($order++); ?></td>
                            <td><?php echo htmlspecialchars($row["emp_title"]); ?></td>
                            <td><?php echo htmlspecialchars($row["emp_name"]); ?></td>
                            <td><?php echo htmlspecialchars($row["emp_surname"]); ?></td>
                            <td><?php echo htmlspecialchars($row["emp_birthday"]); ?></td>
                            <td><?php echo htmlspecialchars($row["emp_adr"]); ?></td>
                            <td><?php echo htmlspecialchars($row["emp_skill"]); ?></td>
                            <td><?php echo htmlspecialchars($row["emp_tel"]); ?></td>
                        </tr>
                    <?php }
                } else { ?>
                    <tr>
                        <td colspan="8" class="text-center">ไม่มีข้อมูลพนักงาน</td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
    <a href="insertform.php" class="btn btn-success mt-4">กรอกข้อมูลพนักงาน</a>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
