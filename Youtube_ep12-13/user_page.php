<?php
session_start();
require("dbconnect.php");

if (!isset($_SESSION["emp_level"])) {
    header("location: login.php");
    exit();
}

if ($_SESSION['emp_level'] != "u") {
    echo "<center>หน้าสำหรับผู้ใช้งานระบบ <a href=login.php>กรุณาเข้าสู่ระบบก่อน</a></center>";
    exit();
}

if (!$_SESSION["emp_id"]) {
    header("location: login.php");
    exit();
} else {
    $sq1login = "SELECT * FROM employee WHERE emp_id='" . $_SESSION["emp_id"] . "'"; 
    $result = mysqli_query($con, $sq1login);
    $row = mysqli_fetch_assoc($result);

    $order = 1;  // กำหนดค่าลำดับเริ่มต้นเป็น 1

    ?>

    <!doctype html>
    <html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Bootstrap demo</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    </head>
    <body>

    <div class="container">
        <h2>ยินดีต้อนรับสมาชิก</h2>
        <p><i class='bx bx-user-voice'></i> สวัสดีคุณ <?php echo $row["emp_title"]; echo $row["emp_name"]; echo "&nbsp"; echo $row["emp_surname"]; ?> <a href="logout.php" class="btn btn-danger btn-sm">Log Out</a></p>


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
                        <!-- ลบข้อมูลถูกลบออกไปแล้ว -->
                    </tr>
                </thead>
                <tbody>
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
                        <!-- ลบข้อมูลถูกลบออกไปแล้ว -->
                    </tr>
                </tbody>
            </table>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    </body>
    </html>

<?php } // ปิด else หลังจากนี้ ?>
