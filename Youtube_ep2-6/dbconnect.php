<?php
$con = mysqli_connect("localhost", "root", "", "mydata");

// ตรวจสอบการเชื่อมต่อ
if (!$con) {
    die("เชื่อมต่อไม่สำเร็จ: " . mysqli_connect_error());
}

// ตั้งค่าชุดอักขระ
mysqli_set_charset($con, "utf8");

// แสดงข้อความถ้าเชื่อมต่อสำเร็จ
echo "เชื่อมต่อสำเร็จ";
?>
