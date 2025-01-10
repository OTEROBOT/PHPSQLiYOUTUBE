<?php
// เชื่อมต่อฐานข้อมูล
require 'dbconnect.php';

// รับค่าที่ส่งมาจากฟอร์ม
$emp_title = $_POST["emp_title"];
$emp_name = $_POST["emp_name"];
$emp_surname = $_POST["emp_surname"];
$emp_birthday = $_POST["emp_birthday"];
$emp_adr = $_POST["emp_adr"];
$emp_skill = $_POST["emp_skill"];
$emp_tel = $_POST["emp_tel"];

// ตรวจสอบการเชื่อมต่อฐานข้อมูล
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

// ใช้ prepared statement เพื่อความปลอดภัย
$sql = "INSERT INTO employee (emp_title, emp_name, emp_surname, emp_birthday, emp_adr, emp_skill, emp_tel) 
        VALUES (?, ?, ?, ?, ?, ?, ?)";

$stmt = mysqli_prepare($con, $sql);

if ($stmt) {
    // ผูกข้อมูลกับ statement
    mysqli_stmt_bind_param($stmt, "sssssss", $emp_title, $emp_name, $emp_surname, $emp_birthday, $emp_adr, $emp_skill, $emp_tel);

    // รันคำสั่ง SQL
    if (mysqli_stmt_execute($stmt)) {
        // หากสำเร็จ ให้กลับไปหน้าหลัก
        header("location:index.php");
        exit(0);
    } else {
        // แสดงข้อผิดพลาด
        echo "Error: " . mysqli_error($con);
    }

    // ปิด statement
    mysqli_stmt_close($stmt);
} else {
    echo "Error preparing statement: " . mysqli_error($con);
}

// ปิดการเชื่อมต่อฐานข้อมูล
mysqli_close($con);
?>
